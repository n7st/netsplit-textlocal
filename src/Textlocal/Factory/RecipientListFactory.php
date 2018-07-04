<?php

namespace Netsplit\Textlocal\Textlocal\Factory;

use Netsplit\Textlocal\Textlocal\Exception\NoRecipientsError;
use Netsplit\Textlocal\Textlocal\ValueObject\Recipient;
use Netsplit\Textlocal\Textlocal\ValueObject\RecipientList;

/**
 * Class RecipientListFactory
 *
 * @package Netsplit\Textlocal\Textlocal\Factory
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-04-07
 */
class RecipientListFactory
{
    /**
     * @param array $recipients
     * @return RecipientList
     * @throws NoRecipientsError
     */
    public function make($recipients = [])
    {
        if (!count($recipients)) {
            throw new NoRecipientsError('The message has no recipients');
        }

        return new RecipientList(implode(',', array_map(function (Recipient $r) {
            return $r->__toString();
        }, $recipients)));
    }
}