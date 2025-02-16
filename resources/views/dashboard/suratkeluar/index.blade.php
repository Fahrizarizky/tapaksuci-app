@extends('dashboard.layout.layoutpage')
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-dark text-uppercase fw-bold">Surat Keluar</h1>
      <a href="/dashboard/suratkeluar/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="bi bi-plus-circle"></i> Surat</a>
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
        <td><b>No</b></td>
        <td><b>Judul Surat</b></td>
        <td><b>Kebutuhan Surat</b></td>
        <td><b>Tujuan Surat</b></td>
        <td><b>Aksi</b></td>
      </tr>
      @foreach($suratkeluar as $item)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$item->judul_surat}}</td>
        <td>{{$item->kebutuhan_surat}}</td>
        <td>{{$item->tujuan_surat}}</td>
        <td>
        <a href="/dashboard/suratkeluar/edit/{{ $item->id }}" class="btn btn-primary btn-sm shadow-sm"><i class="bi bi-pencil"></i></a>
        <a href="/dashboard/suratkeluar/{{ $item->id }}" class="btn btn-info btn-sm shadow-sm"><i class="bi bi-eye"></i></a>
        <form class="d-inline" action="/dashboard/suratkeluar/delete/{{ $item->id }}" method="post">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger btn-sm shadow-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"><i class="bi bi-trash"></i></button>
        </form>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection