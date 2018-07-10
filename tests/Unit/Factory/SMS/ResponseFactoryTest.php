<?php

namespace Test\Netsplit\Textlocal\Unit\Factory\SMS;

use Netsplit\Textlocal\Textlocal\Entity\SMS\Message;
use Netsplit\Textlocal\Textlocal\Entity\SMS\Response;
use Netsplit\Textlocal\Textlocal\Factory\SMS\MessageFactory;
use Netsplit\Textlocal\Textlocal\Factory\SMS\RecipientFactory;
use Netsplit\Textlocal\Textlocal\Factory\SMS\ResponseFactory;
use Netsplit\Textlocal\Textlocal\ValueObject\Balance;
use Netsplit\Textlocal\Textlocal\ValueObject\BatchID;
use Netsplit\Textlocal\Textlocal\ValueObject\Cost;
use Netsplit\Textlocal\Textlocal\ValueObject\Quantity;
use Netsplit\Textlocal\Textlocal\ValueObject\ReceiptURL;
use Netsplit\Textlocal\Textlocal\ValueObject\Status;
use Netsplit\Textlocal\Textlocal\ValueObject\Test;

/**
 * Class ResponseFactoryTest
 *
 * @package Test\Netsplit\Textlocal\Unit\Factory\SMS
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-10
 */
final class ResponseFactoryTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var object
     */
    private $plainResponse;

    /**
     * @var Message
     */
    private $message;

    /**
     * @var array
     */
    private $responseRecipients;

    /**
     * @inheritdoc
     * @throws \Netsplit\Textlocal\Textlocal\Exception\NoRecipientsError
     */
    public function setUp()
    {
        $this->plainResponse = (object)[
            'test_mode'    => (bool)true,
            'balance'      => (int)12345,
            'batch_id'     => (int)101,
            'cost'         => (int)1,
            'num_messages' => (int)1,
            'message'      => (object)[
                'num_parts' => (int)1,
                'sender'    => (string)'Netsplit',
                'content'   => (string)'Hello, world',
            ],
            'receipt_url'   => (string)'',
            'messages'      => (array)[
                (object)[
                    'id'        => 1,
                    'recipient' => '447777777777',
                ],
            ],
            'status'        => (string)'success',
        ];

        $this->message = (new MessageFactory)->make('Hello, world', [
            '07777777777',
        ], [
            'sender' => 'Netsplit',
            'test'   => true,
        ]);

        $this->responseRecipients = [ [ 'recipient' => '447777777777', 'id' => 1 ] ];
    }

    /**
     * @return void
     * @throws \Netsplit\Textlocal\Textlocal\Exception\NegativeIDError
     * @throws \Netsplit\Textlocal\Textlocal\Exception\NoRecipientsError
     */
    public function testMake()
    {
        $response = new Response();

        $response->setMessage($this->message);
        $response->setBalance(new Balance(12345));
        $response->setBatchId(new BatchID(101));
        $response->setCost(new Cost(1));
        $response->setStatus(new Status('success'));
        $response->setTest(new Test(true));
        $response->setQuantity(new Quantity(1));
        $response->setReceiptUrl(new ReceiptURL(''));
        $response->setRecipients((new RecipientFactory)->make($this->responseRecipients));

        $generatedResponse = (new ResponseFactory)->make($this->plainResponse, $this->message);

        $this->assertEquals($response, $generatedResponse);
    }
}