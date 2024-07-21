<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(){
        $categories = Category::paginate(10);
        return view('admin.categories', compact('categories') );
    }

    public function create(Request $request){
        // dd($request->all());
        Category::create($request->all());
        return back()->with('success', 'Category added successfully');
    }

    public function delete($id){
        Category::find($id)->delete();
        return back()->with('success', 'Category deleted successfully');
    }

    public function search(Request $request){
        $request->validate([
            'name' => 'required'
        ]);
        
        $name = $request->name;

        $like = '%'.$request->name.'%';
        $categories = Category::where('name', 'LIKE', $like )->paginate(5);

        return view('admin.categories', compact('categories', 'name') );
    }

    public function update(Request $request){
        Category::find($request->id)->update($request->all());
        return back()->with('success', 'Category updated successfully');
    }


}
