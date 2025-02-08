@extends('dashboard.layout.layoutpage')
@section('content')

@if(auth()->user()->role == 'adminkegiatan')
<!-- Top Row: Welcome Message -->
<div class="row">
  <div class="col-lg-12">
    <div class="card shadow-lg border-0">
      <div class="card-body text-center bg-primary text-white">
        <h3 class="fw-bold">Selamat Datang, Admin Kegiatan</h3>
        <p class="mb-0">Kelola data kegiatan dengan mudah dan efisien.</p>
      </div>
    </div>
  </div>
</div>
@endif

@if(auth()->user()->role == 'adminpimda' || auth()->user()->role == 'admincabang')
<div class="container-fluid py-4">

  <!-- Top Row: Welcome Message -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow-lg border-0">
        <div class="card-body text-center bg-primary text-white">
          <h3 class="fw-bold">Selamat Datang, Admin</h3>
          <p class="mb-0">Kelola data cabang latihan, tingkatan, dan anggota Tapak Suci dengan mudah dan efisien.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Middle Row: Summary Statistics -->
  <div class="row mt-4">

    <!-- Cabang Latihan -->
    <div class="col-md-4 mb-4">
      <div class="card border-primary shadow-sm">
        <div class="card-body text-center">
          <h6 class="text-uppercase text-primary fw-bold">Cabang Latihan</h6>
          <h2 class="fw-bold text-gray-800">{{ count($cabanglatihan) }}</h2>
          <p class="text-muted">Cabang Terdaftar</p>
          <a href="/dashboard/cabang-latihan" class="btn btn-primary btn-sm">Lihat Detail</a>
        </div>
      </div>
    </div>

    <!-- Tingkatan Tapak Suci -->
    <div class="col-md-4 mb-4">
      <div class="card border-success shadow-sm">
        <div class="card-body text-center">
          <h6 class="text-uppercase text-success fw-bold">Tingkatan Tapak Suci</h6>
          <h2 class="fw-bold text-gray-800">{{ count($tingkatan) }}</h2>
          <p class="text-muted">Tingkatan Tersedia</p>
          <a href="/dashboard/tingkatan" class="btn btn-success btn-sm">Lihat Detail</a>
        </div>
      </div>
    </div>

    <!-- Anggota Tapak Suci -->
    <div class="col-md-4 mb-4">
      <div class="card border-info shadow-sm">
        <div class="card-body text-center">
          <h6 class="text-uppercase text-info fw-bold">Anggota Tapak Suci</h6>
          @if(auth()->user()->role !== 'adminpimda')
          <h2 class="fw-bold text-gray-800">{{ count($anggotacabanglatihan) }}</h2>
          @else
          <h2 class="fw-bold text-gray-800">{{ count($anggotapimda) }}</h2>
          @endif
          <p class="text-muted">Anggota Terdaftar</p>
          <a href="/dashboard/anggota" class="btn btn-info btn-sm">Lihat Detail</a>
        </div>
      </div>
    </div>

  </div>

  <!-- Bottom Row: Motivational Quote and Logo -->
  <div class="row mt-4">

    <!-- Motivational Quote -->
    <div class="col-lg-12">
      <div class="card shadow-lg border-0">
        <div class="card-body text-center">
          <h4 class="fw-bold text-primary">"Kesuksesan adalah hasil dari kerja keras dan disiplin."</h4>
          <p class="text-muted mb-0">Tetap semangat dalam mengelola dan mengembangkan Tapak Suci.</p>
        </div>
      </div>
    </div>

    <!-- Logo or Branding -->
    <!-- <div class="col-lg-4">
      <div class="card shadow-lg border-0">
        <div class="card-body text-center">
          <img src="{{ asset('logotapaksuci3.jpg') }}" alt="Logo Tapak Suci" class="img-fluid" style="max-height: 150px;">
          <p class="text-muted mt-2">Tapak Suci Pekanbaru</p>
        </div>
      </div>
    </div> -->

  </div>

</div>
@endif

@endsection