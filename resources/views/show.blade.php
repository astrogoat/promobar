@if($shouldShow())
    <div id="strata_promobar_{{ $position }}" {{ $attributes }}>
        @include($type->renderComponent(), ['payload' => $payload])
    </div>
@endif
