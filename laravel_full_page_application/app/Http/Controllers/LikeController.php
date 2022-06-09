<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Nft;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $nft = Nft::findOrFail($request->input('nft_id'));

        $nft->likes()->create(
            [
                'user_id'=>Auth::id(),
            ]
        );

        return redirect()->route('home');
    }

    public function destroy(Like $like){
        $like->delete();

        return back();
    }
}
