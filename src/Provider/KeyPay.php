<?php

namespace Healyhatman\Oauth2\Client\Provider;

use League\OAuth2\Client\Provider\AbstractProvider;
use Psr\Http\Message\ResponseInterface;

class KeyPay extends AbstractProvider
{
    const METHOD_DELETE = 'DELETE';

    public function getBaseAuthorizationUrl()
    {
        return 'https://api.yourpayroll.com.au/oauth/authorise';
    }

    public function getBaseAccessTokenUrl(array $params)
    {
        return 'https://api.yourpayroll.com.au/oauth/token';
    }

    public function getResourceOwnerDetailsUrl(\League\OAuth2\Client\Token\AccessToken $token)
    {
        return ''; // TODO Does this exist?
    }

    protected function getDefaultScopes()
    {
        return ''; // TODO No scopes listed yet
    }

    protected function checkResponse(\Psr\Http\Message\ResponseInterface $response, $data)
    {

    }

    protected function createResourceOwner(array $response, \League\OAuth2\Client\Token\AccessToken $token)
    {
        // TODO: Implement createResourceOwner() method.
    }
}