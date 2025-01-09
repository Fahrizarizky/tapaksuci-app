@extends('dashboard.layout.layoutpage')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-dark text-uppercase fw-bold">Detail Tingkatan</h1>
        <a href="/dashboard/tingkatan" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <div class="container mb-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Detail Tingkatan</h5>
        </div>
            <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                <strong>Kode Tingkatan:</strong>
                </div>
                <div class="col-md-8 text-muted">
                {{$tingkatan->kode}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                <strong>Kategori Tingkatan:</strong>
                </div>
                <div class="col-md-8 text-muted">
                {{$tingkatan->kategori}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                <strong>Tingkatan:</strong>
                </div>
                <div class="col-md-8 text-muted">
                {{$tingkatan->tingkatan}}
                </div>
            </div>
            </div>
        <div class="card-footer text-end">
        </div>
    </div>
    </div>
</div>
@endsection