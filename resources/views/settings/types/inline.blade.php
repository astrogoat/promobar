<div>
    <x-fab::forms.input
        label="Content"
        class="mt-6"
        name="payload[content]"
        wire:model="payload.content"
        wire:key="promobar_content"
    />

    <div class="flex mt-6">
        <x-fab::forms.input
            label="Background color"
            class="mr-4"
            type="color"
            name="payload[background_color]"
            wire:model="payload.background_color"
            wire:key="promobar_background_color"
        />

        <x-fab::forms.input
            label="Text color"
            class="ml-4"
            type="color"
            name="payload[text_color]"
            wire:model="payload.text_color"
            wire:key="promobar_text_color"
        />
    </div>

    <x-fab::layouts.panel
        title="Preview"
        class="mt-8"
    >
        @include('promobar::types.inline')
    </x-fab::layouts.panel>
</div>
