<div class="alert alert-light">
    <span>Mã giao dịch: <b class="text-orange">{{ $item->code }}</b></span>
    <div class="d-lg-flex justify-content-between d-sm-block">
        <span class="d-lg-flex d-block">Lọai giao dịch: <b
                class="text-dark">{{  $item->type->description()  }}</b></span>
        <span class="d-lg-flex d-block">Số tiền: <b class="text-dark">{{$item->type->value == 2 ? "-" : ""}}{{ format_price($item->amount) }}</b></span>
        <span class="d-lg-flex d--block">Phí giao dịch: <b
                class="text-dark">-{{ format_price($item->fee) }}</b></span>
    </div>
    <div class="d-flex justify-content-between">
        <span class="d-lg-flex d-block">Thời gian: <b
                class="text-danger">{{ format_datetime($item->created_at) }}</b></span>
        <span class="d-lg-flex d-block">Trạng thái: <b class="text-dark">{{ $item->status->description() }}</b></span>
    </div>
</div>
