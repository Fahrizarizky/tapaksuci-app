@extends('dashboard.layout.layoutpage')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4 col-md-9">
        <h1 class="h3 text-dark text-uppercase fw-bold">Tambah Anggota</h1>
        <a href="/dashboard/anggota" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <div class="col-md-9">
        @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>

    <div class="card shadow mb-4 col-md-9">
        <div class="card-body">
            <form action="/dashboard/anggota/store" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nikd" class="font-weight-bold">NIKD</label>
                    <input type="text" class="form-control" id="nikd" name="nikd" required>
                </div>
                <div class="form-group">
                    <label for="nama" class="font-weight-bold">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="tempat_lahir" class="font-weight-bold">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir" class="font-weight-bold">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin" class="font-weight-bold">Jenis Kelamin</label>
                    <select type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat" class="font-weight-bold">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                </div>
                <div class="form-group">
                    <label for="email" class="font-weight-bold">Email Aktif</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="no_telp" class="font-weight-bold">No_telp Aktif/WA</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" required>
                </div>
                <div class="form-group">
                    <label for="tingkatan" class="font-weight-bold">Tingkatan Saat Ini</label>
                    <select type="text" class="form-control" id="tingkatan" name="tingkatan" required>
                        @foreach($tingkatan as $item)
                        <option>{{$item->tingkatan}}</option>
                        @endforeach
                    </select>
                    {{-- karena tidak ada input id cabang makanya tidak muncul setelah anggota di tambah --}}
                    @if(auth()->user()->role == 'admincabang')
                    <input type="hidden" value="{{auth()->user()->cabanglatihan->id}}" name="nama_cabang">
                    @endif
                </div>
                <div class="form-group">
                    <label for="tahun_masuk" class="font-weight-bold">Tahun Masuk Tapak Suci</label>
                    <input type="text" class="form-control" id="tahun_masuk" name="tahun_masuk">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection