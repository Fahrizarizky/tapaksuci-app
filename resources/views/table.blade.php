<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nilai UKT Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
            text-align: center;
        }

        td[contenteditable="true"] {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
    @if($jeniskegiatan === 'UKT Siswa')
    <!-- TABEL EDIT NILAI UKT SISWA -->
    <div class="container mt-4">
        <h2>Form Nilai UKT Siswa</h2>
        <table class="table table-bordered" id="data-table">
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
                    <th colspan="{{ count($aspeknilaiukt ?? []) }}">Nilai</th>
                    <th rowspan="2">Jumlah Nilai</th>
                </tr>
                <tr>
                    @foreach($aspeknilaiukt as $aspek)
                    <th>{{ $aspek->nama }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($seluruhpeserta as $peserta)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $peserta->nama_lengkap }}</td>
                    <td>{{ $peserta->tempat_lahir }}</td>
                    <td>{{ $peserta->tanggal_lahir }}</td>
                    <td>{{ $peserta->jenis_kelamin }}</td>
                    <td>{{ $peserta->tahunmasuk_ts }}</td>
                    <td>{{ $peserta->cabang }}</td>
                    <td>{{ $kategoriukt}}</td>

                    @foreach($aspeknilaiukt as $aspek)
                    <td contenteditable="true"></td>
                    @endforeach
                    <td contenteditable="true"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button class="btn btn-primary" onclick="exportToPDF()">Export to PDF</button>
        <a href="/dashboard/kegiatan" class="btn btn-primary">Back</a>
    </div>
    @endif

    @if($jeniskegiatan === 'LKPTS')
    <!-- TABEL EDIT UNTUK LKPTS -->
    <div class="container mt-4">
        <h2>Form Nilai UKT Siswa</h2>
        <table class="table table-bordered" id="data-table">
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Nama Lengkap</th>
                    <th rowspan="2">Tahun Masuk TS</th>
                    <th rowspan="2">Cabang</th>
                    <th colspan="{{ count($aspeknilailkpts ?? []) }}">Nilai</th>
                    <th rowspan="2">Jumlah Nilai</th>
                </tr>
                <tr>
                    @foreach($aspeknilailkpts as $aspek)
                    <th>{{ $aspek->nama }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($seluruhpeserta as $peserta)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $peserta->nama_lengkap }}</td>
                    <td>{{ $peserta->tahunmasuk_ts }}</td>
                    <td>{{ $peserta->cabang }}</td>
                    @foreach($aspeknilailkpts as $aspek)
                    <td contenteditable="true"></td>
                    @endforeach
                    <td contenteditable="true"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button class="btn btn-primary" onclick="exportToPDF()">Export to PDF</button>
        <a href="/dashboard/kegiatan" class="btn btn-primary">Back</a>
    </div>
    @endif

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.27/jspdf.plugin.autotable.min.js"></script>
    <script>
        function exportToPDF() {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF('landscape');
            doc.autoTable({
                html: '#data-table',
                bodyStyles: {
                    fontSize: 10,
                    cellPadding: 2
                },
                theme: 'grid'
            });
            doc.save('form-nilai-ukt.pdf');
        }
    </script>
    <script>
        function updateValue(select) {
            let selectedValue = select.value;

            // Jika pengguna memilih opsi default, jangan ubah apapun
            if (!selectedValue) return;

            let parentTd = select.parentElement;
            parentTd.innerHTML = selectedValue; // Ganti dropdown dengan teks
        }
    </script>
</body>

</html>