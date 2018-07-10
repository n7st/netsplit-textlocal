<?php

namespace Netsplit\Textlocal\Textlocal\Exception;

/**
 * Class MissingParameterError
 *
 * @package Netsplit\Textlocal\Textlocal\Exception
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-10
 */
final class MissingParameterError extends \Exception
{
    /**
     * @var int
     */
    protected $code = 17;
}