<x-card>
    <div class="order-note card-body p-2">
        @isset($header)
            {{ $header }}
        @endisset
        @include('jobs.loop.job-simple-content')
        {{ $slot }}
        @isset($footer)
            {{ $footer }}
        @endisset
    </div>
</x-card>