<?php

namespace App\Http\Controllers;

use App\Models\TravelPackage;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request, $slug)
    {

        // ambil data travel packaged dengan galleries dengan slug-nya sesuai dengan paratemer slug yg dikirimkan, jika ada datanya ambil yg pertama jika tida ada gagalkan
        $item = TravelPackage::with(['galleries'])
                    ->where('slug', $slug)
                    ->firstOrFail();

        return view('pages.detail', [
            'item' =>  $item
        ]);
    }
}
