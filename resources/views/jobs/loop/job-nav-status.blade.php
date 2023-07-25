<div class="card-body p-0">
    <div class="wrap-control-tab pb-2 pt-3">
        <div class="job-status-nav-tabs d-flex border-b">
            @foreach ($job_status[$type] as $key => $value)
                <div @class([
                        'nav-item', 
                        'position-relative',
                        'active' => $key == $current_status
                    ]) 
                    role="button"
                    data-route="{{ route($route_name, $key) }}">
                    {{ $value['text'] }}
                    @if($value['number'])
                        <span class="job-status-number position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ $value['number'] }}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>