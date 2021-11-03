<?php

namespace Astrogoat\Promobar\Actions;

use Helix\Lego\Apps\Actions\Action;

class PromobarAction extends Action
{
    public static function actionName(): string
    {
        return 'Promobar action name';
    }

    public static function run(): mixed
    {
        return redirect()->back();
    }
}
