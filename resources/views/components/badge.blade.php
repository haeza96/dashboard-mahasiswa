@props([
    'status' => null,
    'variant' => null,
])

@php
    $key = strtolower(trim((string) ($status ?? $variant ?? 'default')));

    $classes = match ($key) {
        'aktif', 'success' => 'bg-emerald-100 text-emerald-800 border-emerald-200',
        'cuti', 'warning' => 'bg-amber-100 text-amber-800 border-amber-200',
        'nonaktif', 'danger', 'inactive' => 'bg-rose-100 text-rose-800 border-rose-200',
        default => 'bg-gray-100 text-gray-800 border-gray-200',
    };

    $dotColor = match ($key) {
        'aktif', 'success' => 'bg-emerald-500',
        'cuti', 'warning' => 'bg-amber-500',
        'nonaktif', 'danger', 'inactive' => 'bg-rose-500',
        default => 'bg-gray-400',
    };
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium border $classes"]) }}>
    <span class="w-1.5 h-1.5 rounded-full {{ $dotColor }}"></span>
    {{ $status ?? $slot }}
</span>
