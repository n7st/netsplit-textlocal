<?php

namespace Netsplit\Textlocal\Textlocal\Exception;

/**
 * Class InvalidUnixTimestampError
 *
 * @package Netsplit\Textlocal\Textlocal\Exception
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-04
 */
class InvalidUnixTimestampError extends \Exception
{
    /**
     * @var int
     */
    protected $code = 14;
}