@extends('dashboard.layout.layoutpage')
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-dark text-uppercase fw-bold">Admin Kegiatan</h1>
    <a href="/dashboard/kegiatan/adminkegiatan/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="bi bi-plus-circle"></i> Admin</a>
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
                <td><b>Username</b></td>
                <td><b>Email</b></td>
                <td><b>Role</b></td>
                <td><b>Aksi</b></td>
            </tr>
            @foreach($adminkegiatan as $admin)
            <tr>
                <td>{{$admin->username}}</td>
                <td>{{$admin->email}}</td>
                <td>{{$admin->role}}</td>
                <td>
                    <a href="/dashboard/kegiatan/adminkegiatan/edit/{{ $admin->id }}" class="btn btn-primary btn-sm shadow-sm"><i class="bi bi-pencil"></i></a>
                    <a href="/dashboard/kegiatan/adminkegiatan/{{ $admin->id }}" class="btn btn-info btn-sm shadow-sm"><i class="bi bi-eye"></i></a>
                    <form class="d-inline" action="/dashboard/kegiatan/adminkegiatan/delete/{{ $admin->id }}" method="post">
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