<?php

namespace api;

class kore
{
    /**
     * @var $clientId string
     */
    protected string $clientId = 'apiclient_01jqwszn7jerzs2eqtcegvkyh4';

    /**
     * @var $clientSecret string
     */
    protected string $clientSecret = '1f9fb61d105950cc4697fdcea7f19f82fc01657e';

    /**
     * @var $koreEndpoint string
     */
    protected string $koreEndpoint = 'https://api.korewireless.com/api-services/v1/auth/token';

    /**
     * @var $clientKoreEndpoint string
     */
    protected string $clientKoreEndpoint = 'https://client.api.korewireless.com/v1/';

    /**
     * @var $accessToken string
     */
    protected string $accessToken;

    /**
     * Authorize
     *
     * @return bool
     */
    public function koreAuthorize(): bool
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->koreEndpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt(
            $ch,
            CURLOPT_POSTFIELDS,
            "grant_type=client_credentials&client_id=".$this->clientId."&client_secret=".$this->clientSecret
        );

        $headers = array();
        $headers[] = 'Cache-Control: no-cache';
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        $data = json_decode($result, true);
        $this->accessToken = $data['access_token'];

        return true;
    }

    /**
     * Send Validate User
     */
    public function listUsers(): array|null
    {
        $ch = curl_init();

        $headers = [];
        $headers[] = 'Cache-Control: no-cache';
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        $headers[] = 'Authorization: Bearer '.$this->accessToken;
        curl_setopt($ch, CURLOPT_URL, $this->clientKoreEndpoint.'clients?page_size=1&page_number=1');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return json_decode($result, true);
    }
}