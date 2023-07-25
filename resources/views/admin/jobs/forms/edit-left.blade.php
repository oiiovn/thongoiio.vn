<div class="col-12 col-md-9">
    <div class="card mb-3">
        <div class="card-header justify-content-between">
            <h2 class="mb-0">{{ __('Thông tin công việc') }}</h2>
            <div class="worker">
                <span class="fw-bold">{{ __('Người nhận') }}:</span> 
                @if($job->worker)
                    <x-link :href="route('admin.user.edit', $job->worker_id ?? 0)" target="_blank" :title="optional($job->worker)->fullname" />
                @else
                    {{ __('Chưa có') }}
                @endif
            </div>
        </div>
        <div class="row card-body">
            <!-- name -->
            {{-- <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Tên công việc') }}:</label>
                    <x-input name="name" :value="$job->name" :required="true" placeholder="{{ __('Tên công việc') }}" />
                </div>
            </div> --}}
            <!-- shop_id -->
            <div class="col-12 col-md-12">
                <div class="mb-3">
                    <label for="">{{ __('Shop') }}:</label>
                    <x-select class="select2-bs5-ajax" name="shop_id" :disabled="true">
                        <x-select-option :selected="true" :value="$job->shop_id" :title="($job->shop->name_shop ?: $job->shop->fullname). ' - ' . $job->shop->phone" />
                    </x-select>
                </div>
            </div>
            <!-- money_product -->
            {{-- <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="control-label">{{ __('Tiền mua sản phẩm') }}:</label>
                    <x-input-number name="money_product" :value="$job->money_product" :required="true" />
                </div>
            </div> --}}
            <!-- note -->
            {{-- <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Ghi chú') }}:</label>
                    <textarea class="form-control" name="note">{{ $job->note }}</textarea>
                </div>
            </div> --}}
        </div>
    </div>
    <div id="attribute" class="card mb-3">
        <div class="card-header justify-content-between">
            <h2 class="mb-0">{{ __('Thuộc tính công việc') }}</h2>
        </div>
        <div class="card-body">
            <table id="tableAttribute" class="table table-transparent table-responsive mb-0">
                <thead>
                    <tr>
                        <th>{{ __('Thuộc tính') }}</th>
                        <th class="text-center" style="width: 15%">{{ __('Tùy chọn') }}</th>
                        <th class="text-end" style="width: 1%">{{ __('Đơn giá') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($job->details as $detail)
                        <tr>
                            <td>{{ $detail->name_attribute }}</td>
                            <td>@include('admin.jobs.partials.attribute-option-name', [
                                'meta' => $detail->meta,
                                'name_attribute_option' => $detail->name_attribute_option
                            ])</td>
                            <td>{{ format_price($detail->unit_price) }}</td>
                        </tr>
                    @endforeach
                    {{-- <tr>
                        <td colspan="2">{{ __('Tiền mua sản phẩm') }}</td>
                        <td>
                            <span class="money-product">{{ format_price($job->money_product ?? 0) }}</span>
                        </td>
                    </tr> --}}
                    <tr>
                        <td colspan="2">{{ __('Tiền cọc') }}</td>
                        <td>
                            <span class="money-product-addition">{{ format_price($job->money_product_addition ?? 0) }}</span>
                        </td>
                    </tr>
                    <tr class="fw-bold">
                        <td colspan="2">{{ __('Tổng tiền') }}</td>
                        <td>
                            <span class="total-money">{{ format_price($job->money + $job->money_product_addition ?? 0) }}</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div id="histories" class="card">
        <div class="card-header justify-content-between">
            <h2 class="mb-0">{{ __('Lịch sử công việc') }}</h2>
        </div>
        <div class="card-body">
            <ul class="steps steps-counter steps-vertical">
                @each('admin.jobs.partials.loop-histories', $job->histories, 'history')
            </ul>
        </div>
    </div>
</div>
