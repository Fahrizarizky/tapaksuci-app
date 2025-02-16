@extends('dashboard.layout.layoutpage')
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-dark text-uppercase fw-bold">Pengeluaran</h1>
      <a href="/dashboard/pengeluaran/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="bi bi-plus-circle"></i> Pengeluaran</a>
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
      <tr><b>Tahun Buku: {{$tahunbuku}}</b></tr>
      <tr>
        <td><b>No</b></td>
        <td><b>Nama Transaksi</b></td>
        <td><b>Tanggal Penyerahan</b></td>
        <td><b>Nominal</b></td>
        <td><b>Disetor Oleh</b></td>
        <td><b>Aksi</b></td>
      </tr>
      @foreach($pengeluaran as $item)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$item->nama_transaksi}}</td>
        <td>{{$item->tanggal_penyerahan}}</td>
        <td>{{$item->nominal}}</td>
        <td>{{$item->pemberi}}</td>
        <td>
        <a href="/dashboard/pengeluaran/edit/{{ $item->id }}" class="btn btn-primary btn-sm shadow-sm"><i class="bi bi-pencil"></i></a>
        <a href="/dashboard/pengeluaran/{{ $item->id }}" class="btn btn-info btn-sm shadow-sm"><i class="bi bi-eye"></i></a>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection