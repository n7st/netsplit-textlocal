<?php

namespace Netsplit\Textlocal\Textlocal\ValueObject;

/**
 * Class RecipientList
 *
 * @package Netsplit\Textlocal\Textlocal\ValueObject
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-04-07
 */
final class RecipientList implements ValueObject
{
    /**
     * A comma-separated list of recipients.
     *
     * @var string
     */
    private $recipientList;

    /**
     * RecipientList constructor.
     *
     * @param string $recipientList
     * @return void
     */
    public function __construct($recipientList)
    {
        $this->recipientList = $recipientList;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->recipientList;
    }
}