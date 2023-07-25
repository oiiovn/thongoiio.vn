<x-loops.jobs.item :job="$job">
    <x-slot name="header">
        @include('jobs.loop.job-simple-header', ['show_full' => $show_full ?? true])
    </x-slot>
    <x-slot name="footer">
        @include('jobs.loop.job-simple-action', ['only_show' => $only_show ?? false])
    </x-slot>
</x-loops.jobs.item>