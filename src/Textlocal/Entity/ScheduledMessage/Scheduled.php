<?php

namespace Netsplit\Textlocal\Textlocal\Entity\ScheduledMessage;

use Netsplit\Textlocal\Textlocal\ValueObject\GroupID;
use Netsplit\Textlocal\Textlocal\ValueObject\GroupName;
use Netsplit\Textlocal\Textlocal\ValueObject\ID;
use Netsplit\Textlocal\Textlocal\ValueObject\Quantity;
use Netsplit\Textlocal\Textlocal\ValueObject\ScheduledAt;
use Netsplit\Textlocal\Textlocal\ValueObject\Sender;
use Netsplit\Textlocal\Textlocal\ValueObject\SMSContent;

/**
 * Class Scheduled
 *
 * @package Netsplit\Textlocal\Textlocal\Entity\ScheduledMessage
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-08-15
 */
final class Scheduled
{
    /**
     * @var Quantity
     */
    protected $quantity;

    /**
     * @var ID
     */
    protected $id;

    /**
     * @var SMSContent
     */
    protected $message;

    /**
     * @var Sender
     */
    protected $origin;

    /**
     * @var GroupID
     */
    protected $groupID;

    /**
     * @var GroupName
     */
    protected $groupName;

    /**
     * @var ScheduledAt
     */
    protected $scheduledTime;

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
     * @return ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param ID $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return SMSContent
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param SMSContent $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return Sender
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * @param Sender $origin
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;
    }

    /**
     * @return GroupID
     */
    public function getGroupID()
    {
        return $this->groupID;
    }

    /**
     * @param GroupID $groupID
     */
    public function setGroupID($groupID)
    {
        $this->groupID = $groupID;
    }

    /**
     * @return GroupName
     */
    public function getGroupName()
    {
        return $this->groupName;
    }

    /**
     * @param GroupName $groupName
     */
    public function setGroupName($groupName)
    {
        $this->groupName = $groupName;
    }

    /**
     * @return ScheduledAt
     */
    public function getScheduledTime()
    {
        return $this->scheduledTime;
    }

    /**
     * @param ScheduledAt $scheduledTime
     */
    public function setScheduledTime($scheduledTime)
    {
        $this->scheduledTime = $scheduledTime;
    }
}