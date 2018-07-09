<?php

namespace Netsplit\Textlocal\Textlocal\Entity;

/**
 * Class SMSResponse contains a Textlocal response from a "send" action.
 *
 * @package Netsplit\Textlocal\Textlocal\Entity
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-09
 */
class SMSResponse
{
    /**
     * @var float
     */
    private $balance;

    /**
     * @var int
     */
    private $batchId;

    /**
     * How much the message cost to send.
     *
     * @var float
     */
    private $cost;

    /**
     * The number of messages that were sent (if the message was split into
     * chunks).
     *
     * @var int
     */
    private $quantity;

    /**
     * The message we sent to Textlocal.
     *
     * @var SMS
     */
    private $message;

    /**
     * @var array
     */
    private $messages;

    /**
     * @var string
     */
    private $status;

    /**
     * @var array
     */
    private static $responseSetterMap = [
        'balance'  => 'setBalance',
        'batch_id' => 'setBatchId',
        'cost'     => 'setCost',
        'messages' => 'setMessages',
        'status'   => 'setStatus',
    ];

    /**
     * Create a new SMSResponse object from Textlocal's API response.
     *
     * @param $res
     * @param SMS $message
     * @return SMSResponse
     */
    public static function fromResponse($res, SMS $message)
    {
        $ret = new self();

        $ret->setMessage($message);

        foreach (self::$responseSetterMap as $field => $setter) {
            if (isset($res->$field)) {
                $ret->$setter($res->$field);
            }
        }

        return $ret;
    }

    /**
     * @return float
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param float $balance
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
    }

    /**
     * @return int
     */
    public function getBatchId()
    {
        return $this->batchId;
    }

    /**
     * @param int $batchId
     */
    public function setBatchId($batchId)
    {
        $this->batchId = $batchId;
    }

    /**
     * @return float
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param float $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return SMS
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param SMS $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return array
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @param array $messages
     */
    public function setMessages($messages)
    {
        $this->messages = $messages;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}