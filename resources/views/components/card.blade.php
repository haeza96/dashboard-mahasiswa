@props([
    'padding' => 'p-6',
])

<div {{ $attributes->merge(['class' => "bg-white border border-gray-200 rounded-xl shadow-sm transition hover:shadow-md $padding"]) }}>
    {{ $slot }}
</div>
