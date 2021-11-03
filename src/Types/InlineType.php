<?php

namespace Astrogoat\Promobar\Types;

class InlineType extends PromobarType
{
    public function renderSettings(): string
    {
        return 'promobar::settings.types.inline';
    }

    public function renderComponent(): string
    {
        return 'promobar::types.inline';
    }
}
