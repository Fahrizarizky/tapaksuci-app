@extends('dashboard.layout.layoutpage')
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-dark text-uppercase fw-bold">Admin Cabang</h1>
  <a href="/dashboard/admincabang/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="bi bi-plus-circle"></i> Admin</a>
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
        <td><b>Cabang Latihan</b></td>
        <td><b>Role</b></td>
        <td><b>Status</b></td>
        <td><b>Aksi</b></td>
      </tr>
      @foreach($admincabang as $admin)
      <tr>
        <td>{{$admin->username}}</td>
        <td>{{$admin->email}}</td>
        <td>{{$admin->cabanglatihan->nama_cabang ?? 'Tidak ada cabang'}}</td>
        <td>{{$admin->role}}</td>
        <td>{{$admin->status == true ? 'Aktif' : 'Nonaktif'}}
          <a href="/dashboard/admincabang/aktif/{{ $admin->id }}" class="btn btn-success btn-sm shadow-sm">
            <i class="bi bi-check-lg"></i>
          </a>
          <a href="/dashboard/admincabang/nonaktif/{{ $admin->id }}" class="btn btn-danger btn-sm shadow-sm">
            <i class="bi bi-x-lg"></i>
          </a>
        </td>
        <td>
          <a href="/dashboard/admincabang/edit/{{ $admin->id }}" class="btn btn-primary btn-sm shadow-sm"><i class="bi bi-pencil"></i></a>
          <a href="/dashboard/admincabang/{{ $admin->id }}" class="btn btn-info btn-sm shadow-sm"><i class="bi bi-eye"></i></a>
          <form class="d-inline" action="/dashboard/admincabang/delete/{{ $admin->id }}" method="post">
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