<?php

namespace Netsplit\Textlocal\Textlocal\Entity\ShortURL;

use Netsplit\Textlocal\Textlocal\ValueObject\URL;

/**
 * Class Request
 *
 * @package Netsplit\Textlocal\Textlocal\Entity\ShortURL
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-10
 */
final class Request
{
    /**
     * @var URL
     */
    protected $url;

    /**
     * Request constructor.
     *
     * @param URL $url
     * @return void
     */
    public function __construct(URL $url)
    {
        $this->url = $url;
    }

    /**
     * @return URL
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return array
     */
    public function toServiceArguments()
    {
        return [ 'url' => $this->url->__toString() ];
    }
}