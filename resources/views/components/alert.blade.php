@props([
    'type' => 'info', // success, warning, info, danger / error
    'title' => null,
    'dismissible' => false,
])

@php
    $type = $type === 'error' ? 'danger' : $type;

    $styles = [
        'success' => [
            'wrapper' => 'bg-emerald-50 border-emerald-200 text-emerald-800',
            'icon' => 'text-emerald-500',
            'title' => 'text-emerald-900',
            'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />',
        ],
        'warning' => [
            'wrapper' => 'bg-amber-50 border-amber-200 text-amber-800',
            'icon' => 'text-amber-500',
            'title' => 'text-amber-900',
            'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />',
        ],
        'info' => [
            'wrapper' => 'bg-blue-50 border-blue-200 text-blue-800',
            'icon' => 'text-blue-500',
            'title' => 'text-blue-900',
            'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />',
        ],
        'danger' => [
            'wrapper' => 'bg-rose-50 border-rose-200 text-rose-800',
            'icon' => 'text-rose-500',
            'title' => 'text-rose-900',
            'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />',
        ],
    ];

    $config = $styles[$type] ?? $styles['info'];
@endphp

<div {{ $attributes->merge(['class' => "flex items-start gap-3 p-4 border rounded-xl text-sm {$config['wrapper']}"]) }} role="alert">
    <div class="shrink-0 mt-0.5">
        <svg class="w-5 h-5 {{ $config['icon'] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            {!! $config['svg'] !!}
        </svg>
    </div>
    <div class="flex-1">
        @if ($title)
            <h5 class="font-semibold mb-1 {{ $config['title'] }}">{{ $title }}</h5>
        @endif
        <div class="leading-relaxed">
            {{ $slot }}
        </div>
    </div>
</div>
