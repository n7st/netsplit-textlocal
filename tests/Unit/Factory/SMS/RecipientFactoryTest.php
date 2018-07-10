<?php

namespace Test\Netsplit\Textlocal\Unit\Factory\SMS;

use Netsplit\Textlocal\Textlocal\Entity\SMS\Recipient;
use Netsplit\Textlocal\Textlocal\Factory\SMS\RecipientFactory;

/**
 * Class RecipientFactoryTest
 *
 * @package Test\Netsplit\Textlocal\Unit\Factory\SMS
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-04
 */
class RecipientFactoryTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @return void
     * @throws \Netsplit\Textlocal\Textlocal\Exception\NoRecipientsError
     */
    public function testMake()
    {
        $numbers = [
            [ RecipientFactory::KEY_RECIPIENT => '07777777777' ],
            [ RecipientFactory::KEY_RECIPIENT => '07777777778' ],
            [ RecipientFactory::KEY_RECIPIENT => '07777777779' ],
        ];

        $factory    = new RecipientFactory();
        $recipients = $factory->make($numbers);
        $asString   = $factory->commaSeparate();

        $this->assertEquals(count($recipients), 3);

        for ($i = 0; $i < count($numbers); $i++) {
            /** @var Recipient $recipient */
            $recipient = $recipients[$i];

            $this->assertEquals($numbers[$i][RecipientFactory::KEY_RECIPIENT], $recipient->getNumber());
        }

        $expectedNumberStr = implode(',', array_map(function ($r) {
            return $r[RecipientFactory::KEY_RECIPIENT];
        }, $numbers));

        $this->assertEquals($asString, $expectedNumberStr);
    }
}