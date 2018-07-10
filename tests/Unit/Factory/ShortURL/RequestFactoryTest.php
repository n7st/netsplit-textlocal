<?php

namespace Test\Netsplit\Textlocal\Unit\Factory\ShortURL;

use Netsplit\Textlocal\Textlocal\Factory\ShortURL\RequestFactory;
use Netsplit\Textlocal\Textlocal\Entity\ShortURL\Request;

/**
 * Class RequestFactoryTest
 *
 * @package Test\Netsplit\Textlocal\Unit\Factory\ShortURL
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-10
 */
final class RequestFactoryTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @throws \Netsplit\Textlocal\Textlocal\Exception\MissingParameterError
     */
    public function setUp()
    {
        $this->request = (new RequestFactory)->make('https://www.google.com');
    }

    /**
     * @return void
     */
    public function testToServiceArguments()
    {
        $this->assertEquals($this->request->toServiceArguments(), [
            'url' => 'https://www.google.com',
        ]);
    }
}