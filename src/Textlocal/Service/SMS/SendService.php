<?php

namespace Netsplit\Textlocal\Textlocal\Service\SMS;

use Netsplit\Textlocal\Textlocal\Entity\SMS\Message;
use Netsplit\Textlocal\Textlocal\Entity\SMS\Response;
use Netsplit\Textlocal\Textlocal\Service\HTTPService;

/**
 * Class SendService
 *
 * @package Netsplit\Textlocal\Textlocal\Service\SMS
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-04
 */
final class SendService extends HTTPService
{
    /**
     * Send an SMS message.
     *
     * @param Message $message
     * @return Response
     * @throws \Netsplit\Textlocal\Textlocal\Exception\HTTPError
     * @throws \Netsplit\Textlocal\Textlocal\Exception\NoRecipientsError
     */
    public function send(Message $message)
    {
        $response = $this->post($message->toServiceArguments());

        return (new \Netsplit\Textlocal\Textlocal\Factory\SMS\ResponseFactory)->make($response, $message);
    }
}