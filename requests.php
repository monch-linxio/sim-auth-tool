<?php
namespace requests;

use api\jasper;

class requests
{
    /**
     * @var jasper $jasperAPI
     */
    protected jasper $jasperAPI;

    /**
     * Login
     *
     * @param $postData
     * @return null|string
     */
    public function login($postData): null|string
    {
        return $this->jasperAPI->loginUser($postData['username']);
    }
}