<?php

namespace Test\Netsplit\Textlocal\Unit\Factory;

use Netsplit\Textlocal\Textlocal\Entity\SMS\Message;

/**
 * Class MessageFactoryTest
 *
 * @package Test\Netsplit\Textlocal\Unit\Factory\SMS
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-04
 */
final class MessageFactoryTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Message
     */
    private $sms;

    /**
     * Set up a SMSFactory object.
     *
     * @return void
     * @throws \Netsplit\Textlocal\Textlocal\Exception\NoRecipientsError
     */
    public function setUp()
    {
        $this->sms = (new \Netsplit\Textlocal\Textlocal\Factory\SMS\MessageFactory)->make('Message here', [
            '07777777777',
            '07777777778',
            '07777777779',
        ], [
            'sender' => 'Some Sender',
            'test'   => true,
            'custom' => 'Some Ref',
        ]);
    }

    /**
     * @return void
     */
    public function testMessageArguments()
    {
        $this->assertEquals($this->sms->toServiceArguments(), [
            'custom'         => 'Some Ref',
            'message'        => 'Message here',
            'numbers'        => '07777777777,07777777778,07777777779',
            'optouts'        => false,
            'sender'         => 'Some Sender',
            'simple_reply'   => false,
            'test'           => true,
            'tracking_links' => false,
            'unicode'        => false,
        ]);
    }
}