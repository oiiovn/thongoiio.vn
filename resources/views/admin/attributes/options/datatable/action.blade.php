
<x-button.modal-delete class="btn-icon" data-route="{{ route('admin.attribute.option.delete', [
    'attribute_id' => $attribute_id,
    'id' => $id,
]) }}">
    <i class="ti ti-trash"></i>
</x-button.modal-delete>