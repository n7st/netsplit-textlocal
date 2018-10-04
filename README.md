# textlocal

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status](https://drone.netsplit.uk/api/badges/labs/netsplit-textlocal/status.svg?branch=master)](https://drone.netsplit.uk/labs/netsplit-textlocal)
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

## Install

Via Composer

``` bash
$ composer require netsplit/textlocal
```

## Usage

```php
$textlocal = new Netsplit\Textlocal(
    'https://path.to.textlocal.com/api2',
    'api-key-here'
);
```

### Send an SMS message

[API documentation for the "send" endpoint](http://api.txtlocal.com/docs/sendsms).

```php
$response = $textlocal->sendSMS('Message content', [
    // Array of mobile numbers
    '07777777777',
    '07777777778',
], [
    // Optional values
    'containsTrackingLinks' => false,                  // Should URLs in the SMS be minified?
    'custom'                => 'Any string',           // For use as a reference
    'groupID'               => 5,                      // A Textlocal group ID
    'receiptURL'            => 'http://[...]',         // Custom receipt URL
    'scheduleAt'            => 1530735900,             // Unix timestamp - send the SMS at this time
    'sender'                => 'Optional Sender Name',
    'sendToOptOut'          => false,                  // Should the SMS be sent to users who have opted out?
    'simpleReply'           => false,                  // Disregard sender
    'test'                  => true,                   // Don't really send the SMS
    'unicode'               => false,                  // Does the SMS contain unicode characters?
    'validUntil'            => 1530735994,             // Unix timestamp - disregard the SMS at this time
]);

// Access values from the response:
echo $response->getStatus()->__toString(); // Hopefully "success"!
echo $response->getBalance()->getValue();
```

### Shorten a URL

[API documentation for the "short URL" endpoint](http://api.txtlocal.com/docs/shorturl)

```php
$response = $textlocal->getShortURL('https://www.google.com');
$shortURL = $response->getShortURL()->__toString();
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email mike@netsplit.org.uk instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/netsplit/textlocal.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/netsplit/textlocal/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/netsplit/textlocal.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/netsplit/textlocal.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/netsplit/textlocal.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/netsplit/textlocal
[link-travis]: https://travis-ci.org/netsplit/textlocal
[link-scrutinizer]: https://scrutinizer-ci.com/g/netsplit/textlocal/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/netsplit/textlocal
[link-downloads]: https://packagist.org/packages/netsplit/textlocal
[link-author]: https://git.netsplit.uk/mike
