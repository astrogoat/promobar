<?php

namespace Astrogoat\Promobar\Http\Livewire;

use Astrogoat\Promobar\Promobar;
use Helix\Lego\Settings\AppSettings;
use Livewire\Component;

class Payload extends Component
{
    public array $payload;
    protected AppSettings $settings;

    public function mount(AppSettings $settings)
    {
        $this->settings = $settings;
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

    public function updatedPayload()
    {
        $this->emitTo('helix.lego.apps.livewire.app-edit', 'settingKeyUpdated', ['key' => 'payload', 'value' => $this->payload]);
    }

    public function render()
    {
        return view('promobar::settings.types.index');
    }
}
