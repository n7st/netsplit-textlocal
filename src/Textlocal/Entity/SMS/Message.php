<?php

namespace Netsplit\Textlocal\Textlocal\Entity\SMS;

use Netsplit\Textlocal\Textlocal\ValueObject\ContainsTrackingLinks;
use Netsplit\Textlocal\Textlocal\ValueObject\SendToOptOut;
use Netsplit\Textlocal\Textlocal\ValueObject\SimpleReply;
use Netsplit\Textlocal\Textlocal\ValueObject\Test;
use Netsplit\Textlocal\Textlocal\ValueObject\Unicode;
use Netsplit\Textlocal\Textlocal\ValueObject\Custom;
use Netsplit\Textlocal\Textlocal\ValueObject\GroupID;
use Netsplit\Textlocal\Textlocal\ValueObject\ReceiptURL;
use Netsplit\Textlocal\Textlocal\ValueObject\RecipientList;
use Netsplit\Textlocal\Textlocal\ValueObject\ScheduledAt;
use Netsplit\Textlocal\Textlocal\ValueObject\Sender;
use Netsplit\Textlocal\Textlocal\ValueObject\SMSContent;
use Netsplit\Textlocal\Textlocal\ValueObject\ValidUntil;

/**
 * Class Message describes a message to be sent to a number of mobile numbers.
 *
 * @package Netsplit\Textlocal\Textlocal\Entity\SMS
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-04
 */
final class Message
{
    /**
     * @var Custom
     */
    protected $custom;

    /**
     * @var SMSContent
     */
    protected $content;

    /**
     * @var Sender
     */
    protected $sender;

    /**
     * @var ReceiptURL
     */
    protected $receiptURL;

    /**
     * A comma-separated list of mobile numbers.
     *
     * @var RecipientList
     */
    protected $recipients;

    /**
     * @var GroupID
     */
    protected $groupID;

    /**
     * UNIX timestamp for a scheduled message.
     *
     * @var ScheduledAt
     */
    protected $scheduleTime;

    /**
     * Overrides the sender with a Simple Reply Service number.
     *
     * @var SimpleReply
     */
    protected $simpleReply;

    /**
     * UNIX timestamp set to some time in the future. How long a message is
     * valid for.
     *
     * @var ValidUntil
     */
    protected $validUntil;

    /**
     * Should the message be sent to users who have opted out of your mailing
     * list? Defaults to false.
     *
     * @var SendToOptOut
     */
    protected $sendToOptOut;

    /**
     * Does the message contain unicode characters? Defaults to false.
     *
     * @var Unicode
     */
    protected $unicode;

    /**
     * Does the message contain links which should be converted to short URLs?
     *
     * @var ContainsTrackingLinks
     */
    protected $containsTrackingLinks;

    /**
     * If this is set to true, no credit will be used (but the message won't
     * really be sent).
     *
     * @var Test
     */
    protected $test;

    /**
     * @param Sender $sender
     * @return void
     */
    public function setSender(Sender $sender)
    {
        $this->sender = $sender;
    }

    /**
     * @return Sender
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param SMSContent $content
     * @return void
     */
    public function setContent(SMSContent $content)
    {
        $this->content = $content;
    }

    /**
     * @return SMSContent
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param RecipientList $list
     * @return void
     */
    public function setRecipientList(RecipientList $list)
    {
        $this->recipients = $list;
    }

    /**
     * @param SimpleReply $simpleReply
     * @return void
     */
    public function setSimpleReply(SimpleReply $simpleReply)
    {
        $this->simpleReply = $simpleReply;
    }

    /**
     * @return SimpleReply
     */
    public function getSimpleReply()
    {
        return $this->simpleReply;
    }

    /**
     * @param Test $test
     * @return void
     */
    public function setTest(Test $test)
    {
        $this->test = $test;
    }

    /**
     * @return Test
     */
    public function getTest()
    {
        return $this->test;
    }

