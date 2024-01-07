<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use PhpParser\Builder\Function_;

class HelloEvent implements ShouldBroadcast // Wajib implements 'ShouldBroadcast' supaya eventnya bisa berkomunikasi menggunakan WebSockets
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $text;

    /**
     * Create a new event instance.
     */
    public function __construct($text)
    {
        $this->text = $text;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('channel-hello'),
        ];
    }

    public function broadcastWith() {
        return [
            "data" => $this->text
        ];
    }
}
