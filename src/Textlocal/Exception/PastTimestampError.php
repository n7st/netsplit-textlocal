<?php

namespace Netsplit\Textlocal\Textlocal\Exception;

/**
 * Class PastTimestampError
 *
 * @package Netsplit\Textlocal\Textlocal\Exception
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-04
 */
class PastTimestampError extends \Exception
{
    /**
     * @var int
     */
    protected $code = 13;
}