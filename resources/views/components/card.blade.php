<div {{ $attributes->merge(['class' => 'card']) }}  {{ $attributes->merge(['style' => ' ']) }}>
    @isset($title)
        <div class="card-header {{ $headerClass ?? '' }}">
            {{ $title }}
        </div>
    @endisset

    <div class="card-body {{ $contentClass ?? '' }}">
        {{ $slot }}
    </div>

    @isset($footer)
        <div class="card-footer {{ $footerClass ?? '' }}">
            {{ $footer }}
        </div>
    @endisset
</div>
