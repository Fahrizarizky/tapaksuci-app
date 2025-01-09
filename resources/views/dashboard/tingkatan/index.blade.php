@extends('dashboard.layout.layoutpage')
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-dark text-uppercase fw-bold">Tingkatan Tapak Suci</h1>
      <a href="/dashboard/tingkatan/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="bi bi-plus-circle"></i> Tingkatan</a>
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
        <td><b>Kategori Tingkatan</b></td>
        <td><b>Tingkatan</b></td>
        <td><b>Aksi</b></td>
      </tr>
      @foreach($tingkatans as $tingkatan)
      <tr>
        <td>{{$tingkatan->kode}}</td>
        <td>{{$tingkatan->kategori}}</td>
        <td>{{$tingkatan->tingkatan}}</td>
        <td>
        <a href="/dashboard/tingkatan/edit/{{ $tingkatan->id }}" class="btn btn-primary btn-sm shadow-sm"><i class="bi bi-pencil"></i></a>
        <a href="/dashboard/tingkatan/{{ $tingkatan->id }}" class="btn btn-info btn-sm shadow-sm"><i class="bi bi-eye"></i></a>
        <form class="d-inline" action="/dashboard/tingkatan/delete/{{ $tingkatan->id }}" method="post">
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