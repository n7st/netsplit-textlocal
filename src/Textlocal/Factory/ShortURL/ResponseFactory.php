<?php

namespace Netsplit\Textlocal\Textlocal\Factory\ShortURL;

use Netsplit\Textlocal\Textlocal\Entity\ShortURL\Request;
use Netsplit\Textlocal\Textlocal\Entity\ShortURL\Response;
use Netsplit\Textlocal\Textlocal\ValueObject\ShortURL;
use Netsplit\Textlocal\Textlocal\ValueObject\Status;
use stdClass;

/**
 * Class ResponseFactory
 *
 * @package Netsplit\Textlocal\Textlocal\Factory\ShortURL
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-10
 */
final class ResponseFactory
{
    /**
     * @param stdClass $input
     * @param Request $request
     * @return Response
     */
    public function make(stdClass $input, Request $request)
    {
        return new Response(
            new ShortURL($input->shorturl),
            new Status($input->status),
            $request
        );
    }
}