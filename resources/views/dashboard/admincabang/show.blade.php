@extends('dashboard.layout.layoutpage')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4 col-md-12">
        <h1 class="h3 text-dark text-uppercase fw-bold">Detail Admin Cabang</h1>
        <a href="/dashboard/admincabang" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
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
            {{$admincabang->username}}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
            <strong>Email:</strong>
            </div>
            <div class="col-md-8 text-muted">
            {{$admincabang->email}}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
            <strong>Role:</strong>
            </div>
            <div class="col-md-8 text-muted">
            {{$admincabang->role}}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
            <strong>Nama Cabang Latihan:</strong>
            </div>
            <div class="col-md-8 text-muted">
            {{$admincabang->cabanglatihan->nama_cabang}}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
            <strong>Status:</strong>
            </div>
            <div class="col-md-8 text-muted">
            @if($admincabang->status == true)
            Aktif
            @else
            Nonaktif
            @endif
            </div>
        </div>
        </div>
        <div class="card-footer text-end">
        </div>
    </div>
    </div>
</div>
@endsection