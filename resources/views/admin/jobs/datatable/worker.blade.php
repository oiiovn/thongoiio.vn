@if($worker)
    <x-link :href="route('admin.user.edit', $worker['id'])" :title="$worker['fullname'].' - '.$worker['phone']" />
@endif