<div class="col-12 col-md-9">
    <div class="card">
        <div class="card-header justify-content-center">
            <h2 class="mb-0">{{ __('Thông tin tùy chọn') }} - <x-link class="text-primary" :href="route('admin.attribute.edit', $attribute->id)" :title="$attribute->name" /></h2>
        </div>
        <div class="row card-body">
            <!-- name -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Tên tùy chọn') }}:</label>
                    <x-input name="name" :value="old('name')" :required="true"
                        placeholder="{{ __('Tên tùy chọn') }}" />
                </div>
            </div>
            <!-- price -->
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="control-label">{{ __('Giá') }}:</label>
                    <x-input-number name="price" :value="old('price', 0)" :required="true" />
                </div>
            </div>
            <!-- position -->
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="control-label">{{ __('Vị trí') }}:</label>
                    <x-input type="number" name="position" :value="old('position', 0)" :required="true" />
                </div>
            </div>
            @includeWhen($attribute->isTypeButton(), 'admin.attributes.options.forms.fields.meta-button')
            <!-- note -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Ghi chú') }}:</label>
                    <textarea class="form-control" name="note">{{ old('note') }}</textarea>
                </div>
            </div>
            <!-- desc -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Mô tả') }}:</label>
                    <textarea class="form-control" name="desc">{{ old('desc') }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>