<style>
    .astrogoat_promobar {
        padding: 10px;
        text-align: center;
        color: {{ $payload['text_color'] ?? '#000' }};
        background-color: {{ $payload['background_color'] ?? '#FFF' }};
    }
</style>
@isset($payload['content'])
    <div class="astrogoat_promobar">
        {!! $payload['content'] ?? '' !!}
    </div>
@endisset
