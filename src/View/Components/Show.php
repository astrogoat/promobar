<?php

namespace Astrogoat\Promobar\View\Components;

use Astrogoat\Promobar\Promobar;
use Astrogoat\Promobar\Settings\PromobarSettings;
use Illuminate\View\Component;

class Show extends Component
{
    public function render()
    {
        $promobar = app(Promobar::class);
        $type = $promobar->getCurrentType();
        $enabled = PromobarSettings::isEnabled();
        $payload = $promobar->getPayload();

        return view('promobar::show', compact('enabled', 'type', 'payload'));
    }
}
