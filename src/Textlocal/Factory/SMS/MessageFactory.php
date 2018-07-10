<?php

namespace Netsplit\Textlocal\Textlocal\Factory\SMS;

use Netsplit\Textlocal\Textlocal\Entity\SMS\Message;
use Netsplit\Textlocal\Textlocal\ValueObject\ContainsTrackingLinks;
use Netsplit\Textlocal\Textlocal\ValueObject\RecipientList;
use Netsplit\Textlocal\Textlocal\ValueObject\SendToOptOut;
use Netsplit\Textlocal\Textlocal\ValueObject\SimpleReply;
use Netsplit\Textlocal\Textlocal\ValueObject\Test;
use Netsplit\Textlocal\Textlocal\ValueObject\Unicode;
use Netsplit\Textlocal\Textlocal\ValueObject\Custom;
use Netsplit\Textlocal\Textlocal\ValueObject\GroupID;
use Netsplit\Textlocal\Textlocal\ValueObject\ReceiptURL;
use Netsplit\Textlocal\Textlocal\ValueObject\SMSContent;
use Netsplit\Textlocal\Textlocal\ValueObject\Sender;
use Netsplit\Textlocal\Textlocal\ValueObject\ValidUntil;

/**
 * Class MessageFactory
 *
 * @package Netsplit\Textlocal\Textlocal\Factory\SMS
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-04
 */
final class MessageFactory
{
    /**
     * @var array
     */
    protected static $optionalBooleanOptionMap = [
        'containsTrackingLinks' => ContainsTrackingLinks::class,
        'sendToOptOut'          => SendToOptOut::class,
        'simpleReply'           => SimpleReply::class,
        'test'                  => Test::class,
        'unicode'               => Unicode::class,
    ];

    /**
     * @var array
     */
    protected static $optionalOptionValueObjectMap = [
        'custom'     => Custom::class,
        'groupID'    => GroupID::class,
        'receiptURL' => ReceiptURL::class,
        'sender'     => Sender::class,
        'validUntil' => ValidUntil::class,
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
     * @return Message
     * @throws \Netsplit\Textlocal\Textlocal\Exception\NoRecipientsError
     */
    public function make($content, $numbers, $extraArgs = [])
    {
        $recipientFactory = new RecipientFactory();
        $recipientFactory->make($this->convertNumbersToRecipientArray($numbers));

        $extraArgs     = $this->fillExtraArgDefaults($extraArgs);
        $recipientList = $recipientFactory->commaSeparate();

        $sms = new Message();
        $sms->setContent(new SMSContent($content));
        $sms->setRecipientList(new RecipientList($recipientList));

        $allOptionalOptions = array_merge(
            self::$optionalOptionValueObjectMap,
            self::$optionalBooleanOptionMap
        );

        foreach ($allOptionalOptions as $arg => $class) {
            if (isset($extraArgs[$arg])) {
                $setter = self::$setterMap[$arg];

                $sms->$setter(new $class($extraArgs[$arg]));
            }
        }

        return $sms;
    }

    /**
     * Default boolean options to false.
     *
     * @param array $extraArgs
     * @return array
     */
    private function fillExtraArgDefaults(array $extraArgs)
    {
        $booleanOptions = array_keys(self::$optionalBooleanOptionMap);

        foreach ($booleanOptions as $opt) {
            if (!isset($extraArgs[$opt])) {
                $extraArgs[$opt] = false;
            }
        }

        return $extraArgs;
    }

    /**
     * @param array $numbers
     * @return array
     */
    private function convertNumbersToRecipientArray(array $numbers)
    {
        return array_map(function ($n) {
            return [ RecipientFactory::KEY_RECIPIENT => $n ];
        }, $numbers);
    }
}