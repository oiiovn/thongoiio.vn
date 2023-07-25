<li @class([
    "step-item",
    "active" => $history->status == $job_status
])>
    <div class="m-0 d-flex justify-content-between flex-nowrap gap-3">
        <div class="">
            <span>{{ $history->status->description() }} </span>
            @if($history->canEdit() && $is_access)
                <x-button id="editHistoryJob" type="button" class="btn btn-sm btn-outline-warning" 
                        data-desc="{{ $history->desc }}" 
                        data-bs-toggle="modal" 
                        data-bs-target="#modalEditHistoryJob">
                        {{ __('Sửa') }}
                </x-button>
            @endif
        </div>
        <span class="text-muted">
            <small>{{ format_datetime($history->created_at) }}</small>
        </span>    
    </div>
    @if($history->hasMoneyProductAddition())
        <span>{{ __('Tiền cọc: :money', ['money' => format_price($money_product_addition)]) }} </span>
    @endif
    <div class="text-muted">{{ $history->desc }}</div>
</li>