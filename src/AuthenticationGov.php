<?php

/*
 * Authentication.Gov — A PHP API to parse data from https://www.autenticacao.gov.pt/.
 *
 * @license MIT
 *
 * Please see the LICENSE file distributed with this source code for further
 * information regarding copyright and licensing.
 *
 * Please visit the following link to read about the usage policies and the license of
 * Autenticação.Gov before using this library:
 *
 * @see https://www.autenticacao.gov.pt/web/guest/termos-e-condicoes
 */

namespace Dipcode;

use Dipcode\Attributes;
use GuzzleHttp\Client;

/**
 * Main class for the Authentication.Gov. Only use this class.
 *
 * @api
 */
class AuthenticationGov
{
    /**
     * @var string The pre-production api url
     */
    private $preprodUrl = 'https://preprod.autenticacao.gov.pt';

    /**
     * @var string The production api url
     */
    private $prodUrl = 'https://autenticacao.gov.pt';

    /**
     * @var string
     */
    private $url;

    /**
     * @var GuzzleHttp\Client
     */
    private $client;

    /**
     * @var string
     */
    private $responseType;

    /**
     * @var string
     */
    private $clientId;

    /**
     * @var string
     */
    private $redirectUri = '';

    /**
     * @var string
     */
    private $state = '';

    /**
     * @var string
     */
    private $authenticationLevel = '';

    /**
     * @var string
     */
    private $defaultSelectedTab = '';

    /**
     * @var string
     */
    private $hiddenTabs = '';

    /**
     * Constructs the AuthenticationGov object.
     *
     * @param string                      $clientId            The Authentication.Gov client Id. Required.
     * @param string                      $state               Not user, right now.
     * @param ClientInterface             $httpClient          A PSR-18 compatible HTTP client implementation.
     * @param RequestFactoryInterface     $httpRequestFactory  A PSR-17 compatbile HTTP request factory implementation.
     *
     * @api
     */
    public function __construct(
        $clientId,
        $redirectUri = '',
        $env = '',
        $state = '',
        $responseType = 'token',
        $authenticationLevel = '3',
        $defaultSelectedTab = 'CMD',
        $hiddenTabs = 'CC'
    ) {

        if (!is_string($clientId) || empty($clientId)) {
            throw new \InvalidArgumentException("You must provide a client Id.");
        }

        $this->clientId = $clientId;
        $this->redirectUri = $redirectUri;
        $this->state = $state;
        $this->responseType = $responseType;
        $this->authenticationLevel = $authenticationLevel;
        $this->$defaultSelectedTab = $defaultSelectedTab;
        $this->$hiddenTabs = $hiddenTabs;
        $this->url = ($env === 'prod') ? $this->prodUrl : $this->preprodUrl;
        $this->client = new Client(['base_uri' => $this->url]);
    }

    /**
     * Sets the response type.
     *
     * @param string $responseType the response type 'token'.
     *
     * @api
     */
    public function setResponseType($responseType)
    {
        $this->responseType = $responseType;
    }

    /**
     * Returns the response type.
     *
     * @return string
     *
     * @api
     */
    public function getResponseType()
    {
        return $this->responseType;
    }

    /**
     * Build the url to authenticate.
     *
     * @param array     $scope  The list of allowed attributes.
     *
     * @return string   The authentication url
     */
    public function getAuthenticationUrl($scope)
    {
        if (!is_array($scope) || empty($scope)) {
            throw new \InvalidArgumentException("You must provide an array with attributes names.");
        }

        $url = $this->url . "/oauth/askauthorization?";
        $scopeAttrs = $this->buildQueryScopeParameter($scope);

        $url = $url . "client_id=$this->clientId";
        $url .= !empty($this->redirectUri) ? "&redirect_uri=$this->redirectUri" : '';
        $url .= !empty($this->state) ? "&state=$this->state" : '';
        $url .= "&response_type=$this->responseType";
        $url .= "&authentication_level=$this->authenticationLevel";
        $url .= "&default_selected_tab=$this->defaultSelectedTab";
        $url .= "&hidden_tabs=$this->hiddenTabs";
        $url .= "&scope=$scopeAttrs";
        return $url;
    }

    /**
     * Returns the attributes of the authenticated user.
     *
     * @param array     $scope  The list of attributes to be returned.
     *
     * @return array   return all values
     */
    public function getUserData($token, $scope)
    {
        if (!is_array($scope) || empty($scope)) {
            throw new \InvalidArgumentException("You must provide an array with attributes names.");
        }

        if (!is_string($token) || empty($token)) {
            throw new \InvalidArgumentException("You must provide a string with the token.");
        }

        $url = "/oauthresourceserver/api/resource";
        $body = array(
            'token' => $token,
            'attributesName' => $this->buildQueryScopeParameter($scope, true)
        );
        $values = [];
        $data = $this->apiCall($url, $body);
        foreach ($data as $attribute) {
            $values[] = array(
                'name' => Attributes::getNameByAttribute($attribute->name),
                'value' => $attribute->value
            );
        }
        return $values;
    }

    /**
     * Builds the query string for the scope attributes.
     *
     * @param mixed $query
     *
     * @return string|array The built query string for the url.
     */
    private function buildQueryScopeParameter(array $scope, $as_array = false)
    {
        $scope_attrs = ($as_array === true) ? [] : '';

        foreach ($scope as $attribute) {
            if ($as_array === true) {
                $scope_attrs[] = Attributes::getAttribute($attribute);
            } else {
                $scope_attrs .= Attributes::getAttribute($attribute) . ' ';
            }
        }
        return $scope_attrs;
    }

    /**
     * Fetches the result.
     *
     * @param string $url
     *
     * @return array
     */
    private function apiCall($url, $body)
    {
        $response =$this->client->post($url, ['json' => $body]);
        $result = $response->getBody()->getContents();
        if ($response->getStatusCode() !== 200) {
            throw new \Exception(
                'Autenticacao.Gov API returned a response with status code ' . $response->getStatusCode()
                . ' and the following content `'. $result . '`'
            );
        }
        return json_decode($result);
    }
}