<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Like;
use App\Models\Nft;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        $nfts = Nft::all();

        $random_nfts = Nft::query()->inRandomOrder()->get();

        $users = User::query()->has('nfts')->get();

        $collections = Collection::query()
            ->has('nfts')
            ->limit(3)
            ->get();

        return view('index', compact
        ('nfts', 'collections', 'users','random_nfts'));
    }
}
