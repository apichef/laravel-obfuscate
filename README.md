# laravel-obfuscate

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-ci]][link-ci]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

# Easy id obfuscation for Laravel

## Install

Via Composer

``` bash
$ composer require apichef/laravel-obfuscate
```

| Laravel | Minimum Versions |
|---------|:----------------:|
| 5.x     |     `^1.0.0`     |
| 6.x     |     `^1.0.0`     |
| 7.x     |     `^2.0.0`     |
| 8.x     |     `^2.0.0`     |
| 9.x     |     `^3.0.0`     |
| 10.x    |     `^4.0.0`     |
| 11.x    |     `^4.0.0`     |

## Usage

### Route Model Binding

```php
// Model

namespace App;

use Illuminate\Database\Eloquent\Model;
use ApiChef\Obfuscate\Obfuscatable;

class Post extends Model
{
    use Obfuscatable;

    // ...
}

// Route

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

### Validation

```php
namespace App\Http\Requests;

use ApiChef\Obfuscate\Rules\HashExists;
use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    // ...
    public function rules()
    {
        return [
            'post_id' => [
                'required',
                new HashExists('posts', 'id')
            ],
        ];
    }
}
```

### Facade

```php
use ApiChef\Obfuscate\Support\Facades\Obfuscate;

$result = Obfuscate::encode(1);
// 458047115

$result = Obfuscate::encode([1, 2]);
// [458047115, 2033899500]

$result = Obfuscate::decode('458047115');
// 1

$result = Obfuscate::decode([458047115, 2033899500]);
// [1, 2]
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

- [Nimna Awantha][link-maintainer]
- [Milroy E. Fraser][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/apichef/laravel-obfuscate.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-ci]: https://github.com/apichef/laravel-obfuscate/workflows/CI/badge.svg
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/apichef/laravel-obfuscate.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/apichef/laravel-obfuscate.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/apichef/laravel-obfuscate.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/apichef/laravel-obfuscate
[link-ci]: https://github.com/apichef/laravel-obfuscate/actions
[link-code-quality]: https://scrutinizer-ci.com/g/apichef/laravel-obfuscate
[link-downloads]: https://packagist.org/packages/apichef/laravel-obfuscate
[link-author]: https://github.com/milroyfraser
[link-maintainer]: https://github.com/nimnaherath
[link-contributors]: ../../contributors
