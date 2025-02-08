@extends('dashboard.layout.layoutpage')
@section('content')
<x-notify::notify />
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-dark text-uppercase fw-bold">Kegiatan Tapak Suci</h1>
    @can('adminpimda')
    <a href="/dashboard/kegiatan/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="bi bi-plus-circle"></i> Kegiatan</a>
    @endcan
</div>

@php
$notifications = auth()->user()->unreadNotifications;
@endphp

@if($notifications->count() > 0)
@can('admincabang')
<div class="dropdown mb-3">
    <button class="btn btn-primary dropdown-toggle" type="button" id="notificationDropdown" data-bs-toggle="dropdown">
        Notifikasi ({{ $notifications->count() }})
    </button>
    <ul class="dropdown-menu">
        @foreach ($notifications as $notification)
        <li>
            <a class="dropdown-item">
                {{ $notification->data['message'] }}
            </a>
        </li>
        @endforeach
    </ul>
</div>
@endcan
@endif

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

@if(auth()->user()->role == 'adminkegiatan')
<div class="card shadow mb-4">
    <div class="card-body">
        <table class="table table-striped table-hover table-sm">
            <tr>
                <td><b>No.</b></td>
                <td><b>Nama Kegiatan</b></td>
                <td><b>Jenis Kegiatan</b></td>
                <td><b>Jumlah Peserta</b></td>
                <td><b>ketua Pelaksana</b></td>
                <td><b>Status</b></td>
                <td><b>Aksi</b></td>
            </tr>
            <tr>
                <td>1</td>
                <td>{{$adminkegiatan->nama}}</td>
                <td>{{$adminkegiatan->jenis}}</td>
                <td>{{$adminkegiatan->jumlah_peserta}}</td>
                <td>{{$adminkegiatan->ketua_panitia}}</td>
                <td>{{$adminkegiatan->status == true ? 'Aktif' : 'Nonaktif'}}
                    <a href="/dashboard/kegiatan/aktif/{{ $adminkegiatan->id }}" class="btn btn-success btn-sm shadow-sm">
                        <i class="bi bi-check-lg"></i>
                    </a>
                    <a href="/dashboard/kegiatan/nonaktif/{{ $adminkegiatan->id }}" class="btn btn-danger btn-sm shadow-sm">
                        <i class="bi bi-x-lg"></i>
                    </a>
                </td>
                <td>
                    <a href="/dashboard/kegiatan/edit/{{ $adminkegiatan->id }}" class="btn btn-primary btn-sm shadow-sm"><i class="bi bi-pencil"></i></a>
                    <a href="/dashboard/kegiatan/tambahaspek/{{ $adminkegiatan->id }}" class="btn btn-primary btn-sm shadow-sm"><i class="bi bi-plus-square-fill"></i></a>
                    <a href="/dashboard/tabel/{{ $adminkegiatan->id }}" class="btn btn-info btn-sm shadow-sm"><i class="bi bi-file-earmark-text"></i></a>
                    <a href="/dashboard/kegiatan/show/{{ $adminkegiatan->id }}" class="btn btn-info btn-sm shadow-sm"><i class="bi bi-eye"></i></a>
                </td>
            </tr>
        </table>
    </div>
</div>
@endif

@can('adminpimda')
<div class="card shadow mb-4">
    <div class="card-body">
        <table class="table table-striped table-hover table-sm">
            <tr>
                <td><b>No.</b></td>
                <td><b>Nama Kegiatan</b></td>
                <td><b>Jenis Kegiatan</b></td>
                <td><b>Jumlah Peserta</b></td>
                <td><b>ketua Pelaksana</b></td>
                <td><b>Status</b></td>
                <td><b>Aksi</b></td>
            </tr>
            @foreach($kegiatans as $kegiatan)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$kegiatan->nama}}</td>
                <td>{{$kegiatan->jenis}}</td>
                <td>{{$kegiatan->jumlah_peserta}}</td>
                <td>{{$kegiatan->ketua_panitia}}</td>
                <td>{{$kegiatan->status == true ? 'Aktif' : 'Nonaktif'}}
                    <a href="/dashboard/kegiatan/aktif/{{ $kegiatan->id }}" class="btn btn-success btn-sm shadow-sm">
                        <i class="bi bi-check-lg"></i>
                    </a>
                    <a href="/dashboard/kegiatan/nonaktif/{{ $kegiatan->id }}" class="btn btn-danger btn-sm shadow-sm">
                        <i class="bi bi-x-lg"></i>
                    </a>
                </td>
                <td>
                    <a href="/dashboard/kegiatan/edit/{{ $kegiatan->id }}" class="btn btn-primary btn-sm shadow-sm"><i class="bi bi-pencil"></i></a>
                    <a href="/dashboard/kegiatan/tambahaspek/{{ $kegiatan->id }}" class="btn btn-primary btn-sm shadow-sm"><i class="bi bi-plus-square-fill"></i></a>
                    <a href="/dashboard/tabel/{{ $kegiatan->id }}" class="btn btn-info btn-sm shadow-sm"><i class="bi bi-file-earmark-text"></i></a>
                    <a href="/dashboard/kegiatan/show/{{ $kegiatan->id }}" class="btn btn-info btn-sm shadow-sm"><i class="bi bi-eye"></i></a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endcan

@can('admincabang')
<div class="card shadow mb-4">
    <div class="card-body">
        <table class="table table-striped table-hover table-sm">
            <tr>
                <td><b>No.</b></td>
                <td><b>Nama Kegiatan</b></td>
                <td><b>Waktu Kegiatan</b></td>
                <td><b>Lokasi</b></td>
                <td><b>Status</b></td>
                <td><b>Aksi</b></td>
            </tr>
            @foreach($kegiatans as $kegiatan)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$kegiatan->nama}}</td>
                <td>{{$kegiatan->waktu}}</td>
                <td>{{$kegiatan->lokasi}}</td>
                <td>{{$kegiatan->status == true ? 'Aktif' : 'Nonaktif'}}</td>
                <td>
                    <a @if($kegiatan->status == true) href="/dashboard/kegiatan/daftarkan/{{ $kegiatan->id }}" @else href="#" @endif class="btn {{ $kegiatan->status == true ? 'btn-primary' : 'btn-danger' }} btn-sm shadow-sm">DAFTAR</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endcan
@endsection