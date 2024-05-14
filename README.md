# A Promobar app for Stratum

[![Latest Version on Packagist](https://img.shields.io/packagist/v/astrogoat/promobar.svg?style=flat-square)](https://packagist.org/packages/astrogoat/promobar)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/astrogoat/promobar/run-tests?label=tests)](https://github.com/astrogoat/promobar/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/astrogoat/promobar/Check%20&%20fix%20styling?label=code%20style)](https://github.com/astrogoat/promobar/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/astrogoat/promobar.svg?style=flat-square)](https://packagist.org/packages/astrogoat/promobar)

## Installation

You can install the package via composer:

```bash
composer require astrogoat/promobar
```

## Usage

Include the Blade component where you would like it to appear when ever the promobar bar has been enabled via the app settings.

```html
<x-promobar::show />
```

Since it's a Blade component you can also add any attributes you might need.

```html
<x-promobar::show class="sticky top-0" />
```

## Extending
You can extend the promobar to use your own settings and render if you have special needs.

Three files are needed in order to extend it.
- A type class that extends `Astrogoat\Promobar\Types\PromobarType`.
- Two Blade files
  - One for the settings view
  - And one for the user-facing side, that will be on your site.

Let's start with the type class. Create a new class and extend `Astrogoat\Promobar\Types\PromobarType`.

The class only require two methods. `renderSettings` and `renderComponent` which needs to be the string path to your two Blade files.

```php
<?php

namespace App\Promobar\Types;

use Astrogoat\Promobar\Types\PromobarType;

class PopupType extends PromobarType
{
    public function renderSettings() : string
    {
        return 'promobar.settings';
    }

    public function renderComponent() : string
    {
        return 'promobar.component';
    }
}
```

Let's create those two Blade files.

`resources/views/promobar/settings.blade.php`

Here is where you can define what you settings will look like when you go to `Apps` -> `Promobar` and select your promobar type. Though we haven't hooked it up, so nothing will show up just yet.
```html
<div>
    <input
        name="payload[content_desktop]"
        wire:model="payload.content_desktop"
    />

    <input
        name="payload[content_mobile]"
        wire:model="payload.content_mobile"
    />
</div>
```

> **Important:** When you add any type of inputs that you want to be persisted you need to add the `name` and `wire:model` attributes. Name has to be a html array starting with `payload[]`. What you put inside the brackes it what ever name you want it to be called. Same goes for the `wire:model`, it has to start with `payload.`, again what ever you put after the `.` (dot) is up to your, but should be the same as your `name` attribute. 

Now in your component Blade view (what's going to be the user-facing component) you can make use of the inputs that you defined in the settings Blade file.

`resources/views/promobar/component.blade.php`
```php
<div>
    <span class="md:hidden">{{ $payload['content_mobile'] ?? '' }}</span>
    <span class="hidden md:flex">{{ $payload['content_desktop'] ?? '' }}</span>
</div>
```

Final step is to hook it up.  
In your service provider in the register method you can hook into the promobar.
The `$promobar->addType()` method require two arguments. First is the key, in this case we call it `popup` and second argument is the type class that we created earlier. 
```php
use App\Promobar\Types\PopupType;

$this->callAfterResolving('Astrogoat\\Promobar\\Promobar', function ($promobar) {
    $promobar->addType(key: 'popup', type: PopupType::class);
});
```

### Real world example
You can see a real world example on how the [Zaius app](https://github.com/astrogoat/zaius) hooks into the promobar.

- [Hook](https://github.com/astrogoat/zaius/blob/bcf6c6b1348eb0b08eda4c7e0fda730797d4e231/src/ZaiusServiceProvider.php#L36)
- [Settings](https://github.com/astrogoat/zaius/blob/main/resources/views/promobar/settings.blade.php)
- [Component](https://github.com/astrogoat/zaius/blob/main/resources/views/promobar/component.blade.php)

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

- [Laura Tonning](https://github.com/astrogoat)
- [All Contributors](../../contributors)

This promobar package is forked from the awesome [Spatie promobar package](https://github.com/spatie/package-promobar-laravel#support-us). Please go support them if you can.




## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
