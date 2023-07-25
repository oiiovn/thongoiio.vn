@if($job->hasNextStatus())
    <li class="step-item">
        <div class="step-title m-0">{{ $job->status->nextCase()->description() }}</div>
        @if ($job->accessNextStatus())
            <div class="">
                <x-form :action="route('job.update_proccess')" type="put" :validate="true">
                    <x-input type="hidden" name="id" :value="$job->id" />
                    @if($job->nextStatusHasMoneyProductAddition())
                        <div class="mb-3">
                            <label class="control-label">{{ __('Tiền cọc') }}:</label>
                            <x-input-number name="money_product_addition" :value="old('money_product_addition', 0)" :required="true" />
                        </div>
                    @endif
                    <div class="mb-3">
                        <label class="control-label">{{ __('Mô tả') }}: 
                            @if($job->nextStatusHasMoneyProductAddition())
                                <small class="text-danger">{{ __('(Vui lòng điền thêm mã đơn hàng vào đây)') }}</small>
                            @endif
                        </label>
                        <textarea class="form-control" name="desc" @required($job->nextStatusHasMoneyProductAddition())></textarea>
                    </div>
                    <x-button type="submit" class="btn btn-orange">
                        {{ __('Xác nhận') }}
                    </x-button>
                </x-form>
            </div>
        @endif
    </li>
@endif