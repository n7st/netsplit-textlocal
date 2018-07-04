<?php

namespace Netsplit\Textlocal\Textlocal\Factory;

use Netsplit\Textlocal\Textlocal\ValueObject\Sender;
use Netsplit\Textlocal\Textlocal\Entity\SMS;
use Netsplit\Textlocal\Textlocal\ValueObject\SMSContent;

/**
 * Class SMSFactory
 *
 * @package Netsplit\Textlocal\Textlocal\Factory
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-04
 */
final class SMSFactory
{
    /**
     * Create a new SMS entity.
     *
     * @param Sender $sender
     * @param SMSContent $content
     * @param array $numbers
     * @return SMS
     * @throws \Netsplit\Textlocal\Textlocal\Exception\NoRecipientsError
     */
    public function make(Sender $sender, SMSContent $content, $numbers)
    {
        $recipients    = (new RecipientFactory)->make($numbers);
        $recipientList = (new RecipientListFactory)->make($recipients);

        return new SMS($sender, $content, $recipientList);
    }
}