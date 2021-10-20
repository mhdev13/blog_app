<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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

    public function create()
    {
        return view('dashboard.categories.create');  
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

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'category' => $category
        ]);  
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

    public function checkSlug(Request $request)
    {

        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
