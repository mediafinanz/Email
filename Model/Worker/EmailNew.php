<?php

namespace Email\Model\Worker;

use App\DataType\DTAppTableQueue;
use Email\DataType\DTEmail;
use MVC\Event;
use MVC\WorkerTrait;


class EmailNew implements \MVC\MVCInterface\InterfaceWorker
{
    use WorkerTrait;

    /**
     * @param \App\DataType\DTAppTableQueue|null $oDTAppTableQueue
     * @return void
     * @throws \ReflectionException
     */
    public static function work(?DTAppTableQueue $oDTAppTableQueue = null) : void
    {
        // get email object from job value
        $aDTEmail = json_decode($oDTAppTableQueue->get_value(), true);
        $oDTEmail = DTEmail::create($aDTEmail);

        // send email
        self::send($oDTEmail);
    }

    #-------------------------------------------------------------------------------------------------------------------
    # protected

    /**
     * @param \Email\DataType\DTEmail $oDTEmail
     * @return void
     * @throws \ReflectionException
     */
    protected static function send (DTEmail $oDTEmail)
	{
        Event::run('email.model.worker.EmailNew.send.before', $oDTEmail);

        /** @var \Email\DataType\DTEmailResponse $oDTEmailResponse */
        $oDTEmailResponse = call_user_func(
            // call Callback/Closure function
            \MVC\Config::MODULE('Email')['oCallback'],
            $oDTEmail
        );

        Event::run('email.model.worker.EmailNew.send.after', $oDTEmailResponse);
	}
}