<div class="d-flex justify-content-center gap-1">
    <x-link class="btn btn-icon btn-warning" :href="route('admin.job.edit', $id)">
        <i class="ti ti-edit"></i>
    </x-link>
    <x-button.modal-delete class="btn-icon" data-route="{{ route('admin.job.delete', $id) }}">
        <i class="ti ti-trash"></i>
    </x-button.modal-delete>
</div>