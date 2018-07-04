<?php

namespace Netsplit\Textlocal\Textlocal\ValueObject;

use Netsplit\Textlocal\Textlocal\Exception\NegativeIDError;

/**
 * Class UnsignedInteger
 *
 * @package Netsplit\Textlocal\Textlocal\ValueObject
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-04
 */
class UnsignedInteger implements IntegerValueObject
{
    /**
     * @var int
     */
    protected $value;

    /**
     * UnsignedInteger constructor.
     *
     * @param $value
     * @throws NegativeIDError
     */
    public function __construct($value)
    {
        if ($this->value < 0) {
            throw new NegativeIDError("{$value} is not a positive integer");
        }

        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }
}