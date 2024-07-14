<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view(
            'admin.product.index', ['categories' => $categories]
        );
    }
}
