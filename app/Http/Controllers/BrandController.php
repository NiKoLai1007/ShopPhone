<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\DataTables\BrandDataTable;


class BrandController extends Controller
{
    public function index()
    {

        $brands = Brand::get();
        return view('brand.index', compact('brands'));

        //     if (request()->ajax()) {
        //     $brands = Brand::query(); // Replace with your brand model and query

        //     return DataTables::of($brands)
        //         ->addColumn('image', function ($brand) {
        //             return '<img src="' . asset('storage/uploads/brands/' . $brand->image) . '" alt="' . $brand->name . '" class="img-thumbnail" width="100">';
        //         })
        //         ->addColumn('action', function ($brand) {
        //             return '<div class="btn-group" role="group">
        //                         <a href="' . route('editbrands', $brand->id) . '" class="btn btn-sm" style="background-color: #fb5530; color: #fff; margin-right: 0.5rem;"><i class="fas fa-edit"></i> Edit</a>
        //                         <a href="' . route('deletebrands', $brand->id) . '" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
        //                     </div>';
        //         })
        //         ->rawColumns(['image', 'action'])
        //         ->make(true);
        // }

        // return view('brands.index');


        // return $dataTable->render('brands.index');

    }

    public function create()
    {
        return view('brand.create');
    }
    // public function store(BrandRequest $request)
    // {
    //     $validatedData = $request->validated();

    //     $brand = new Brand;
    //     $brand->name = $validatedData['name'];
    //     $brand->slug = Str::slug($validatedData['slug']);
    //     $brand->description = $validatedData['description'];

    //     if($request->hasFile('image')){
    //         $files = $request->file('image');
    //         $imagePaths = [];

    //         foreach($files as $file){
    //             $ext = $file->getClientOriginalExtension();
    //             $filename = time().'.'.$ext;
    //             $file->storeAs('public/uploads/brands', $filename);
    //             $imagePaths[] = 'storage/uploads/brands/'.$filename;
    //         }

    //         $brand->images = json_encode($imagePaths);
    //     }

    //     $brand->save();

    //     return redirect('brand/index')->with('message','Brand Added Successfully!');
    // }

    public function store(BrandRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:brands',
            'slug' => 'required|unique:brands',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $brand = new Brand;
        $brand->name = $validatedData['name'];
        $brand->slug = Str::slug($validatedData['slug']);
        $brand->description = $validatedData['description'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('storage/uploads/brands', $filename);

            $brand->image = $filename;

            $brand->save();

            return redirect('brand/index')->with('message', 'Brand Added Successfully!');
        }

        // $image = array();
        // if ($files = $request->file('image')) {
        //     foreach ($files as $file) {
        //         $name = md5(rand(1000, 10000));
        //         $ext = strtolower($file->getClientOriginalExtension());
        //         $image_full_name = $name . '' . $ext;
        //         $upload_path = 'storage/uploads/';
        //         $image_url = $upload_path . $image_full_name;
        //         $file->move($upload_path, $image_full_name);
        //         $image[] = $image_url;
        //     }

        //     Brand::insert([

        //         'image' => implode('|', $image),

        //     ]);
        // }
    }

    public function edit($id)
    {

        $brands = Brand::where('id', '=', $id)->first();
        // dd($id);
        return view('brand/edit', compact('brands'));
    }

    public function update(Request $request, $id)
    {

        $brands = Brand::FindOrFail($id);

        $brands->name = $request->name;
        $brands->slug = $request->slug;
        $brands->description = $request->description;

        if ($request->hasFile('image')) {

            $path = 'storage/uploads/brands' . $brands->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('storage/uploads/brands', $filename);

            $brands->image = $filename;
        }
        $brands->save();

        return redirect()->route('viewbrands')->with('message', 'Category Updated Successfully!');
    }
    public function destroy($id)
    {

        Brand::where('id', '=', $id)->delete();

        return redirect()->route('viewbrands')->with('message', 'Category Deleted Successfully!');
    }
}
