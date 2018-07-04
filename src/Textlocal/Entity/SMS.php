<?php

namespace Netsplit\Textlocal\Textlocal\Entity;

use Netsplit\Textlocal\Textlocal\ValueObject\RecipientList;
use Netsplit\Textlocal\Textlocal\ValueObject\Sender;
use Netsplit\Textlocal\Textlocal\ValueObject\SMSContent;

/**
 * Class SMS describes a message to be sent to a number of mobile numbers.
 *
 * @package Netsplit\Textlocal\Textlocal\Entity
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-04
 */
final class SMS
{
    /**
     * @var string
     */
    protected $content, $sender;

    /**
     * A comma-separated list of mobile numbers.
     *
     * @var string
     */
    protected $recipients;

    /**
     * SMS constructor.
     *
     * @param Sender $sender
     * @param SMSContent $content
     * @param RecipientList $recipients
     */
    public function __construct(Sender $sender, SMSContent $content, RecipientList $recipients)
    {
        $this->content    = $content->__toString();
        $this->sender     = $sender->__toString();
        $this->recipients = $recipients->__toString();
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @return string
     */
    public function getRecipients()
    {
        return $this->recipients;
    }
}