@extends('dashboard.layout.layoutpage')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4 col-md-9">
        <h1 class="h3 text-dark text-uppercase fw-bold">Edit Kategori</h1>
        <a href="/dashboard/kategorikeuangan" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <div class="card shadow mb-4 col-md-9">
        <div class="card-body">
            <form action="/dashboard/kategorikeuangan/update/{{ $kategori->id }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="kode" class="font-weight-bold">Kode</label>
                    <input type="text" class="form-control" id="kode" name="kode" value="{{ $kategori->kode }}" required>
                </div>
                <div class="form-group">
                    <label for="kategori" class="font-weight-bold">Kategori</label>
                    <select type="text" class="form-control" id="kategori" name="kategori" required>
                        @foreach($kategorikeuangan as $item)
                        <option {{ $item->id == $kategori->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
@endsection
