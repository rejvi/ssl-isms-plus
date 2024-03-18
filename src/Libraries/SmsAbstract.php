<?php


namespace Rejvi\SslIsmsPlus\Libraries;


class SmsAbstract implements SmsInterface
{
    private string $params = '';
    private string $url    = '';
    private mixed $sid;
    private mixed $apiToken;

    /**
     * @param $msisdn
     * @param $messageBody
     * @param $csmsId
     * @return false|string
     */
    public function makeParams($msisdn, $messageBody, $csmsId) : bool|string
    {

        $params       = [
            "api_token" => $this->getApiToken(),
            "sid"       => $this->getSid(),
            "msisdn"    => $msisdn,
            "sms"       => $messageBody,
            "csms_id"   => $csmsId
        ];
        $this->params = json_encode($params);

        return $this->params;

    }

    /**
     * @return mixed
     */
    public function getApiToken() : string
    {
        return $this->apiToken;
    }

    /**
     * @param $apiKey
     */
    public function setApiToken($apiKey) : void
    {
        $this->apiToken = $apiKey;
    }

    /**
     * @return mixed
     */
    public function getSid() : mixed
    {
        return $this->sid;
    }

    /**
     * @param $sid
     */
    public function setSid($sid) : void
    {
        $this->sid = $sid;
    }

    /**
     * @param $msisdn
     * @param $batchId
     * @param $messageBody
     * @return false|string
     */
    public function makeBulkParams($msisdn, $batchId, $messageBody) : bool|string
    {

        $params = [
            "api_token"     => $this->getApiToken(),
            "sid"           => $this->getSid(),
            "msisdn"        => $msisdn,
            "sms"           => $messageBody,
            "batch_csms_id" => $batchId
        ];

        $this->params = json_encode($params);

        return $this->params;

    }

    /**
     * @param $messageData
     * @return string
     */
    public function makeDynamicParams($messageData) : string
    {

        $params = [
            "api_token" => $this->getApiToken(),
            "sid"       => $this->getSid(),
            "sms"       => $messageData,
        ];

        $this->params = json_encode($params);

        return $this->params;
    }

    /**
     * @return string
     */
    public function callApi() : string
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL            => $this->getUrl(),
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "POST",
            CURLOPT_POSTFIELDS     => $this->params,
            CURLOPT_HTTPHEADER     => [
                "accept: application/json",
                "content-type: application/json"
            ],
        ]);

        $response = curl_exec($curl);
        $err      = curl_error($curl);

        curl_close($curl);

        if ( $err ) {
            $response = "cURL Error #:" . $err;
        }

        return $response;
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return $this->url;
    }

    /**
     * @param $url
     */
    public function setUrl($url) : void
    {
        $this->url = rtrim(config('isms.api_domain'), '/') . "/api/v3/" . trim($url, "/");
    }
}
