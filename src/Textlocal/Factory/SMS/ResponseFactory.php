<?php

namespace Netsplit\Textlocal\Textlocal\Factory\SMS;

use Netsplit\Textlocal\Textlocal\Entity\SMS\Message;
use Netsplit\Textlocal\Textlocal\Entity\SMS\Response;
use Netsplit\Textlocal\Textlocal\ValueObject\Balance;
use Netsplit\Textlocal\Textlocal\ValueObject\BatchID;
use Netsplit\Textlocal\Textlocal\ValueObject\Cost;
use Netsplit\Textlocal\Textlocal\ValueObject\Custom;
use Netsplit\Textlocal\Textlocal\ValueObject\Quantity;
use Netsplit\Textlocal\Textlocal\ValueObject\ReceiptURL;
use Netsplit\Textlocal\Textlocal\ValueObject\Status;
use Netsplit\Textlocal\Textlocal\ValueObject\Test;
use stdClass;

/**
 * Class ResponseFactory builds a SMS\Response entity.
 *
 * @package Netsplit\Textlocal\Textlocal\Factory\SMS
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-09
 */
final class ResponseFactory extends \Netsplit\Textlocal\Textlocal\Factory\ResponseFactory
{
    /**
     * @var array
     */
    private static $valueObjectMap = [
        'balance'      => Balance::class,
        'batch_id'     => BatchID::class,
        'cost'         => Cost::class,
        'num_messages' => Quantity::class,
        'status'       => Status::class,
        'receipt_url'  => ReceiptURL::class,
        'test_mode'    => Test::class,
        'custom'       => Custom::class,
    ];

    /**
     * A map of external column names to setters for internal values.
     *
     * @var array
     */
    private static $setterMap = [
        'balance'      => 'setBalance',
        'batch_id'     => 'setBatchId',
        'cost'         => 'setCost',
        'num_messages' => 'setQuantity',
        'status'       => 'setStatus',
        'receipt_url'  => 'setReceiptUrl',
        'test_mode'    => 'setTest',
        'custom'       => 'setCustom',
    ];

    /**
     * Create a new Response entity.
     *
     * @param stdClass $input
     * @param Message $message
     * @return Response
     * @throws \Netsplit\Textlocal\Textlocal\Exception\NegativeIDError
     */
    public function make(stdClass $input, Message $message)
    {
        $response = new Response();

        foreach (self::$valueObjectMap as $kx => $class) {
            $setter = self::$setterMap[$kx];

            if (isset($input->$kx)) {
                $response->$setter(new $class($input->$kx));
            }
        }

        // The sent message, for easy access
        $response->setMessage($message);

        if (isset($input->messages)) {
            $recipients = (new RecipientFactory)->make($this->convertRecipientsToArray($input->messages));
            $response->setRecipients($recipients);
        }

        return parent::addStatus($response, $input);
    }

    /**
     * Take a flat array of stdClasses and convert them to a plain array.
     *
     * @param array $recipients
     * @return array
     */
    private function convertRecipientsToArray($recipients = [])
    {
        return array_map(function ($r) {
            return (array)$r;
        }, $recipients);
    }
}