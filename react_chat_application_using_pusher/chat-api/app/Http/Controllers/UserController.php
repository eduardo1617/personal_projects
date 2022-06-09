<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->whereNotIn('id', [Auth::id()])
            ->get();
//        ->except(Auth::id());
//            ->where('id','!=',Auth::id())

        return new UserCollection($users);
    }
}
