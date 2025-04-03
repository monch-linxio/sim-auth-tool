<?php

namespace api;

class jasper
{
    /**
     * @var $apiKey string
     */
    protected string $apiKey     = '5cdfc99c-d149-4bd7-a9af-ff979664d3b4';

    /**
     * @var $apiUrl string
     */
    protected string $apiUrl     = 'https://restapi10.jasper.com/rws/api/v1/';

    /**
     * @var $userName string
     */
    protected string $userName;

    /**
     * Send Request to Jasper
     * @param string $method
     * @param string|null $urlParams
     * @return null|array
     */
    public function sendAPICall(string $method, ?string $urlParams): null|array
    {
        $encryptedCredentials = base64_encode($this->userName.":".$this->apiKey);

        $ch = curl_init();

        curl_setopt(
            $ch,
            CURLOPT_URL,
            $this->apiUrl.(! empty($urlParams) ? $urlParams :'')
        );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

        $headers = [];
        $headers[] = 'Accept: application/json';
        $headers[] = 'Authorization: Basic '.$encryptedCredentials;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            return ['status' => 'error', 'message' => 'Error:' . curl_error($ch)];
        }

        curl_close($ch);

        $data = json_decode($result, true);

        return json_decode($result, true);
    }

    /**
     * @param string $userName
     * @return array|null
     */
    public function loginUser(string $userName): null|array {
        $this->userName = $userName;
        $method = 'GET';
        $params = [
            'username' => $userName,
            'pageSize' => 50,
            'pageNumber' => 1,
        ];
        $urlParams = 'users?'.http_build_query($params);

        return $this->sendAPICall($method, $urlParams);
    }

    /**
     * Search Device
     */
    public function getDeviceDetails(string $iccid, string $authUser): null|array {
        $this->userName = $authUser;
        $method         = 'GET';
        $urlParams      = 'devices/'.rawurlencode($iccid);

        return $this->sendAPICall($method, $urlParams);
    }
}