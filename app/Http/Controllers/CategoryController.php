<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show(Category $category){
        $products = $category->products;
        return view('categories.show', compact('category', 'products'));
    }
}
