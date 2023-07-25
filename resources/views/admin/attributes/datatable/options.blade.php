<p>
    @foreach ($options as $item)
        {{ $loop->last ? $item['name'] : $item['name'].', ' }}
    @endforeach
</p>
<x-link :href="route('admin.attribute.option.index', $id)" :title="__('Quản lý các tùy chọn')" />
