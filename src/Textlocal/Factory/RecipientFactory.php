<?php

namespace Netsplit\Textlocal\Textlocal\Factory;
use Netsplit\Textlocal\Textlocal\ValueObject\Recipient;

/**
 * Class RecipientFactory
 *
 * @package Netsplit\Textlocal\Textlocal\Factory
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-04
 */
final class RecipientFactory
{
    /**
     * @param array $numbers
     * @return array
     */
    public function make($numbers)
    {
        return array_map(function($n) {
            return new Recipient($n);
        }, $numbers);
    }
}