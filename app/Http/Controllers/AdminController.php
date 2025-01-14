<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Brand;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        // $totalCustomers = Customer::count();
        $totalRevenue = Order::where('status', 'completed')->sum('total');
        $recentOrders = Order::with('customer')->latest()->take(5)->get();
        $totalCategories = Category::count();
        // $totalBrands = Brand::count();

        return view('admin.dashboard', compact(
            'totalProducts', 'totalOrders', 'totalCustomers', 'totalRevenue',
            'recentOrders', 'totalCategories', 'totalBrands'
        ));
    }

    // Metode lain tetap sama
}

