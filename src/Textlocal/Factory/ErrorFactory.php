<?php

namespace Netsplit\Textlocal\Textlocal\Factory;

use Netsplit\Textlocal\Textlocal\Entity\Error;
use Netsplit\Textlocal\Textlocal\ValueObject\Code;
use Netsplit\Textlocal\Textlocal\ValueObject\Message;

/**
 * Class ErrorFactory
 *
 * @package Netsplit\Textlocal\Textlocal\Factory
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-08-15
 */
final class ErrorFactory implements Factory
{
    /**
     * @param $input
     * @return array
     * @throws \Netsplit\Textlocal\Textlocal\Exception\NegativeIDError
     */
    public function make($input)
    {
        $errors = [];

        foreach ($input as $error) {
            $errors[] = new Error(
                new Code($error->code),
                new Message($error->message)
            );
        }

        return $errors;
    }
}