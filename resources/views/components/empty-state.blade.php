@props([
    'title' => 'Tidak Ada Data Mahasiswa',
    'description' => 'Saat ini belum ada data mahasiswa yang tersedia atau data tidak ditemukan.',
])

<div {{ $attributes->merge(['class' => 'flex flex-col items-center justify-center py-12 px-4 text-center']) }}>
    <div class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center mb-4 text-gray-400">
        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
        </svg>
    </div>

    <h4 class="text-base font-semibold text-gray-800 mb-1">
        {{ $title }}
    </h4>

    <p class="text-sm text-gray-500 max-w-sm mb-4">
        {{ $description }}
    </p>

    @if ($slot->isNotEmpty())
        <div>
            {{ $slot }}
        </div>
    @endif
</div>
