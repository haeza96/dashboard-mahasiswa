@props([
    'variant' => 'primary', // primary, secondary, danger, outline
    'type' => 'button',
    'href' => null,
])

@php
    $baseClasses = 'inline-flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium rounded-lg transition-colors duration-150 focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none cursor-pointer';

    $variants = [
        'primary' => 'bg-indigo-600 text-white hover:bg-indigo-700 focus:ring-indigo-500 shadow-sm',
        'secondary' => 'bg-gray-100 text-gray-700 hover:bg-gray-200 border border-gray-300 focus:ring-gray-400',
        'danger' => 'bg-rose-600 text-white hover:bg-rose-700 focus:ring-rose-500 shadow-sm',
        'outline' => 'bg-transparent text-indigo-600 hover:bg-indigo-50 border border-indigo-300 focus:ring-indigo-400',
    ];

    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
