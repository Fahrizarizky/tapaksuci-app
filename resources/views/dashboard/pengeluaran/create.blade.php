@extends('dashboard.layout.layoutpage')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4 col-md-9">
        <h1 class="h3 text-dark text-uppercase fw-bold">Tambah Pengeluaran</h1>
        <a href="/dashboard/pengeluaran" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <div class="card shadow mb-4 col-md-9">
        <div class="card-body">
            <form action="/dashboard/pengeluaran/store" method="POST">
                @csrf
                <div class="form-group">
                    <label for="kode_transaksi" class="font-weight-bold">Kode Transaksi</label>
                    <input type="text" class="form-control" id="kode_transaksi" name="kode_transaksi" required>
                </div>
                <div class="form-group">
                    <label for="tahun_buku" class="font-weight-bold">Tahun Buku</label>
                    <input type="text" class="form-control" id="tahun_buku" name="tahun_buku" required>
                </div>
                <div class="form-group">
                    <label for="nama_transaksi" class="font-weight-bold">Nama Transaksi</label>
                    <input type="text" class="form-control" id="nama_transaksi" name="nama_transaksi" required>
                </div>
                <div class="form-group">
                    <label for="nominal" class="font-weight-bold">Nominal</label>
                    <input type="text" class="form-control" id="nominal" name="nominal" required>
                </div>
                <div class="form-group">
                    <label for="peminta" class="font-weight-bold">Diminta Oleh</label>
                    <input type="text" class="form-control" id="peminta" name="peminta" required>
                </div>
                <div class="form-group">
                    <label for="pemberi" class="font-weight-bold">Dikeluarkan Oleh</label>
                    <input type="text" class="form-control" id="pemberi" name="pemberi" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_penyerahan" class="font-weight-bold">Tanggal Penyerahan</label>
                    <input type="date" class="form-control" id="tanggal_penyerahan" name="tanggal_penyerahan" required>
                </div>
                <div class="form-group">
                    <label for="lokasi_penyerahan" class="font-weight-bold">Lokasi Penyerahan</label>
                    <input type="text" class="form-control" id="lokasi_penyerahan" name="lokasi_penyerahan" required>
                </div>
                <div class="form-group">
                    <label for="keterangan" class="font-weight-bold">Keterangan Pengeluaran</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection