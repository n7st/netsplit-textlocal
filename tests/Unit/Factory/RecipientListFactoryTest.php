<?php

namespace Test\Netsplit\Textlocal\Unit\Factory;

/**
 * Class RecipientListFactory
 *
 * @package Test\Netsplit\Textlocal\Unit\Factory
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-04
 */
class RecipientListFactoryTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @return void
     * @throws \Netsplit\Textlocal\Textlocal\Exception\NoRecipientsError
     */
    public function testMake()
    {
        $numbers = [ '07777777777', '07777777778', '07777777779' ];

        $recipients    = (new \Netsplit\Textlocal\Textlocal\Factory\RecipientFactory)->make($numbers);
        $recipientList = (new \Netsplit\Textlocal\Textlocal\Factory\RecipientListFactory)->make($recipients);

        $this->assertEquals($recipientList->__toString(), join(',', $numbers));
    }
}