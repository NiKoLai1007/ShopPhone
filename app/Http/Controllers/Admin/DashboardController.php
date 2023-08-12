<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboardindex()
    {
        $result = DB::select(DB::raw("SELECT COUNT(*) AS order_count, status FROM orders GROUP BY status"));

        $chartData = "";
        foreach ($result as $val) {
            $chartData .= "['".$val->status."', ". $val->order_count."],";
        }

        $results = DB::select(DB::raw("SELECT COUNT(*) AS user_count, DATE_FORMAT(created_at, '%Y-%M') AS month
        FROM users
        GROUP BY DATE_FORMAT(created_at, '%Y-%M')
        ORDER BY created_at;
        "));

$xAxisCategories = [];
$userData = [];

foreach ($results as $val) {
    $month = $val->month;
    if (!in_array($month, $xAxisCategories)) {
        $xAxisCategories[] = $month;
    }
    $userData[] = $val->user_count;
}

            return view('admin.dashboard', compact("chartData", "userData", "xAxisCategories"));
    }


}
