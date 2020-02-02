# laravel-obfuscate

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

# Easy id obfuscation for Laravel

## Structure

If any of the following are applicable to your project, then the directory structure should follow industry best practices by being named the following.

```
bin/        
build/
docs/
config/
src/
tests/
vendor/
```


## Install

Via Composer

``` bash
$ composer require milroyfraser/laravel-obfuscate
```

## Usage

``` php
$skeleton = new LaravelObfuscate();
echo $skeleton->echoPhrase('Hello, League!');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email milroy@outlook.com instead of using the issue tracker.

## Credits

- [Milroy E. Fraser][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/milroyfraser/laravel-obfuscate.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/milroyfraser/laravel-obfuscate/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/milroyfraser/laravel-obfuscate.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/milroyfraser/laravel-obfuscate.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/milroyfraser/laravel-obfuscate.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/milroyfraser/laravel-obfuscate
[link-travis]: https://travis-ci.org/milroyfraser/laravel-obfuscate
[link-scrutinizer]: https://scrutinizer-ci.com/g/milroyfraser/laravel-obfuscate/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/milroyfraser/laravel-obfuscate
[link-downloads]: https://packagist.org/packages/milroyfraser/laravel-obfuscate
[link-author]: https://github.com/milroyfraser
[link-contributors]: ../../contributors
