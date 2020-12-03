<?php

namespace PHPForm\Unit;

use PHPUnit\Framework\TestCase;
use Dipcode\AuthenticationGov;

class AuthenticationGovTest extends TestCase
{
    /**
     * @var string
     */
    protected $clientId;

    /**
     * @var OpenWeatherMap
     */
    protected $authenticationGov;


    protected function setUp()
    {
        $this->clientId = '9999999999999999999';
        $this->authenticationGov = new AuthenticationGov($this->clientId);
    }

    public function testClientIdNotNull()
    {
        $oag = $this->authenticationGov;
        $clientId = $oag->getClientId();

        $this->assertSame($this->clientId, $clientId);
    }
}
