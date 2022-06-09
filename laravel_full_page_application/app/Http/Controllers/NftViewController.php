<?php

namespace App\Http\Controllers;

use App\Events\LikeToggle;
use App\Models\Like;
use App\Models\Nft;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NftViewController extends Controller
{
    public function store(Nft $nft)
    {

        $nft->views()->Create(
            [
                'user_id'=>Auth::id(),
            ]
        );
//        return back();

        return redirect()->route('nfts.show', [$nft->id]);

    }

    public function update(Nft $nft, View $view){
        $view->update(
            [
                'updated_at' => now(),
            ]
        );

//        return back();
        return redirect()->route('nfts.show', [$nft->id]);
    }


}
