<?php

namespace Astrogoat\Promobar\Types;

use Illuminate\Support\Str;

abstract class PromobarType
{
    abstract public function renderSettings(): string;

    abstract public function renderComponent(): string;

    public function getName(): string
    {
        return Str::of(class_basename($this))->beforeLast('Type')->headline();
    }
}
