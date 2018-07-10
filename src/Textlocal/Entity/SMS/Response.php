<?php

namespace Netsplit\Textlocal\Textlocal\Entity\SMS;

use Netsplit\Textlocal\Textlocal\ValueObject\Balance;
use Netsplit\Textlocal\Textlocal\ValueObject\BatchID;
use Netsplit\Textlocal\Textlocal\ValueObject\Cost;
use Netsplit\Textlocal\Textlocal\ValueObject\Custom;
use Netsplit\Textlocal\Textlocal\ValueObject\Quantity;
use Netsplit\Textlocal\Textlocal\ValueObject\ReceiptURL;
use Netsplit\Textlocal\Textlocal\ValueObject\Status;
use Netsplit\Textlocal\Textlocal\ValueObject\Test;

/**
 * Class Response contains a Textlocal response from a "send" action.
 *
 * @package Netsplit\Textlocal\Textlocal\Entity
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-09
 */
class Response
{
    /**
     * @var Balance
     */
    private $balance;

    /**
     * @var BatchID
     */
    private $batchId;

    /**
     * How much the message cost to send.
     *
     * @var Cost
     */
    private $cost;

    /**
     * The number of messages that were sent (if the message was split into
     * chunks).
     *
     * @var Quantity
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
     * @var Status
     */
    private $status;

    /**
     * @var Test
     */
    private $test;

    /**
     * @var ReceiptURL
     */
    private $receiptUrl;

    /**
     * @var Custom
     */
    private $custom;

    /**
     * @return Balance
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param Balance $balance
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
    }

    /**
     * @return BatchID
     */
    public function getBatchId()
    {
        return $this->batchId;
    }

    /**
     * @param BatchID $batchId
     */
    public function setBatchId($batchId)
    {
        $this->batchId = $batchId;
    }

    /**
     * @return Cost
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param Cost $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    }

    /**
     * @return Quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param Quantity $quantity
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
     * @return Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param Status $status
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

    /**
     * @return Test
     */
    public function getTest()
    {
        return $this->test;
    }

    /**
     * @param Test $test
     */
    public function setTest($test)
    {
        $this->test = $test;
    }

    /**
     * @return ReceiptURL
     */
    public function getReceiptUrl()
    {
        return $this->receiptUrl;
    }

    /**
     * @param ReceiptURL $receiptUrl
     */
    public function setReceiptUrl($receiptUrl)
    {
        $this->receiptUrl = $receiptUrl;
    }

    /**
     * @return Custom
     */
    public function getCustom()
    {
        return $this->custom;
    }

    /**
     * @param Custom $custom
     */
    public function setCustom($custom)
    {
        $this->custom = $custom;
    }
}