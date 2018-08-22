<?php

namespace Netsplit\Textlocal\Textlocal\Entity;

use Netsplit\Textlocal\Textlocal\ValueObject\Status;

/**
 * Class Response
 *
 * @package Netsplit\Textlocal\Textlocal\Entity
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-08-15
 */
abstract class Response
{
    /**
     * @var []Error
     */
    protected $errors = [];

    /**
     * @var Status
     */
    protected $status;

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @return Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $errors
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;
    }

    /**
     * @param Status $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}