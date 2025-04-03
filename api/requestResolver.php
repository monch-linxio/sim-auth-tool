<?php

namespace api;

use api\jasper;
use api\kore;

require 'jasper.php';
require 'kore.php';
class requestResolver
{
    /**
     * @var $jasper \api\jasper
     */
    protected jasper $jasper;

    /**
     * @var bool $isJasperM2M
     */
    protected bool $isJasperM2M = FALSE;

    /**
     * @var $kore \api\kore
     */
    protected kore $kore;

    /**
     * @var bool $isKore
     */
    protected bool $isKore = FALSE;

    /**
     * @var array $simPattern
     */
    protected array $simPattern = [
        'jasper'     => '800',
        'jasper_m2m' => '850',
        'kore'       => '8988',
    ];

    /**
     * Construct Resolver
     */
    public function __construct(){
        $this->jasper = new jasper();
        $this->kore = new kore();
        $this->kore->koreAuthorize();
    }

    /**
     * Login
     *
     * @param array $postData
     * @return array|null
     */
    public function login(array $postData): null|array
    {
        return $this->jasper->loginUser($postData['username']);
    }

    /**
     *
     */
    public function getKoreUsers(): array|null
    {
        return $this->kore->listUsers();
    }

    /**
     *
     */
    public function jasperDevice(string $iccid, string $authUser): array|null
    {
        return $this->jasper->getDeviceDetails($iccid, $authUser);
    }

    /**
     * Determine if Jasper M2M
     *
     * @param string $sid
     * @return bool
     */
    public function isJasperM2M(string $sid): bool
    {
        foreach ($this->simPattern as $provider => $pattern) {
            if (str_contains($sid, $pattern)) {
                $this->isJasperM2M = TRUE;
            }
        }

        return $this->isJasperM2M;
    }

    /**
     * Determine if KORE
     *
     * @param string $sid
     * @return bool
     */
    public function isKore(string $sid): bool
    {
        foreach ($this->simPattern as $provider => $pattern) {
            if (str_contains($sid, $pattern)) {
                $this->isKore = TRUE;
            }
        }

        return $this->isKore;
    }
}