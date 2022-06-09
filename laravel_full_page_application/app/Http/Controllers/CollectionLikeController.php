<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollectionLikeController extends Controller
{
    public function store(Collection $collection)
    {
        $collection->likes()->create(
            [
                'user_id'=>Auth::id(),
            ]
        );


        return redirect()->route('home');
    }

    public function destroy(Collection $collection, Like $like){

        $like->delete();

        return back();
    }
}
