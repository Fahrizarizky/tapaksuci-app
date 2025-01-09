<?php

namespace App\Http\Controllers;

use App\Models\Anggotapimda;
use App\Models\Cabanglatihan;
use App\Models\Jeniskategori;
use App\Models\Jenistingkatan;
use App\Models\Riwayatkaderisasi;
use App\Models\Tingkatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class dashboardController extends Controller
{

    public function home() {
        $anggotapimda = Anggotapimda::all();
        $cabanglatihan = Cabanglatihan::all();
        return view('index', compact('anggotapimda', 'cabanglatihan'));
    }

    public function loginpage() {
         $anggotapimda = Anggotapimda::all();
        $cabanglatihan = Cabanglatihan::all();
        return view('index', compact('anggotapimda', 'cabanglatihan'));
    }

    public function login() {
        $credentials = [
            'email' => request('email'),
            'password' => request('password')
        ];

        if(Auth::attempt($credentials)) {
            request()->session()->regenerate();
            return redirect('dashboard');
        } else {
            return back()->with('message', 'login gagal');
        }
    }

    public function logout() {
        Auth::logout();
 
    request()->session()->invalidate();
 
    request()->session()->regenerateToken();
 
    return redirect('/');
    }

    // DASHBOARD
    public function index() {
        $anggotapimda = Anggotapimda::all();
        $cabanglatihan = Cabanglatihan::all();
        $tingkatan = Tingkatan::all();
        return view('dashboard.index', compact('anggotapimda', 'cabanglatihan', 'tingkatan'));
    }

    // CRUD CABANG LATIHAN
    public function getcabanglatihan() {
        $cabanglatihan = Cabanglatihan::all();
        return view('dashboard.cabang-latihan.index', compact('cabanglatihan'));
    }
    public function createcabanglatihan() {
        $jeniskategori = Jeniskategori::all();
        $anggotapimda = Anggotapimda::all();
        return view('dashboard.cabang-latihan.create', compact('jeniskategori','anggotapimda'));
    }
    public function storecabanglatihan() {
        Cabanglatihan::create([
            'kode' => request('kode'),
            'kategori' => request('kategori'),
            'nama_cabang' => request('nama_cabang'),
            'alamat' => request('alamat'),
            'pelatih' => request('pelatih'),
        ]);
        return back()->with('message', 'Berhasil menambahkan data');
    }
    public function editcabanglatihan($id) {
        $cabanglatihan = Cabanglatihan::find($id);
        $jeniskategori = Jeniskategori::all();
        $anggotapimda = Anggotapimda::all();
        return view('dashboard.cabang-latihan.edit', compact('cabanglatihan', 'jeniskategori', 'anggotapimda'));
    }
    public function updatecabanglatihan($id) {
        $oldcabanglatihan = Cabanglatihan::find($id);
        $oldcabanglatihan->update([
            'kode' => request('kode'),
            'kategori' => request('kategori'),
            'nama_cabang' => request('nama_cabang'),
            'alamat' => request('alamat'),
            'pelatih' => request('pelatih'),
        ]);
        return redirect('/dashboard/cabang-latihan')->with('message', 'data berhasil di update');
    } 
    public function showcabanglatihan($id) {
        $cabanglatihan = Cabanglatihan::find($id);
        return view('dashboard.cabang-latihan.show',['cabanglatihan' => $cabanglatihan]);
    }
    public function deletecabanglatihan($id) {
        $cabanglatihan = Cabanglatihan::find($id);
        $cabanglatihan->delete();
        return back()->with('message', 'Berhasil menghapus data');
    }

    // CRUD TINGKATAN
    public function gettingkatan() {
        $tingkatans = Tingkatan::all();
        return view('dashboard.tingkatan.index', compact('tingkatans'));
    }
    public function createtingkatan() {
        $jeniskategori = Jeniskategori::all();
        $jenistingkatan = Jenistingkatan::all();
        return view('dashboard.tingkatan.create', compact('jeniskategori', 'jenistingkatan'));
    }
    public function storetingkatan() {
        Tingkatan::create([
            'kode' => request('kode'),
            'kategori' => request('kategori'),
            'tingkatan' => request('tingkatan')
        ]);
        return back()->with('message', 'bBerhasil menambahkan data');
    }
    public function edittingkatan($id) {
        $tingkatan = Tingkatan::find($id);
        $jeniskategori = Jeniskategori::all();
        $jenistingkatan = Jenistingkatan::all();
        return view('dashboard.tingkatan.edit', compact('tingkatan', 'jeniskategori', 'jenistingkatan'));
    }
    public function updatetingkatan($id) {
        $oldtingkatan = Tingkatan::find($id);
        $oldtingkatan->update([
            'kode' => request('kode'),
            'kategori' => request('kategori'),
            'tingkatan' => request('tingkatan')
        ]);
        return redirect('/dashboard/tingkatan')->with('message', 'Data berhasil diubah');
    }
    public function showtingkatan($id) {
        $tingkatan = Tingkatan::find($id);
        return view('dashboard.tingkatan.show', compact('tingkatan'));
    }
    public function deletetingkatan($id) {
        $tingkatan = Tingkatan::find($id);
        $tingkatan->delete();
        return back()->with('message', 'Berhasil menghapus data');
    }

    // CRUD ANGGOTA PIMDA
    public function getanggota() {
        $anggotapimda = Anggotapimda::all();
        $anggotapimdasiswa = Anggotapimda::where('tingkatan', 'like', 'Siswa%')->get();
        return view('dashboard.anggota.index', compact('anggotapimda','anggotapimdasiswa'));
    }
    public function createanggota() {
        $tingkatan = Tingkatan::all();
        return view('dashboard.anggota.create', compact('tingkatan'));
    }
    public function storeanggota() {
        Anggotapimda::create([
            'nikd' => request('nikd'),
            'nama' => request('nama'),
            'tempat_lahir' => request('tempat_lahir'),
            'tanggal_lahir' => request('tanggal_lahir'),
            'alamat' => request('alamat'),
            'email' => request('email'),
            'no_telp' => request('no_telp'),
            'tingkatan' => request('tingkatan')
        ]);
        return back()->with('message', 'Berhasil menambahkan data');
    }
    public function updateanggota($id) {
        $anggota = Anggotapimda::find($id);
        $anggota->update([
            'nikd' => request('nikd'),
            'nama' => request('nama'),
            'tempat_lahir' => request('tempat_lahir'),
            'tanggal_lahir' => request('tanggal_lahir'),
            'alamat' => request('alamat'),
            'email' => request('email'),
            'no_telp' => request('no_telp'),
            'tingkatan' => request('tingkatan')
        ]);
        return back()->with('message', 'Data berhasil diubah');
    }
    public function showanggota($id) {
        $anggota = Anggotapimda::find($id);
        $tingkatan = Tingkatan::all();
        return view('dashboard.anggota.show', compact('anggota', 'tingkatan'));
    }
    public function deleteanggota($id) {
        $anggota = Anggotapimda::find($id);

         // Loop melalui riwayat kaderisasi untuk menghapus file ijazah
        foreach($anggota->riwayatkaderisasi as $riwayat) {
            if($riwayat->ijazah && Storage::exists($riwayat->ijazah)) {
                Storage::delete($riwayat->ijazah);
            }
            $riwayat->delete();
        } 

        $anggota->delete();
        return back()->with('message', 'Berhasil menghapus data');
    }

    // FILTER ANGGOTA
    public function siswa() {
        $anggotapimda = Anggotapimda::where('tingkatan', 'like', 'Siswa%')->get();
        return view('dashboard.anggota.index', compact('anggotapimda'));
    }
    public function kader() {
        $anggotapimda = Anggotapimda::where('tingkatan', 'like', 'Kader%')->get();
        return view('dashboard.anggota.index', compact('anggotapimda'));
    }
    public function pendekar() {
        $anggotapimda = Anggotapimda::where('tingkatan', 'like', 'Pendekar%')->get();
        return view('dashboard.anggota.index', compact('anggotapimda'));
    }

    // RIWAYAT KADERISASI
    public function storeriwayatkaderisasi() {

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
    public function deleteriwayatkaderisasi($id) {
        $riwayatkaderisasi = Riwayatkaderisasi::find($id);
        $riwayatkaderisasi->delete();
        return back()->with('message', 'Berhasil menghapus data');
    }
}
