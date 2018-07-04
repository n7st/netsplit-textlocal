<?php

namespace Netsplit\Textlocal\Textlocal\ValueObject;

/**
 * Class Recipient
 *
 * @package Netsplit\Textlocal\Textlocal\ValueObject
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-03
 */
final class Recipient implements ValueObject
{
    /**
     * @var string
     */
    private $phoneNumber;

    /**
     * Recipient constructor.
     *
     * @param $phoneNumber
     * @return void
     */
    public function __construct($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->phoneNumber;
    }
}