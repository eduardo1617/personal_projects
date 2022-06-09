<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Nft;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NftsGalleryController extends Controller
{

    public function index()
    {
//        $nfts = Nft::all();
        $nfts = Nft::paginate(8);

        return view('nftsGallery.index', compact('nfts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $nft=Nft::findOrFail($id);
//        return view('nftsGallery.show', [
//            'nft' => Nft::findOrFail($id),
//        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
