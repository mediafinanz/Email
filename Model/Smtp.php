<?php

/**
 * Smtp.php
 *
 * @module Email
 * @package Email\Model
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <info@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace Email\Model;

use Email\DataType\DTEmail;
use Email\DataType\DTEmailResponse;
use MVC\Config;
use MVC\DataType\DTArrayObject;
use MVC\DataType\DTKeyValue;
use MVC\Event;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class Smtp
{
    /**
     * @param \Email\DataType\DTEmail $oDTEmail
     * @return \Email\DataType\DTEmailResponse
     * @throws \ReflectionException
     */
    public static function sendViaPhpMailer(DTEmail $oDTEmail) : DTEmailResponse
    {
        Event::run('email.model.smtp.sendViaPhpMailer.before', $oDTEmail);

        try {

            $oPHPMailer = new PHPMailer(true);

            // Specify the SMTP settings.
            $oPHPMailer->isSMTP();
            $oPHPMailer->CharSet    = 'UTF-8';
            $oPHPMailer->Encoding   = 'base64';

            $oPHPMailer->Username   = Config::MODULE('Email')['sUsername'];
            $oPHPMailer->Password   = Config::MODULE('Email')['sPassword'];
            $oPHPMailer->Host       = Config::MODULE('Email')['sHost'];
            $oPHPMailer->Port       = Config::MODULE('Email')['iPort'];
            $oPHPMailer->SMTPAuth   = Config::MODULE('Email')['bAuth'];
            $oPHPMailer->SMTPSecure = Config::MODULE('Email')['sSecure'];

            // Specify the content of the message.
            $oPHPMailer->setFrom(
                $oDTEmail->get_senderMail(),
                $oDTEmail->get_senderName()
            );
            $oPHPMailer->Subject    = $oDTEmail->get_subject();
            $oPHPMailer->isHTML(true);
            $oPHPMailer->Body       = $oDTEmail->get_html();
            $oPHPMailer->AltBody    = $oDTEmail->get_text();

            // Recipients
            /** @var string $sEmailRecipient */
            foreach ($oDTEmail->get_recipientMailAdresses() as $sEmailRecipient)
            {
                $oPHPMailer->addAddress($sEmailRecipient);
            }

            // Attachments
            /** @var array $aDTArrayObject */
            if (true === is_array($oDTEmail->get_oAttachment()))
            {
                /** @var DTArrayObject $aDTArrayObject */
                foreach ($oDTEmail->get_oAttachment() as $aDTArrayObject)
                {
                    /** @var \MVC\DataType\DTKeyValue $aDTKeyValue */
                    foreach ($aDTArrayObject as $aDTKeyValue)
                    {
                        $oDTKeyValue = DTKeyValue::create($aDTKeyValue);
                        $oPHPMailer->addAttachment(
                            $oDTKeyValue->get_sValue()['file'],
                            $oDTKeyValue->get_sValue()['name']
                        );
                    }
                }
            }

            $bSuccess = $oPHPMailer->Send();
            $sMessage = json_encode($bSuccess);

        } catch (Exception $oException) {

            Event::run('email.model.smtp.sendViaPhpMailer.error', $oException);
            Event::run('mvc.error', DTArrayObject::create()->add_aKeyValue(DTKeyValue::create()->set_sKey('oException')->set_sValue($oException)));

            $oDTEmailResponse = DTEmailResponse::create()
                ->set_bSuccess(false)
                ->set_sMessage($oException->getMessage())
                ->set_oException($oException)
            ;

            return $oDTEmailResponse;

        } catch (\Exception $oException) {

            Event::run('email.model.smtp.sendViaPhpMailer.error', $oException);
            Event::run('mvc.error', DTArrayObject::create()->add_aKeyValue(DTKeyValue::create()->set_sKey('oException')->set_sValue($oException)));

            $oDTEmailResponse = DTEmailResponse::create()
                ->set_bSuccess(false)
                ->set_sMessage($oException->getMessage())
                ->set_oException($oException)
            ;

            return $oDTEmailResponse;
        }

        $oDTEmailResponse = DTEmailResponse::create()
            ->set_bSuccess($bSuccess)
            ->set_sMessage($sMessage)
        ;

        Event::run('email.model.smtp.sendViaPhpMailer.after', $oDTEmailResponse);

        return $oDTEmailResponse;
    }
}