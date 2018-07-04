<?php

namespace Netsplit\Textlocal\Textlocal\ValueObject;

/**
 * Class BooleanValueObjectBase
 *
 * @package Netsplit\Textlocal\Textlocal\ValueObject
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-04
 */
class Boolean implements BooleanValueObject
{
    /**
     * @var bool
     */
    protected $value = false;

    /**
     * BooleanValueObjectBase constructor.
     *
     * @param bool $value
     * @return void
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return bool
     */
    public function getValue()
    {
        return $this->value;
    }
}