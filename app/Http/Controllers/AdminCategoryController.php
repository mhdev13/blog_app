<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.categories.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required'
        ]);

        Category::create($validatedData);

        return redirect('dashboard/categories')->with('success', 'Saved Success');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminCategory  $adminCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        
        $rules = [
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required'
        ];
        
        $validatedData = $request->validate($rules);
        
        Category::where('id', $category->id)
            ->update($validatedData);

        return redirect('dashboard/categories')->with('success', 'Edit Success');
    }

    public function destroy(Category $category)
    {   
        Category::destroy($category->id);

        return redirect('dashboard/categories')->with('success', 'Delete Success');
    }
}
