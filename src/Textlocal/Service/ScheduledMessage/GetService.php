<?php

namespace Netsplit\Textlocal\Textlocal\Service\ScheduledMessage;

use Netsplit\Textlocal\Textlocal\Factory\ScheduledMessage\GetResponseFactory;
use Netsplit\Textlocal\Textlocal\Service\HTTPService;

/**
 * Class GetService
 *
 * @package Netsplit\Textlocal\Textlocal\Service\ScheduledMessages
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-08-15
 */
final class GetService extends HTTPService
{
    /**
     * Returns a list of unsent scheduled messages.
     * @return \Netsplit\Textlocal\Textlocal\Entity\ScheduledMessage\GetResponse
     * @throws \Netsplit\Textlocal\Textlocal\Exception\HTTPError
     * @throws \Netsplit\Textlocal\Textlocal\Exception\NegativeIDError
     */
    public function getScheduledMessages()
    {
        $response = $this->post([]);

        return (new GetResponseFactory)->make($response);
    }
}