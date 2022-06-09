<?php

namespace App\Events;

use App\Http\Resources\MessageResource;
use App\Models\Message;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessagesEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public function __construct(public User $receiver, public User $sender, public MessageResource $messages)
    {

    }

    public function broadcastOn()
    {
        $array = [$this->sender->id, $this->receiver->id];
        sort($array);
        $array = implode('-',$array);
//        return new PrivateChannel('chat.'.$this->message->sender->id);
        return new Channel('chat.'.$array);
//        return new Channel('chat');
    }

    public function broadcastAs()
    {
        return 'messageEvent';
    }
}
