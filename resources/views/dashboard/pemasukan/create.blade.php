@extends('dashboard.layout.layoutpage')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4 col-md-9">
        <h1 class="h3 text-dark text-uppercase fw-bold">Tambah Pemasukkan</h1>
        <a href="/dashboard/pemasukan" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <div class="card shadow mb-4 col-md-9">
        <div class="card-body">
            <form action="/dashboard/pemasukan/store" method="POST">
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
                    <label for="kategori" class="font-weight-bold">Kategori</label>
                    <select type="text" class="form-control" id="kategori" name="kategori" required>
                        @foreach($kategorikeuangan as $item)
                        <option>{{$item->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nominal" class="font-weight-bold">Nominal</label>
                    <input type="text" class="form-control" id="nominal" name="nominal" required>
                </div>
                <div class="form-group">
                    <label for="pengirim" class="font-weight-bold">Diserahkan Oleh</label>
                    <input type="text" class="form-control" id="pengirim" name="pengirim" required>
                </div>
                <div class="form-group">
                    <label for="penerima" class="font-weight-bold">Diterima Oleh</label>
                    <input type="text" class="form-control" id="penerima" name="penerima" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_pengiriman" class="font-weight-bold">Tanggal Penyerahan</label>
                    <input type="date" class="form-control" id="tanggal_pengiriman" name="tanggal_pengiriman" required>
                </div>
                <div class="form-group">
                    <label for="lokasi_pengiriman" class="font-weight-bold">Lokasi Penyerahan</label>
                    <input type="text" class="form-control" id="lokasi_pengiriman" name="lokasi_pengiriman" required>
                </div>
                <div class="form-group">
                    <label for="keterangan" class="font-weight-bold">Keterangan Pemasukkan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection