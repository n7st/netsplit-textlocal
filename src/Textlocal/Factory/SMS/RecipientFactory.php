<?php

namespace Netsplit\Textlocal\Textlocal\Factory\SMS;

use Netsplit\Textlocal\Textlocal\Entity\SMS\Recipient;
use Netsplit\Textlocal\Textlocal\Exception\NoRecipientsError;
use Netsplit\Textlocal\Textlocal\ValueObject\PhoneNumber;
use Netsplit\Textlocal\Textlocal\ValueObject\RecipientID;

/**
 * Class RecipientFactory
 *
 * @package Netsplit\Textlocal\Textlocal\Factory\SMS
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-10
 */
final class RecipientFactory
{
    /**
     * The name for a PhoneNumber in Textlocal's response.
     */
    const KEY_RECIPIENT = 'recipient';

    /**
     * The name for a RecipientID in Textlocal's response.
     */
    const KEY_ID = 'id';

    /**
     * @var Recipient[]
     */
    private $recipients;

    /**
     * Create a new Recipient entity.
     *
     * @param array $args
     * @return Recipient[]
     * @throws NoRecipientsError
     */
    public function make(array $args)
    {
        $args = array_filter($args, function ($r) {
            return isset($r[self::KEY_RECIPIENT]);
        });

        $RecipientList = array_map(function ($r) {
            $recipient = new Recipient();

            $recipient->setNumber(new PhoneNumber($r[self::KEY_RECIPIENT]));

            if (isset($r[self::KEY_ID])) {
                $recipient->setId(new RecipientID($r[self::KEY_ID]));
            }

            return $recipient;
        }, $args);

        if (!count($RecipientList)) {
            throw new NoRecipientsError('No recipients were provided');
        }

        $this->recipients = $RecipientList;

        return $RecipientList;
    }

    /**
     * @return string
     * @throws NoRecipientsError
     */
    public function commaSeparate()
    {
        $flatNumbers = array_map(function ($r) {
            /** @var Recipient $r */
            return $r->getNumber()->__toString();
        }, $this->recipients);

        if (!count($flatNumbers)) {
            throw new NoRecipientsError('No recipients were provided');
        }

        return implode(',', $flatNumbers);
    }
}