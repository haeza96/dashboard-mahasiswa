<?php

namespace Tests\Feature;

use Tests\TestCase;

class DashboardMahasiswaTest extends TestCase
{
    /**
     * Test Tugas A: Blade Directives & Halaman Mahasiswa
     */
    public function test_halaman_mahasiswa_menampilkan_sapaan_admin_dan_daftar(): void
    {
        $response = $this->get('/mahasiswa');

        $response->assertStatus(200);
        // Langkah 2: Sapaan Administrator
        $response->assertSee('Administrator Sistem');
        // Langkah 3: Kondisi status (@if)
        $response->assertSee('Aktif');
        // Langkah 4: @forelse dan data mahasiswa
        $response->assertSee('Ahmad Fauzi');
        $response->assertSee('220101001');
        $response->assertSee('Teknik Informatika');
    }

    public function test_halaman_mahasiswa_dapat_menguji_kondisi_status_nonaktif(): void
    {
        $response = $this->get('/mahasiswa?status_sample=Nonaktif');

        $response->assertStatus(200);
        $response->assertSee('Nonaktif');
    }

    public function test_halaman_mahasiswa_menampilkan_empty_state_saat_data_kosong(): void
    {
        $response = $this->get('/mahasiswa?empty=1');

        $response->assertStatus(200);
        // Langkah 4 butir 4: Tampilan alternatif jika data mahasiswa kosong
        $response->assertSee('Data Mahasiswa Kosong');
    }

    /**
     * Test Tugas B, C, D, E, F: Dashboard Utama
     */
    public function test_dashboard_menampilkan_seluruh_komponen_dan_data_statistik(): void
    {
        $response = $this->get('/dashboard');

        $response->assertStatus(200);

        // Langkah 2 & 18: Sapaan Administrator
        $response->assertSee('Selamat Datang, Administrator Sistem!');

        // Langkah 18 & 19: Kartu Statistik (Minimal 3 kartu)
        $response->assertSee('Total Mahasiswa');
        $response->assertSee('Mahasiswa Aktif');
        $response->assertSee('Mahasiswa Cuti');
        $response->assertSee('Mahasiswa Nonaktif');

        // Langkah 8, 9, 10: Navbar & Sidebar
        $response->assertSee('SIAKAD');
        $response->assertSee('Dashboard');
        $response->assertSee('Data Mahasiswa');
        $response->assertSee('Laporan');

        // Langkah 13: Alert
        $response->assertSee('Data Berhasil Dimuat');

        // Langkah 16 & 17: Panel dengan Slot (Default slot & Named slot)
        $response->assertSee('Informasi &amp; Petunjuk Akademik', false);
        $response->assertSee('Aksi Cepat &amp; Ekspor Data', false);
        $response->assertSee('Sinkron Data');

        // Langkah 20: Tabel Mahasiswa Terbaru
        $response->assertSee('Daftar Mahasiswa Terbaru');
        $response->assertSee('Ahmad Fauzi');
    }

    public function test_dashboard_menampilkan_empty_state_saat_kosong(): void
    {
        $response = $this->get('/dashboard?empty=1');

        $response->assertStatus(200);
        // Langkah 21: Komponen x-empty-state
        $response->assertSee('Belum Ada Mahasiswa Terbaru');
    }

    public function test_halaman_laporan_dapat_diakses(): void
    {
        $response = $this->get('/laporan');

        $response->assertStatus(200);
        $response->assertSee('Laporan Data Akademik Mahasiswa');
    }
}
