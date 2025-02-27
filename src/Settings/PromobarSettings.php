<?php

namespace Astrogoat\Promobar\Settings;

use Astrogoat\Promobar\Casts\Payload;
use Helix\Lego\Settings\AppSettings;

class PromobarSettings extends AppSettings
{
    public int $position;
    public $payload;

    protected array $rules = [
        'payload' => ['required'],
        'position' => ['required'],
    ];

    public function positionOptions(): array
    {
        return [
            '1' => 'Above (the main navigation)',
            '2' => 'Below (the main navigation)',
            '3' => 'Above and below (the main navigation)',
        ];
    }

    public static function casts(): array
    {
        return [
            'payload' => Payload::class,
        ];
    }

    public function description(): string
    {
        return 'Adds a promobar to your site.';
    }
}
