<button type="button" {{ $attributes->class(['btn', 'btn-warning', 'open-modal-warning'])
->merge([
    'data-bs-toggle' => 'modal',
    'data-bs-target' => '#modalWarning',
]) }}> 
    {{ $title ?? '' }}
    {{ $slot }}
</button>