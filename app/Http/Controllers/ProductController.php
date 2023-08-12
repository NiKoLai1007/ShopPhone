<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use App\Http\Requests\ProductRequest;
use App\DataTables\ProductDataTable;

use function GuzzleHttp\Promise\all;

class ProductController extends Controller
{
    public function search(Request $request)
    {
        $searchQuery = $request->input('search_query');

        $products = DB::table('brands')
                    ->join('products', 'brands.id', '=', 'products.brand_id')
                    ->where('products.name', 'like', '%'.$searchQuery.'%')
                    ->orWhere('brands.name', 'like', '%'.$searchQuery.'%')
                    ->get();

        return view('search.result', compact('products'));

    }

    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('product.index');
        // $products = Product::all();
        // $products = DB::table('brands')->join('products','brands.id','=','products.brand_id')
        // ->select('brands.name as bname','brands.slug','brands.description','brands.image','products.id',
        // 'products.name','products.description','products.image','products.price','products.quantity','products.brand_id')
        // ->get();
        // return view('product.index', compact('products'));
    }

    public function create()
    {

        $brands = Brand::all();
        // dd($brands);
        return View::make('product.create', compact('brands'));
    }

    public function edit($id){

        $previousbrand = DB::table('brands')->join('products','brands.id','=','products.brand_id')
        ->select('brands.name as bname','brands.slug','brands.description','brands.image','products.id',
        'products.name','products.description','products.image','products.price','products.quantity','products.brand_id')
        ->where('products.id',$id)
        ->first();
        $branding = Brand::whereNotIn('id',[$previousbrand->id])->get();
        $product = Product::find($id);

        // dd($previousbrand);
        return view('product/edit',compact('branding','previousbrand','product'));
    }

    public function store(ProductRequest $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'slug' => 'required|unique:products',
        'description' => 'required',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'brand_id' => 'required|exists:brands,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $products = new Product;
    $products->name = $validatedData['name'];
    $products->slug = Str::slug($validatedData['slug']);
    $products->description = $validatedData['description'];
    $products->price = $validatedData['price'];
    $products->quantity = $validatedData['quantity'];
    $products->brand_id = $validatedData['brand_id'];

    if ($request->hasFile('image')) {
        $file = $request->file('image');

        $ext = $file->getClientOriginalExtension();
        $filename = time() . '.' . $ext;

        $file->move('storage/uploads/brands', $filename);

        $products->image = $filename;
    }

    $products->save();

    return redirect('product/index')->with('message', 'Product Added Successfully!');
}


    public function update(ProductRequest $request, $id){

        $products = Product::FindOrFail($id);

        $products->name = $request->name;
        $products->slug = $request->slug;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->quantity = $request->quantity;

        if($request->hasFile('image')){

            $path = 'storage/uploads/brands'.$products->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');

            $ext =$file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('storage/uploads/brands',$filename);

            $products->image = $filename;
        }
        $products->save();

        return redirect()->route('viewproducts')->with('message','Product Updated Successfully!');
}
    public function destroy($id){
        Product::where('id','=',$id)->delete();

        return redirect()->route('viewproducts')->with('message','Product Deleted Successfully!');
    }

    public function allProducts(){
        $products = product::all();
        return response()->json($products);
    }


}
