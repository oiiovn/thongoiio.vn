@extends('layout')
@push('libs-css')
    <link href="{{ asset('libs/Parsley.js-2.9.2/style.css') }}" rel="stylesheet">
@endpush
@section('content')
    <x-card>
        <x-slot name="header">
            <span class="text-white">
                <i class="fa-solid fa-clipboard-list-check me-2"></i>
                <span class="">{{ __('Thông tin đơn') }}</span>
            </span>
        </x-slot>
        <div class="card-body">
            <x-form class="row" type="post" :action="route('job.manager.store')" :validate="true">
                <!-- name -->
                {{-- <div class="col-12">
                    <div class="mb-3">
                        <label class="control-label">{{ __('Tên công việc') }}:</label>
                        <x-input name="name" :value="old('name')" :required="true"
                            placeholder="{{ __('Tên công việc') }}" />
                    </div>
                </div> --}}
                <!-- money_product -->
                {{-- <div class="col-12 col-md-12">
                    <div class="mb-3">
                        <label class="control-label">{{ __('Tiền mua sản phẩm') }}:</label>
                        <x-input-number name="money_product" :value="old('money_product')" :required="true" />
                    </div>
                </div> --}}
                <!-- qty_worker -->
                {{-- <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="control-label">{{ __('Số người làm') }}:</label>
                        <x-input type="number" min="1" name="qty_worker" value="1" :required="true" />
                    </div>
                </div> --}}
                @each('admin.jobs.partials.select-attribute-options', $attributes, 'attribute')
                <!-- note -->
                {{-- <div class="col-12">
                    <div class="mb-3">
                        <label class="control-label">{{ __('Ghi chú') }}:</label>
                        <textarea class="form-control" name="note">{{ old('note') }}</textarea>
                    </div>
                </div> --}}
                <div class="col-12 mb-3">
                    @include('jobs.partials.table-attribute')
                </div>
                <div class="col-12 text-center">
                    <x-button type="submit" class="btn-orange">{{ __('Đăng đơn') }}</x-button>
                </div>
            </x-form>
        </div>
    </x-card>
@endsection
@push('libs-js')
    <script src="{{ asset('libs/Parsley.js-2.9.2/parsley.min.js') }}"></script>
@endpush
@push('custom-js')
<script>
function calTotalMoneyAttr(){
    var total = 0;
    $('.select-attribute-option').each(function (i, obj) { 
        total += Number($(obj).find('option:selected').data('price'));
    });
    return total;
}
function totalMoneyProduct(){
    var total = Number($("input[name='money_product']").val());
    return total ? total : 0;
}
function updateTotal(){
    $(".total").text(formatPrice(totalMoneyProduct() + calTotalMoneyAttr()));
}
$(document).ready(function(e){
    $("input[name='money_product']").change(function(e){
        $(".money-product").text(formatPrice(totalMoneyProduct()));
        updateTotal();
    })
    $(".select-attribute-option").change(function (e) {
        $(".total-money").text(formatPrice(calTotalMoneyAttr()));
        updateTotal();
    })
});
</script>
@endpush
