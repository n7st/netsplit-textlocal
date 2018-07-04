<?php

namespace Netsplit\Textlocal\Textlocal\Entity;

use Netsplit\Textlocal\Textlocal\ValueObject\BooleanContainsTrackingLinks;
use Netsplit\Textlocal\Textlocal\ValueObject\BooleanSendToOptOut;
use Netsplit\Textlocal\Textlocal\ValueObject\BooleanSimpleReply;
use Netsplit\Textlocal\Textlocal\ValueObject\BooleanTest;
use Netsplit\Textlocal\Textlocal\ValueObject\BooleanUnicode;
use Netsplit\Textlocal\Textlocal\ValueObject\Custom;
use Netsplit\Textlocal\Textlocal\ValueObject\GroupID;
use Netsplit\Textlocal\Textlocal\ValueObject\ReceiptURL;
use Netsplit\Textlocal\Textlocal\ValueObject\RecipientList;
use Netsplit\Textlocal\Textlocal\ValueObject\ScheduledAt;
use Netsplit\Textlocal\Textlocal\ValueObject\Sender;
use Netsplit\Textlocal\Textlocal\ValueObject\SMSContent;
use Netsplit\Textlocal\Textlocal\ValueObject\ValidUntil;

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
     * @var array
     */
    public static $optionalOptionMap = [
        'containsTrackingLinks' => 'tracking_links',
        'custom'                => 'custom',
        'groupID'               => 'group_id',
        'sendToOptOut'          => 'optouts',
        'simpleReply'           => 'simple_reply',
        'test'                  => 'test',
        'unicode'               => 'unicode',
        'validUntil'            => 'validity',
        'sender'                => 'sender',
        'scheduleTime'          => 'schedule_time',
        'receiptURL'            => 'receipt_url',
    ];

    /**
     * @var string
     */
    protected $content, $sender, $receiptURL, $custom;

    /**
     * A comma-separated list of mobile numbers.
     *
     * @var string
     */
    protected $recipients;

    /**
     * @var int
     */
    protected $groupID;

    /**
     * UNIX timestamp for a scheduled message.
     *
     * @var int
     */
    protected $scheduleTime;

    /**
     * Overrides the sender with a Simple Reply Service number.
     *
     * @var bool
     */
    protected $simpleReply = false;

    /**
     * UNIX timestamp set to some time in the future. How long a message is
     * valid for.
     *
     * @var int
     */
    protected $validUntil;

    /**
     * Should the message be sent to users who have opted out of your mailing
     * list? Defaults to false.
     *
     * @var bool
     */
    protected $sendToOptOut = false;

    /**
     * Does the message contain unicode characters? Defaults to false.
     *
     * @var bool
     */
    protected $unicode = false;

    /**
     * Does the message contain links which should be converted to short URLs?
     *
     * @var bool
     */
    protected $containsTrackingLinks = false;

    /**
     * If this is set to true, no credit will be used (but the message won't
     * really be sent).
     *
     * @var bool
     */
    protected $test = false;

    /**
     * @param Sender $sender
     * @return void
     */
    public function setSender(Sender $sender)
    {
        $this->sender = $sender->__toString();
    }

    /**
     * @param SMSContent $content
     * @return void
     */
    public function setContent(SMSContent $content)
    {
        $this->content = $content->__toString();
    }

    /**
     * @param RecipientList $list
     * @return void
     */
    public function setRecipientList(RecipientList $list)
    {
        $this->recipients = $list->__toString();
    }

    /**
     * @param BooleanSimpleReply $simpleReply
     * @return void
     */
    public function setSimpleReply(BooleanSimpleReply $simpleReply)
    {
        $this->simpleReply = $simpleReply->getValue();
    }

    /**
     * @param BooleanTest $test
     * @return void
     */
    public function setTest(BooleanTest $test)
    {
        $this->test = $test->getValue();
    }

    /**
     * @param BooleanUnicode $unicode
     * @return void
     */
    public function setUnicode(BooleanUnicode $unicode)
    {
        $this->unicode = $unicode->getValue();
    }

    /**
     * @param BooleanContainsTrackingLinks $containsTrackingLinks
     * @return void
     */
    public function setContainsTrackingLinks(BooleanContainsTrackingLinks $containsTrackingLinks)
    {
        $this->containsTrackingLinks = $containsTrackingLinks->getValue();
    }

    /**
     * @param BooleanSendToOptOut $sendToOptOut
     * @return void
     */
    public function setSendToOptOut(BooleanSendToOptOut $sendToOptOut)
    {
        $this->sendToOptOut = $sendToOptOut->getValue();
    }

    /**
     * @param ScheduledAt $scheduleTime
     * @return void
     */
    public function setScheduleTime(ScheduledAt $scheduleTime)
    {
        $this->scheduleTime = $scheduleTime->getValue();
    }

    /**
     * @param ValidUntil $validUntil
     * @return void
     */
    public function setValidUntil(ValidUntil $validUntil)
    {
        $this->validUntil = $validUntil->getValue();
    }

    /**
     * @param ReceiptURL $receiptURL
     * @return void
     */
    public function setReceiptURL(ReceiptURL $receiptURL)
    {
        $this->receiptURL = $receiptURL->__toString();
    }

    /**
     * @param GroupID $groupID
     * @return void
     */
    public function setGroupID(GroupID $groupID)
    {
        $this->groupID = $groupID->getValue();
    }

    /**
     * @param Custom $custom
     * @return void
     */
    public function setCustom(Custom $custom)
    {
        $this->custom = $custom->__toString();
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
            'message' => $this->content,
            'numbers' => $this->recipients,
            'sender'  => $this->sender,
        ];

        foreach (self::$optionalOptionMap as $ours => $theirs) {
            $val = $this->$ours;

            if ($val) {
                $args[$theirs] = $val;
            }
        }

        if ($this->simpleReply) {
            unset($args['sender']);
        }

        return $args;
    }
}