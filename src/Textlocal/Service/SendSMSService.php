<?php

namespace Netsplit\Textlocal\Textlocal\Service;

use Netsplit\Textlocal\Textlocal\Entity\SMS;

/**
 * Class SendSMSService
 *
 * @package Netsplit\Textlocal\Textlocal\Service
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-04
 */
final class SendSMSService extends HTTPService
{
    /**
     * Send an SMS message.
     *
     * @param SMS $message
     * @return array
     * @throws \Netsplit\Textlocal\Textlocal\Exception\HTTPError
     */
    public function send(SMS $message)
    {
        var_dump($message->toServiceArguments());
        return [];
        return $this->post($message->toServiceArguments());
    }
}