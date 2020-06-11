# A tile to display Shopify information

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ingoldsby/laravel-dashboard-shopify-tile.svg?style=flat-square)](https://packagist.org/packages/ingoldsby/laravel-dashboard-shopify-tile)
[![Total Downloads](https://img.shields.io/packagist/dt/ingoldsby/laravel-dashboard-shopify-tile.svg?style=flat-square)](https://packagist.org/packages/ingoldsby/laravel-dashboard-shopify-tile)

This tile can be used on [the Laravel Dashboard](https://docs.spatie.be/laravel-dashboard) to display Shopify information.

![screenshot](https://user-images.githubusercontent.com/26500496/84368299-bab77800-ac18-11ea-981b-953a200e966a.png)

## Installation

You can install the package via composer:

```bash
composer require ingoldsby/laravel-dashboard-shopify-tile
```

## Shopify API credentials

Before using this tile you need to have created a [private app](https://help.shopify.com/en/manual/apps/private-apps) on the Shopify admin page and obtained an API key and password.

## Usage

In the `dashboard` config file, you must add this configuration in the `tiles` key.

```php
// in config/dashboard.php

return [
    // ...
    'tiles' => [
        'shopify' => [
            'store' => env('SHOPIFY_STORE'),
            'api_version' => '2020-04',
            'api_key' => env('SHOPIFY_API_KEY'),
            'password' => env('SHOPIFY_API_PASSWORD'),
        ]
    ],
];
```

In `app\Console\Kernel.php` you should schedule the `\Ingoldsby\ShopifyTile\Commands\FetchShopifyInfoCommand` to run. You can let it run every minute if you want. You could also run this less frequently if fast updates on the dashboard aren’t that important for this tile.

```php
// in app/console/Kernel.php

protected function schedule(Schedule $schedule)
{
    // ...
    $schedule->command(\Ingoldsby\ShopifyTile\Commands\FetchShopifyInfoCommand::class)->everyMinute();
}
```

In your dashboard view you can use the tile:
* `livewire:shopify-tile`

```html
<x-dashboard>
    <livewire:shopify-tile position="a1:b4" />
</x-dashboard>
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email instead of using the issue tracker.

## Support Spatie

I have learnt a lot from Spatie's various packages, including [Mailcoach](https://mailcoach.app), and would recommend you check them out if you want to know more.

Learn how to create a package like theirs, by watching Spatie's premium video course:

[![Laravel Package training](https://spatie.be/github/package-training.jpg)](https://laravelpackage.training)

Spatie invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support them by [buying one of their paid products](https://spatie.be/open-source/support-us).

## Credits

- [Ingoldsby](https://github.com/ingoldsby)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.