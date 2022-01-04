<?php

namespace Astrogoat\Promobar\Casts;

use Astrogoat\Promobar\Promobar;
use Helix\Lego\Apps\Contracts\SettingsCast;
use Helix\Lego\Settings\AppSettings;

class Payload extends SettingsCast
{
    public array $payload;

    public function get($payload)
    {
        return $payload;
    }

    public function set($payload)
    {
        return $payload;
    }

    public function mount(AppSettings $settings)
    {
        parent::mount($settings);

        $this->payload = blank($settings->payload) ? ['type' => 'inline'] : $settings->payload;
    }

    public function getTypes(): array
    {
        return collect(app(Promobar::class)->getTypes())->mapWithKeys(fn ($type, $key) => [$key => new $type()])->toArray();
    }

    public function getSelectedTypeInclude(): string
    {
        $type = new (app(Promobar::class)->getTypes()[$this->payload['type']]);

        return $type->renderSettings();
    }

    public function render()
    {
        return view('promobar::settings.types.index');
    }
}
