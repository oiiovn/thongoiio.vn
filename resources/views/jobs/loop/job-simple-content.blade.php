{{-- <p class="fw-bold">{{ $job->name }}</p> --}}
<div class="row mb-3">
    {{-- <div class="col-12 col-md-6 mb-mobi">
        <p class="text-orange btn-yellow-light">{{__('Tiền mua SP:')}} <strong>{{ format_price($job->money_product) }}</strong></p>
    </div> --}}
    <div class="col-12 col-md-12">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center bg-success-light btn-yellow-light">
            <span class="text-success">
                {{__('Tiền công:')}} <strong>+{{ format_price($job->money) }}</strong>
            </span>
            <span class="text-muted fs-12">{{ __('Lưu ý: Tiền công chưa bao gồm phí dịch vụ.') }}</span>
        </div>
    </div>
</div>
<div class="attribute">
    <table class="table table-light">
        <tbody>
            @foreach ($job->details as $detail)
                <tr class="border-white">
                    <th scope="row" class="align-middle">{{ $detail->name_attribute }}</th>
                    <td>@include('admin.jobs.partials.attribute-option-name', [
                        'meta' => $detail->meta,
                        'name_attribute_option' => $detail->name_attribute_option
                    ])</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@if($job->note)
    <div class="border job-note text-muted p-2 mb-3 rounded">
        <p class="text-danger fw-bold">{{ __('Lưu ý từ admin:') }}</p>
        {!! $job->note !!}
    </div>
@endif