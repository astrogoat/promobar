<?php

namespace Astrogoat\Promobar;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Astrogoat\Promobar\Promobar
 */
class PromobarFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'promobar';
    }
}
