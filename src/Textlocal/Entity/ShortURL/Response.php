<?php

namespace Netsplit\Textlocal\Textlocal\Entity\ShortURL;

use Netsplit\Textlocal\Textlocal\ValueObject\ShortURL;
use Netsplit\Textlocal\Textlocal\ValueObject\Status;

/**
 * Class Response
 *
 * @package Netsplit\Textlocal\Textlocal\Entity\ShortURL
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-10
 */
final class Response
{
    /**
     * @var ShortURL
     */
    protected $shortURL;

    /**
     * @var Status
     */
    protected $status;

    /**
     * @var Request
     */
    protected $request;

    /**
     * Response constructor.
     *
     * @param ShortURL $shortURL
     * @param Status $status
     * @param Request $request
     */
    public function __construct(ShortURL $shortURL, Status $status, Request $request)
    {
        $this->setShortURL($shortURL);
        $this->setStatus($status);
        $this->setRequest($request);
    }

    /**
     * @return ShortURL
     */
    public function getShortURL()
    {
        return $this->shortURL;
    }

    /**
     * @param ShortURL $shortURL
     */
    public function setShortURL($shortURL)
    {
        $this->shortURL = $shortURL;
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
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param Request $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }
}