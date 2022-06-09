<?php

namespace App\Http\Controllers;

use App\Events\LikeToggle;
use App\Models\Like;
use App\Models\Nft;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NftLikeController extends Controller
{
    public function store(Nft $nft)
    {
        $nft->likes()->create(
            [
                'user_id'=>Auth::id(),
            ]
        );

        broadcast(new LikeToggle($nft));

        return back();

//        return redirect()->route('home');
    }

    public function destroy(Nft $nft, Like $like){
        $like->delete();

        broadcast(new LikeToggle($nft));

        return back();
    }
}
