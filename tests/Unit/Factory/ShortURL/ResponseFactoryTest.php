<?php

namespace Test\Netsplit\Textlocal\Unit\Factory\ShortURL;

use Netsplit\Textlocal\Textlocal\Entity\ShortURL\Request;
use Netsplit\Textlocal\Textlocal\Entity\ShortURL\Response;
use Netsplit\Textlocal\Textlocal\Factory\ShortURL\RequestFactory;
use Netsplit\Textlocal\Textlocal\Factory\ShortURL\ResponseFactory;

/**
 * Class ResponseFactoryTest
 *
 * @package Test\Netsplit\Textlocal\Unit\Factory\ShortURL
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-10
 */
final class ResponseFactoryTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Response
     */
    private $response;

    /**
     * @var Request
     */
    private $request;

    /**
     * @return void
     * @throws \Netsplit\Textlocal\Textlocal\Exception\MissingParameterError
     */
    public function setUp()
    {
        $fakeResponse = (object)[
            'status'   => (string)'success',
            'shorturl' => (string)'shorter',
        ];

        $this->request  = (new RequestFactory)->make('https://www.google.com');
        $this->response = (new ResponseFactory)->make($fakeResponse, $this->request);
    }

    /**
     * @return void
     */
    public function testGetShortURL()
    {
        $this->assertEquals($this->response->getShortURL()->__toString(), 'shorter');
    }

    /**
     * @return void
     */
    public function testGetStatus()
    {
        $this->assertEquals($this->response->getStatus()->__toString(), 'success');
    }
}