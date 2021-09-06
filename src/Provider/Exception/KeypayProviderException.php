<?php

namespace Healyhatman\Oauth2\Client\Provider\Exception;

use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use Psr\Http\Message\ResponseInterface;

class KeypayProviderException extends IdentityProviderException
{
    public static function fromResponse(ResponseInterface $response, $message = null)
    {
        throw new static($message, $response->getStatusCode(), (string)$response->getBody());
    }
}
