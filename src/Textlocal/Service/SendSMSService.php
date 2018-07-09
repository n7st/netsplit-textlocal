<?php

namespace Netsplit\Textlocal\Textlocal\Service;

use Netsplit\Textlocal\Textlocal\Entity\SMS;
use Netsplit\Textlocal\Textlocal\Entity\SMSResponse;

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
     * @return SMSResponse
     * @throws \Netsplit\Textlocal\Textlocal\Exception\HTTPError
     */
    public function send(SMS $message)
    {
        $response = $this->post($message->toServiceArguments());

        return SMSResponse::fromResponse($response, $message);
    }
}