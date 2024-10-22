<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function OpenCategoriesPage()
    {
        $categories = Category::all();
      return view('categories.index', compact('categories'));
    }
}
