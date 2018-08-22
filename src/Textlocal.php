<?php

namespace Netsplit\Textlocal;

use Netsplit\Textlocal\Textlocal\Factory\SMS\MessageFactory;
use Netsplit\Textlocal\Textlocal\Factory\ShortURL\RequestFactory;
use Netsplit\Textlocal\Textlocal\Service\ScheduledMessage\GetService;
use Netsplit\Textlocal\Textlocal\Service\SMS\SendService;
use Netsplit\Textlocal\Textlocal\Service\ShortURL\RequestService;

/**
 * Class Textlocal provides access to the library's Service classes.
 *
 * @package Netsplit\Textlocal
 * @author Mike Jones <mike@netsplit.org.uk>
 * @since 2018-07-03
 */
class Textlocal
{
    /**
     * Configuration values for your Textlocal service.
     *
     * @var string
     */
    protected $baseURL, $apiKey;

    /**
     * @var SendService
     */
    protected $sendSMSService;

    /**
     * @var GetService
     */
    protected $getScheduledMessageService;

    /**
     * @var RequestService
     */
    protected $requestShortURLService;

    /**
     * Textlocal constructor.
     *
     * @param string $baseURL
     * @param string $apiKey
     * @throws \ErrorException
     */
    public function __construct($baseURL, $apiKey)
    {
        $this->baseURL = $baseURL;
        $this->apiKey  = $apiKey;

        $this->sendSMSService             = new SendService($this->formatAPIURL('send'), $apiKey);
        $this->getScheduledMessageService = new GetService($this->formatAPIURL('get_scheduled'), $apiKey);
        $this->requestShortURLService     = new RequestService($this->formatAPIURL('create_shorturl'), $apiKey);
    }

    /**
     * Send an SMS.
     *
     * @param string $message
     * @param array $recipients
     * @param array $extraArgs
     * @return Textlocal\Entity\SMS\Response
     * @throws Textlocal\Exception\HTTPError
     * @throws Textlocal\Exception\NoRecipientsError
     */
    public function sendSMS($message, $recipients, $extraArgs = [])
    {
        $sms = (new MessageFactory)->make($message, $recipients, $extraArgs);

        return $this->sendSMSService->send($sms);
    }

    /**
     * @return array
     * @throws Textlocal\Exception\HTTPError
     * @throws Textlocal\Exception\NegativeIDError
     */
    public function getScheduledMessages()
    {
        return $this->getScheduledMessageService->getScheduledMessages();
    }

    /**
     * Shorten a URL.
     *
     * @param $inputURL
     * @return Textlocal\Entity\ShortURL\Response
     * @throws Textlocal\Exception\HTTPError
     * @throws Textlocal\Exception\MissingParameterError
     */
    public function getShortURL($inputURL)
    {
        $request = (new RequestFactory)->make($inputURL);

        return $this->requestShortURLService->request($request);
    }

    /**
     * @param $endpoint
     * @return string
     */
    private function formatAPIURL($endpoint)
    {
        return sprintf('%s/%s', $this->baseURL, $endpoint);
    }
}