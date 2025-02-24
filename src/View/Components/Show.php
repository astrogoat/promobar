<?php

namespace Astrogoat\Promobar\View\Components;

use Astrogoat\Promobar\Promobar;
use Astrogoat\Promobar\Settings\PromobarSettings;
use Illuminate\View\Component;

class Show extends Component
{
    const ABOVE = 1;
    const BELOW = 2;
    const ABOVE_AND_BELOW = 3;

    public function __construct(public ?int $position = null)
    {
        //
    }

    public function shouldShow()
    {
        $settings = app(PromobarSettings::class);

        if (! $settings->enabled) {
            return false;
        }

        if (is_null($this->position)) {
            return true;
        }

        return $this->position === $settings->position || $settings->position === static::ABOVE_AND_BELOW;
    }

    public function render()
    {
        $promobar = app(Promobar::class);
        $type = $promobar->getCurrentType();
        $payload = $promobar->getPayload();

        return view('promobar::show', compact('type', 'payload'));
    }
}
