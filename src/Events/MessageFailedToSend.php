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
 * Class MessageFailedToSend
 * @package NotificationChannels\Sailthru\Events
 */
class MessageFailedToSend
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var SailthruMessage
     */
    protected $sailthruMessage;

    /**
     * @var
     */
    protected $exception;

    /**
     * MessageWasSent constructor.
     * @param SailthruMessage $sailthruMessage
     * @param $exception
     */
    public function __construct(SailthruMessage $sailthruMessage, \Sailthru_Client_Exception $exception)
    {
        $this->sailthruMessage = $sailthruMessage;
        $this->exception = $exception;
    }
}
