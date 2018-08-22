<?php

namespace Netsplit\Textlocal\Textlocal\Factory\ScheduledMessage;

use Netsplit\Textlocal\Textlocal\Entity\ScheduledMessage\GetResponse;
use Netsplit\Textlocal\Textlocal\Factory\ResponseFactory;
use stdClass;

/**
 * Class GetResponseFactory
 *
 * @package Netsplit\Textlocal\Textlocal\Factory\ScheduledMessage
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-08-15
 */
final class GetResponseFactory extends ResponseFactory
{
    /**
     * @param stdClass $input
     * @return GetResponse
     * @throws \Netsplit\Textlocal\Textlocal\Exception\InvalidUnixTimestampError
     * @throws \Netsplit\Textlocal\Textlocal\Exception\NegativeIDError
     * @throws \Netsplit\Textlocal\Textlocal\Exception\PastTimestampError
     */
    public function make(stdClass $input)
    {
        $response = new GetResponse();

        if (isset($input->scheduled)) {
            $scheduledFactory = new ScheduledFactory();
            $scheduled        = [];

            foreach ($input->scheduled as $s) {
                $scheduled[] = $scheduledFactory->make($s);
            }

            $response->setScheduled($scheduled);
        }

        return parent::addStatus($response, $input);
    }
}