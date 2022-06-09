<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNft;
use App\Models\Collection;
use App\Models\Nft;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class NftController extends Controller
{
    public function index()
    {
        $nfts = Nft::where('author_id', Auth::id())->get();

        return view('nfts.index', compact('nfts'));
    }

    public function create()
    {

        $collections = Collection::where('author_id', Auth::id())->get();

        $creator = Auth::user();
        $user = Auth::id();

        return view('nfts.create',
        [
            'collections' => $collections,
            'creator' => $creator,
            'user' => $user,
            'nft' => null,
        ]);
    }


    public function store(StoreNft $request)
    {
        $data = $request->validated();
//        dd($data);
//        $data['img_path'] = $request->file('img_path')->store('images');
        $data['img_path'] = $data['img_path']->store('images');

        $user = User::find($data['author_id']);
        $collection = Collection::find($data['collection_id']);
        $owner = User::find($data['owner_id']);

        $collection->nfts();
        $owner->nfts();
        $user->nfts()->create($data);

        return redirect()->route('nfts.index');
    }

    public function show($nft)
    {
        return view('_partials.show', [
        'nft' => Nft::findOrFail($nft),
        ]);
    }

    public function edit(Nft $nft)
    {
        $collections = Collection::where('author_id', Auth::id())->get();

        $creator = Auth::user();
        $user = Auth::id();

        return view('nfts.edit', compact('collections', 'creator', 'user', 'nft'));

    }

    public function update(StoreNft $request, Nft $nft)
    {
        $data = $request->validated();
        $data['img_path'] = $data['img_path']->store('images');

        $author = User::find($data['author_id']);
        $owner = User::find($data['owner_id']);
        $collection = Collection::find($data['collection_id']);


        $nft->author()->associate($author);
        $nft->owner()->associate($owner);
        $nft->collection()->associate($collection);
        $nft->update($data);

        return redirect()->route('nfts.index');
    }

    public function destroy(Nft $nft)
    {
        //
    }
}
