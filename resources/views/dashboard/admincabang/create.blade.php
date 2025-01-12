@extends('dashboard.layout.layoutpage')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4 col-md-9">
        <h1 class="h3 text-dark text-uppercase fw-bold">Tambah Admin Cabang</h1>
        <a href="/dashboard/admincabang" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <div class="col-md-9">
        @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>

    <div class="card shadow mb-4 col-md-9">
        <div class="card-body">
            <form action="/dashboard/admincabang/store" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username" class="font-weight-bold">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="email" class="font-weight-bold">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password" class="font-weight-bold">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="nama_cabang" class="font-weight-bold">Nama Cabang Latihan</label>
                    <select type="text" class="form-control" id="kategori" name="nama_cabang" required>
                        @foreach($namacabang as $cabang)
                        <option value="{{ $cabang->id }}">{{$cabang->nama_cabang}}</option>
                        @endforeach
                    </select>
                </div>
               <div class="form-group">
                    <label for="role" class="font-weight-bold">Role</label>
                    <select type="text" class="form-control" id="role" name="role" required>
                      <option value="admincabang">admincabang</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
