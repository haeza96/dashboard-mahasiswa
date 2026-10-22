@props([
    'title' => null,
])

<div {{ $attributes->merge(['class' => 'bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden']) }}>
    @if (isset($header) || isset($title) || $title || isset($action) || isset($actions))
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/50 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
                @if (isset($header))
                    {{ $header }}
                @elseif (isset($title) || $title)
                    <h3 class="text-base font-semibold text-gray-900">
                        {{ $title }}
                    </h3>
                @endif
            </div>

            @if (isset($action) || isset($actions))
                <div class="flex items-center gap-2">
                    {{ $action ?? $actions }}
                </div>
            @endif
        </div>
    @endif

    <div class="p-6">
        {{ $slot }}
    </div>

    @if (isset($footer))
        <div class="px-6 py-3 border-t border-gray-100 bg-gray-50 text-sm text-gray-500">
            {{ $footer }}
        </div>
    @endif
</div>
