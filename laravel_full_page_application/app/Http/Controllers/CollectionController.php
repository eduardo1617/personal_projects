<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCollection;
use App\Models\Collection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Arr;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Collection::where('author_id', Auth::id())->get();

        return view('collections.index', compact('collections'));
    }

    public function create()
    {

        $user = Auth::id();
        return view('collections.create',
            [
                'user' => $user,
                'collection' => null,
            ]);
    }

    public function store(StoreCollection $request)
    {
        $data = $request->validated();

        $data['author_id'] = Auth::id();

        $user = User::find($data['author_id']);
        $user->collections()->create($data);

        return redirect()->route('collections.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        $users = Auth::user();
        return view('collections.edit', compact('collection', 'users'));
    }


    public function edit(Collection $collection)
    {
        $user = Auth::id();
        return view('collections.edit', compact('user', 'collection'));
    }

    public function update(StoreCollection $request, Collection $collection)
    {
        $data = $request->validated();

        $data['author_id'] = Auth::id();

        $user = User::find($data['author_id']);

        $collection->author()->associate($user);
        $collection->update($data);

        return redirect()->route('collections.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {
        //
    }
}
