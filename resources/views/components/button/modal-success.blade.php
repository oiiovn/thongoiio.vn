<button type="button" {{ $attributes->class(['btn', 'btn-success', 'open-modal-success'])
->merge([
    'data-bs-toggle' => 'modal',
    'data-bs-target' => '#modalSuccess',
]) }}> 
    {{ $title ?? '' }}
    {{ $slot }}
</button>