<?php

namespace Netsplit\Textlocal\Textlocal\Exception;

/**
 * Class HTTPException
 *
 * @package Netsplit\Textlocal\Textlocal\Exception
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-04
 */
class HTTPError extends \Exception
{
    /**
     * @var int
     */
    protected $code = 11;
}