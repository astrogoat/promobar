<?php

namespace Astrogoat\Promobar\Casts;

use Helix\Lego\Apps\Contracts\SettingsCast;

class PayloadCast extends SettingsCast
{
    public bool $isLivewire = true;

    public function get($payload)
    {
        return $payload;
    }

    public function set($payload)
    {
        return $payload;
    }

    public function render(): string
    {
        return 'astrogoat.promobar.payload';
    }
}
