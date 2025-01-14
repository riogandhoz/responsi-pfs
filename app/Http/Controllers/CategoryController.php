<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function brownieKukus()
    {
        return view('categories.brownies-kukus');
    }

    public function browniesPanggang()
    {
        return view('categories.brownies-panggang');
    }

    public function browniesOven()
    {
        return view('categories.brownies-oven');
    }
}