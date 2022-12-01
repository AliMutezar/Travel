<?php

namespace App\Http\Controllers;

use App\Models\TravelPackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // panggil relasi dari travel package ke galleries untuk mengambil gambar
        $items = TravelPackage::with(['galleries'])->get();
        return view('pages.home', [
            'items' =>  $items
        ]);
    }
}
