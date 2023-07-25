@if(isset($meta) && $meta && isset($meta['attribute_type_button']) && $meta['attribute_type_button'])
    <span class="btn btn-sm btn-pill" style="background-color: {{ $meta['attribute_type_button']['bg_color'] ?? '#000000' }}; color: {{ $meta['attribute_type_button']['text_color'] ?? '#FFFFFF' }}">{{ $name_attribute_option }}</span>
@else
    <span>{{ $name_attribute_option }}</span>
@endif