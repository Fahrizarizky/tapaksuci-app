@extends('dashboard.layout.layoutpage')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4 col-md-9">
        <h1 class="h3 text-dark text-uppercase fw-bold">Tambah Tingkatan</h1>
        <a href="/dashboard/tingkatan" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <div class="card shadow mb-4 col-md-9">
        <div class="card-body">
            <form action="/dashboard/kategorikeuangan/store" method="POST">
                @csrf
                <div class="form-group">
                    <label for="kode" class="font-weight-bold">Kode Tingkatan</label>
                    <input type="text" class="form-control" id="kode" name="kode" required>
                </div>
                <div class="form-group">
                    <label for="kategori" class="font-weight-bold">Kategori Tingkatan</label>
                    <select type="text" class="form-control" id="kategori" name="kategori" required>
                        @foreach($jeniskategori as $kategori)
                        <option>{{$kategori->nama_kategori}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection