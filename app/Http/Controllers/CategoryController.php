<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $categories= Category::all();
        return view('admin.category.index')->with('categories', $categories);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $this->validate(request(),[
            'category_name' => 'required',
            'description' => 'required'
            ]);         
       
        $category= new Category();
        $category->category_name = $request['category_name'];
        $category->description = $request['description'];
        // add other fields
        $category->save();

        return redirect('/category')->with('status', 'A New category has been created successfully.');

    }

    public function edit(Request $request, $id)
    {
        $categories = Category::findOrFail($id);
        return view('admin.category.edit')->with('categories', $categories);
    }

    public function update(Request $request, $id)
    {
        $categories = Category::find($id);
        $categories->category_name = $request->input('category_name');
        $categories->description = $request->input('description');
        $categories->update();

        return redirect('/category')->with('status', 'Category has been updated successfully.');
    }


    public function destroy($id)
    {
        $categories = Category::findOrFail($id);
        $categories->delete();

        return redirect('/category')->with('status', 'Category has been deleted successfully.');
    }

    public function downloadcsv()
    {
        $categories = Category::get(); // All users
        $csvExporter = new \Laracsv\Export();
        $csvExporter->build($categories, ['category_name', 'description'])->download('category list.csv');
    }
    
}
