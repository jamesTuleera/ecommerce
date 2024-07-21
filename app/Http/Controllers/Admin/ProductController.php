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

    protected $categories;


    public function __construct()
    {
        $this->categories = Category::all();
    }

    public function index()
    {
        $categories = Category::all();
        $products = Product::paginate(10);





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

    public function search(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $name = '%' . $request->name . '%';
        $products = Product::where('name', 'LIKE', $name)->paginate(5);
        $categories = Category::all();

        return view('admin.product.index', compact('products', 'categories'));

    }


    public function update($product_id)
    {

        $product = Product::findOrFail($product_id);

        return view('admin.product.update', ['product' => $product, 'categories' => $this->categories]);


    }


    public function deleteImage($id){

        ProductImage::find($id)->delete();
        return back()->with('success', 'Image deleted successfully');
    }


}
