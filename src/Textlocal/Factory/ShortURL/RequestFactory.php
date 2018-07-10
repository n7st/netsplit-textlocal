<?php

namespace Netsplit\Textlocal\Textlocal\Factory\ShortURL;

use Netsplit\Textlocal\Textlocal\Entity\ShortURL\Request;
use Netsplit\Textlocal\Textlocal\Exception\MissingParameterError;
use Netsplit\Textlocal\Textlocal\ValueObject\URL;

/**
 * Class RequestFactory
 *
 * @package Netsplit\Textlocal\Textlocal\Factory\ShortURL
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-10
 */
final class RequestFactory
{
    /**
     * @param string $url
     * @return Request
     * @throws MissingParameterError
     */
    public function make($url)
    {
        if (!$url || $url === '') {
            throw new MissingParameterError('No URL was provided');
        }

        return new Request(new URL($url));
    }
}