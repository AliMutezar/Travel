<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutContoroller extends Controller
{
    public function index()
    {
        return view('pages.checkout');
    }

    public function success(Request $request)
    {
        return view('pages.success');
    }
}
