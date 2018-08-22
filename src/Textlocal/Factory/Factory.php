<?php

namespace Netsplit\Textlocal\Textlocal\Factory;

/**
 * Interface Factory
 *
 * @package Netsplit\Textlocal\Textlocal\Factory
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-08-15
 */
interface Factory
{
    /**
     * @param $input
     * @return mixed
     */
    public function make($input);
}