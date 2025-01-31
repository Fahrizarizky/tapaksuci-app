@extends('dashboard.layout.layoutpage')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4 col-md-9">
        <h1 class="h3 text-dark text-uppercase fw-bold">Tambah Kegiatan</h1>
        <a href="/dashboard/kegiatan" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <div class="card shadow mb-4 col-md-9">
        <div class="card-body">
            <form action="/dashboard/kegiatan/store" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama" class="font-weight-bold">Nama Kegiatan</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="waktu" class="font-weight-bold">Waktu Pelaksanaan</label>
                    <input type="date" class="form-control" id="waktu" name="waktu" required>
                </div>
                <div class="form-group">
                    <label for="lokasi" class="font-weight-bold">Lokasi Pelaksanaan</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                </div>
                <div class="form-group">
                    <label for="ketua_panitia" class="font-weight-bold">Ketua Panitia</label>
                    <select type="text" class="form-control" id="ketua_panitia" name="ketua_panitia" required>
                        @foreach($anggotapimda as $anggota)
                        <option>{{$anggota->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="wakilketua_panitia" class="font-weight-bold">Wakil Ketua Panitia</label>
                    <select type="text" class="form-control" id="wakilketua_panitia" name="wakilketua_panitia" required>
                        @foreach($anggotapimda as $anggota)
                        <option>{{$anggota->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="sekretaris_panitia" class="font-weight-bold">Sekretaris Panitia</label>
                    <select type="text" class="form-control" id="sekretaris_panitia" name="sekretaris_panitia" required>
                        @foreach($anggotapimda as $anggota)
                        <option>{{$anggota->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="bendahara_panitia" class="font-weight-bold">Bendahara Panitia</label>
                    <select type="text" class="form-control" id="bendahara_panitia" name="bendahara_panitia" required>
                        @foreach($anggotapimda as $anggota)
                        <option>{{$anggota->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jenis" class="font-weight-bold">Jenis Kegiatan</label>
                    <select type="text" class="form-control" id="jenis" name="jenis" required>
                        @foreach($jeniskegiatan as $kegiatan)
                        <option>{{$kegiatan->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection