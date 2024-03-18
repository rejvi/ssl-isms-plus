<?php


namespace Rejvi\SslIsmsPlus\Libraries;


class ISmsPlus extends SmsAbstract
{

    public function __construct()
    {
        $this->setApiToken(config('ismsplus.api_token'));
        $this->setSid(config('ismsplus.sid'));
    }

    /**
     * @param $msisdn
     * @param $messageBody
     * @param $csmsId
     * @return self
     */
    public function single($msisdn, $messageBody, $csmsId) : static
    {
        $this->makeParams($msisdn, $messageBody, $csmsId);
        $this->setUrl("/send-sms");
        return $this;
    }

    /**
     * @param $msisdns
     * @param $messageBody
     * @param $batchId
     * @return self
     */
    public function bulk($msisdn, $messageBody, $batchId) : static
    {
        $this->makeBulkParams($msisdn, $messageBody, $batchId);
        $this->setUrl("/send-sms/bulk");
        return $this;
    }

    /**
     * @param array $messageData
     * @return self
     */
    public function dynamic(array $messageData) : static
    {
        $this->makeDynamicParams($messageData);
        $this->setUrl("/send-sms/dynamic");
        return $this;
    }

    /**
     * @param array $messageData
     * @return string
     */

    public function send() : string
    {
        return $this->callApi();
    }
}
