@extends('dashboard.layout.layoutpage')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4 col-md-9">
        <h1 class="h3 text-dark text-uppercase fw-bold">Tambah Siswa</h1>
        <a href="/dashboard/kegiatan" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
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
            <form action="/dashboard/kegiatansiswa/store" method="post">
                @csrf
                <!-- Inputan 1: NIKD -->
                <div class="form-group">
                    <p class="text-primary">Pastikan NIKD sudah benar !</p>
                    <label for="nikd">NIKD</label>
                    <input type="text" class="form-control" id="nikd" name="nikd" required>
                    @error('nikd')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Inputan 2: Nama -->
                <div class="form-group">
                    <label for="nama_siswa">Nama Lengkap</label>
                    <input type="nama_siswa" class="form-control" id="nama_siswa" name="nama_siswa" required>
                </div>
                <!-- Inputan 3: Nama Kegiatan -->
                <div class="form-group">
                    <label for="nama_kegiatan">Kegiatan</label>
                    <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="{{ $namakegiatan }}" readonly>
                </div>
                <input type="hidden" name="kegiatan_id" value="{{ $idkegiatan }}">
                <input type="hidden" name="cabanglatihan_id" value="{{ $iduser }}">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection