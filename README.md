# KeyPay Provider for OAuth 2.0 Client

[![Latest Version on Packagist](https://img.shields.io/packagist/v/healyhatman/oauth2-keypay.svg?style=flat-square)](https://packagist.org/packages/healyhatman/oauth2-keypay)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/healyhatman/oauth2-keypay/run-tests?label=tests)](https://github.com/healyhatman/oauth2-keypay/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/healyhatman/oauth2-keypay/Check%20&%20fix%20styling?label=code%20style)](https://github.com/vendor_slug/package_slug/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/healyhatman/oauth2-keypay.svg?style=flat-square)](https://packagist.org/packages/vendor_slug/package_slug)

This package provides KeyPay OAuth 2.0 support for the PHP League's OAuth 2.0 Client

## Installation

You can install the package via composer:

```bash
composer require healyhatman/oauth2-keypay
```
## Usage
Usage is the same as The League's OAuth client, using `\Healyhatman\OAuth2\Client\Provider\KeyPay` as the provider.

### Authorisation Code Flow

```
session_start();

$provider = new \Healyhatman\Oauth2\Client\Provider\KeyPay([
    'clientId'     => '{your KeyPay client ID}',
    'clientSecret' => '{your KeyPay client secret}',
    'clientId'     => '{your KeyPay redirect URI}'
]);

if (!isset($_GET['code'])) {

    // If we don't have an authorization code then get one
    $authUrl = $provider->getAuthorizationUrl(['scope' => '']);

    $_SESSION['oauth2state'] = $provider->getState();
    header('Location: ' . $authUrl);
    exit;

// Check given state against previously stored one to mitigate CSRF attack
} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {

    unset($_SESSION['oauth2state']);
    exit('Invalid state');

} else {

    // Try to get an access token (using the authorization code grant)
    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);
}
```
You can then store the token to make requests

## Refreshing a Token
```
$newAccessToken = $provider->getAccessToken('refresh_token', [
    'refresh_token' => $access->refresh_token
]);
```
## Testing
I haven't made anything for that yet. One day! Maybe.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [:author_name](https://github.com/:healyhatman)
- [:special thanks](https://github.com/:calcinai)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
