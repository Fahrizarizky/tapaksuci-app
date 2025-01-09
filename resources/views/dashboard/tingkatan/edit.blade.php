@extends('dashboard.layout.layoutpage')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4 col-md-9">
        <h1 class="h3 text-dark text-uppercase fw-bold">Edit Cabang Latihan</h1>
        <a href="/dashboard/tingkatan" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <div class="card shadow mb-4 col-md-9">
        <div class="card-body">
            <form action="/dashboard/tingkatan/update/{{ $tingkatan->id }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="kode" class="font-weight-bold">Kode Cabang Latihan</label>
                    <input type="text" class="form-control" id="kode" name="kode" value="{{ $tingkatan->kode }}" required>
                </div>
                <div class="form-group">
                    <label for="kategori" class="font-weight-bold">Kategori Cabang Latihan</label>
                    <select type="text" class="form-control" id="kategori" name="kategori" required>
                        @foreach($jeniskategori as $kategori)
                        <option>{{ $kategori->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tingkatan" class="font-weight-bold">tingkatan</label>
                    <select type="text" class="form-control" id="tingkatan" name="tingkatan" required>
                        @foreach($jenistingkatan as $tingkatan)
                       <option>{{ $tingkatan->nama_tingkatan }}</option>
                       @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
@endsection
