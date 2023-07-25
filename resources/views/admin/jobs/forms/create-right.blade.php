<div class="col-12 col-md-3">
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Đăng') }}
        </div>
        <div class="card-body p-2 d-flex justify-content-between">
            <x-button.submit :title="__('Đăng')" />
        </div>
    </div>
    {{-- <div class="card mb-3">
        <div class="card-header">
            {{ __('Số người làm') }}
        </div>
        <div class="card-body p-2">
            <x-input type="number" min="1" name="qty_worker" value="1" :required="true" />
        </div>
    </div> --}}
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Công việc ảo') }}
        </div>
        <div class="card-body p-2">
            <x-input-switch name="is_virtual" value="1" :label="__('Công việc ảo?')"/>
        </div>
    </div>
</div>