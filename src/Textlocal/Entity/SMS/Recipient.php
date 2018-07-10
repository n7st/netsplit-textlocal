<?php

namespace Netsplit\Textlocal\Textlocal\Entity\SMS;

use Netsplit\Textlocal\Textlocal\ValueObject\PhoneNumber;
use Netsplit\Textlocal\Textlocal\ValueObject\RecipientID;

/**
 * Class Recipient
 *
 * @package Netsplit\Textlocal\Textlocal\Entity\SMS
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-09
 */
final class Recipient
{
    /**
     * @var RecipientID
     */
    private $id;

    /**
     * @var PhoneNumber
     */
    private $number;

    /**
     * @return RecipientID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param RecipientID $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return PhoneNumber
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param PhoneNumber $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }
}