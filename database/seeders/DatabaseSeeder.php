<?php

namespace Database\Seeders;

use App\Models\Anggotapimda;
use App\Models\Aspeknilailkpts;
use App\Models\Aspeknilaiukt;
use App\Models\Cabanglatihan;
use App\Models\Jeniskategori;
use App\Models\Jeniskegiatan;
use App\Models\Jenistingkatan;
use App\Models\Kategoricabanglatihan;
use App\Models\Kategoriukt;
use App\Models\Kegiatansiswa;
use App\Models\Seluruhpeserta;
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

        Anggotapimda::create([
            'cabanglatihan_id' => 1,
            'nikd' => '1234567890',
            'nama' => 'John Doe',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '1990-01-15',
            'jenis_kelamin' => 'Laki-Laki',
            'alamat' => 'Jl. Merpati No. 10, Jakarta',
            'email' => 'john.doe@example.com',
            'no_telp' => '081234567890',
            'tingkatan' => 'Siswa Dasar',
            'tahun_masuk' => '2025'
        ]);
        Anggotapimda::create([
            'cabanglatihan_id' => 2,
            'nikd' => '2345678901',
            'nama' => 'Jane Smith',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '1992-05-20',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Jl. Anggrek No. 5, Bandung',
            'email' => 'jane.smith@example.com',
            'no_telp' => '082345678901',
            'tingkatan' => 'Siswa 1',
            'tahun_masuk' => '2025'
        ]);
        Anggotapimda::create([
            'cabanglatihan_id' => 3,
            'nikd' => '3456789012',
            'nama' => 'Alice Johnson',
            'tempat_lahir' => 'Surabaya',
            'tanggal_lahir' => '1985-07-12',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Jl. Melati No. 3, Surabaya',
            'email' => 'alice.johnson@example.com',
            'no_telp' => '083456789012',
            'tingkatan' => 'Siswa 2',
            'tahun_masuk' => '2025'
        ]);
        Anggotapimda::create([
            'cabanglatihan_id' => 4,
            'nikd' => '4567890123',
            'nama' => 'Bob Brown',
            'tempat_lahir' => 'Yogyakarta',
            'tanggal_lahir' => '1995-03-30',
            'jenis_kelamin' => 'Laki-Laki',
            'alamat' => 'Jl. Kenanga No. 8, Yogyakarta',
            'email' => 'bob.brown@example.com',
            'no_telp' => '084567890123',
            'tingkatan' => 'Siswa 3',
            'tahun_masuk' => '2025'
        ]);
        Anggotapimda::create([
            'cabanglatihan_id' => 5,
            'nikd' => '5678901234',
            'nama' => 'Charlie Green',
            'tempat_lahir' => 'Medan',
            'tanggal_lahir' => '1988-09-25',
            'jenis_kelamin' => 'Laki-Laki',
            'alamat' => 'Jl. Mawar No. 7, Medan',
            'email' => 'charlie.green@example.com',
            'no_telp' => '085678901234',
            'tingkatan' => 'Siswa 4',
            'tahun_masuk' => '2025'
        ]);
        Anggotapimda::create([
            'cabanglatihan_id' => 6,
            'nikd' => '6789012345',
            'nama' => 'Diana White',
            'tempat_lahir' => 'Malang',
            'tanggal_lahir' => '1993-12-18',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Jl. Cempaka No. 9, Malang',
            'email' => 'diana.white@example.com',
            'no_telp' => '086789012345',
            'tingkatan' => 'Kader Dasar',
            'tahun_masuk' => '2025'
        ]);
        Anggotapimda::create([
            'cabanglatihan_id' => 7,
            'nikd' => '7890123456',
            'nama' => 'Evan Black',
            'tempat_lahir' => 'Makassar',
            'tanggal_lahir' => '1997-11-10',
            'jenis_kelamin' => 'Laki-Laki',
            'alamat' => 'Jl. Dahlia No. 4, Makassar',
            'email' => 'evan.black@example.com',
            'no_telp' => '087890123456',
            'tingkatan' => 'Kader Muda',
            'tahun_masuk' => '2025'
        ]);
        Anggotapimda::create([
            'cabanglatihan_id' => 8,
            'nikd' => '8901234567',
            'nama' => 'Fiona Blue',
            'tempat_lahir' => 'Semarang',
            'tanggal_lahir' => '1991-02-22',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Jl. Sakura No. 2, Semarang',
            'email' => 'fiona.blue@example.com',
            'no_telp' => '088901234567',
            'tingkatan' => 'Kader Madya',
            'tahun_masuk' => '2025'
        ]);
        Anggotapimda::create([
            'cabanglatihan_id' => 9,
            'nikd' => '9012345678',
            'nama' => 'George Silver',
            'tempat_lahir' => 'Palembang',
            'tanggal_lahir' => '1987-06-15',
            'jenis_kelamin' => 'Laki-Laki',
            'alamat' => 'Jl. Tulip No. 6, Palembang',
            'email' => 'george.silver@example.com',
            'no_telp' => '089012345678',
            'tingkatan' => 'Kader Kepala',
            'tahun_masuk' => '2025'
        ]);
        Anggotapimda::create([
            'cabanglatihan_id' => 10,
            'nikd' => '0123456789',
            'nama' => 'Hannah Gold',
            'tempat_lahir' => 'Bali',
            'tanggal_lahir' => '1994-04-10',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Jl. Pahlawan No. 1, Bali',
            'email' => 'hannah.gold@example.com',
            'no_telp' => '081234567899',
            'tingkatan' => 'Pendekar Kepala',
            'tahun_masuk' => '2025'
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
            'pelatih_id' => 1,
            'kode' => 'CLT01',
            'kategori' => 'AUM - SD/MIM',
            'nama_cabang' => 'Cabang 1',
            'alamat' => 'Pekanbaru Jl.1',
        ]);
        Cabanglatihan::create([
            'pelatih_id' => 2,
            'kode' => 'CLT02',
            'kategori' => 'AUM - SMP',
            'nama_cabang' => 'Cabang 2',
            'alamat' => 'Pekanbaru Jl.2',
        ]);
        Cabanglatihan::create([
            'pelatih_id' => 3,
            'kode' => 'CLT03',
            'kategori' => 'AUM - SMA/SMK/MAM',
            'nama_cabang' => 'Cabang 3',
            'alamat' => 'Pekanbaru Jl.3',
        ]);
        Cabanglatihan::create([
            'pelatih_id' => 4,
            'kode' => 'CLT04',
            'kategori' => 'AUM - PTM/PTMA',
            'nama_cabang' => 'Cabang 4',
            'alamat' => 'Pekanbaru Jl.4',
        ]);
        Cabanglatihan::create([
            'pelatih_id' => 5,
            'kode' => 'CLT05',
            'kategori' => 'AUM - Ponpes',
            'nama_cabang' => 'Cabang 5',
            'alamat' => 'Pekanbaru Jl.5',
        ]);
        Cabanglatihan::create([
            'pelatih_id' => 6,
            'kode' => 'CLT06',
            'kategori' => 'Umum - SD/MI',
            'nama_cabang' => 'Cabang 6',
            'alamat' => 'Pekanbaru Jl.6',
        ]);
        Cabanglatihan::create([
            'pelatih_id' => 7,
            'kode' => 'CLT07',
            'kategori' => 'Umum - SMP',
            'nama_cabang' => 'Cabang 7',
            'alamat' => 'Pekanbaru Jl.7',
        ]);
        Cabanglatihan::create([
            'pelatih_id' => 8,
            'kode' => 'CLT08',
            'kategori' => 'Umum - SMA/SMK/MA',
            'nama_cabang' => 'Cabang 8',
            'alamat' => 'Pekanbaru Jl.8',
        ]);
        Cabanglatihan::create([
            'pelatih_id' => 9,
            'kode' => 'CLT09',
            'kategori' => 'Umum - PTN/PTS',
            'nama_cabang' => 'Cabang 9',
            'alamat' => 'Pekanbaru Jl.9',
        ]);
        Cabanglatihan::create([
            'pelatih_id' => 10,
            'kode' => 'CLT010',
            'kategori' => 'Umum - Ponpes',
            'nama_cabang' => 'Cabang 10',
            'alamat' => 'Pekanbaru Jl.10',
        ]);
        Cabanglatihan::create([
            'pelatih_id' => 5,
            'kode' => 'CLT011',
            'kategori' => 'Umum - Perkantoran',
            'nama_cabang' => 'Cabang 11',
            'alamat' => 'Pekanbaru Jl.11',
        ]);
        Cabanglatihan::create([
            'pelatih_id' => 7,
            'kode' => 'CLT012',
            'kategori' => 'Umum - Perumahan',
            'nama_cabang' => 'Cabang 12',
            'alamat' => 'Pekanbaru Jl.12',
        ]);

        User::create([
            'username' => 'admin pimda',
            'email' => 'adminpimda@gmail.com',
            'password' => 123,
            'cabanglatihan_id' => 1,
            'role' => 'adminpimda',
            'status' => true
        ]);

        User::create([
            'username' => 'admin cabang',
            'email' => 'admincabang@gmail.com',
            'password' => 123,
            'cabanglatihan_id' => 1,
            'role' => 'admincabang',
            'status' => true
        ]);

        Jeniskegiatan::create([
            'nama' => 'Selekda'
        ]);
        Jeniskegiatan::create([
            'nama' => 'UKT Siswa'
        ]);
        Jeniskegiatan::create([
            'nama' => 'LKPTS'
        ]);
        Jeniskegiatan::create([
            'nama' => 'Job Training'
        ]);
        Jeniskegiatan::create([
            'nama' => 'Musyawarah Daerah'
        ]);
        Jeniskegiatan::create([
            'nama' => 'Lainnya'
        ]);

        Kategoriukt::create([
            'nama' => 'Siswa Dasar Ke 1',
            'kegiatan_id' => 1
        ]);
        Kategoriukt::create([
            'nama' => 'Siswa 1 Ke 2',
        ]);
        Kategoriukt::create([
            'nama' => 'Siswa 2 Ke 3',
        ]);
        Kategoriukt::create([
            'nama' => 'Siswa 3 Ke 4',
        ]);
        Kategoriukt::create([
            'nama' => 'Siswa 4 Ke Kader Dasar',
        ]);

        Aspeknilaiukt::create([
            'nama' => 'AIK',
            'kegiatan_id' => 1
        ]);
        Aspeknilaiukt::create([
            'nama' => 'Ilmu Pencak Silat',
            'kegiatan_id' => 1
        ]);
        Aspeknilaiukt::create([
            'nama' => 'Pengalaman Organisasi',
            'kegiatan_id' => 1
        ]);
        Aspeknilaiukt::create([
            'nama' => 'Pembinaan Fisik dan Mental',
            'kegiatan_id' => 1
        ]);
        Aspeknilaiukt::create([
            'nama' => 'Kesehatan Olahraga',
            'kegiatan_id' => 1
        ]);

        Aspeknilailkpts::create([
            'nama' => 'Tradisi Tapak Suci',
            'kegiatan_id' => 2
        ]);
        Aspeknilailkpts::create([
            'nama' => 'Massage Kesehatan',
            'kegiatan_id' => 2
        ]);
        Aspeknilailkpts::create([
            'nama' => 'Ragawi',
            'kegiatan_id' => 2
        ]);
        Aspeknilailkpts::create([
            'nama' => 'Kepemimpinan dan Keorganisasian',
            'kegiatan_id' => 2
        ]);
        Aspeknilailkpts::create([
            'nama' => 'Metodologi Kepelatihan',
            'kegiatan_id' => 2
        ]);
        Aspeknilailkpts::create([
            'nama' => 'AIK',
            'kegiatan_id' => 2
        ]);
        Aspeknilailkpts::create([
            'nama' => 'Peraturan Pertandingan dan Perwasitan',
            'kegiatan_id' => 2
        ]);
        Aspeknilailkpts::create([
            'nama' => 'Kosegu',
            'kegiatan_id' => 2
        ]);
        Aspeknilailkpts::create([
            'nama' => 'Fisik dan Mental',
            'kegiatan_id' => 2
        ]);
        Aspeknilailkpts::create([
            'nama' => 'Karya Tulis / Nyata',
            'kegiatan_id' => 2
        ]);
    }
}
