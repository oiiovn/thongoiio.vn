<div class="col-12 col-md-9">
    <div class="card">
        <div class="card-header justify-content-center">
            <h2 class="mb-0">{{ __('Thông tin tùy chọn') }} - <x-link class="text-primary" :href="route('admin.attribute.edit', $attribute_option->attribute_id)" :title="optional($attribute_option->attribute)->name" /></h2>
        </div>
        <div class="row card-body">
            <!-- name -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Tên tùy chọn') }}:</label>
                    <x-input name="name" :value="$attribute_option->name" :required="true"
                        placeholder="{{ __('Tên tùy chọn') }}" />
                </div>
            </div>
            <!-- price -->
            <div class="col-md-6 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Giá') }}:</label>
                    <x-input type="number" name="price" :value="$attribute_option->price" :required="true" />
                </div>
            </div>
            <!-- position -->
            <div class="col-md-6 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Vị trí') }}:</label>
                    <x-input type="number" name="position" :value="$attribute_option->position" :required="true" />
                </div>
            </div>
            @includeWhen($attribute_option->attribute->isTypeButton(), 'admin.attributes.options.forms.fields.meta-button')
            <!-- note -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Ghi chú') }}:</label>
                    <textarea class="form-control" name="note">{{ $attribute_option->note }}</textarea>
                </div>
            </div>
            <!-- desc -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Mô tả') }}:</label>
                    <textarea class="form-control" name="desc">{{ $attribute_option->desc }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>