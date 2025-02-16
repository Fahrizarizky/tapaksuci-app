@extends('dashboard.layout.layoutpage')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4 col-md-9">
        <h1 class="h3 text-dark text-uppercase fw-bold">Tambah Surat</h1>
        <a href="/dashboard/suratmasuk" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <div class="card shadow mb-4 col-md-9">
        <div class="card-body">
            <form action="/dashboard/suratmasuk/store" method="POST">
                @csrf
                <div class="form-group">
                    <label for="kode_surat" class="font-weight-bold">Kode Surat</label>
                    <select type="text" class="form-control" id="kode_surat" name="kode_surat" required>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nomor_surat" class="font-weight-bold">Nomor Surat</label>
                    <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" required>
                </div>
                <div class="form-group">
                    <label for="hal_surat" class="font-weight-bold">Hal Surat</label>
                    <input type="text" class="form-control" id="hal_surat" name="hal_surat" required>
                </div>
                <div class="form-group">
                    <label for="pengirim_surat" class="font-weight-bold">Pengirim Surat</label>
                    <input type="text" class="form-control" id="pengirim_surat" name="pengirim_surat" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_surat" class="font-weight-bold">Tanggal Surat</label>
                    <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_diterima" class="font-weight-bold">Tanggal Diterima</label>
                    <input type="date" class="form-control" id="tanggal_diterima" name="tanggal_diterima" required>
                </div>
                <div class="form-group">
                    <label for="isi_surat" class="font-weight-bold">Isi Surat</label>
                    <textarea name="isi_surat" rows="5" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection