<?php

namespace Netsplit\Textlocal\Textlocal\ValueObject;

/**
 * Interface StringValueObject
 *
 * @package Netsplit\Textlocal\Textlocal\StringValueObject
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-03
 */
interface StringValueObject
{
    /**
     * @return string
     */
    public function __toString();
}