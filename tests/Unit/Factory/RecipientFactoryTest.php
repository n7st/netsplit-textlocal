<?php

namespace Test\Netsplit\Textlocal\Unit\Factory;

/**
 * Class RecipientFactoryTest
 *
 * @package Test\Netsplit\Textlocal\Unit\Factory
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-04
 */
class RecipientFactoryTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @return void
     */
    public function testMake()
    {
        $numbers = [ '07777777777', '07777777778', '07777777779' ];

        $recipients = (new \Netsplit\Textlocal\Textlocal\Factory\RecipientFactory)->make($numbers);

        $this->assertEquals(count($recipients), 3);

        for ($i = 0; $i < count($numbers); $i++) {
            $this->assertEquals($numbers[$i], $recipients[$i]->__toString());
        }
    }
}