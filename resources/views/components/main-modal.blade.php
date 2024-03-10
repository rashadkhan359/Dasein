@props(['id', 'maxWidth', 'label', 'position', 'scroll'])

@php
    $maxWidth = [
        'sm' => ' modal-sm',
        'md' => '',
        'lg' => ' modal-lg',
        'xl' => ' modal-xl',
    ][$maxWidth ?? 'md'];

    $position = [
        'center' => ' modal-dialog-centered',
    ][$position ?? ''];
    $scroll = [
        'scroll' => ' modal-dialog-scrollable',
        'noscroll' => ' dummy',
    ][$scroll ?? ''];
@endphp
<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $label }}" aria-hidden="true"
    style="background: rgba(0,0,0, 0.4)">
    <div class="modal-dialog{{ $maxWidth }}{{ $position }}{{ $scroll }}">
        <div class="modal-content" style="background:#fff;">
            @if (!empty($header))
                <div class="modal-header" id="{{ $headerID ?? '' }}">
                    <div class="modal-title w-100">
                        {{ $header ?? '' }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            @endif
            <div class="modal-body" style="overflow-x: hidden;">
                {{ $content }}
            </div>
            @if (!empty($footer))
                <div class="modal-footer">
                    {{ $footer ?? '' }}
                </div>
            @endif
        </div>
    </div>
</div>
