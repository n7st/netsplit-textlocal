<?php

namespace Netsplit\Textlocal\Textlocal\Entity\SMS;

/**
 * Class SMSResponse contains a Textlocal response from a "send" action.
 *
 * @package Netsplit\Textlocal\Textlocal\Entity
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-09
 */
class Response
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
     * @var Message
     */
    private $message;

    /**
     * @var Recipient[]
     */
    private $recipients;

    /**
     * @var string
     */
    private $status;

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
     * @return Message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param Message $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
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

    /**
     * @return Recipient[]
     */
    public function getRecipients()
    {
        return $this->recipients;
    }

    /**
     * @param Recipient[] $recipients
     */
    public function setRecipients($recipients)
    {
        $this->recipients = $recipients;
    }
}