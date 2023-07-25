<div class="col-12 col-md-9">
    <div class="card mb-3">
        <div class="card-header justify-content-center">
            <h2 class="mb-0">{{ __('Thêm tin tức') }}</h2>
        </div>
        <div class="row card-body">
            <!-- title -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Tên tin tức') }}:</label>
                    <x-input name="title" :required="true" :placeholder="__('Tên tin tức')" />
                </div>
            </div>

            <!-- nội dung -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Nội dung') }}:</label>
                    <x-textarea name="content" class="ckeditor"></x-textarea>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="">{{ __('Ảnh tư vấn') }}</label>
                    <x-input-image-ckfinder showImage="avatar" name="avatar" />
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12 col-md-3">
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Đăng') }}
        </div>
        <div class="card-body p-2 d-flex justify-content-between">
            <x-button.submit :title="__('Tạo tin tức')" />
        </div>
    </div>
</div>