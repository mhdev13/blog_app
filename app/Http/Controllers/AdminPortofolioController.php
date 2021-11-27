<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portofolio;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminPortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.portofolio.index', [
            'portofolio' => Portofolio::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.portofolio.create');  
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
            'title' => 'required|max:255',
            'category' => 'required',
            'image' => 'image|file|max:1024',
            'description' => 'required',
            'status' => 'required',
            'url' => 'url'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('portofolio-image');
        }

        $validatedData['user_id'] = auth()->user()->id;
        
        Portofolio::create($validatedData);

        return redirect('dashboard/portofolio')->with('success', 'Saved Success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Portofolio $portofolio)
    {
        return view('dashboard.portofolio.edit', [
            'portofolio' => $portofolio
        ]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portofolio $portofolio)
    {
        $rules = [
            'title' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'category' => 'required',
            'description' => 'required',
            'status' => 'required',
            'url' => 'url'
        ];

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }

            $validatedData['image'] = $request->file('image')->store('portofolio-image');
        }

        $validatedData['description'] = Str::limit(strip_tags($request->description), 200);
        
        Portofolio::where('id', $portofolio->id)
            ->update($validatedData);

        return redirect('dashboard/portofolio')->with('success', 'Edit Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portofolio $portofolio)
    {
        if($portofolio->image){
            Storage::delete($portofolio->image);
        }
        
        Portofolio::destroy($portofolio->id);

        return redirect('dashboard/portofolio')->with('success', 'Delete Success');
    }
}
