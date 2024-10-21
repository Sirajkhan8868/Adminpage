<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function OpenCategoriesPage()
    {
      return view('categories.index');
    }
}
