@extends('dashboard.layout.layoutpage')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-12">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Nama Lengkap</th>
                        <th rowspan="2">Tempat Lahir</th>
                        <th rowspan="2">Tanggal Lahir</th>
                        <th rowspan="2">Kelamin</th>
                        <th rowspan="2">Tahun Masuk TS</th>
                        <th rowspan="2">Cabang</th>
                        <th rowspan="2">Kategori UKT</th>
                        <th colspan="{{ count($columns) }}" class="text-center">Nilai</th>
                        <th rowspan="2">Jumlah Nilai</th>
                    </tr>
                    <tr>
                        @foreach($columns as $column)
                        <th>{{ $column }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $row)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $row->nama_lengkap }}</td>
                        <td>{{ $row->tempat_lahir }}</td>
                        <td>{{ $row->tanggal_lahir }}</td>
                        <td>{{ $row->jenis_kelamin }}</td>
                        <td>{{ $row->tahunmasuk_ts }}</td>
                        <td>{{ $row->cabang }}</td>
                        <td>{{ $row->kategori_ukt }}</td>
                        @foreach($columns as $column)
                        <td contenteditable="true" data-id="{{ $row->id }}" data-column="{{ strtolower(str_replace(' ', '_', $column)) }}">
                            {{ $row->{strtolower(str_replace(' ', '_', $column))} }}
                        </td>
                        @endforeach
                        <td contenteditable="true" data-id="{{ $row->id }}" data-column="jumlah_nilai">
                            {{ $row->jumlah_nilai }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="/dashboard/table/export-pdf" class="btn btn-primary">Export to PDF</a>
        </div>
    </div>
</div>
@endsection