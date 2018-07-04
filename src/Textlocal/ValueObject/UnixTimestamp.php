<?php

namespace Netsplit\Textlocal\Textlocal\ValueObject;

use Netsplit\Textlocal\Textlocal\Exception\InvalidUnixTimestampError;
use Netsplit\Textlocal\Textlocal\Exception\PastTimestampError;

/**
 * Class UnixTimestamp
 *
 * @package Netsplit\Textlocal\Textlocal\ValueObject
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-04
 */
class UnixTimestamp implements IntegerValueObject
{
    /**
     * @var int
     */
    protected $value;

    /**
     * UnixTimestamp constructor.
     *
     * @param int $value
     * @throws PastTimestampError
     * @throws InvalidUnixTimestampError
     */
    public function __construct($value)
    {
        if (!$this->validateTimestamp($value)) {
            throw new InvalidUnixTimestampError("{$value} is not a valid Unix timestamp");
        }

        if (!$this->validateTimestampInTheFuture($value)) {
            throw new PastTimestampError("{$value} is in the past");
        }

        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param $timestamp
     * @return bool
     */
    private function validateTimestamp($timestamp)
    {
        return is_int($timestamp)
            && $timestamp <= PHP_INT_MAX
            && $timestamp >= ~PHP_INT_MAX;
    }

    /**
     * Check the given timestamp hasn't happened yet. All timestamps passed to
     * children of this class will be in the future.
     *
     * @param $timestamp
     * @return bool
     */
    private function validateTimestampInTheFuture($timestamp)
    {
        return $timestamp >= time();
    }
}