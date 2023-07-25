<x-input type="hidden" name="route_get_users" :value="route('admin.search.select.user')" />
<script>
    $(document).ready(function(e) {
        select2LoadData($('input[name="route_get_users"]').val());
    });
</script>
sád