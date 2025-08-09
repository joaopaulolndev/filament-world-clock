# Filament widget to show hours around the world by timezone

[![Latest Version on Packagist](https://img.shields.io/packagist/v/joaopaulolndev/filament-world-clock.svg?style=flat-square)](https://packagist.org/packages/joaopaulolndev/filament-world-clock)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/joaopaulolndev/filament-world-clock/run-tests.yml?branch=2.x&label=tests&style=flat-square)](https://github.com/joaopaulolndev/filament-world-clock/actions?query=workflow%3Arun-tests+branch%3A2.x)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/joaopaulolndev/filament-world-clock/fix-php-code-style-issues.yml?branch=2.x&label=code%20style&style=flat-square)](https://github.com/joaopaulolndev/filament-world-clock/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3A2.x)
[![Total Downloads](https://img.shields.io/packagist/dt/joaopaulolndev/filament-world-clock.svg?style=flat-square)](https://packagist.org/packages/joaopaulolndev/filament-world-clock)


The Filament World Clock plugin designed to showcase global timezones in a card format is a user-friendly tool that allows users to effortlessly display current times across various regions worldwide.
<div class="filament-hidden">

![Screenshot of Application Feature](https://raw.githubusercontent.com/joaopaulolndev/filament-world-clock/2.x/art/joaopaulolndev-filament-world-clock.jpg)

</div>

## Installation

You can install the package via composer:

```bash
composer require joaopaulolndev/filament-world-clock:^2.0
```

>[!NOTE]
> to publish the assets is necessary to run the command below:
```bash
php artisan vendor:publish --tag=filament-world-clock-assets --force
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-world-clock-views"
```

Optionally, you can publish the translations using

```bash
php artisan vendor:publish --tag="filament-world-clock-translations"
```

You can publish the flags

>[!NOTE]
> to publish the flags is necessary to run the command below:

```bash
php artisan vendor:publish --tag=blade-flags --force
```

## Usage

Add in AdminPanelProvider.php

```php
use Joaopaulolndev\FilamentWorldClock\FilamentWorldClockPlugin;

->plugins([
    FilamentWorldClockPlugin::make()
        ->timezones([
            'America/New_York',
            'America/Sao_Paulo',
            'Asia/Tokyo',
        ])
])
```

Optionally, you can add more configs as example below:

```php
use Joaopaulolndev\FilamentWorldClock\FilamentWorldClockPlugin;

FilamentWorldClockPlugin::make()
    ->timezones([
        'America/New_York',
        'America/Sao_Paulo',
        'Asia/Tokyo',
    ])
    ->setTimeFormat('H:i') //Optional time format default is: 'H:i'
    ->shouldShowTitle(false) //Optional show title default is: true
    ->setTitle('Hours') //Optional title default is: 'World Clock'
    ->setDescription('Different description') //Optional description default is: 'Show hours around the world by timezone'
    ->setQuantityPerRow(1) //Optional quantity per row default is: 1
    ->setColumnSpan('full') //Optional column span default is: '1/2' 
    ->setSort(10)
```

> [!NOTE]
> if missing some flag, the default value will be used. But you can open a pr to add more flags.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [João Paulo Leite Nascimento](https://github.com/joaopaulolndev)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
