@extends('dashboard.layout.layoutpage')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        @if($kegiatan->jenis === 'UKT Siswa')
        <h1 class="mb-4">Form Tambah Data kegiatan UKT</h1>
        <form action="/dashboard/kegiatan/tambahaspekukt/store/{{ $kegiatan->id }}" method="POST">
            @csrf
            <!-- Nama kegiatan -->
            <div class="mb-3">
                <label for="nama_kegiatan" class="form-label">Nama kegiatan</label>
                <p id="nama_kegiatan" class="form-control-plaintext">{{ $kegiatan->nama }}</p>
            </div>

            <!-- Jenis kegiatan -->
            <div class="mb-3">
                <label for="jenis_kegiatan" class="form-label">Jenis kegiatan</label>
                <p id="jenis_kegiatan" class="form-control-plaintext">{{ $kegiatan->jenis }}</p>
            </div>

            <!-- Kategori UKT -->
            <div class="mb-3">
                <label for="kategori_ukt" class="form-label">Kategori UKT</label>
                <select id="kategori_ukt" name="kategori_ukt" class="form-select" required>
                    <option value="" selected disabled>Pilih Kategori</option>
                    @foreach($kategoriukt as $category)
                    <option value="{{ $category->nama }}">{{ $category->nama }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Aspek Nilai -->
            <div class="mb-3">
                <label for="aspek_nilai" class="form-label">Aspek Nilai</label>
                <ul id="aspek-nilai-container">
                    @foreach($aspeknilaiukt as $aspect)
                    <li>{{ $aspect->nama }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="mb-3">
                <label for="aspeknilai_ukt" class="form-label">Aspek Nilai UKT</label>
                <input id="aspeknilai_ukt" name="aspeknilai_ukt" class="form-control" />
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" class="btn btn-primary">Simpan</button>
            <!-- Tombol Kembali -->
            <a href="/dashboard/kegiatan" class="btn btn-secondary">Kembali</a>
        </form>
        @endif

        @if($kegiatan->jenis === 'LKPTS')
        <h1 class="mb-4">Form Tambah Data kegiatan LKPTS</h1>
        <form action="/dashboard/kegiatan/tambahaspeklkpts/store/{{ $kegiatan->id }}" method="POST">
            @csrf
            <!-- Nama kegiatan -->
            <div class="mb-3">
                <label for="nama_kegiatan" class="form-label">Nama kegiatan</label>
                <p id="nama_kegiatan" class="form-control-plaintext">{{ $kegiatan->nama }}</p>
            </div>

            <!-- Jenis kegiatan -->
            <div class="mb-3">
                <label for="jenis_kegiatan" class="form-label">Jenis kegiatan</label>
                <p id="jenis_kegiatan" class="form-control-plaintext">{{ $kegiatan->jenis }}</p>
            </div>

            <!-- Aspek Nilai -->
            <div class="mb-3">
                <label for="aspek_nilai" class="form-label">Aspek Nilai</label>
                <ul id="aspek-nilai-container">
                    @foreach($aspeknilailkpts as $aspect)
                    <li>{{ $aspect->nama }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="mb-3">
                <label for="aspeknilai_lkpts" class="form-label">Aspek Nilai LKPTS</label>
                <input id="aspeknilai_lkpts" name="aspeknilai_lkpts" class="form-control" />
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" class="btn btn-primary">Simpan</button>
            <!-- Tombol Kembali -->
            <a href="/dashboard/kegiatan" class="btn btn-secondary">Kembali</a>
        </form>
        @endif
    </div>
</div>

@endsection