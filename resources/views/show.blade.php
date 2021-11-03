<div {{ $attributes }}>
    @includeWhen($enabled, $type->renderComponent(), ['payload' => $payload])
</div>
