<?php

namespace Astrogoat\Promobar\Settings;

use Astrogoat\Promobar\Casts\PayloadCast;
use Helix\Lego\Settings\AppSettings;

class PromobarSettings extends AppSettings
{
    public $payload;

    protected array $rules = [
        'payload' => ['required'],
    ];

    public static function casts(): array
    {
        return [
            'payload' => PayloadCast::class,
        ];
    }

    public function description(): string
    {
        return 'Adds a promobar to your site.';
    }
}
