<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::paginate(5);

        return view(
            'admin.product.index',
            [
                'categories' => $categories,
                'products' => $products
            ]
        );
    }

    public function create(Request $request)
    {


        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->save();

        $images = $request->images;

        foreach ($images as $image) {
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = uniqid() . time() . '.' . $extension;
            Storage::put('public/products_images/' . $fileNameToStore, fopen($image, 'r+'));

            $productImage = new ProductImage();
            $productImage->product_id = $product->id;
            $productImage->name = $fileNameToStore;
            $productImage->save();
        }

        return back()->with('success', 'Product added successfully');

    }
}
