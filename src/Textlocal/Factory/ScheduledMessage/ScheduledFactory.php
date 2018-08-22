<?php

namespace Netsplit\Textlocal\Textlocal\Factory\ScheduledMessage;

use DateTime;
use Netsplit\Textlocal\Textlocal\Entity\ScheduledMessage\Scheduled;
use Netsplit\Textlocal\Textlocal\Factory\Factory;
use Netsplit\Textlocal\Textlocal\ValueObject\GroupID;
use Netsplit\Textlocal\Textlocal\ValueObject\GroupName;
use Netsplit\Textlocal\Textlocal\ValueObject\Quantity;
use Netsplit\Textlocal\Textlocal\ValueObject\ScheduledAt;
use Netsplit\Textlocal\Textlocal\ValueObject\ScheduleID;
use Netsplit\Textlocal\Textlocal\ValueObject\Sender;
use Netsplit\Textlocal\Textlocal\ValueObject\SMSContent;

/**
 * Class ScheduledFactory
 *
 * @package Netsplit\Textlocal\Textlocal\Factory\ScheduledMessage
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-08-15
 */
final class ScheduledFactory implements Factory
{
    /**
     * @param $input
     * @return Scheduled
     * @throws \Netsplit\Textlocal\Textlocal\Exception\InvalidUnixTimestampError
     * @throws \Netsplit\Textlocal\Textlocal\Exception\NegativeIDError
     * @throws \Netsplit\Textlocal\Textlocal\Exception\PastTimestampError
     */
    public function make($input)
    {
        $scheduled = new Scheduled();

        if (isset($input->id)) {
            $scheduled->setId(new ScheduleID($input->id));
        }

        if (isset($input->scheduledFor)) {
            $timestamp = DateTime::createFromFormat('Y-m-d-H-i-s', $input->scheduledFor);

            $scheduled->setScheduledTime(new ScheduledAt($timestamp->getTimestamp()));
        }

        if (isset($input->howmany)) {
            $scheduled->setQuantity(new Quantity($input->howmany));
        }

        if (isset($input->message)) {
            $scheduled->setMessage(new SMSContent($input->message));
        }

        if (isset($input->origin)) {
            $scheduled->setOrigin(new Sender($input->origin));
        }

        if (isset($input->groupName)) {
            $scheduled->setGroupName(new GroupName($input->groupName));
        }

        if (isset($input->groupid)) {
            $scheduled->setGroupID(new GroupID($input->groupid));
        }

        return $scheduled;
    }
}