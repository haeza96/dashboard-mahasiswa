@extends('layouts.app')

{{-- Langkah 6: Tentukan judul halaman --}}
@section('title', 'Dashboard')

{{-- Langkah 6: Masukkan konten dashboard ke bagian konten layout --}}
@section('content')
    <!-- Sapaan Administrator Menggunakan Sintaks Blade (Langkah 2) -->
    <div class="bg-gradient-to-r from-indigo-600 to-indigo-800 rounded-2xl p-6 sm:p-8 text-white shadow-md relative overflow-hidden">
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-white/20 text-white backdrop-blur-sm mb-2">
                    Sistem Akademik Terpadu
                </span>
                <h1 class="text-2xl sm:text-3xl font-bold tracking-tight">
                    Selamat Datang, {{ $adminName }}! 👋
                </h1>
                <p class="text-indigo-100 text-sm sm:text-base mt-1 max-w-2xl">
                    Berikut adalah ringkasan data statistik dan perkembangan mahasiswa terkini di kampus.
                </p>
            </div>

            <!-- Tombol Aksi Pengujian Empty State -->
            <div class="flex items-center gap-2">
                <x-button
                    variant="secondary"
                    class="bg-white/10 hover:bg-white/20 text-white border-white/20 shadow-none backdrop-blur-sm"
                    href="{{ route('dashboard', ['empty' => $isEmpty ? '0' : '1']) }}">
                    @if ($isEmpty)
                        🔄 Tampilkan Data Normal
                    @else
                        🧪 Uji Empty State (@@empty)
                    @endif
                </x-button>
            </div>
        </div>

        <!-- Background Ornament -->
        <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-white/5 rounded-full blur-2xl pointer-events-none"></div>
    </div>

    <!-- Langkah 13: Menggunakan Komponen Alert (x-alert) -->
    @if ($isEmpty)
        <x-alert type="warning" title="Mode Pengujian Empty State Aktif">
            Tabel mahasiswa saat ini sedang menampilkan kondisi kosong (empty state) untuk memverifikasi komponen <code>x-empty-state</code> dan directive <code>@@forelse ... @@empty</code>.
        </x-alert>
    @else
        <x-alert type="success" title="Data Berhasil Dimuat">
            Seluruh data statistik mahasiswa dan aktivitas akademik berhasil disinkronkan dengan sistem.
        </x-alert>
    @endif

    <!-- Langkah 19: Membuat Kartu Statistik Menggunakan Komponen x-card (Minimal 3 Kartu) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Kartu 1: Total Mahasiswa -->
        <x-card class="relative overflow-hidden group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Total Mahasiswa</p>
                    <h3 class="text-3xl font-bold text-gray-900 mt-1">{{ $totalMahasiswa }}</h3>
                    <p class="text-xs text-gray-500 mt-2 flex items-center gap-1">
                        <span class="text-emerald-600 font-semibold">100%</span> dari total terdaftar
                    </p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 right-0 h-1 bg-indigo-600"></div>
        </x-card>

        <!-- Kartu 2: Mahasiswa Aktif -->
        <x-card class="relative overflow-hidden group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Mahasiswa Aktif</p>
                    <h3 class="text-3xl font-bold text-emerald-600 mt-1">{{ $mahasiswaAktif }}</h3>
                    <p class="text-xs text-gray-500 mt-2 flex items-center gap-1">
                        <span class="text-emerald-600 font-semibold">
                            {{ $totalMahasiswa > 0 ? round(($mahasiswaAktif / $totalMahasiswa) * 100) : 0 }}%
                        </span> aktif mengikuti perkuliahan
                    </p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 right-0 h-1 bg-emerald-500"></div>
        </x-card>

        <!-- Kartu 3: Mahasiswa Cuti -->
        <x-card class="relative overflow-hidden group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Mahasiswa Cuti</p>
                    <h3 class="text-3xl font-bold text-amber-600 mt-1">{{ $mahasiswaCuti }}</h3>
                    <p class="text-xs text-gray-500 mt-2 flex items-center gap-1">
                        <span class="text-amber-600 font-semibold">
                            {{ $totalMahasiswa > 0 ? round(($mahasiswaCuti / $totalMahasiswa) * 100) : 0 }}%
                        </span> izin semester ini
                    </p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 right-0 h-1 bg-amber-500"></div>
        </x-card>

        <!-- Kartu 4: Mahasiswa Nonaktif -->
        <x-card class="relative overflow-hidden group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Mahasiswa Nonaktif</p>
                    <h3 class="text-3xl font-bold text-rose-600 mt-1">{{ $mahasiswaNonaktif }}</h3>
                    <p class="text-xs text-gray-500 mt-2 flex items-center gap-1">
                        <span class="text-rose-600 font-semibold">
                            {{ $totalMahasiswa > 0 ? round(($mahasiswaNonaktif / $totalMahasiswa) * 100) : 0 }}%
                        </span> belum registrasi / DO
                    </p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                    </svg>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 right-0 h-1 bg-rose-500"></div>
        </x-card>
    </div>

    <!-- Langkah 16 & 17: Menguji Komponen Panel dengan Slot (Default Slot & Named Slot) -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Panel Pertama: Dengan Judul dan Deskripsi (Langkah 17 butir 2) -->
        <x-panel title="Informasi & Petunjuk Akademik">
            <div class="space-y-3">
                <p class="text-sm text-gray-600 leading-relaxed">
                    Panel ini menggunakan <strong>komponen <code>x-panel</code></strong> dengan <em>named slot judul</em> dan <em>default slot</em> untuk menampilkan konten deskripsi dan instruksi berikut:
                </p>
                <div class="p-3.5 bg-indigo-50/70 border border-indigo-100 rounded-lg text-xs text-indigo-900 space-y-1">
                    <div class="font-semibold text-indigo-950 flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Ketentuan Semester Ganjil 2026/2027:
                    </div>
                    <ul class="list-disc list-inside space-y-0.5 text-indigo-800">
                        <li>Batas akhir pengisian KRS adalah 31 Oktober 2026.</li>
                        <li>Pengajuan cuti akademik wajib disetujui Dosen Pembimbing Akademik.</li>
                    </ul>
                </div>
            </div>
        </x-panel>

        <!-- Panel Kedua: Dengan Judul dan Tombol Aksi (Langkah 17 butir 3) -->
        <x-panel title="Aksi Cepat & Ekspor Data">
            {{-- Named slot untuk tombol aksi (Langkah 16 butir 5 & Langkah 17 butir 3) --}}
            <x-slot:action>
                <x-button variant="primary" class="text-xs py-1.5 px-3" onclick="alert('Fitur sinkronisasi data berhasil dijalankan!')">
                    <svg class="w-3.5 h-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Sinkron Data
                </x-button>
            </x-slot:action>

            <div class="space-y-3">
                <p class="text-sm text-gray-600 leading-relaxed">
                    Panel ini mendemonstrasikan named slot <code>actions</code> yang menampung tombol aksi serta tautan langsung ke modul lain:
                </p>
                <div class="flex flex-wrap items-center gap-2 pt-1">
                    <x-button variant="secondary" href="{{ route('mahasiswa.index') }}">
                        Lihat Semua Mahasiswa &rarr;
                    </x-button>
                    <x-button variant="outline" href="{{ route('laporan.index') }}">
                        Buka Laporan
                    </x-button>
                </div>
            </div>
        </x-panel>
    </div>

    <!-- Langkah 20 & 21: Tabel Mahasiswa Terbaru dengan x-badge & Empty State -->
    <x-panel title="Daftar Mahasiswa Terbaru">
        <x-slot:action>
            <x-button variant="secondary" class="text-xs py-1.5 px-3" href="{{ route('mahasiswa.index') }}">
                Kelola Data Mahasiswa
            </x-button>
        </x-slot:action>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="bg-gray-50 text-xs uppercase font-semibold text-gray-700 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3.5 w-16 text-center">No</th>
                        <th class="px-6 py-3.5">NIM</th>
                        <th class="px-6 py-3.5">Nama Mahasiswa</th>
                        <th class="px-6 py-3.5">Program Studi</th>
                        <th class="px-6 py-3.5 text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    {{-- Langkah 20: Gunakan forelse untuk menampilkan data --}}
                    @forelse ($mahasiswaTerbaru as $mhs)
                        <tr class="hover:bg-gray-50/80 transition-colors">
                            {{-- Langkah 20: Gunakan $loop->iteration untuk nomor urut --}}
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
                                {{-- Langkah 20: Gunakan x-badge untuk kolom status --}}
                                <x-badge :status="$mhs['status']" />
                            </td>
                        </tr>
                    @empty
                        {{-- Langkah 21: Gunakan komponen x-empty-state saat data kosong --}}
                        <tr>
                            <td colspan="5" class="p-0">
                                <x-empty-state
                                    title="Belum Ada Mahasiswa Terbaru"
                                    description="Daftar mahasiswa saat ini kosong. Anda dapat menonaktifkan mode empty state untuk melihat kembali data.">
                                    <x-button variant="primary" href="{{ route('dashboard', ['empty' => '0']) }}">
                                        Tampilkan Data Kembali
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
