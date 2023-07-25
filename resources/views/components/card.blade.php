<div {{ $attributes->merge(['class' => 'card border-0 '.(isset($class) ? ' ' . $class : '')]) }}>
    @isset($header)
    <div class="card-body rounded-top bg-orange">
        {{ $header }}
    </div>
    @endisset
    <div>
        {{ $slot }}
    </div>
    @isset($footer)
        {{ $footer }}
    @endisset
</div>