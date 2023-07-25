@if ($is_type_button)
    <x-link class="btn btn-sm btn-pill" style="background-color: {{ $meta['bg_color'] }}; color: {{ $meta['text_color'] }}"
        :href="route('admin.attribute.option.edit', $id)" :title="$name" />
@else
    <x-link :href="route('admin.attribute.option.edit', $id)" :title="$name" />
@endif
