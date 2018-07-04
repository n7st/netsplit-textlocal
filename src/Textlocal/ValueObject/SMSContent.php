<?php

namespace Netsplit\Textlocal\Textlocal\ValueObject;

/**
 * Class SMSContent
 *
 * @package Netsplit\Textlocal\Textlocal\ValueObject
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-04
 */
final class SMSContent implements ValueObject
{
    /**
     * @var string
     */
    private $content;

    /**
     * SMSContent constructor.
     *
     * @param $content
     * @return void
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->content;
    }
}