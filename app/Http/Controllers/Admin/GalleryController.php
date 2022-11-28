<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest;
use App\Models\Gallery;
use App\Models\TravelPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // ambil data gallery yang berelasi dengan travel packages, karena berelasi ngga pake all() tapi pake get()
        $items = Gallery::with(['travel_package'])->get();
        
        return view('pages.admin.gallery.index', [
            'items' =>  $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $travel_packages = TravelPackage::all();
        return view('pages.admin.gallery.create', [
            'travel_packages'   =>  $travel_packages
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        // return $request->file('image')->store('gallery-image');

        $data = $request->all();
        $data['image']  =   $request->file('image')->store('gallery-image');

        Gallery::create($data);
        return redirect()->route('gallery.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galleries = Gallery::findOrFail($id);
        $travel_packages = TravelPackage::all();
        return view('pages.admin.gallery.edit', [
            'galleries'  => $galleries,
            'travel_packages' => $travel_packages
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, $id)
    {
        $data = $request->all();

        // check gambar apakah ada gambar baru / tidak
        if($request->image) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $data['image'] = $request->file('image')->store('gallery-image');
        }

        $item = Gallery::findOrFail($id);
        $item->update($data);

        return redirect()->route('gallery.index')->with('success', 'Gallery has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Gallery::findOrFail($id);
        $item->delete();

        return redirect()->route('gallery.index');
    }
}
