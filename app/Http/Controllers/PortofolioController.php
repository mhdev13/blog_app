<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;

use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('portofolio', [
            'portofolio' => Portofolio::first()->where('status', '=', 'active')
            ->paginate(6)->withQueryString()
        ]);
    }
}
