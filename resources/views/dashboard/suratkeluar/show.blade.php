@extends('dashboard.layout.layoutpage')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-dark text-uppercase fw-bold">Detail Surat</h1>
        <a href="/dashboard/suratkeluar" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <div class="container mb-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Detail Surat</h5>
        </div>
            <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                <strong>Kode Surat:</strong>
                </div>
                <div class="col-md-8 text-muted">
                {{$suratkeluar->kode_surat}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                <strong>Judul Surat:</strong>
                </div>
                <div class="col-md-8 text-muted">
                {{$suratkeluar->judul_surat}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                <strong>Kebutuhan Surat:</strong>
                </div>
                <div class="col-md-8 text-muted">
                {{$suratkeluar->kebutuhan_surat}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                <strong>Nomor Surat:</strong>
                </div>
                <div class="col-md-8 text-muted">
                {{$suratkeluar->nomor_surat}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                <strong>Hal Surat:</strong>
                </div>
                <div class="col-md-8 text-muted">
                {{$suratkeluar->hal_surat}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                <strong>Tujuan Surat:</strong>
                </div>
                <div class="col-md-8 text-muted">
                {{$suratkeluar->tujuan_surat}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                <strong>Isi Surat:</strong>
                </div>
                <div class="col-md-8 text-muted">
                {{$suratkeluar->isi_surat}}
                </div>
            </div>
            </div>
        <div class="card-footer text-end">
        </div>
    </div>
    </div>
</div>
@endsection