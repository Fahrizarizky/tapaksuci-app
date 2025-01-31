@extends('dashboard.layout.layoutpage')
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-dark text-uppercase fw-bold">Anggota Pimda</h1>
  <a href="/dashboard/anggota/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="bi bi-plus-circle"></i> Anggota</a>
</div>

<div class="row justify-content-center">
  <div class="col-md-8">
    @if(session('message'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
      {{ session('message') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
  </div>
</div>

<div class="card shadow mb-4">
  <div class="card-body">
    @can('adminpimda')
    <div class="mb-3">
      <h6><b>Filter Tingkatan⬇</b></h6>
      <a href="/dashboard/anggota/" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="bi bi-people-fill"></i> Semua</a>
      <a href="/dashboard/anggota/pendekar" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="bi bi-people-fill"></i> Pendekar</a>
      <a href="/dashboard/anggota/kader" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="bi bi-people-fill"></i> Kader</a>
      <a href="/dashboard/anggota/siswa" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="bi bi-people-fill"></i> Siswa</a>
    </div>
    @endcan
    <table class="table table-striped table-hover table-sm">
      <tr>
        <td><b>No</b></td>
        <td><b>NIKD</b></td>
        <td><b>Nama Anggota</b></td>
        <td><b>no_telp/WA</b></td>
        <td><b>Tingkatan</b></td>
        <td><b>Tahun Masuk</b></td>
        <td><b>Riwayat Kaderisasi</b></td>
      </tr>
      @can('adminpimda')
      @foreach($anggotapimda as $anggota)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $anggota->nikd }}</td>
        <td>{{$anggota->nama}}</td>
        <td>{{$anggota->no_telp}}</td>
        <td>{{$anggota->tingkatan}}</td>
        <td>{{$anggota->tahun_masuk}}</td>
        <td><a href="/dashboard/anggota/{{ $anggota->id }}" class="btn btn-info btn-sm shadow-sm"><i class="bi bi-eye"></i></a>
          <form action="/dashboard/anggota/delete/{{ $anggota->id }}" method="post" class="d-inline">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data')"><i class="bi bi-trash"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
      @endcan
      @can('admincabang')
      @foreach($anggotapimdasiswa as $siswa)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $siswa->nikd }}</td>
        <td>{{$siswa->nama}}</td>
        <td>{{$siswa->no_telp}}</td>
        <td>{{$siswa->tingkatan}}</td>
        <td>{{$siswa->tahun_masuk}}</td>
        <td><a href="/dashboard/anggota/{{ $siswa->id }}" class="btn btn-info btn-sm shadow-sm"><i class="bi bi-eye"></i></a>
          <form action="/dashboard/anggota/delete/{{ $siswa->id }}" method="post" class="d-inline">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data')"><i class="bi bi-trash"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
      @endcan
    </table>
  </div>
</div>
@endsection