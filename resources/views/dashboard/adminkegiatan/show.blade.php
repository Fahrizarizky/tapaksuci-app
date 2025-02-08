@extends('dashboard.layout.layoutpage')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4 col-md-12">
        <h1 class="h3 text-dark text-uppercase fw-bold">Detail Admin Kegiatan</h1>
        <a href="/dashboard/kegiatan/adminkegiatan" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <div class="container mb-5">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Detail Admin Cabang</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Username:</strong>
                    </div>
                    <div class="col-md-8 text-muted">
                        {{$adminkegiatan->username}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Email:</strong>
                    </div>
                    <div class="col-md-8 text-muted">
                        {{$adminkegiatan->email}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Role:</strong>
                    </div>
                    <div class="col-md-8 text-muted">
                        {{$adminkegiatan->role}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Nama Kegiatan:</strong>
                    </div>
                    <div class="col-md-8 text-muted">
                        {{$adminkegiatan->kegiatan->nama}}
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
            </div>
        </div>
    </div>
</div>
@endsection