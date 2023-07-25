<div class="col-12 col-md-9">
    <div class="card mb-3">
        <div class="card-header justify-content-center">
            <h2 class="mb-0">{{ __('Thông tin công việc') }}</h2>
        </div>
        <div class="row card-body">
            <!-- name -->
            {{-- <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Tên công việc') }}:</label>
                    <x-input name="name" :value="old('name')" :required="true"
                        placeholder="{{ __('Tên công việc') }}" />
                </div>
            </div> --}}
            <!-- shop_id -->
            <div class="col-12 col-md-12">
                <div class="mb-3">
                    <label for="">{{ __('Shop') }}:</label>
                    <x-select class="select2-bs5-ajax" name="shop_id" :required="true">
                    </x-select>
                </div>
            </div>
            <!-- money_product -->
            {{-- <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="control-label">{{ __('Tiền mua sản phẩm') }}:</label>
                    <x-input-number name="money_product" :value="old('money_product')" :required="true" />
                </div>
            </div> --}}
            <!-- note -->
            {{-- <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Ghi chú') }}:</label>
                    <textarea class="form-control" name="note">{{ old('note') }}</textarea>
                </div>
            </div> --}}
        </div>
    </div>
    <div id="attribute" class="card">
        <div class="card-header justify-content-between">
            <h2 class="mb-0">{{ __('Thuộc tính công việc') }}</h2>
            <div class="">
                {{ __('Tổng tiền: ') }}
                <span class="total-money">{{ format_price(0) }}</span>
            </div>
        </div>
        <div class="row card-body">
            @each('admin.jobs.partials.select-attribute-options', $attributes, 'attribute')
        </div>
    </div>
</div>