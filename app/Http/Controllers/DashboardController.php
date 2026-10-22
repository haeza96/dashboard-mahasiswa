<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Sample data mahasiswa
        $semuaMahasiswa = [
            [
                'nim' => '220101001',
                'nama' => 'Ahmad Fauzi',
                'prodi' => 'Teknik Informatika',
                'status' => 'Aktif',
                'created_at' => '2026-10-20',
            ],
            [
                'nim' => '220101002',
                'nama' => 'Siti Nurhaliza',
                'prodi' => 'Sistem Informasi',
                'status' => 'Aktif',
                'created_at' => '2026-10-21',
            ],
            [
                'nim' => '220101003',
                'nama' => 'Budi Santoso',
                'prodi' => 'Teknologi Informasi',
                'status' => 'Cuti',
                'created_at' => '2026-10-18',
            ],
            [
                'nim' => '220101004',
                'nama' => 'Dewi Lestari',
                'prodi' => 'Teknik Informatika',
                'status' => 'Nonaktif',
                'created_at' => '2026-10-15',
            ],
            [
                'nim' => '220101005',
                'nama' => 'Rian Pratama',
                'prodi' => 'Sains Data',
                'status' => 'Aktif',
                'created_at' => '2026-10-22',
            ],
        ];

        // Memfasilitasi pengujian data kosong (Langkah 21) via parameter ?empty=true
        $isEmpty = $request->boolean('empty');
        $mahasiswaTerbaru = $isEmpty ? [] : $semuaMahasiswa;

        // Data statistik
        $totalMahasiswa = count($semuaMahasiswa);
        $mahasiswaAktif = count(array_filter($semuaMahasiswa, fn($m) => $m['status'] === 'Aktif'));
        $mahasiswaCuti = count(array_filter($semuaMahasiswa, fn($m) => $m['status'] === 'Cuti'));
        $mahasiswaNonaktif = count(array_filter($semuaMahasiswa, fn($m) => $m['status'] === 'Nonaktif'));

        $adminName = 'Administrator Sistem';

        return view('dashboard', [
            'adminName' => $adminName,
            'totalMahasiswa' => $totalMahasiswa,
            'mahasiswaAktif' => $mahasiswaAktif,
            'mahasiswaCuti' => $mahasiswaCuti,
            'mahasiswaNonaktif' => $mahasiswaNonaktif,
            'mahasiswaTerbaru' => $mahasiswaTerbaru,
            'isEmpty' => $isEmpty,
        ]);
    }
}
