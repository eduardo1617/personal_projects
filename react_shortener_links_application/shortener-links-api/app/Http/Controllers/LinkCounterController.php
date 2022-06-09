<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\LinkCounter;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LinkCounterController extends Controller
{

    public function index()
    {
        $clicks = LinkCounter::whereRelation('link', 'user_id', Auth::id())
            ->select(DB::raw('LEFT({fn MONTHNAME(created_at)},3) as month, COUNT(link_id) as clicks'))
            ->groupBy('month', DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();

        return $clicks;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(LinkCounter $linkCounter)
    {
        //
    }

    public function edit(LinkCounter $linkCounter)
    {
        //
    }

    public function update(Request $request, LinkCounter $linkCounter)
    {
        //
    }

    public function destroy(LinkCounter $linkCounter)
    {
        //
    }
}
