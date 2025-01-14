<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();
        $totalProducts = Product::count();
        
        // Ubah perhitungan total customers
        $totalCustomers = User::count(); // Menghitung semua user, karena kita tidak memiliki kolom 'role'
        
        // Ubah perhitungan total revenue
        $totalRevenue = Order::sum('total_price'); // Menghitung total dari semua order
        
        $recentOrders = Order::with('user')->latest()->take(5)->get();
        $totalCategories = Category::count();

        // Tambahkan log untuk debugging
        Log::info('Dashboard Data:', [
            'totalOrders' => $totalOrders,
            'totalProducts' => $totalProducts,
            'totalCustomers' => $totalCustomers,
            'totalRevenue' => $totalRevenue,
            'totalCategories' => $totalCategories,
        ]);

        return view('admin.dashboard', compact(
            'totalOrders',
            'totalProducts',
            'totalCustomers',
            'totalRevenue',
            'recentOrders',
            'totalCategories'
        ));
    }
}

