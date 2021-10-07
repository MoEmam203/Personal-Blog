<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view("categories.index")->with("categories",$categories);
    }

    public function show(Category $category){
        return view("categories.show")->with("category",$category);
    }

    // For Route Resource
    public function create(){
        return view("categories.create");
    }

    // public function store(Request $request){
    
        // $validated = $request->validate([
        //     'name' => 'required|min:3|unique:categories,name'
        // ]);

        // Category::create($validated);

    public function store(CategoryRequest $request){
        Category::create($request->validated());
        return redirect()->route('categories.index')->with("success","Category stored successfully");
    }

    public function edit(Category $category){
        return view("categories.edit")->with("category",$category);
    }

    // public function update(Request $request,Category $category){
        
        // $validated = $request->validate([
        //     'name' => 'required|min:3|unique:categories,name,'.$category->id
        // ]);
        
        // $category->update($validated);
    
    public function update(CategoryRequest $request,Category $category){
        $category->update($request->validated());
        return redirect()->route('categories.index')->with("success","Category updated successfully");
    }

    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('categories.index')->with("success","Category deleted successfully");
    }
}
