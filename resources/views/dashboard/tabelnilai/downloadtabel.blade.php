<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            width: 100%;
            padding: 20px;
            background: #ffffff;
        }

        h1 {
            text-align: center;
            font-size: 20px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            table-layout: fixed;
            word-wrap: break-word;
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        th,
        td {
            text-align: center;
            padding: 8px;
            font-size: 12px;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .footer {
            margin-top: 20px;
            text-align: right;
            font-size: 12px;
            font-style: italic;
        }

        /* CSS khusus untuk pencetakan */
        @media print {
            @page {
                size: A4 landscape;
                margin: 10mm;
            }

            body {
                margin: 0;
                padding: 0;
                background: none;
            }

            .container {
                padding: 0;
            }

            table {
                table-layout: auto;
            }

            th,
            td {
                font-size: 11px;
            }

            h1 {
                font-size: 14px;
                margin-bottom: 15px;
            }
        }

        .nilai-column {
            width: 8%;
        }

        .label-nilai {
            font-size: 10px;
            font-weight: normal;
            color: #555;
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Data Table</h1>
        <table>
            <thead>
                <tr>
                    <th rowspan="2" style="width: 4%;">No</th>
                    <th rowspan="2" style="width: 12%;">Nama Lengkap</th>
                    <th rowspan="2" style="width: 8%;">Tempat Lahir</th>
                    <th rowspan="2" style="width: 8%;">Tanggal Lahir</th>
                    <th rowspan="2" style="width: 5%;">Jekel</th>
                    <th rowspan="2" style="width: 8%;">Tahun Masuk TS</th>
                    <th rowspan="2" style="width: 8%;">Cabang</th>
                    <th rowspan="2" style="width: 8%;">Kategori UKT</th>
                    <th colspan="{{ count($columns) }}" class="nilai-column">Nilai</th>
                    <th rowspan="2" style="width: 8%;">Jumlah Nilai</th>
                </tr>
                <tr>
                    @foreach($columns as $column)
                    <th style="width: 8%;"><span class="label-nilai">{{ $column }}</span></th>
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
                    <td>{{ $row->kelamin }}</td>
                    <td>{{ $row->tahun_masuk_ts }}</td>
                    <td>{{ $row->cabang }}</td>
                    <td>{{ $row->kategori_ukt }}</td>
                    @foreach($columns as $column)
                    <td>{{ $row->{strtolower(str_replace(' ', '_', $column))} }}</td>
                    @endforeach
                    <td>{{ $row->jumlah_nilai }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="footer">
            Dicetak pada: {{ now()->format('d-m-Y H:i') }}
        </div>
    </div>
</body>

</html>