<?php

namespace Healyhatman\Oauth2\Client\Provider;

use Healyhatman\Oauth2\Client\Provider\Exception\KeypayProviderException;
use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Token\AccessToken;
use Psr\Http\Message\ResponseInterface;

class KeyPay extends AbstractProvider
{
    public const METHOD_DELETE = 'DELETE';

    public function getBaseAuthorizationUrl()
    {
        return 'https://api.yourpayroll.com.au/oauth/authorise';
    }

    public function getBaseAccessTokenUrl(array $params)
    {
        return 'https://api.yourpayroll.com.au/oauth/token';
    }

    public function getResourceOwnerDetailsUrl(AccessToken $token)
    {
        return ''; // TODO Does this exist?
    }

    protected function getDefaultScopes()
    {
        return ['openid']; // TODO No scopes listed yet
    }

    protected function getScopeSeparator()
    {
        return ' ';
    }

    protected function checkResponse(ResponseInterface $response, $data)
    {
        if ($response->getStatusCode() >= 400) {
            throw new KeypayProviderException(
                isset($data['error']) ? $data['error'] : $response->getReasonPhrase(),
                $response->getStatusCode(),
                $response
            );
        }
    }

    protected function createResourceOwner(array $response, AccessToken $token)
    {
        // No need? I think?
    }
}
