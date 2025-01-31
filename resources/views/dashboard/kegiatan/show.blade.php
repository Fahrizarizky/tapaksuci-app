@extends('dashboard.layout.layoutpage')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-dark text-uppercase fw-bold">Detail Kegiatan</h1>
        <a href="/dashboard/kegiatan" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <div class="container mb-5">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Detail Kegiatan</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Nama Kegiatan :</strong>
                    </div>
                    <div class="col-md-8 text-muted">
                        {{$kegiatan->nama}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Waktu Pelaksanaan :</strong>
                    </div>
                    <div class="col-md-8 text-muted">
                        {{$kegiatan->waktu}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Lokasi Pelaksanaan :</strong>
                    </div>
                    <div class="col-md-8 text-muted">
                        {{$kegiatan->lokasi}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Ketua Panitia :</strong>
                    </div>
                    <div class="col-md-8 text-muted">
                        {{$kegiatan->ketua_panitia}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Wakil Ketua Panitia :</strong>
                    </div>
                    <div class="col-md-8 text-muted">
                        {{$kegiatan->wakilketua_panitia}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Sekretaris Panitia :</strong>
                    </div>
                    <div class="col-md-8 text-muted">
                        {{$kegiatan->sekretaris_panitia}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Bendahara Panitia :</strong>
                    </div>
                    <div class="col-md-8 text-muted">
                        {{$kegiatan->bendahara_panitia}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Jenis Kegiatan :</strong>
                    </div>
                    <div class="col-md-8 text-muted">
                        {{$kegiatan->jenis}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Jumlah Cabang Yang Ikut :</strong>
                    </div>
                    <div class="col-md-8 text-muted">
                        {{$kegiatan->jumlah_cabang}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Jumlah Peserta :</strong>
                    </div>
                    <div class="col-md-8 text-muted">
                        {{$kegiatan->jumlah_peserta}}
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
            </div>
        </div>
    </div>
</div>
@endsection