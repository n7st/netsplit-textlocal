<?php

namespace Netsplit\Textlocal\Textlocal\ValueObject;

/**
 * Class Sender
 *
 * @package Netsplit\Textlocal\Textlocal\ValueObject
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-04
 */
final class Sender implements ValueObject
{
    /**
     * @var string
     */
    private $senderName;

    /**
     * Sender constructor.
     * @param $senderName
     * @return void
     */
    public function __construct($senderName)
    {
        $this->senderName = $senderName;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->senderName;
    }
}