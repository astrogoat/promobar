<div
    x-data="{ payload: $wire.entangle('payload') }"
    x-init="if (typeof(payload.countdown_timer_enabled) == 'undefined') payload.countdown_timer_enabled = false;"
>
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

        <x-fab::forms.input
            label="Padding"
            class="ml-4"
            type="number"
            min="0"
            name="payload[padding]"
            wire:model="payload.padding"
            wire:key="promobar_padding"
            placeholder="10"
            trailing="px"
        />
    </div>

    <div class="flex flex-col mt-6 items-start space-y-4 mt-8">
        <x-fab::forms.toggle
            id="enable_countdown_timer"
            label="Enable countdown timer"
            wire:model="payload.countdown_timer_enabled"
            wire:key="promobar_countdown_timer_enabled"
            :toggled="$payload['countdown_timer_enabled'] ?? false"
        />

        <div
            class="grid grid-cols-2 w-full fab-space-x-4"
            x-cloak
            x-show="payload.countdown_timer_enabled === true"
        >
            <x-fab::forms.date-picker
                label="Count down until"
                wire:model="payload.countdown_timer_end_date"
                wire:key="promobar_countdown_timer_end_date"
                hint="Required"
                :options="[
                    'altInput' => true,
                    'altFormat' => 'D, M J, Y - G:i K',
                    'enableTime' => true
                ]"
            />

            <x-fab::forms.date-picker
                label="Show timer after"
                wire:model="payload.countdown_timer_start_date"
                wire:key="promobar_countdown_timer_start_date"
                hint="Optional"
                :options="[
                    'altInput' => true,
                    'altFormat' => 'D, M J, Y - G:i K',
                    'enableTime' => true
                ]"
            />

        </div>
    </div>

    <x-fab::layouts.panel
        title="Preview"
        class="mt-8"
    >
        @include('promobar::types.inline')
    </x-fab::layouts.panel>
</div>
