<?php

namespace Netsplit\Textlocal\Textlocal\ValueObject;

/**
 * Class OurFloat
 *
 * @package Netsplit\Textlocal\Textlocal\ValueObject
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-09
 */
abstract class OurFloat implements FloatValueObject
{
    /**
     * @var float
     */
    protected $value;

    /**
     * OurFloat constructor.
     * @param float $value
     * @return void
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }
}