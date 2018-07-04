# textlocal

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
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

```php
$textlocal->sendSMS('Message content', 'Sender name here', [
    // Array of mobile numbers
    '07777777777',
    '07777777778',
]);
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
