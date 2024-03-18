<?php


namespace Rejvi\SslIsmsPlus\Libraries;


interface SmsInterface
{
    /**
     * @param $msisdn
     * @param $messageBody
     * @param $csmsId
     * @return mixed
     */
    public function makeParams($msisdn, $messageBody, $csmsId) : mixed;

    /**
     * @return mixed
     */
    public function callApi() : mixed;

    /**
     * @param $apiKey
     * @return void
     */
    public function setApiToken($apiKey) : void;

    /**
     * @return string
     */
    public function getApiToken() : string;

    /**
     * @param $sid
     * @return void
     */
    public function setSid($sid) : void;

    /**
     * @return mixed
     */
    public function getSid() : mixed;

    /**
     * @param $url
     * @return void
     */
    public function setUrl($url) : void;

    /**
     * @return mixed
     */
    public function getUrl() : mixed;

}
