<?php

namespace NotificationChannels\Sailthru;

use NotificationChannels\Sailthru\Exceptions\CouldNotSendNotification;
use NotificationChannels\Sailthru\Events\MessageWasSent;
use NotificationChannels\Sailthru\Events\SendingMessage;
use Illuminate\Notifications\Notification;

class SailthruChannel
{
    public function __construct()
    {
        // Initialisation code here
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
        //$response = [a call to the api of your notification send]

//        if ($response->error) { // replace this by the code need to check for errors
//            throw CouldNotSendNotification::serviceRespondedWithAnError($response);
//        }
    }
}
