<div>
    <x-fab::forms.select
        wire:model="payload.type"
        name="payload[type]"
        label="Type"
    >
        @foreach($this->getTypes() as $key => $type)
            <option value="{{ $key }}">{{ $type->getName() }}</option>
        @endforeach
    </x-fab::forms.select>

    <div wire:key="{{ $payload['type'] ?? 'default' }}">
        @include($this->getSelectedTypeInclude())
    </div>
</div>
