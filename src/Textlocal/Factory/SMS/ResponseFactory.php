<?php

namespace Netsplit\Textlocal\Textlocal\Factory\SMS;

use Netsplit\Textlocal\Textlocal\Entity\SMS\Message;
use Netsplit\Textlocal\Textlocal\Entity\SMS\Response;
use Netsplit\Textlocal\Textlocal\Exception\NoRecipientsError;
use Netsplit\Textlocal\Textlocal\ValueObject\Balance;
use Netsplit\Textlocal\Textlocal\ValueObject\BatchID;
use Netsplit\Textlocal\Textlocal\ValueObject\Cost;
use Netsplit\Textlocal\Textlocal\ValueObject\Quantity;
use Netsplit\Textlocal\Textlocal\ValueObject\Status;
use stdClass;

/**
 * Class ResponseFactory builds a SMS\Response object.
 *
 * @package Netsplit\Textlocal\Textlocal\Factory\SMS
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-09
 */
final class ResponseFactory
{
    private static $valueObjectMap = [
        'balance'  => Balance::class,
        'batch_id' => BatchID::class,
        'cost'     => Cost::class,
        'quantity' => Quantity::class,
        'status'   => Status::class,
    ];

    /**
     * A map of external column names to setters for internal values.
     *
     * @var array
     */
    private static $setterMap = [
        'balance'  => 'setBalance',
        'batch_id' => 'setBatchId',
        'cost'     => 'setCost',
        'quantity' => 'setQuantity',
        'status'   => 'setStatus',
    ];

    /**
     * Create a new Response entity.
     *
     * @param stdClass $input
     * @param Message $message
     * @return Response
     * @throws \Netsplit\Textlocal\Textlocal\Exception\NoRecipientsError
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

        try {
            $recipients = (new RecipientFactory)->make($this->convertRecipientsToArray($input->messages));
            $response->setRecipients($recipients);
        } catch (NoRecipientsError $e) {
            throw new NoRecipientsError('This message did not reach any recipients', null, $e);
        }

        return $response;
    }

    /**
     * @param array $recipients
     * @return array
     */
    private function convertRecipientsToArray(array $recipients)
    {
        return array_map(function ($r) {
            return (array)$r;
        }, $recipients);
    }
}