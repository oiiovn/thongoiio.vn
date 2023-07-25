<x-input type="hidden" name="route_search_select_shop" :value="route('admin.search.select.user', [
    'roles' => App\Enums\User\UserRoles::Shop->value
])" />
<script>
    $(document).on('change', '#attribute', $.debounce(1000, function (e) {
        var totalPrice = 0;
        $('.select-attribute-option').each(function (i, obj) { 
            totalPrice += $(obj).find('option:selected').data('price');
        });
        $(".total-money").text(formatPrice(totalPrice));
    }))
    $(document).ready(function(e){
        select2LoadData($('input[name="route_search_select_shop"]').val());
    });
</script>