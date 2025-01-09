<?php

namespace Database\Seeders;

use App\Models\Anggotapimda;
use App\Models\Cabanglatihan;
use App\Models\Jeniskategori;
use App\Models\Jenistingkatan;
use App\Models\Kategoricabanglatihan;
use App\Models\Tingkatan;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
       Jeniskategori::create([
        'nama_kategori' => 'Siswa'
       ]);
       Jeniskategori::create([
        'nama_kategori' => 'Kader'
       ]);
       Jeniskategori::create([
        'nama_kategori' => 'Pendekar'
       ]);

       Jenistingkatan::create([
        'nama_tingkatan' => 'Siswa Dasar'
       ]);
       Jenistingkatan::create([
        'nama_tingkatan' => 'Siswa 1'
       ]);
       Jenistingkatan::create([
        'nama_tingkatan' => 'Siswa 2'
       ]);
       Jenistingkatan::create([
        'nama_tingkatan' => 'Siswa 3'
       ]);
       Jenistingkatan::create([
        'nama_tingkatan' => 'Siswa 4'
       ]);

        Jenistingkatan::create([
        'nama_tingkatan' => 'Kader Dasar'
       ]);
        Jenistingkatan::create([
        'nama_tingkatan' => 'Kader Muda'
       ]);
        Jenistingkatan::create([
        'nama_tingkatan' => 'Kader Madya'
       ]);
        Jenistingkatan::create([
        'nama_tingkatan' => 'Kader Kepala'
       ]);
        Jenistingkatan::create([
        'nama_tingkatan' => 'Kader Utama'
       ]);

        Jenistingkatan::create([
        'nama_tingkatan' => 'Pendekar Muda'
       ]);
        Jenistingkatan::create([
        'nama_tingkatan' => 'Pendekar Madya'
       ]);
        Jenistingkatan::create([
        'nama_tingkatan' => 'Pendekar Kepala'
       ]);
        Jenistingkatan::create([
        'nama_tingkatan' => 'Pendekar Utama'
       ]);
        Jenistingkatan::create([
        'nama_tingkatan' => 'Pendekar Besar'
       ]);

       Kategoricabanglatihan::create([
        'nama_kategoricabang' => 'AUM - SD/MIM'
       ]);
       Kategoricabanglatihan::create([
        'nama_kategoricabang' => 'AUM - SMP'
       ]);
       Kategoricabanglatihan::create([
        'nama_kategoricabang' => 'AUM - SMA/SMK/MAM'
       ]);
       Kategoricabanglatihan::create([
        'nama_kategoricabang' => 'AUM - PTM/PTMA'
       ]);
       Kategoricabanglatihan::create([
        'nama_kategoricabang' => 'AUM - Ponpes'
       ]);
       Kategoricabanglatihan::create([
        'nama_kategoricabang' => 'Umum - SD/MI'
       ]);
       Kategoricabanglatihan::create([
        'nama_kategoricabang' => 'Umum - SMP'
       ]);
       Kategoricabanglatihan::create([
        'nama_kategoricabang' => 'Umum - SMA/SMK/MA'
       ]);
       Kategoricabanglatihan::create([
        'nama_kategoricabang' => 'Umum - PTN/PTS'
       ]);
       Kategoricabanglatihan::create([
        'nama_kategoricabang' => 'Umum - Ponpes'
       ]);
       Kategoricabanglatihan::create([
        'nama_kategoricabang' => 'Umum - Perkantoran'
       ]);
       Kategoricabanglatihan::create([
        'nama_kategoricabang' => 'Umum - Perumahan'
       ]);

       Tingkatan::create([
        'kode' => 'TKN01',
        'kategori' => 'Siswa',
        'tingkatan' => 'Siswa Dasar'
       ]);
       Tingkatan::create([
        'kode' => 'TKN02',
        'kategori' => 'Siswa',
        'tingkatan' => 'Siswa 1'
       ]);
       Tingkatan::create([
        'kode' => 'TKN03',
        'kategori' => 'Siswa',
        'tingkatan' => 'Siswa 2'
       ]);
       Tingkatan::create([
        'kode' => 'TKN04',
        'kategori' => 'Siswa',
        'tingkatan' => 'Siswa 3'
       ]);
       Tingkatan::create([
        'kode' => 'TKN05',
        'kategori' => 'Siswa',
        'tingkatan' => 'Siswa 4'
       ]);

       Tingkatan::create([
        'kode' => 'TKN06',
        'kategori' => 'Kader',
        'tingkatan' => 'Kader Dasar'
       ]);
       Tingkatan::create([
        'kode' => 'TKN07',
        'kategori' => 'Kader',
        'tingkatan' => 'Kader Muda'
       ]);
       Tingkatan::create([
        'kode' => 'TKN08',
        'kategori' => 'Kader',
        'tingkatan' => 'Kader Madya'
       ]);
       Tingkatan::create([
        'kode' => 'TKN09',
        'kategori' => 'Kader',
        'tingkatan' => 'Kader Kepala'
       ]);
       Tingkatan::create([
        'kode' => 'TKN010',
        'kategori' => 'Kader',
        'tingkatan' => 'Kader Utama'
       ]);

       Tingkatan::create([
        'kode' => 'TKN011',
        'kategori' => 'Pendekar',
        'tingkatan' => 'Pendekar Muda'
       ]);
       Tingkatan::create([
        'kode' => 'TKN012',
        'kategori' => 'Pendekar',
        'tingkatan' => 'Pendekar Madya'
       ]);
       Tingkatan::create([
        'kode' => 'TKN013',
        'kategori' => 'Pendekar',
        'tingkatan' => 'Pendekar Kepala'
       ]);
       Tingkatan::create([
        'kode' => 'TKN014',
        'kategori' => 'Pendekar',
        'tingkatan' => 'Pendekar Utama'
       ]);
       Tingkatan::create([
        'kode' => 'TKN015',
        'kategori' => 'Pendekar',
        'tingkatan' => 'Pendekar Besar'
       ]);

       Cabanglatihan::create([
        'kode' => 'CLT01',
        'kategori' => 'AUM - SD/MIM',
        'nama_cabang' => 'Cabang 1',
        'alamat' => 'Pekanbaru Jl.1',
        'pelatih' => 'Pelatih 1'
       ]);       
       Cabanglatihan::create([
        'kode' => 'CLT02',
        'kategori' => 'AUM - SMP',
        'nama_cabang' => 'Cabang 2',
        'alamat' => 'Pekanbaru Jl.2',
        'pelatih' => 'Pelatih 2'
       ]);       
       Cabanglatihan::create([
        'kode' => 'CLT03',
        'kategori' => 'AUM - SMA/SMK/MAM',
        'nama_cabang' => 'Cabang 3',
        'alamat' => 'Pekanbaru Jl.3',
        'pelatih' => 'Pelatih 3'
       ]);      
       Cabanglatihan::create([
        'kode' => 'CLT04',
        'kategori' => 'AUM - PTM/PTMA',
        'nama_cabang' => 'Cabang 4',
        'alamat' => 'Pekanbaru Jl.4',
        'pelatih' => 'Pelatih 4'
       ]);       
       Cabanglatihan::create([
        'kode' => 'CLT05',
        'kategori' => 'AUM - Ponpes',
        'nama_cabang' => 'Cabang 5',
        'alamat' => 'Pekanbaru Jl.5',
        'pelatih' => 'Pelatih 5'
       ]);       
       Cabanglatihan::create([
        'kode' => 'CLT06',
        'kategori' => 'Umum - SD/MI',
        'nama_cabang' => 'Cabang 6',
        'alamat' => 'Pekanbaru Jl.6',
        'pelatih' => 'Pelatih 6'
       ]);       
       Cabanglatihan::create([
        'kode' => 'CLT07',
        'kategori' => 'Umum - SMP',
        'nama_cabang' => 'Cabang 7',
        'alamat' => 'Pekanbaru Jl.7',
        'pelatih' => 'Pelatih 7'
       ]);       
       Cabanglatihan::create([
        'kode' => 'CLT08',
        'kategori' => 'Umum - SMA/SMK/MA',
        'nama_cabang' => 'Cabang 8',
        'alamat' => 'Pekanbaru Jl.8',
        'pelatih' => 'Pelatih 8'
       ]);      
       Cabanglatihan::create([
        'kode' => 'CLT09',
        'kategori' => 'Umum - PTN/PTS',
        'nama_cabang' => 'Cabang 9',
        'alamat' => 'Pekanbaru Jl.9',
        'pelatih' => 'Pelatih 9'
       ]);      
       Cabanglatihan::create([
        'kode' => 'CLT010',
        'kategori' => 'Umum - Ponpes',
        'nama_cabang' => 'Cabang 10',
        'alamat' => 'Pekanbaru Jl.10',
        'pelatih' => 'Pelatih 10'
       ]);       
       Cabanglatihan::create([
        'kode' => 'CLT011',
        'kategori' => 'Umum - Perkantoran',
        'nama_cabang' => 'Cabang 11',
        'alamat' => 'Pekanbaru Jl.11',
        'pelatih' => 'Pelatih 11'
       ]);      
       Cabanglatihan::create([
        'kode' => 'CLT012',
        'kategori' => 'Umum - Perumahan',
        'nama_cabang' => 'Cabang 12',
        'alamat' => 'Pekanbaru Jl.12',
        'pelatih' => 'Pelatih 12'
       ]);
       
       User::create([
        'username' => 'admin pimda',
        'email' => 'adminpimda@gmail.com',
        'password' => 123,
        'role' => 'adminpimda'
       ]);

       User::create([
        'username' => 'admin cabang',
        'email' => 'admincabang@gmail.com',
        'password' => 123,
        'role' => 'admincabang'
       ]);
    }
}