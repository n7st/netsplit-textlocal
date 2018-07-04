<?php

namespace Netsplit\Textlocal\Textlocal\Exception;

/**
 * Class NoRecipientsError
 *
 * @package Netsplit\Textlocal\Textlocal\Exception
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-04
 */
class NoRecipientsError extends \Exception
{
    /**
     * @var int
     */
    protected $code = 12;
}