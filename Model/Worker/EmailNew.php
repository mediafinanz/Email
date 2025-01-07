<?php

namespace Email\Model\Worker;

use App\DataType\DTAppTableQueue;
use Email\DataType\Email;
use MVC\DataType\DTArrayObject;
use MVC\Event;
use MVC\Log;
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
        $oEmail = Email::create(json_decode($oDTAppTableQueue->get_value(), true));

        // send email
        self::send($oEmail);
    }

    #-------------------------------------------------------------------------------------------------------------------
    # private

    /**
     * Send E-Mail
     * @param Email $oEmail
     * @return DTArrayObject
     * @throws \ReflectionException
     */
	public static function send (Email $oEmail)
	{
        Event::run('email.model.worker.EmailNew.send.before', $oEmail);
        Log::write($oEmail, 'mail.log');

	    // call Callback/Closure function
        $mResult = call_user_func(
            \MVC\Config::MODULE()['Email']['oCallback'],
            $oEmail
        );

        Event::run('email.model.worker.EmailNew.send.after', $mResult);
        Log::WRITE($mResult, 'mail.log');
	}
}