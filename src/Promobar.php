<?php

namespace Astrogoat\Promobar;

use Astrogoat\Promobar\Settings\PromobarSettings;
use Astrogoat\Promobar\Types\InlineType;

class Promobar
{
    protected array $types = [
        'inline' => InlineType::class,
    ];

    public function getTypes(): array
    {
        return $this->types;
    }

    public function addType(string $key, string $type)
    {
        $this->types[$key] = $type;
    }

    public function getCurrentType()
    {
        $type = settings(PromobarSettings::class, 'payload')['type'] ?? 'inline';

        return isset($this->types[$type])
            ? new $this->types[$type]()
            : new $this->types['inline']();
    }

    public function getPayload()
    {
        return settings(PromobarSettings::class, 'payload');
    }
}
