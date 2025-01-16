@extends('dashboard.layout.layoutpage')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4 col-md-12">
        <h1 class="h3 text-dark text-uppercase fw-bold">Detail Cabang Latihan</h1>
        <a href="/dashboard/cabang-latihan" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <div class="container mb-5">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Detail Cabang</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Kode:</strong>
                    </div>
                    <div class="col-md-8 text-muted">
                        {{$cabanglatihan->kode}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Kategori Cabang:</strong>
                    </div>
                    <div class="col-md-8 text-muted">
                        {{$cabanglatihan->kategori}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Nama Cabang:</strong>
                    </div>
                    <div class="col-md-8 text-muted">
                        {{$cabanglatihan->nama_cabang}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Alamat:</strong>
                    </div>
                    <div class="col-md-8 text-muted">
                        {{$cabanglatihan->alamat}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Pelatih:</strong>
                    </div>
                    <div class="col-md-8 text-muted">
                        {{$cabanglatihan->pelatih->nama}}
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
            </div>
        </div>
    </div>
</div>
@endsection