<?php

namespace Netsplit\Textlocal\Textlocal\Service;

use Curl\Curl;
use Netsplit\Textlocal\Textlocal\Exception\HTTPError;

/**
 * Class HTTPService
 *
 * @package Netsplit\Textlocal\Textlocal\Service
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-04
 */
abstract class HTTPService
{
    /**
     * @var Curl
     */
    protected $client;

    /**
     * @var string
     */
    protected $apiKey, $serviceURL;

    /**
     * HTTPService constructor.
     *
     * @param string $serviceURL
     * @param string $apiKey
     * @throws \ErrorException
     */
    public function __construct($serviceURL, $apiKey)
    {
        $this->apiKey     = $apiKey;
        $this->client     = new Curl();
        $this->serviceURL = $serviceURL;
    }

    /**
     * Send a POST request.
     *
     * @param $args
     * @return mixed
     * @throws HTTPError
     */
    protected function post($args)
    {
        $args['apikey'] = $this->apiKey;

        $res = $this->client->post($this->serviceURL, $args);

        if ($res->http_status_code != 200) {
            throw new HTTPError('Non-200 HTTP code returned: '.$res->http_status_code);
        }

        return json_decode($res->response);
    }
}