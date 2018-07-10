<?php

namespace Netsplit\Textlocal\Textlocal\ValueObject;

/**
 * Class String
 *
 * @package Netsplit\Textlocal\Textlocal\ValueObject
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-04
 */
abstract class OurString implements StringValueObject
{
    /**
     * @var string
     */
    protected $value;

    /**
     * String constructor.
     * @param string $value
     * @return void
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->value;
    }
}