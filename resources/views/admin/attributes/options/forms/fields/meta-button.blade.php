<div class="col-md-6 col-12">
    <div class="mb-3">
        <label class="form-label">{{ __('Màu nền') }}</label>
        <x-input type="color" class="form-control-color" name="meta[bg_color]" :value="isset($attribute_option) ? $attribute_option->meta['bg_color'] ?? '#000000' : old('meta.bg_color', '#000000')" :title="__('Chọn màu sắc')" :required="true" />
    </div>
</div>
<div class="col-md-6 col-12">
    <div class="mb-3">
        <label class="form-label">{{ __('Màu chữ') }}</label>
        <x-input type="color" class="form-control-color" name="meta[text_color]" :value="isset($attribute_option) ? $attribute_option->meta['text_color'] ?? '#ffffff' : old('meta.text_color', '#ffffff')" :title="__('Chọn màu sắc')" :required="true" />
    </div>
</div>
