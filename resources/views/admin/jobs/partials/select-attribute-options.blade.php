<div class="col-12 col-md-6">
    <div class="mb-3">
        <label for="">{{ $attribute->name }}:</label>
        @if($attribute->desc)
            <span class="float-end text-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="{{ __($attribute->desc) }}">
                <i class="fa-solid fa-lightbulb-on"></i>
            </span>
        @endif
        <x-select class="select-attribute-option" name="attribute_option_id[{{$attribute->id}}]" :required="true">
            <x-select-option :data-price="0" :title="__('Vui lòng chọn')" />
            @foreach ($attribute->options as $option)
                <x-select-option :data-price="$option->price" :value="$option->id" :title="$option->name"/>
            @endforeach
        </x-select>
    </div>
</div>