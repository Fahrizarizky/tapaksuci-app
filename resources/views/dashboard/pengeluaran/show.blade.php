@extends('dashboard.layout.layoutpage')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-dark text-uppercase fw-bold">Detail Pengeluaran</h1>
        <a href="/dashboard/pengeluaran" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <div class="container mb-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Detail Pengeluaran</h5>
        </div>
            <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                <strong>Kode Transaksi:</strong>
                </div>
                <div class="col-md-8 text-muted">
                {{$pengeluaran->kode_transaksi}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                <strong>Tahun Buku:</strong>
                </div>
                <div class="col-md-8 text-muted">
                {{$pengeluaran->tahun_buku}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                <strong>Nama Transaksi:</strong>
                </div>
                <div class="col-md-8 text-muted">
                {{$pengeluaran->nama_transaksi}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                <strong>Nominal:</strong>
                </div>
                <div class="col-md-8 text-muted">
                {{$pengeluaran->nominal}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                <strong>Diminta Oleh:</strong>
                </div>
                <div class="col-md-8 text-muted">
                {{$pengeluaran->peminta}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                <strong>Dikeluarkan Oleh:</strong>
                </div>
                <div class="col-md-8 text-muted">
                {{$pengeluaran->pemberi}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                <strong>Tanggal Penyerahan:</strong>
                </div>
                <div class="col-md-8 text-muted">
                {{$pengeluaran->tanggal_penyerahan}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                <strong>Lokasi Penyerahan:</strong>
                </div>
                <div class="col-md-8 text-muted">
                {{$pengeluaran->lokasi_penyerahan}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                <strong>Keterangan:</strong>
                </div>
                <div class="col-md-8 text-muted">
                {{$pengeluaran->keterangan}}
                </div>
            </div>
            </div>
        <div class="card-footer text-end">
        </div>
    </div>
    </div>
</div>
@endsection