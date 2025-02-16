<?php

namespace App\Http\Controllers;

use App\Models\Anggotapimda;
use App\Models\Aspeknilailkpts;
use App\Models\Aspeknilaiukt;
use App\Models\Cabanglatihan;
use App\Models\Jeniskategori;
use App\Models\Jeniskegiatan;
use App\Models\Jenistingkatan;
use App\Models\Kategoricabanglatihan;
use App\Models\Kategorikeuangan;
use App\Models\Kategoriukt;
use App\Models\Kegiatan;
use App\Models\Kegiatansiswa;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Riwayatkaderisasi;
use App\Models\Seluruhpeserta;
use App\Models\Suratkeluar;
use App\Models\Suratmasuk;
use App\Models\Tingkatan;
use App\Models\User;
use App\Notifications\DataAddedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class dashboardController extends Controller
{

    public function home()
    {
        $anggotapimda = Anggotapimda::all();
        $cabanglatihan = Cabanglatihan::all();
        return view('index', compact('anggotapimda', 'cabanglatihan'));
    }

    public function loginpage()
    {
        $anggotapimda = Anggotapimda::all();
        $cabanglatihan = Cabanglatihan::all();
        return view('index', compact('anggotapimda', 'cabanglatihan'));
    }

    public function login()
    {
        $credentials = [
            'email' => request('email'),
            'password' => request('password')
        ];

        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            return redirect('dashboard');
        } else {
            return back()->with('message', 'login gagal');
        }
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }

    // DASHBOARD
    public function index()
    {
        if (Auth::user()->role == 'adminpimda' || Auth::user()->role == 'admincabang') {

            // Untuk menentukan cabang latihan berdasarkan admin cabang yang sedang login
            $authcabang = Cabanglatihan::where('nama_cabang', Auth::user()->cabanglatihan->nama_cabang)->first();
            $newauthcabang = $authcabang->id;

            // Untuk mendapatkan data anggota cabang latihan sesuai dengan admin cabang
            $anggotapimdasiswa = Anggotapimda::where('cabanglatihan_id', $newauthcabang)->get();

            $anggotacabanglatihan = $anggotapimdasiswa;
            $anggotapimda = Anggotapimda::all();
            $cabanglatihan = Cabanglatihan::all();
            $tingkatan = Tingkatan::all();
            return view('dashboard.index', compact('anggotapimda', 'cabanglatihan', 'tingkatan', 'anggotacabanglatihan'));
        }
        return view('dashboard.index');
    }

    // CRUD CABANG LATIHAN
    public function getcabanglatihan()
    {
        $cabanglatihan = Cabanglatihan::latest()->get();

        // Menampilkan cabang latihan berdasarkan admin cabang yang sedang login
        $cabanglatihanadmin = Cabanglatihan::where('nama_cabang', Auth::user()->cabanglatihan->nama_cabang)->get();

        return view('dashboard.cabang-latihan.index', compact('cabanglatihan', 'cabanglatihanadmin'));
    }
    public function createcabanglatihan()
    {
        $jeniskategori = Kategoricabanglatihan::all();
        // $jeniskategori = Jeniskategori::all();
        $anggotapimda = Anggotapimda::all();
        return view('dashboard.cabang-latihan.create', compact('jeniskategori', 'anggotapimda'));
    }
    public function storecabanglatihan()
    {
        Cabanglatihan::create([
            'kode' => request('kode'),
            'kategori' => request('kategori'),
            'nama_cabang' => request('nama_cabang'),
            'alamat' => request('alamat'),
            'pelatih_id' => request('pelatih'),
        ]);
        return redirect('/dashboard/cabang-latihan')->with('message', 'Berhasil menambahkan data');
    }
    public function editcabanglatihan($id)
    {
        $cabanglatihan = Cabanglatihan::find($id);
        $jeniskategori = Kategoricabanglatihan::all();
        $anggotapimda = Anggotapimda::all();
        $selected = $cabanglatihan->pelatih->id;
        return view('dashboard.cabang-latihan.edit', compact('cabanglatihan', 'jeniskategori', 'anggotapimda', 'selected'));
    }
    public function updatecabanglatihan($id)
    {
        $oldcabanglatihan = Cabanglatihan::find($id);
        $oldcabanglatihan->update([
            'kode' => request('kode'),
            'kategori' => request('kategori'),
            'nama_cabang' => request('nama_cabang'),
            'alamat' => request('alamat'),
            'pelatih_id' => request('pelatih'),
        ]);
        return redirect('/dashboard/cabang-latihan')->with('message', 'data berhasil di update');
    }
    public function showcabanglatihan($id)
    {
        $cabanglatihan = Cabanglatihan::find($id);
        return view('dashboard.cabang-latihan.show', ['cabanglatihan' => $cabanglatihan]);
    }
    public function deletecabanglatihan($id)
    {
        $cabanglatihan = Cabanglatihan::find($id);
        $cabanglatihan->delete();
        return back()->with('message', 'Berhasil menghapus data');
    }

    // CRUD TINGKATAN
    public function gettingkatan()
    {
        $tingkatans = Tingkatan::latest()->get();
        return view('dashboard.tingkatan.index', compact('tingkatans'));
    }
    public function createtingkatan()
    {
        $jeniskategori = Jeniskategori::all();
        $jenistingkatan = Jenistingkatan::all();
        return view('dashboard.tingkatan.create', compact('jeniskategori', 'jenistingkatan'));
    }
    public function storetingkatan()
    {
        Tingkatan::create([
            'kode' => request('kode'),
            'kategori' => request('kategori'),
            'tingkatan' => request('tingkatan')
        ]);
        return redirect('/dashboard/tingkatan')->with('message', 'Berhasil menambahkan data');
    }
    public function edittingkatan($id)
    {
        $tingkatan = Tingkatan::find($id);
        $jeniskategori = Jeniskategori::all();
        $jenistingkatan = Jenistingkatan::all();
        return view('dashboard.tingkatan.edit', compact('tingkatan', 'jeniskategori', 'jenistingkatan'));
    }
    public function updatetingkatan($id)
    {
        $oldtingkatan = Tingkatan::find($id);
        $oldtingkatan->update([
            'kode' => request('kode'),
            'kategori' => request('kategori'),
            'tingkatan' => request('tingkatan')
        ]);
        return redirect('/dashboard/tingkatan')->with('message', 'Data berhasil diubah');
    }
    public function showtingkatan($id)
    {
        $tingkatan = Tingkatan::find($id);
        return view('dashboard.tingkatan.show', compact('tingkatan'));
    }
    public function deletetingkatan($id)
    {
        $tingkatan = Tingkatan::find($id);
        $tingkatan->delete();
        return back()->with('message', 'Berhasil menghapus data');
    }

    // CRUD ANGGOTA PIMDA
    public function getanggota()
    {
        // Untuk menentukan cabang latihan berdasarkan admin cabang yang sedang login
        $authcabang = Cabanglatihan::where('nama_cabang', Auth::user()->cabanglatihan->nama_cabang)->first();
        $newauthcabang = $authcabang->id;

        // Untuk mendapatkan data anggota yang memiliki tingkat "Siswa" dan cabang latihan sesuai dengan admin cabang
        $anggotapimda = Anggotapimda::OrderByRaw("CASE
                                                    WHEN tingkatan = 'Pendekar Besar' THEN 1
                                                    WHEN tingkatan = 'Pendekar Utama' THEN 2
                                                    WHEN tingkatan = 'Pendekar Kepala' THEN 3
                                                    WHEN tingkatan = 'Pendekar Madya' THEN 4
                                                    WHEN tingkatan = 'Pendekar Muda' THEN 5
                                                    WHEN tingkatan = 'Kader Utama' THEN 6
                                                    WHEN tingkatan = 'Kader Kepala' THEN 7
                                                    WHEN tingkatan = 'Kader Madya' THEN 8
                                                    WHEN tingkatan = 'Kader Muda' THEN 9
                                                    WHEN tingkatan = 'Kader Dasar' THEN 10
                                                    WHEN tingkatan = 'Siswa 4' THEN 11
                                                    WHEN tingkatan = 'Siswa 3' THEN 12
                                                    WHEN tingkatan = 'Siswa 2' THEN 13
                                                    WHEN tingkatan = 'Siswa 1' THEN 14
                                                    WHEN tingkatan = 'Siswa Dasar' THEN 15
                                                    ELSE 16
                                                    END
                                                    ")->get();
        $anggotapimdasiswa = Anggotapimda::where('tingkatan', 'like', 'Siswa%')
            ->where('cabanglatihan_id', $newauthcabang)->OrderByRaw("CASE
                                                    WHEN tingkatan = 'Pendekar Besar' THEN 1
                                                    WHEN tingkatan = 'Pendekar Utama' THEN 2
                                                    WHEN tingkatan = 'Pendekar Kepala' THEN 3
                                                    WHEN tingkatan = 'Pendekar Madya' THEN 4
                                                    WHEN tingkatan = 'Pendekar Muda' THEN 5
                                                    WHEN tingkatan = 'Kader Utama' THEN 6
                                                    WHEN tingkatan = 'Kader Kepala' THEN 7
                                                    WHEN tingkatan = 'Kader Madya' THEN 8
                                                    WHEN tingkatan = 'Kader Muda' THEN 9
                                                    WHEN tingkatan = 'Kader Dasar' THEN 10
                                                    WHEN tingkatan = 'Siswa 4' THEN 11
                                                    WHEN tingkatan = 'Siswa 3' THEN 12
                                                    WHEN tingkatan = 'Siswa 2' THEN 13
                                                    WHEN tingkatan = 'Siswa 1' THEN 14
                                                    WHEN tingkatan = 'Siswa Dasar' THEN 15
                                                    ELSE 16
                                                    END
                                                    ")->latest()->get();

        return view('dashboard.anggota.index', compact('anggotapimda', 'anggotapimdasiswa'));
    }
    public function createanggota()
    {
        $tingkatan = Tingkatan::all();
        $namacabang = Cabanglatihan::all();
        return view('dashboard.anggota.create', compact('tingkatan', 'namacabang'));
    }
    public function storeanggota()
    {
        Anggotapimda::create([
            'nikd' => request('nikd'),
            'nama' => request('nama'),
            'tempat_lahir' => request('tempat_lahir'),
            'tanggal_lahir' => request('tanggal_lahir'),
            'alamat' => request('alamat'),
            'jenis_kelamin' => request('jenis_kelamin'),
            'email' => request('email'),
            'no_telp' => request('no_telp'),
            'cabanglatihan_id' => request('nama_cabang'),
            'tingkatan' => request('tingkatan'),
            'tahun_masuk' => request('tahun_masuk')
        ]);
        return redirect('/dashboard/anggota')->with('message', 'Berhasil menambahkan data');
    }
    public function updateanggota($id)
    {
        $anggota = Anggotapimda::find($id);
        $anggota->update([
            'nikd' => request('nikd'),
            'nama' => request('nama'),
            'tempat_lahir' => request('tempat_lahir'),
            'tanggal_lahir' => request('tanggal_lahir'),
            'alamat' => request('alamat'),
            'email' => request('email'),
            'no_telp' => request('no_telp'),
            'cabanglatihan_id' => request('nama_cabang'),
            'tingkatan' => request('tingkatan'),
            'tahun_masuk' => request('tahun_masuk')
        ]);
        return back()->with('message', 'Data berhasil diubah');
    }
    public function showanggota($id)
    {
        $anggota = Anggotapimda::find($id);
        $tingkatan = Tingkatan::all();
        $namacabang = Cabanglatihan::all();
        return view('dashboard.anggota.show', compact('anggota', 'tingkatan', 'namacabang'));
    }
    public function deleteanggota($id)
    {
        $anggota = Anggotapimda::find($id);

        // Loop melalui riwayat kaderisasi untuk menghapus file ijazah
        foreach ($anggota->riwayatkaderisasi as $riwayat) {
            $filePath = storage_path('app/public/' . $riwayat->ijazah);
            unlink($filePath);
        }

        $anggota->delete();
        return back()->with('message', 'Berhasil menghapus data');
    }

    // FILTER ANGGOTA
    public function siswa()
    {
        $anggotapimda = Anggotapimda::OrderByRaw("CASE
                                                    WHEN tingkatan = 'Pendekar Besar' THEN 11
                                                    WHEN tingkatan = 'Pendekar Utama' THEN 12
                                                    WHEN tingkatan = 'Pendekar Kepala' THEN 13
                                                    WHEN tingkatan = 'Pendekar Madya' THEN 14
                                                    WHEN tingkatan = 'Pendekar Muda' THEN 55
                                                    WHEN tingkatan = 'Kader Utama' THEN 6
                                                    WHEN tingkatan = 'Kader Kepala' THEN 7
                                                    WHEN tingkatan = 'Kader Madya' THEN 8
                                                    WHEN tingkatan = 'Kader Muda' THEN 9
                                                    WHEN tingkatan = 'Kader Dasar' THEN 10
                                                    WHEN tingkatan = 'Siswa 4' THEN 1
                                                    WHEN tingkatan = 'Siswa 3' THEN 2
                                                    WHEN tingkatan = 'Siswa 2' THEN 3
                                                    WHEN tingkatan = 'Siswa 1' THEN 4
                                                    WHEN tingkatan = 'Siswa Dasar' THEN 5
                                                    ELSE 16
                                                    END
                                                    ")->get();
        return view('dashboard.anggota.index', compact('anggotapimda'));
    }
    public function kader()
    {
        $anggotapimda = Anggotapimda::OrderByRaw("CASE
                                                    WHEN tingkatan = 'Pendekar Besar' THEN 6
                                                    WHEN tingkatan = 'Pendekar Utama' THEN 7
                                                    WHEN tingkatan = 'Pendekar Kepala' THEN 8
                                                    WHEN tingkatan = 'Pendekar Madya' THEN 9
                                                    WHEN tingkatan = 'Pendekar Muda' THEN 10
                                                    WHEN tingkatan = 'Kader Utama' THEN 1
                                                    WHEN tingkatan = 'Kader Kepala' THEN 2
                                                    WHEN tingkatan = 'Kader Madya' THEN 3
                                                    WHEN tingkatan = 'Kader Muda' THEN 4
                                                    WHEN tingkatan = 'Kader Dasar' THEN 5
                                                    WHEN tingkatan = 'Siswa 4' THEN 11
                                                    WHEN tingkatan = 'Siswa 3' THEN 12
                                                    WHEN tingkatan = 'Siswa 2' THEN 13
                                                    WHEN tingkatan = 'Siswa 1' THEN 14
                                                    WHEN tingkatan = 'Siswa Dasar' THEN 15
                                                    ELSE 16
                                                    END
                                                    ")->get();
        return view('dashboard.anggota.index', compact('anggotapimda'));
    }
    public function pendekar()
    {
        $anggotapimda = Anggotapimda::OrderByRaw("CASE
                                                    WHEN tingkatan = 'Pendekar Besar' THEN 1
                                                    WHEN tingkatan = 'Pendekar Utama' THEN 2
                                                    WHEN tingkatan = 'Pendekar Kepala' THEN 3
                                                    WHEN tingkatan = 'Pendekar Madya' THEN 4
                                                    WHEN tingkatan = 'Pendekar Muda' THEN 5
                                                    WHEN tingkatan = 'Kader Utama' THEN 6
                                                    WHEN tingkatan = 'Kader Kepala' THEN 7
                                                    WHEN tingkatan = 'Kader Madya' THEN 8
                                                    WHEN tingkatan = 'Kader Muda' THEN 9
                                                    WHEN tingkatan = 'Kader Dasar' THEN 10
                                                    WHEN tingkatan = 'Siswa 4' THEN 11
                                                    WHEN tingkatan = 'Siswa 3' THEN 12
                                                    WHEN tingkatan = 'Siswa 2' THEN 13
                                                    WHEN tingkatan = 'Siswa 1' THEN 14
                                                    WHEN tingkatan = 'Siswa Dasar' THEN 15
                                                    ELSE 16
                                                    END
                                                    ")->get();
        return view('dashboard.anggota.index', compact('anggotapimda'));
    }

    // RIWAYAT KADERISASI
    public function storeriwayatkaderisasi()
    {

        if (request()->hasFile('ijazah')) {
            $image = request()->file('ijazah');
            $pathijazah = $image->store('riwayat-kaderisasi', 'public');
        } else {
            return back()->message('message', 'Silahkan unggah ijazah');
        }

        //    $pathijazah['ijazah'] = request()->file('ijazah')->store('riwayat-kaderisasi', 'public');

        Riwayatkaderisasi::create([
            'anggotapimda_id' => request('anggotapimda_id'),
            'nikd' => request('nikd'),
            'nama' => request('nama'),
            'tingkatan' => request('tingkatan'),
            'tanggal' => request('tanggal'),
            'ijazah' => $pathijazah
        ]);
        return back()->with('message', 'Berhasil menambahkan riwayat kaderisasi');
    }
    public function deleteriwayatkaderisasi($id)
    {
        $riwayatkaderisasi = Riwayatkaderisasi::find($id);
        $riwayatkaderisasi->delete();
        return back()->with('message', 'Berhasil menghapus data');
    }

    // CRUD ADMIN CABANG
    public function getadmincabang()
    {
        $admincabang = User::where('role', 'admincabang')->latest()->get();
        return view('dashboard.admincabang.index', compact('admincabang'));
    }

    public function createadmincabang()
    {
        $namacabang = Cabanglatihan::all();
        return view('dashboard.admincabang.create', compact('namacabang'));
    }

    public function storeadmincabang()
    {
        User::create([
            'username' => request('username'),
            'email' => request('email'),
            'password' => request('password'),
            'cabanglatihan_id' => request('nama_cabang'),
            'role' => request('role')
        ]);
        return redirect('/dashboard/admincabang')->with('message', 'admin cabang berhasil ditambahkan');
    }

    public function editadmincabang($id)
    {
        $admincabang = User::find($id);
        $namacabang = Cabanglatihan::all();
        return view('dashboard.admincabang.edit', compact('admincabang', 'namacabang'));
    }

    public function updateadmincabang($id)
    {
        $oldadmincabang = User::find($id);
        $oldadmincabang->update([
            'username' => request('username'),
            'email' => request('email'),
            'password' => request('password'),
            'cabanglatihan_id' => request('nama_cabang'),
            'role' => request('role')
        ]);
        return redirect('/dashboard/admincabang')->with('message', 'Data berhasil diubah');
    }

    public function showadmincabang($id)
    {
        $admincabang = User::find($id);
        return view('dashboard.admincabang.show', compact('admincabang'));
    }

    public function deleteadmincabang($id)
    {
        $admincabang = User::find($id);
        $admincabang->delete();
        return redirect('/dashboard/admincabang')->with('message', 'Data berhasil dihapus');
    }

    public function aktifadmincabang($id)
    {
        $admincabang = User::find($id);
        $admincabang->status = 1;
        $admincabang->save();
        return redirect('/dashboard/admincabang')->with('message', 'Admin berhasil di aktifkan');
    }
    public function nonaktifadmincabang($id)
    {
        $admincabang = User::find($id);
        $admincabang->status = 0;
        $admincabang->save();
        return redirect('/dashboard/admincabang')->with('message', 'Admin berhasil di Nonaktifkan');
    }

    //CRUD KEGIATAN
    public function getkegiatan()
    {
        $admin = User::where('id', Auth::user()->id)->first();
        $adminkegiatan = $admin->kegiatan;
        $kegiatans = Kegiatan::all();
        $iduser = Auth::user()->id;
        return view('dashboard.kegiatan.index', compact('kegiatans', 'iduser', 'adminkegiatan'));
    }
    public function createkegiatan()
    {
        $anggotapimda = Anggotapimda::all();
        $jeniskegiatan = Jeniskegiatan::all();
        return view('dashboard.kegiatan.create', compact('anggotapimda', 'jeniskegiatan'));
    }
    public function storekegiatan()
    {
        $data = Kegiatan::create(request()->all());

        // Dapatkan Admin 2 (misalnya memiliki role 'admin_cabang')
        $adminCabang = User::where('role', 'admincabang')->get();

        // Kirim notifikasi ke Admin 2
        foreach ($adminCabang as $admin) {
            $admin->notify(new DataAddedNotification($data));
        }

        return redirect('/dashboard/kegiatan')->with('message', 'Berhasil menambahkan data');
    }

    public function show($id)
    {
        $data = Kegiatan::findOrFail($id);
        return view('data.show', compact('data'));
    }

    public function editkegiatan($id)
    {
        $kegiatan = Kegiatan::find($id);
        $anggotapimda = Anggotapimda::all();
        $jeniskegiatan = Jeniskegiatan::all();

        $ketua_panitia = $kegiatan->ketua_panitia;
        $wakilketua_panitia = $kegiatan->wakilketua_panitia;
        $sekretaris_panitia = $kegiatan->sekretaris_panitia;
        $bendahara_panitia = $kegiatan->bendahara_panitia;
        $jenis = $kegiatan->jenis;

        return view('dashboard.kegiatan.edit', compact('kegiatan', 'anggotapimda', 'jeniskegiatan', 'ketua_panitia', 'wakilketua_panitia', 'sekretaris_panitia', 'bendahara_panitia', 'jenis'));
    }
    public function updatekegiatan($id)
    {
        $kegiatan = Kegiatan::find($id);
        $kegiatan->update(request()->all());
        return redirect('/dashboard/kegiatan')->with('message', 'Data berhasil diubah');
    }
    public function showkegiatan($id)
    {
        $kegiatan = Kegiatan::find($id);
        return view('dashboard.kegiatan.show', compact('kegiatan'));
    }

    //CRUD ASPEK NILAI
    public function tambahaspekukt() {}

    //CRUD AKTIF & NONAKTIF KEGIATAN
    public function aktifkegiatan($id)
    {
        $kegiatan = Kegiatan::find($id);
        $kegiatan->status = true;
        $kegiatan->save();
        return redirect('/dashboard/kegiatan')->with('message', 'Kegiatan berhasil di aktifkan');
    }
    public function nonaktifkegiatan($id)
    {
        $kegiatan = Kegiatan::find($id);
        $kegiatan->status = false;
        $kegiatan->save();
        return redirect('/dashboard/kegiatan')->with('message', 'Kegiatan berhasil di nonaktifkan');
    }

    //CRUD ADMIN KEGIATAN
    public function getadminkegiatan()
    {
        $adminkegiatan = User::where('role', 'adminkegiatan')->get();
        return view('dashboard.adminkegiatan.index', compact('adminkegiatan'));
    }
    public function createadminkegiatan()
    {
        $kegiatans = Kegiatan::all();
        return view('dashboard.adminkegiatan.create', compact('kegiatans'));
    }
    public function storeadminkegiatan()
    {
        User::create(request()->all());
        return redirect('/dashboard/kegiatan/adminkegiatan')->with('message', 'Berhasil menambahkan data');
    }
    public function editadminkegiatan($id)
    {
        $adminkegiatan = User::where('id', $id)->first();
        $kegiatans = Kegiatan::all();
        $namakegiatan = $adminkegiatan->kegiatan->nama;
        return view('dashboard.adminkegiatan.edit', compact('adminkegiatan', 'kegiatans', 'namakegiatan'));
    }
    public function updateadminkegiatan($id)
    {
        $adminkegiatan = User::where('id', $id)->first();
        $adminkegiatan->update(request()->all());
        return redirect('/dashboard/kegiatan/adminkegiatan')->with('message', 'Berhasil mengubah data');
    }
    public function showadminkegiatan($id)
    {
        $adminkegiatan = User::where('id', $id)->first();
        return view('dashboard.adminkegiatan.show', compact('adminkegiatan'));
    }
    public function deleteadminkegiatan($id)
    {
        $adminkegiatan = User::find($id);
        $adminkegiatan->delete();
        return redirect('/dashboard/kegiatan/adminkegiatan');
    }

    //CRUD TAMBAH NILAI ASPEK
    public function tambahaspek($id)
    {
        $kegiatan = Kegiatan::find($id);

        $kategoriukt = Kategoriukt::all();
        $aspeknilaiukt = Aspeknilaiukt::all();

        $aspeknilailkpts = Aspeknilailkpts::all();

        return view('dashboard.tambahaspek.index', compact('kategoriukt', 'aspeknilaiukt', 'aspeknilailkpts', 'kegiatan'));
    }
    public function storetambahaspekukt($id)
    {
        //Menambahkan aspek nilai ukt di setiap kegiatan
        Aspeknilaiukt::create([
            'nama' => request()->input('aspeknilai_ukt'),
            'kegiatan_id' => $id
        ]);

        return redirect('/dashboard/kegiatan/tambahaspek/' . $id)->with('message', 'Berhasil menambahkan aspek nilai UKT');
    }
    public function storetambahkategoriukt($id)
    {
        //Mengubah kategori ukt pada setiap kegiatan
        $kegiatan = Kegiatan::find($id);
        $kegiatan->kategori_ukt = request()->input('kategori_ukt');
        $kegiatan->save();

        return redirect('/dashboard/kegiatan/tambahaspek/' . $id)->with('message', 'Berhasil menambahkan Kategori UKT');
    }
    public function storetambahaspeklkpts($id)
    {
        //Menambahkan aspek nilai lkpts di setiap kegiatan
        Aspeknilailkpts::create([
            'nama' => request()->input('aspeknilai_lkpts'),
            'kegiatan_id' => $id
        ]);

        return redirect('/dashboard/kegiatan/tambahaspek/' . $id)->with('message', 'Berhasil menambahkan aspek nilai LKPTS');
    }

    // DOWNLOAD TO PDF
    public function tabel($id)
    {
        $kegiatan = Kegiatan::find($id);

        $aspeknilaiukt = Aspeknilaiukt::where('kegiatan_id', $kegiatan->id)->get();
        $aspeknilailkpts = Aspeknilailkpts::where('kegiatan_id', $kegiatan->id)->get();

        $seluruhpeserta = Seluruhpeserta::where('kegiatan_id', $kegiatan->id)->get();
        $jeniskegiatan = $kegiatan->jenis;

        $kategoriukt = $kegiatan->kategori_ukt;
        return view('table', compact('seluruhpeserta', 'aspeknilaiukt', 'aspeknilailkpts', 'jeniskegiatan', 'kategoriukt'));
    }

    // LIST KEGIATAN SISWA
    public function kegiatansiswa()
    {
        $siswas = Kegiatansiswa::all();
        return view('dashboard.daftarkankegiatan.index', compact('siswas'));
    }

    // CRUD DAFTARKAN SISWA
    public function daftarkan($id)
    {
        $kegiatans = Kegiatan::all();
        $idkegiatan = Kegiatan::find($id)->id;
        $iduser = Auth::user()->cabanglatihan->id;
        $namakegiatan = Kegiatan::find($id)->nama;
        return view('dashboard.daftarkankegiatan.daftarkan', compact('kegiatans', 'idkegiatan', 'iduser', 'namakegiatan'));
    }

    public function storekegiatansiswa()
    {
        //validasi apakah nikd ada di database
        request()->validate([
            'nikd' => Rule::exists('anggotapimdas', 'nikd')
        ]);
        //simpan data
        Kegiatansiswa::create(request()->all());

        //simpan data untuk di tabel pdf
        $kategoriukt = Kegiatan::where('id', request()->input('kegiatan_id'))->first();
        $namacabang = Cabanglatihan::where('id', request()->input('cabanglatihan_id'))->first()->nama_cabang;
        $anggota = Anggotapimda::where('nikd', request()->input('nikd'))->first();
        Seluruhpeserta::create([
            'nama_lengkap' => $anggota->nama,
            'tempat_lahir' => $anggota->tempat_lahir,
            'tanggal_lahir' => $anggota->tanggal_lahir,
            'jenis_kelamin' => $anggota->jenis_kelamin,
            'tahunmasuk_ts' => $anggota->tahun_masuk,
            'cabang' => $namacabang,
            'kategori_ukt' => $kategoriukt->jenis,
            'kegiatan_id' => $kategoriukt->id
        ]);

        //menambahkan data jumlah peserta di masing2 kegiatan
        $kegiatanfirst = Kegiatan::where('id', request()->input('kegiatan_id'))->first();
        $kegiatanfirst->jumlah_peserta += 1;

        //cek jika perserta yang di daftarkan masih dengan satu cabang, maka cabang tidak akan bertambah
        //yang bertambah hanya pesertanya saja
        if (empty(Seluruhpeserta::where('cabang', $namacabang)->first())) {
            $kegiatanfirst->jumlah_cabang += 1;
        } else {
            $kegiatanfirst->jumlah_cabang = $kegiatanfirst->jumlah_cabang;
        }

        $kegiatanfirst->update();

        return redirect('/dashboard/kegiatan/kegiatansiswa')->with('message', 'Berhasil mendaftarkan siswa');
    }

    //CRUD KATEGORI KEUANGAN
    public function getkategorikeuangan() {
        $kategorikeuangan = Kategorikeuangan::latest()->get();
        return view('dashboard.keuangan.index',compact('kategorikeuangan'));
    }
    public function createkategorikeuangan() {
        return view('dashboard.keuangan.create');
    }
    public function storekategorikeuangan() {
        Kategorikeuangan::create(request()->all());
        return redirect('/dashboard/kategorikeuangan')->with('message', 'Berhasil menambahkan data');
    }
    public function editkategorikeuangan($id) {
        $kategorikeuangan = Kategorikeuangan::all();
        $kategori = Kategorikeuangan::find($id);
        return view('dashboard.keuangan.edit', compact('kategorikeuangan', 'kategori'));
    }
    public function updatekategorikeuangan($id){
        $kategorikeuangan = Kategorikeuangan::find($id);
        $kategorikeuangan->update(request()->all());
        return redirect('/dashboard/kategorikeuangan')->with('message', 'Data berhasil diubah');
    }
    public function deletekategorikeuangan($id){
        $kategorikeuangan = Kategorikeuangan::find($id);
        $kategorikeuangan->delete();
        return redirect('/dashboard/kategorikeuangan')->with('message', 'Data berhasil dihapus');
    }

    //CRUD PEMASUKAN
    public function getpemasukan() {
        $pemasukan = Pemasukan::latest()->get();
        $tahunbuku = Pemasukan::first()->tahun_buku;
        return view('dashboard.pemasukan.index',compact('pemasukan','tahunbuku'));
    }
    public function createpemasukan() {
        $kategorikeuangan = Kategorikeuangan::all();
        return view('dashboard.pemasukan.create', compact('kategorikeuangan'));
    }
    public function storepemasukan() {
        Pemasukan::create(request()->all());
        return redirect('/dashboard/pemasukan')->with('message', 'Berhasil menambahkan data');
    }
    public function editpemasukan($id) {
        $pemasukan = Pemasukan::find($id);
        $kategorikeuangan = Kategorikeuangan::all();
        return view('dashboard.pemasukan.edit', compact('pemasukan','kategorikeuangan'));
    }
    public function updatepemasukan($id){
        $pemasukan = Pemasukan::find($id);
        $pemasukan->update(request()->all());
        return redirect('/dashboard/pemasukan')->with('message','Data berhasil diubah');
    }
    public function showpemasukan($id) {
        $pemasukan = Pemasukan::find($id);
        return view('dashboard.pemasukan.show', compact('pemasukan'));
    }

    //CRUD PENGELUARAN
    public function getpengeluaran() {
        $pengeluaran = Pengeluaran::latest()->get();
        $tahunbuku = Pengeluaran::first()->tahun_buku;     
        return view('dashboard.pengeluaran.index', compact('pengeluaran','tahunbuku'));
    }
    public function createpengeluaran() {
        return view('dashboard.pengeluaran.create');
    }
    public function storepengeluaran() {
        Pengeluaran::create(request()->all());
        return redirect('/dashboard/pengeluaran')->with('message','Berhasil menambahkan data');
    }
    public function editpengeluaran($id) {
        $pengeluaran = Pengeluaran::find($id);
        return view('dashboard.pengeluaran.edit', compact('pengeluaran'));
    }
    public function updatepengeluaran($id) {
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->update(request()->all());
        return redirect('/dashboard/pengeluaran')->with('message', 'Data berhasil diubah');
    }
    public function showpengeluaran($id) {
        $pengeluaran = Pengeluaran::find($id);
        return view('dashboard.pengeluaran.show', compact('pengeluaran'));
    }

    //CRUD SURAT MASUK
    public function suratmasuk() {
        $suratmasuk = Suratmasuk::latest()->get();
        return view('dashboard.suratmasuk.index',compact('suratmasuk'));
    }
    public function createsuratmasuk() {
        return view('dashboard.suratmasuk.create');
    }
    public function storesuratmasuk() {
        Suratmasuk::create(request()->all());
        return redirect('/dashboard/suratmasuk')->with('message', 'Berhasil menambahkan data');
    }
    public function editsuratmasuk($id) {
        $suratmasuk = Suratmasuk::find($id);
        return view('dashboard.suratmasuk.edit', compact('suratmasuk'));
    }
    public function updatesuratmasuk($id){
        $suratmasuk = Suratmasuk::find($id);
        $suratmasuk->update(request()->all());
        return redirect('/dashboard/suratmasuk')->with('message', 'Data berhasil diubah');
    }
    public function showsuratmasuk($id){
        $suratmasuk = Suratmasuk::find($id);
        return view('dashboard.suratmasuk.show', compact('suratmasuk'));
    }
    public function deletesuratmasuk($id) {
        $suratmasuk = Suratmasuk::find($id);
        $suratmasuk->delete();
        return redirect('/dashboard/suratmasuk')->with('message', 'Data berhasil Dihapus');
    }

    //CRUD SURAT KELUAR
    public function suratkeluar() {
        $suratkeluar = Suratkeluar::latest()->get();
        return view('dashboard.suratkeluar.index', compact('suratkeluar'));
    }
    public function createsuratkeluar() {
        return view('dashboard.suratkeluar.create');
    }
    public function storesuratkeluar() {
        Suratkeluar::create(request()->all());
        return redirect('/dashboard/suratkeluar')->with('message', 'Berhasil menambahkan data');
    }
    public function editsuratkeluar($id) {
        $suratkeluar = Suratkeluar::find($id);
        return view('dashboard.suratkeluar.edit', compact('suratkeluar'));
    }
    public function updatesuratkeluar($id) {
        $suratkeluar = Suratkeluar::find($id);
        $suratkeluar->update(request()->all());
        return redirect('/dashboard/suratkeluar')->with('message','Data berhasil diubah');
    }
    public function showsuratkeluar($id) {
        $suratkeluar = Suratkeluar::find($id);
        return view('dashboard.suratkeluar.show', compact('suratkeluar'));
    }
    public function deletesuratkeluar($id) {
        $suratkeluar = Suratkeluar::find($id);
        $suratkeluar->delete();
        return redirect('/dashboard/suratkeluar')->with('message', 'Data berhasil dihapus');
    }
}
