@extends('layouts.app')

@section('title', 'Data Mahasiswa')

@section('content')
    <!-- Sapaan Administrator Menggunakan Sintaks Blade (Langkah 2) -->
    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 tracking-tight">
                Halo, {{ $adminName }}! 👋
            </h1>
            <p class="text-sm text-gray-500 mt-1">
                Selamat datang di halaman manajemen data mahasiswa. Anda dapat melihat, menguji status kondisi, dan mengelola daftar mahasiswa.
            </p>
        </div>

        <div class="flex items-center gap-2">
            <x-button variant="secondary" href="{{ route('mahasiswa.index', ['empty' => $isEmpty ? '0' : '1', 'status_sample' => $ujiStatus]) }}">
                @if ($isEmpty)
                    🔄 Tampilkan Data Normal
                @else
                    🧪 Uji Data Kosong (@@empty)
                @endif
            </x-button>
        </div>
    </div>

    <!-- Alert Status -->
    @if ($isEmpty)
        <x-alert type="warning" title="Mode Uji Data Kosong">
            Saat ini data mahasiswa sengaja dikosongkan untuk menguji tampilan alternatif dari directive <code>@@forelse ... @@empty</code>.
        </x-alert>
    @else
        <x-alert type="info" title="Informasi Data">
            Data mahasiswa berhasil dimuat menggunakan directive Blade Laravel secara efisien.
        </x-alert>
    @endif

    <!-- Langkah 3: Uji Menampilkan Status Mahasiswa Dengan Kondisi Directive if -->
    <x-panel title="Langkah 3: Uji Kondisi Status Mahasiswa (@@if)">
        <div class="space-y-3">
            <p class="text-sm text-gray-600">
                Pemeriksaan status mahasiswa menggunakan directive <code>@@if</code>, <code>@@elseif</code>, dan <code>@@else</code>:
            </p>

            <div class="p-4 bg-gray-50 rounded-lg border border-gray-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <div class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Mahasiswa Uji Coba:</div>
                    <div class="text-base font-bold text-gray-800">{{ $sampleMahasiswa['nama'] }} (NIM: {{ $sampleMahasiswa['nim'] }})</div>
                    <div class="text-xs text-gray-500">Program Studi: {{ $sampleMahasiswa['prodi'] }}</div>
                </div>

                <div class="flex items-center gap-3">
                    <span class="text-sm text-gray-600 font-medium">Hasil Directive:</span>

                    {{-- Implementasi Langkah 3: @if untuk memeriksa status mahasiswa --}}
                    @if ($sampleMahasiswa['status'] === 'Aktif')
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800 border border-emerald-300">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            Aktif
                        </span>
                    @elseif ($sampleMahasiswa['status'] === 'Cuti')
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-800 border border-amber-300">
                            <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                            Cuti
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-rose-100 text-rose-800 border border-rose-300">
                            <span class="w-2 h-2 rounded-full bg-rose-500"></span>
                            Nonaktif
                        </span>
                    @endif
                </div>
            </div>

            <!-- Tombol Pengujian Mengubah Nilai Status (Langkah 3 butir 4) -->
            <div class="flex items-center gap-2 pt-2 text-xs">
                <span class="text-gray-500">Uji ubah status:</span>
                <a href="{{ route('mahasiswa.index', ['status_sample' => 'Aktif', 'empty' => $isEmpty ? '1' : '0']) }}"
                   class="px-2.5 py-1 rounded border {{ $ujiStatus === 'Aktif' ? 'bg-emerald-600 text-white border-emerald-600 font-semibold' : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-100' }}">
                    Set Aktif
                </a>
                <a href="{{ route('mahasiswa.index', ['status_sample' => 'Nonaktif', 'empty' => $isEmpty ? '1' : '0']) }}"
                   class="px-2.5 py-1 rounded border {{ $ujiStatus === 'Nonaktif' ? 'bg-rose-600 text-white border-rose-600 font-semibold' : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-100' }}">
                    Set Nonaktif
                </a>
                <a href="{{ route('mahasiswa.index', ['status_sample' => 'Cuti', 'empty' => $isEmpty ? '1' : '0']) }}"
                   class="px-2.5 py-1 rounded border {{ $ujiStatus === 'Cuti' ? 'bg-amber-600 text-white border-amber-600 font-semibold' : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-100' }}">
                    Set Cuti
                </a>
            </div>
        </div>
    </x-panel>

    <!-- Langkah 4: Menampilkan Daftar Mahasiswa Menggunakan Directive forelse & $loop->iteration -->
    <x-panel title="Daftar Mahasiswa (Directive @@forelse)">
        <x-slot:action>
            <span class="text-xs font-medium text-gray-500">
                Total data: {{ count($mahasiswa) }} mahasiswa
            </span>
        </x-slot:action>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="bg-gray-50 text-xs uppercase font-semibold text-gray-700 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3.5 w-16 text-center">No</th>
                        <th class="px-6 py-3.5">NIM</th>
                        <th class="px-6 py-3.5">Nama Mahasiswa</th>
                        <th class="px-6 py-3.5">Program Studi</th>
                        <th class="px-6 py-3.5 text-center">Status Mahasiswa</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    {{-- Directive forelse untuk menampilkan daftar mahasiswa --}}
                    @forelse ($mahasiswa as $mhs)
                        <tr class="hover:bg-gray-50/80 transition-colors">
                            {{-- Nomor urut otomatis menggunakan $loop->iteration --}}
                            <td class="px-6 py-4 text-center font-medium text-gray-500">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 font-mono font-medium text-gray-900">
                                {{ $mhs['nim'] }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                {{ $mhs['nama'] }}
                            </td>
                            <td class="px-6 py-4 text-gray-700">
                                {{ $mhs['prodi'] }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{-- x-badge component --}}
                                <x-badge :status="$mhs['status']" />
                            </td>
                        </tr>
                    @empty
                        {{-- Tampilan alternatif jika data mahasiswa kosong (Langkah 4 butir 4 & Langkah 21) --}}
                        <tr>
                            <td colspan="5" class="p-0">
                                <x-empty-state
                                    title="Data Mahasiswa Kosong"
                                    description="Tidak ada data mahasiswa yang dapat ditampilkan. Silakan klik tombol 'Tampilkan Data Normal' di atas.">
                                    <x-button variant="primary" href="{{ route('mahasiswa.index', ['empty' => '0']) }}">
                                        Tampilkan Data Mahasiswa
                                    </x-button>
                                </x-empty-state>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-panel>
@endsection
