<?php

namespace Netsplit\Textlocal\Textlocal\Entity;

use Netsplit\Textlocal\Textlocal\ValueObject\Code;
use Netsplit\Textlocal\Textlocal\ValueObject\Message;

/**
 * Class Error
 *
 * @package Netsplit\Textlocal\Textlocal\Entity
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-08-15
 */
class Error
{
    /**
     * @var Code
     */
    protected $code;

    /**
     * @var Message
     */
    protected $message;

    /**
     * Error constructor.
     *
     * @param Code $code
     * @param Message $error
     */
    public function __construct(Code $code, Message $error)
    {
        $this->code    = $code;
        $this->message = $error;
    }
}