    /**
     * @param Unicode $unicode
     * @return void
     */
    public function setUnicode(Unicode $unicode)
    {
        $this->unicode = $unicode;
    }

    /**
     * @return Unicode
     */
    public function getUnicode()
    {
        return $this->unicode;
    }

    /**
     * @param ContainsTrackingLinks $containsTrackingLinks
     * @return void
     */
    public function setContainsTrackingLinks(ContainsTrackingLinks $containsTrackingLinks)
    {
        $this->containsTrackingLinks = $containsTrackingLinks;
    }

    /**
     * @return ContainsTrackingLinks
     */
    public function getContainsTrackingLinks()
    {
        return $this->containsTrackingLinks;
    }

    /**
     * @param SendToOptOut $sendToOptOut
     * @return void
     */
    public function setSendToOptOut(SendToOptOut $sendToOptOut)
    {
        $this->sendToOptOut = $sendToOptOut;
    }

    /**
     * @param ScheduledAt $scheduleTime
     * @return void
     */
    public function setScheduleTime(ScheduledAt $scheduleTime)
    {
        $this->scheduleTime = $scheduleTime;
    }

    /**
     * @return ScheduledAt
     */
    public function getScheduleTime()
    {
        return $this->scheduleTime;
    }

    /**
     * @param ValidUntil $validUntil
     * @return void
     */
    public function setValidUntil(ValidUntil $validUntil)
    {
        $this->validUntil = $validUntil;
    }

    /**
     * @return ValidUntil
     */
    public function getValidUntil()
    {
        return $this->validUntil;
    }

    /**
     * @param ReceiptURL $receiptURL
     * @return void
     */
    public function setReceiptURL(ReceiptURL $receiptURL)
    {
        $this->receiptURL = $receiptURL;
    }

    /**
     * @param GroupID $groupID
     * @return void
     */
    public function setGroupID(GroupID $groupID)
    {
        $this->groupID = $groupID;
    }

    /**
     * @return GroupID
     */
    public function getGroupID()
    {
        return $this->groupID;
    }

    /**
     * @param Custom $custom
     * @return void
     */
    public function setCustom(Custom $custom)
    {
        $this->custom = $custom;
    }

    /**
     * @return Custom
     */
    public function getCustom()
    {
        return $this->custom;
    }

    /**
     * @return ReceiptURL
     */
    public function getReceiptURL()
    {
        return $this->receiptURL;
    }

    /**
     * @return RecipientList
     */
    public function getRecipients()
    {
        return $this->recipients;
    }

    /**
     * @param RecipientList $recipients
     */
    public function setRecipients($recipients)
    {
        $this->recipients = $recipients;
    }

    /**
     * Translate our class attributes to an array for Textlocal's "send"
     * endpoint.
     *
     * @return array
     */
    public function toServiceArguments()
    {
        $args = [
            'message' => $this->content->__toString(),
            'numbers' => $this->recipients->__toString(),
            'sender'  => $this->sender->__toString(),
        ];

        // Boolean options default to false
        $args['tracking_links'] = $this->containsTrackingLinks->getValue();
        $args['optouts']        = $this->sendToOptOut->getValue();
        $args['simple_reply']   = $this->simpleReply->getValue();
        $args['test']           = $this->test->getValue();
        $args['unicode']        = $this->unicode->getValue();

        if ($this->custom) {
            $args['custom'] = $this->custom->__toString();
        }

        if ($this->groupID) {
            $args['group_id'] = $this->groupID->getValue();
        }

        if ($this->receiptURL) {
            $args['receipt_url'] = $this->receiptURL->__toString();
        }

        if ($this->scheduleTime) {
            $args['schedule_time'] = $this->scheduleTime->getValue();
        }

        if ($this->validUntil) {
            $args['validity'] = $this->validUntil->getValue();
        }

        if ($this->simpleReply && $this->simpleReply->isTrue()) {
            unset($args['sender']);
        }

        return $args;
    }
}