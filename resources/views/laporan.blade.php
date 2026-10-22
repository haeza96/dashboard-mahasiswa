@extends('layouts.app')

@section('title', 'Laporan Akademik')

@section('content')
    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm mb-6">
        <h1 class="text-2xl font-bold text-gray-900 tracking-tight">
            Laporan Data Akademik Mahasiswa
        </h1>
        <p class="text-sm text-gray-500 mt-1">
            Menu ini digunakan untuk mencetak dan mengunduh laporan akademik per program studi dan status mahasiswa.
        </p>
    </div>

    <x-panel title="Ekspor Rekapitulasi Data">
        <x-slot:action>
            <x-button variant="primary" onclick="alert('Laporan PDF siap diunduh!')">
                Unduh PDF
            </x-button>
        </x-slot:action>

        <p class="text-sm text-gray-600 mb-4">
            Pilih periode dan format laporan yang diinginkan:
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <x-card padding="p-4" class="text-center">
                <h4 class="font-semibold text-gray-800 text-sm">Rekap Mahasiswa Aktif</h4>
                <p class="text-xs text-gray-500 my-2">Laporan mahasiswa berstatus aktif semester berjalan</p>
                <x-button variant="secondary" class="text-xs w-full">Cetak Rekap</x-button>
            </x-card>

            <x-card padding="p-4" class="text-center">
                <h4 class="font-semibold text-gray-800 text-sm">Rekap Cuti & Nonaktif</h4>
                <p class="text-xs text-gray-500 my-2">Laporan evaluasi mahasiswa non-aktif dan cuti</p>
                <x-button variant="secondary" class="text-xs w-full">Cetak Rekap</x-button>
            </x-card>

            <x-card padding="p-4" class="text-center">
                <h4 class="font-semibold text-gray-800 text-sm">Statistik per Program Studi</h4>
                <p class="text-xs text-gray-500 my-2">Distribusi mahasiswa berdasarkan program studi</p>
                <x-button variant="secondary" class="text-xs w-full">Cetak Rekap</x-button>
            </x-card>
        </div>
    </x-panel>
@endsection
