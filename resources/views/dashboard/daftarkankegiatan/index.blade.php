@extends('dashboard.layout.layoutpage')
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-dark text-uppercase fw-bold">Daftar Kegiatan Anggota</h1>
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
                <td><b>No.</b></td>
                <td><b>NIKD</b></td>
                <td><b>Nama</b></td>
                <td><b>Kegiatan</b></td>
            </tr>
            @foreach($siswas as $siswa)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$siswa->nikd}}</td>
                <td>{{$siswa->nama_siswa}}</td>
                <td>{{$siswa->nama_kegiatan}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection