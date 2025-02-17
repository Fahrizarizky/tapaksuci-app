@extends('dashboard.layout.layoutpage')
@section('content')

<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 text-dark text-uppercase fw-bold">Detail Anggota</h1>
    <a href="/dashboard/anggota" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
  </div>

  <div class="col-md-12">
    @if(session('message'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
      {{ session('message') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
  </div>

  <div class="container mb-5">
    <div class="card shadow-lg border-0">
      <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Detail Anggota</h5>
      </div>
      <div class="card-body">
        <div class="row mb-3">
          <div class="col-md-4">
            <strong>NIKD:</strong>
          </div>
          <div class="col-md-8 text-muted">
            {{$anggota->nikd}}
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-4">
            <strong>Nama Lengkap:</strong>
          </div>
          <div class="col-md-8 text-muted">
            {{$anggota->nama}}
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-4">
            <strong>Tempat Lahir:</strong>
          </div>
          <div class="col-md-8 text-muted">
            {{$anggota->tempat_lahir}}
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-4">
            <strong>Tanggal Lahir:</strong>
          </div>
          <div class="col-md-8 text-muted">
            {{$anggota->tanggal_lahir}}
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-4">
            <strong>Jenis Kelamin:</strong>
          </div>
          <div class="col-md-8 text-muted">
            {{$anggota->jenis_kelamin}}
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-4">
            <strong>Alamat:</strong>
          </div>
          <div class="col-md-8 text-muted">
            {{$anggota->alamat}}
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-4">
            <strong>Email Aktif:</strong>
          </div>
          <div class="col-md-8 text-muted">
            {{$anggota->email}}
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-4">
            <strong>No.Telepon/WA:</strong>
          </div>
          <div class="col-md-8 text-muted">
            {{$anggota->no_telp}}
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-4">
            <strong>Nama Cabang Latihan:</strong>
          </div>
          <div class="col-md-8 text-muted">
            {{$anggota->cabanglatihan->nama_cabang ?? 'Tidak ada cabang'}}
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-4">
            <strong>Tingkatan Saat Ini:</strong>
          </div>
          <div class="col-md-8 text-muted">
            {{$anggota->tingkatan}}
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-4">
            <strong>Tahun Masuk Tapak Suci:</strong>
          </div>
          <div class="col-md-8 text-muted">
            {{$anggota->tahun_masuk}}
          </div>
        </div>
      </div>
      <div class="card-footer text-end">
        <button class="btn btn-primary" data-toggle="modal" data-target="#editModal">Edit</button>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit Anggota</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="/dashboard/anggota/update/{{ $anggota->id }}" method="post">
              @csrf
              <!-- Inputan 1: NIKD -->
              <div class="form-group">
                <label for="nikd">NIKD</label>
                <input type="text" class="form-control" id="nikd" name="nikd" value="{{ $anggota->nikd }}" required>
              </div>
              <!-- Inputan 2: Nama -->
              <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="nama" class="form-control" id="nama" name="nama" value="{{ $anggota->nama }}" required>
              </div>
              <!-- Inputan 3: Tempat Lahir -->
              <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $anggota->tempat_lahir }}" required>
              </div>
              <!-- Inputan 4: Tanggal Lahir -->
              <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $anggota->tanggal_lahir }}" required>
              </div>
              <!-- Inputan 5: Alamat -->
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $anggota->alamat }}" required>
              </div>
              <!-- Inputan 6: Email Aktif -->
              <div class="form-group">
                <label for="email">Email Aktif</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $anggota->email }}">
              </div>
              <!-- Inputan 7: No Telepon -->
              <div class="form-group">
                <label for="no_telp">No.Telepon/WA</label>
                <input class="form-control" id="no_telp" name="no_telp" value="{{ $anggota->no_telp }}" required>
              </div>
              <!-- Inputan 8: Cabang Latihan -->
              <!-- Inputan 9: Tingakatan Saat Ini -->
              <div class="form-group">
                <label for="tingakatan">Tingkatan Saat Ini</label>
                <select class="form-control" id="tingkatan" name="tingkatan">
                  @foreach($tingkatan as $tingkat)
                  <option value="{{ $tingkat->tingkatan }}" {{ $anggota->tingkatan == $tingkat->tingkatan ? 'selected' : '' }}>{{ $tingkat->tingkatan }}</option>
                  @endforeach
                </select>
              </div>
              <!-- Inputan 10:  Tahun Masuk Tapak Suci -->
              <div class="form-group">
                <label for="tahun_masuk">Tahun Masuk Tapak Suci</label>
                <input class="form-control" id="tahun_masuk" name="tahun_masuk" value="{{ $anggota->tahun_masuk }}" required>
              </div>
              <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Riwayat Kaderisasi -->
    <div class="card shadow-lg border-0 mt-4">
      <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Riwayat Kaderisasi</h5>
        @error('ijazah')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#tambahRiwayatModal"><i class="bi bi-plus-circle"></i> Riwayat Kaderisasi</button>
      </div>
      <div class="card-body">
        <div class="table-responsive">

          <table class="table table-striped table-sm">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th>NIKD</th>
                <th>Nama Anggota</th>
                <th>Tingkatan</th>
                <th>Tanggal</th>
                <th>Ijazah</th>
                <th>aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($anggota->riwayatkaderisasi as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nikd }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->tingkatan }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>
                  <!-- Tombol untuk membuka modal dan menyertakan URL gambar -->
                  <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#imageModal" data-ijazah="{{ asset('storage/'.$item->ijazah) }}">
                    Lihat Ijazah
                  </button>
                </td>
                <td>
                  <form action="/dashboard/anggota/riwayat-kaderisasi/delete/{{ $item->id }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data')"><i class="bi bi-trash"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

          <!-- Modal Gambar -->
          <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="imageModalLabel">Gambar yang Ditampilkan</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                  <!-- Menampilkan gambar di dalam modal -->
                  <img id="modalGambar" src="" class="img-fluid align-center" alt="Gambar">
                </div>
              </div>
            </div>
          </div>

          </tbody>
          </table>
        </div>

        <!-- Modal Tambah Riwayat -->
        <div class="modal fade" id="tambahRiwayatModal" tabindex="-1" aria-labelledby="tambahRiwayatModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="tambahRiwayatModalLabel">Tambah Riwayat Kaderisasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-body">
                <!-- Form Tambah Riwayat -->
                <form action="/dashboard/anggota/riwayat-kaderisasi/store" method="post" enctype="multipart/form-data">
                  @csrf
                  <input name="anggotapimda_id" type="hidden" value="{{ $anggota->id }}">
                  <div class="mb-3">
                    <label for="nikd" class="form-label">NIKD</label>
                    <input type="text" class="form-control" name="nikd" id="nikd" required>
                  </div>
                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama Anggota</label>
                    <input type="text" class="form-control" name="nama" id="nama" required>
                  </div>
                  <div class="mb-3">
                    <label for="tingkatan" class="form-label">Tingkatan</label>
                    <select type="text" class="form-control" name="tingkatan" id="tingkatan">
                      @foreach($tingkatan as $tingkat)
                      <option>{{ $tingkat->tingkatan }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                  </div>
                  <div class="mb-3">
                    <label for="ijazah" class="form-label">Ijazah</label>
                    <input class="form-control form-control-sm" name="ijazah" id="ijazah" type="file">
                  </div>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
              </div>

            </div>
          </div>
        </div>
        @endsection