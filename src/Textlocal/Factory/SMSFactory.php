<?php

namespace Netsplit\Textlocal\Textlocal\Factory;

use Netsplit\Textlocal\Textlocal\Entity\SMS;
use Netsplit\Textlocal\Textlocal\ValueObject\BooleanContainsTrackingLinks;
use Netsplit\Textlocal\Textlocal\ValueObject\BooleanSendToOptOut;
use Netsplit\Textlocal\Textlocal\ValueObject\BooleanSimpleReply;
use Netsplit\Textlocal\Textlocal\ValueObject\BooleanTest;
use Netsplit\Textlocal\Textlocal\ValueObject\BooleanUnicode;
use Netsplit\Textlocal\Textlocal\ValueObject\Custom;
use Netsplit\Textlocal\Textlocal\ValueObject\GroupID;
use Netsplit\Textlocal\Textlocal\ValueObject\ReceiptURL;
use Netsplit\Textlocal\Textlocal\ValueObject\SMSContent;
use Netsplit\Textlocal\Textlocal\ValueObject\Sender;
use Netsplit\Textlocal\Textlocal\ValueObject\ValidUntil;

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
     * @var array
     */
    protected static $optionalOptionValueObjectMap = [
        'containsTrackingLinks' => BooleanContainsTrackingLinks::class,
        'custom'                => Custom::class,
        'groupID'               => GroupID::class,
        'receiptURL'            => ReceiptURL::class,
        'sendToOptOut'          => BooleanSendToOptOut::class,
        'sender'                => Sender::Class,
        'simpleReply'           => BooleanSimpleReply::class,
        'test'                  => BooleanTest::class,
        'unicode'               => BooleanUnicode::class,
        'validUntil'            => ValidUntil::class,
    ];

    /**
     * @var array
     */
    protected static $setterMap = [
        'containsTrackingLinks' => 'setContainsTrackingLinks',
        'custom'                => 'setCustom',
        'groupID'               => 'setGroupID',
        'receiptURL'            => 'setReceiptURL',
        'scheduleTime'          => 'setScheduleTime',
        'sendToOptOut'          => 'setSendToOptOut',
        'sender'                => 'setSender',
        'simpleReply'           => 'setSimpleReply',
        'test'                  => 'setTest',
        'unicode'               => 'setUnicode',
        'validUntil'            => 'setValidUntil',
    ];

    /**
     * Create a new SMS entity.
     *
     * @param string $content
     * @param array $numbers
     * @param array $extraArgs
     * @return SMS
     * @throws \Netsplit\Textlocal\Textlocal\Exception\NoRecipientsError
     */
    public function make($content, $numbers, $extraArgs = [])
    {
        $recipients    = (new RecipientFactory)->make($numbers);
        $recipientList = (new RecipientListFactory)->make($recipients);
        $content       = new SMSContent($content);

        $booleanOptions = array_keys(SMS::$optionalOptionMap);

        foreach ($booleanOptions as $opt) {
            if (!isset($extraArgs[$opt])) {
                $extraArgs[$opt] = false;
            }
        }

        $sms = new SMS();

        $sms->setContent($content);
        $sms->setRecipientList($recipientList);

        foreach (self::$optionalOptionValueObjectMap as $arg => $class) {
            if (isset($extraArgs[$arg])) {
                $setter = self::$setterMap[$arg];

                $sms->$setter(new $class($extraArgs[$arg]));
            }
        }

        return $sms;
    }
}