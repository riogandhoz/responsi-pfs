<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $query = Category::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $categories = $query->withCount('products')->get();

        return view('categories', compact('categories'));
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = $category->products()
            ->when(request('sort'), function($query) {
                switch(request('sort')) {
                    case 'price-low':
                        return $query->orderBy('price', 'asc');
                    case 'price-high':
                        return $query->orderBy('price', 'desc');
                    case 'newest':
                        return $query->orderBy('created_at', 'desc');
                }
            })
            ->when(request('search'), function($query) {
                return $query->where(function($q) {
                    $q->where('name', 'like', '%' . request('search') . '%')
                      ->orWhere('description', 'like', '%' . request('search') . '%');
                });
            })
            ->when(request('min_price'), function($query) {
                return $query->where('price', '>=', request('min_price'));
            })
            ->when(request('max_price'), function($query) {
                return $query->where('price', '<=', request('max_price'));
            })
            ->paginate(9)
            ->withQueryString();

        return view('categories.show', compact('category', 'products'));
    }

    public function search(Request $request)
    {
        return $this->index($request);
    }
}