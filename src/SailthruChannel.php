<?php

namespace NotificationChannels\Sailthru;

use Illuminate\Notifications\Notification;
use NotificationChannels\Sailthru\Exceptions\CouldNotSendNotification;

class SailthruChannel
{
    /**
     * @var \Sailthru_Client
     */
    protected $sailthru;

    /**
     * SailthruChannel constructor.
     *
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

        //@TODO: Send vs Multi Send
        //@TODO: Add evars for multi send option.
        //@TODO: Add Default Global vars
        //@TODO: Confirm if ReplyTO actually works
        //@TODO: Investigate customer_id in config
        //@TODO: handle errors / exceptions. check SailthruTransport:87

        $response = $this->sailthru->send(
            $message->getTemplate(),
            $message->getToEmail(),
            $message->getVars()
        );

//        if ($response->error) { // replace this by the code need to check for errors
//            throw CouldNotSendNotification::serviceRespondedWithAnError($response);
//        }
    }
}
