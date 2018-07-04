<?php

namespace Netsplit\Textlocal;

use Netsplit\Textlocal\Textlocal\Service\SendSMSService;

/**
 * Class Textlocal
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
     * @var SendSMSService
     */
    protected $sendSMSService;

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

        $this->sendSMSService = new SendSMSService($this->formatAPIURL('send'), $apiKey);
    }

    /**
     * Send an SMS.
     *
     * @param string $message
     * @param array $recipients
     * @param array $extraArgs
     * @throws Textlocal\Exception\HTTPError
     * @throws Textlocal\Exception\NoRecipientsError
     */
    public function sendSMS($message, $recipients, $extraArgs = [])
    {
        $sms = (new Textlocal\Factory\SMSFactory)->make($message, $recipients, $extraArgs);

        $this->sendSMSService->send($sms);
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