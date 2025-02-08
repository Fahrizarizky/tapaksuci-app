@extends('dashboard.layout.layoutpage')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4 col-md-9">
        <h1 class="h3 text-dark text-uppercase fw-bold">Edit Admin Kegiatan</h1>
        <a href="/dashboard/kegiatan/adminkegiatan" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <div class="card shadow mb-4 col-md-9">
        <div class="card-body">
            <form action="/dashboard/kegiatan/adminkegiatan/update/{{ $adminkegiatan->id }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username" class="font-weight-bold">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ $adminkegiatan->username }}" required>
                </div>
                <div class="form-group">
                    <label for="email" class="font-weight-bold">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $adminkegiatan->email }}" required>
                </div>
                <div class="form-group">
                    <label for="password" class="font-weight-bold">Password</label>
                    <input type="text" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="kegiatan_id" class="font-weight-bold">Nama Kegiatan</label>
                    <select type="text" class="form-control" id="kegiatan_id" name="kegiatan_id" required>
                        @foreach($kegiatans as $kegiatan)
                        <option {{ $kegiatan->nama == $namakegiatan ? 'selected' : ''}} value="{{ $kegiatan->id }}">{{$kegiatan->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="role" class="font-weight-bold">Role</label>
                    <select type="text" class="form-control" id="role" name="role" required>
                        <option value="adminkegiatan">adminkegiatan</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
@endsection