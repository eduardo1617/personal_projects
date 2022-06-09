<?php

namespace App\Http\Controllers;

use App\Events\MessagesEvent;
use App\Http\Resources\MessageCollection;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Symfony\Component\Mailer\Event\MessageEvent;

class MessageController extends Controller
{
    public function index(Request $request)
    {
//
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $receiver = User::find($request->input('receiver_id'));
        $sender = User::find($request->input('sender_id'));

        $data = $request->validate(
            [
                'text' => ['required'],
                'sender_id' => ['required', Rule::exists('users', 'id')],
                'receiver_id' => ['required', Rule::exists('users', 'id')]
            ]
        );

        $message = Message::create($data)->fresh();
        $message->load('sender', 'receiver');

        $messages = MessageResource::make($message);

        broadcast(new MessagesEvent($receiver, $sender, $messages));

        return MessageResource::make($message);
    }

    public function contactMessage(Request $request, User $user)
    {
//        $sender = Message::query()
//            ->with(['sender', 'receiver'])
//            ->whereIn('sender_id', [Auth::id(), $user->id])
//            ->orWhereIn('receiver_id', [Auth::id(), $user->id])
//            ->get();
//        dd(Auth::id());

//        $auth = Auth::id();

        $sender = Message::query()
            ->with('receiver', 'sender')
            ->where(function ($query) use ($user) {
                $query->where('sender_id', Auth::id())->where('receiver_id', $user->id);
            })
            ->orWhere(function ($query) use ($user) {
                $query->where('receiver_id', Auth::id())->where('sender_id', $user->id);
            })
            ->orderBy('created_at')
            ->get();

        return new MessageCollection($sender);
    }

    public function senderMessage(Request $request, User $user)
    {
        $sender = Message::query()
            ->with('sender', 'receiver')
            ->whereIn('sender_id', [Auth::id(), $user->id])
            ->orWhereIn('receiver_id', [Auth::id(), $user->id])
            ->get();

        return new MessageCollection($sender);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
