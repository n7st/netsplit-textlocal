<?php

namespace Netsplit\Textlocal\Textlocal\Service\ShortURL;

use Netsplit\Textlocal\Textlocal\Entity\ShortURL\Request;
use Netsplit\Textlocal\Textlocal\Factory\ShortURL\ResponseFactory;
use Netsplit\Textlocal\Textlocal\Service\HTTPService;

/**
 * Class RequestService
 *
 * @package Netsplit\Textlocal\Textlocal\Service\ShortURL
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-10
 */
final class RequestService extends HTTPService
{
    /**
     * @param Request $request
     * @return \Netsplit\Textlocal\Textlocal\Entity\ShortURL\Response
     * @throws \Netsplit\Textlocal\Textlocal\Exception\HTTPError
     */
    public function request(Request $request)
    {
        $response = $this->post($request->toServiceArguments());

        return (new ResponseFactory)->make($response, $request);
    }
}