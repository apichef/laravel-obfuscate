# laravel-obfuscate

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

# Easy id obfuscation for Laravel

## Install

Via Composer

``` bash
$ composer require apichef/laravel-obfuscate
```

## Usage

``` php
// Model

namespace App;

use Illuminate\Database\Eloquent\Model;
use LaravelObfuscate\Obfuscatable;

class Post extends Model
{
    use Obfuscatable;

    // ...
}

// Route Model Binding

Route::get('/posts/{post}', function (Post $post) {
    return [
        'id' => $post->getRouteKey(),
        'title' => $post->title,
    ];
})->name('post.show');

// Generate the URL to a named route.

$post = Post::find(1);

echo(route('post.show', $post));

// https://my-app.test/api/posts/458047115

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

[ico-version]: https://img.shields.io/packagist/v/apichef/laravel-obfuscate.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/apichef/laravel-obfuscate/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/apichef/laravel-obfuscate.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/apichef/laravel-obfuscate.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/apichef/laravel-obfuscate.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/apichef/laravel-obfuscate
[link-travis]: https://travis-ci.org/apichef/laravel-obfuscate
[link-scrutinizer]: https://scrutinizer-ci.com/g/apichef/laravel-obfuscate/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/apichef/laravel-obfuscate
[link-downloads]: https://packagist.org/packages/apichef/laravel-obfuscate
[link-author]: https://github.com/milroyfraser
[link-contributors]: ../../contributors
