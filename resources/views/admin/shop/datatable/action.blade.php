@if(Route::current()->getName() == 'admin.shop.dang-ky')
<x-button.modal-success class="btn-icon btn-success" data-route="{{ route('admin.shop.upgrade', $id) }}">
    <i class="ti ti-check"></i>
</x-button.modal-success>

<x-button.modal-success class="btn-icon btn-danger" data-route="{{ route('admin.shop.reject', $id) }}">
    <i class="ti ti-trash"></i>
</x-button.modal-success>
@endif

@if(Route::current()->getName() == 'admin.shop.index')
    @if($is_reputable == 0)
    <x-button.modal-warning class="btn-icon btn-warning" data-route="{{ route('admin.shop.uy-tin', $id) }}">
        <i class="ti ti-check"></i>
    </x-button.modal-warning>
    @endif

    @if($is_reputable == 1)
    <x-button.modal-success class="btn-icon btn-success" data-route="{{ route('admin.shop.uy-tin', $id) }}">
        <i class="ti ti-check"></i>
    </x-button.modal-success>
    @endif
@endif