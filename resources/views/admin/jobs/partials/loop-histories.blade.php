<li class="step-item">
    <div class="m-0 d-flex justify-content-between flex-nowrap gap-3">
        <span>{{ $history->status->description() }}</span>
        <span class="text-muted"><small>{{ format_datetime($history->created_at) }}</small></span>    
    </div>
    <div class="text-muted">{{ $history->desc }}</div>
</li>