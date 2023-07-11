<style>
    .astrogoat_promobar {
        display: flex;
        justify-content: center;
        padding: {{ isset($payload['padding']) && ! blank($payload['padding']) ? $payload['padding'] : '10' }}px;
        text-align: center;
        color: {{ $payload['text_color'] ?? '#000' }};
        background-color: {{ $payload['background_color'] ?? '#FFF' }};
    }

    .astrogoat_promobar_countdown {
        margin-left: 10px;
    }

    .astrogoat_promobar .countdown-block{
        background:  {{ $payload['countdown_timer_block_background_color'] ?? '' }};;
        color: {{ $payload['countdown_timer_block_color'] ?? $payload['text_color'] }};

    }

</style>

@isset($payload['content'])
    <div
        class="astrogoat_promobar mt-4 flex flex-col lg:flex-row lg:mt-0"
    >
        <span class="mt-1">{!! $payload['content'] ?? '' !!}</span>

        @if($payload['countdown_timer_enabled'] ?? false)
            <x-promobar::countdown :payload="$payload" class="astrogoat_promobar_countdown" />
        @endif
    </div>
@endisset
