<?php

namespace NotificationChannels\Sailthru\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use NotificationChannels\Sailthru\SailthruMessage;

/**
 * Class MessageWasSent
 * @package NotificationChannels\Sailthru\Events
 */
class MessageWasSent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var SailthruMessage
     */
    protected $sailthruMessage;

    /**
     * @var array
     */
    protected $response;

    /**
     * MessageWasSent constructor.
     * @param SailthruMessage $sailthruMessage
     * @param array $response
     */
    public function __construct(SailthruMessage $sailthruMessage, array $response)
    {
        $this->sailthruMessage = $sailthruMessage;
        $this->response = $response;
    }
}
