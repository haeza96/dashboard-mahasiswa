<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $adminName = 'Administrator Sistem';

        $semuaMahasiswa = [
            [
                'nim' => '220101001',
                'nama' => 'Ahmad Fauzi',
                'prodi' => 'Teknik Informatika',
                'status' => 'Aktif',
            ],
            [
                'nim' => '220101002',
                'nama' => 'Siti Nurhaliza',
                'prodi' => 'Sistem Informasi',
                'status' => 'Aktif',
            ],
            [
                'nim' => '220101003',
                'nama' => 'Budi Santoso',
                'prodi' => 'Teknologi Informasi',
                'status' => 'Cuti',
            ],
            [
                'nim' => '220101004',
                'nama' => 'Dewi Lestari',
                'prodi' => 'Teknik Informatika',
                'status' => 'Nonaktif',
            ],
            [
                'nim' => '220101005',
                'nama' => 'Rian Pratama',
                'prodi' => 'Sains Data',
                'status' => 'Aktif',
            ],
        ];

        
        $ujiStatus = $request->query('status_sample', 'Aktif');
        $sampleMahasiswa = [
            'nim' => '220101999',
            'nama' => 'Mahasiswa Uji Status',
            'prodi' => 'Teknik Informatika',
            'status' => $ujiStatus,
        ];

        $isEmpty = $request->boolean('empty');
        $mahasiswa = $isEmpty ? [] : $semuaMahasiswa;

        return view('mahasiswa.index', [
            'adminName' => $adminName,
            'mahasiswa' => $mahasiswa,
            'sampleMahasiswa' => $sampleMahasiswa,
            'isEmpty' => $isEmpty,
            'ujiStatus' => $ujiStatus,
        ]);
    }
}
