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
        background: {{ $payload['countdown_timer_block_background_color'] ?? '#FFF' }};
        color: {{ $payload['text_color'] ?? '#000'  }};
        margin: 0px {{ $payload['countdown_timer_block_padding'] ?? 2 }}px;
    }

    .astrogoat_promobar .timer-container{
        padding: 2px 0px;
        text-align: center;
        margin-top: 4px;
    }

    @media (min-width: 768px) {
        .zaius-promobar .container {
            max-width: 768px;
        }

        .astrogoat_promobar .timer-container{
            padding: 2px 0px;
            margin-top: 2px;
        }
    }

    @media (min-width: 1280px) {
        .astrogoat_promobar .container {
            max-width: 1280px;
        }

        .astrogoat_promobar .timer-container{
            padding: 2px 0px;
            margin-top: -4px;
        }

        .astrogoat_promobar .md\:justify-center .timer-container{
            margin-top: 14px;
        }
    }
</style>

@isset($payload['content'])
    <div
        class="astrogoat_promobar mt-2 flex flex-col lg:flex-row lg:mt-0"
    >
        <span class="text-xs sm:text-sm">{!! $payload['content'] ?? '' !!}</span>

        @if($payload['countdown_timer_enabled'] ?? false)
            <x-promobar::countdown :payload="$payload" class="astrogoat_promobar_countdown" />
        @endif
    </div>
@endisset
