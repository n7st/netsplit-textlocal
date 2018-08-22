<?php

namespace Netsplit\Textlocal\Textlocal\Entity\ScheduledMessage;

use Netsplit\Textlocal\Textlocal\Entity\Response;

/**
 * Class GetResponse
 *
 * @package Netsplit\Textlocal\Textlocal\Entity\ScheduledMessage
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-08-15
 */
final class GetResponse extends Response
{
    /**
     * @var Scheduled[]
     */
    protected $scheduled = [];

    /**
     * @param Scheduled[] $scheduled
     */
    public function setScheduled($scheduled)
    {
        $this->scheduled = $scheduled;
    }
}