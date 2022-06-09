<?php

namespace App\Http\Controllers;

use App\Http\Resources\LinkCollection;
use App\Http\Resources\LinkResource;
use App\Models\Link;
use App\Models\LinkCounter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    public function index()
    {
        $links = Link::query()->where('user_id', Auth::id())->get();
        $links->load('user', 'clicks');
        return LinkCollection::make($links);
    }
    public function create()
    {
        //

    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'url' => ['required', 'url'],
            ]
        );

        $urlHash = Str::random(5);

        $link = Link::create(
            [
                'user_id' => Auth::id(),
                'hash' => $urlHash,
                'url' => $data['url'],
            ]
        )->fresh();
        $link->load('user', 'clicks');

        return LinkResource::make($link);
    }

    public function click(Request $request, $url)
    {

        $link = Link::where('hash', $url)->first();

        LinkCounter::create(['link_id' => $link->id]);

        return redirect($link->url);

    }

    public function show(Link $link)
    {
        //
    }

    public function edit(Link $link)
    {
        //
    }

    public function update(Request $request, Link $link)
    {
        $data = $request->validate(
            [
                'url' => ['required', 'url'],
            ]
        );

        $link->update($data);

        $link->load('user', 'clicks');

        return LinkResource::make($link);
    }

    public function destroy(Link $link)
    {
        $link->delete();

        return response('', Response::HTTP_NO_CONTENT);
    }
}
