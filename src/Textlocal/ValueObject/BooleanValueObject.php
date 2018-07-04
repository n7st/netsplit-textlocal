<?php

namespace Netsplit\Textlocal\Textlocal\ValueObject;

/**
 * Class BooleanValueObject
 *
 * @package Netsplit\Textlocal\Textlocal\ValueObject
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-04
 */
interface BooleanValueObject
{
    /**
     * @return bool
     */
    public function getValue();
}