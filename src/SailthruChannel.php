<?php

namespace NotificationChannels\Sailthru;

use NotificationChannels\Sailthru\Exceptions\CouldNotSendNotification;
use NotificationChannels\Sailthru\Events\MessageWasSent;
use NotificationChannels\Sailthru\Events\SendingMessage;
use Illuminate\Notifications\Notification;

class SailthruChannel
{
    /**
     * @var \Sailthru_Client
     */
    protected $sailthru;

    /**
     * SailthruChannel constructor.
     * @param \Sailthru_Client $sailthru
     */
    public function __construct(\Sailthru_Client $sailthru)
    {
        $this->sailthru = $sailthru;
    }

    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     *
     * @throws \NotificationChannels\Sailthru\Exceptions\CouldNotSendNotification
     */
    public function send($notifiable, Notification $notification)
    {
        /** @var SailthruMessage $message */
        $message = $notification->toSailthru($notifiable);

        $response = $this->sailthru->send(
            $message->getTemplate(),
            $message->getToEmail(),
            $message->getParameters()
        );


        //@TODO: handle errors / exceptions.

//        if ($response->error) { // replace this by the code need to check for errors
//            throw CouldNotSendNotification::serviceRespondedWithAnError($response);
//        }
    }
}
