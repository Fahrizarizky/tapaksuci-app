@extends('dashboard.layout.layoutpage')
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-dark text-uppercase fw-bold">Cabang Latihan</h1>
  <a href="/dashboard/cabang-latihan/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="bi bi-plus-circle"></i> Cabang Latihan</a>
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
    <table class="table table-striped table-hover table-sm">
      <tr>
        <td><b>Kode</b></td>
        <td><b>Kategori Cabang</b></td>
        <td><b>Nama Cabang</b></td>
        <td><b>Alamat</b></td>
        <td><b>Pelatih</b></td>
        <td><b>Aksi</b></td>
      </tr>

      @can('admincabang')
      @foreach($cabanglatihanadmin as $cabang)
      <tr>
        <td>{{$cabang->kode}}</td>
        <td>{{$cabang->kategori}}</td>
        <td>{{$cabang->nama_cabang}}</td>
        <td>{{$cabang->alamat}}</td>
        <td>{{$cabang->pelatih}}</td>
        <td><strong>----</strong></td>
      </tr>
      @endforeach
      @endcan

      @can('adminpimda')
      @foreach($cabanglatihan as $cabang)
      <tr>
        <td>{{$cabang->kode}}</td>
        <td>{{$cabang->kategori}}</td>
        <td>{{$cabang->nama_cabang}}</td>
        <td>{{$cabang->alamat}}</td>
        <td>{{$cabang->pelatih}}</td>
        <td>
          <a href="/dashboard/cabang-latihan/edit/{{ $cabang->id }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
          <a href="/dashboard/cabang-latihan/{{ $cabang->id }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
          <form action="/dashboard/cabang-latihan/delete/{{ $cabang->id }}" method="post" class="d-inline">
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