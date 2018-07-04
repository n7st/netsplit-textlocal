<?php

namespace Test\Netsplit\Textlocal\Unit\Factory;

use Netsplit\Textlocal\Textlocal\Entity\SMS;

/**
 * Class SMSFactoryTest
 *
 * @package Test\Netsplit\Textlocal\Unit\Factory
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-04
 */
class SMSFactoryTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var SMS
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
        $this->sms = (new \Netsplit\Textlocal\Textlocal\Factory\SMSFactory)->make('Message here', [
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
            'sender'  => 'Some Sender',
            'test'    => true,
            'custom'  => 'Some Ref',
            'numbers' => '07777777777,07777777778,07777777779',
            'message' => 'Message here',
        ]);
    }
}