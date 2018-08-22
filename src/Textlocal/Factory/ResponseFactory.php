<?php

namespace Netsplit\Textlocal\Textlocal\Factory;

use Netsplit\Textlocal\Textlocal\Entity\Response;
use Netsplit\Textlocal\Textlocal\ValueObject\Status;

/**
 * Class ResponseFactory provides a base for responses which may have status
 * and error nodes.
 *
 * @package Netsplit\Textlocal\Textlocal\Factory
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-08-15
 */
abstract class ResponseFactory
{
    /**
     * Set common status and error attributes against the generated class.
     *
     * @param Response $next
     * @param $input
     * @return mixed
     * @throws \Netsplit\Textlocal\Textlocal\Exception\NegativeIDError
     */
    public function addStatus($next, $input)
    {
        if (isset($input->errors)) {
            $errors = (new ErrorFactory)->make($input->errors);

            $next->setErrors($errors);
        }

        if (isset($input->status)) {
            $next->setStatus(new Status($input->status));
        }

        return $next;
    }
}