<!DOCTYPE html>
<html>

<head>
    <title>Sertifikat Hasil Tryout</title>
    <link href="{{ public_path('halaman_umum/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            position: relative;
            background: url('{{ public_path('storage/' . $settingSertifikat->watermark) }}') no-repeat center center;
            background-size: 350px 350px;
            background-blend-mode: multiply;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .content {
            margin: 0 auto;
            width: 100%;
        }

        .content table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .content table,
        .content th,
        .content td {
            border: 1px solid black;
        }

        .content th {
            padding: 8px;
            text-align: center;
            background-color: #f2f2f2;
        }

        .content td {
            padding: 8px;
            text-align: left;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
        }

        .top-right {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .center {
            text-align: center;
        }

        .table-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .table-container .left-section {
            width: 70%;
        }

        .table-container .right-section {
            width: 25%;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .barcode {
            width: 100%;
            height: 100px;
            background-color: #f2f2f2;
            text-align: center;
            vertical-align: middle;
            display: table-cell;
        }

        .image-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .info-table {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="top-right">
        <p><strong>No Sertifikat:</strong> {{ $sertifikat->no_sertifikat }}</p>
    </div>
    <div class="image-container">
        <img width="25px" src="{{ public_path('storage/' . $settingSertifikat->logo_1) }}" alt="Logo 1" class="img-fluid">
    </div>
    <div class="center">
        <h1>SERTIFIKAT HASIL</h1>
        <p>TryOut {{ $nilai->first()->first()->tryout->nama_tryout }} Tahun Pelajaran
            {{ $nilai->first()->first()->tryout->tahunPelajaran->nama_tahun_pelajaran }} Semester
            {{ $nilai->first()->first()->tryout->tahunPelajaran->semester == 1 ? 'Ganjil' : 'Genap' }}</p>
    </div>
    <hr>
    <div class="content">
        <div class="table-container">
            <div class="left-section">
                <table class="table table-bordered">
                    <tr>
                        <td width="10"><strong>Nama:</strong></td>
                        <td width="7">{{ $siswa->nama_siswa }}</td>
                    </tr>
                    <tr>
                        <td width="10"><strong>Tempat / Tanggal Lahir:</strong></td>
                        <td>{{ $siswa->tmpt_lahir }}, {{ $siswa->tgl_lahir }}</td>
                    </tr>
                    <tr>
                        <td width="10"><strong>NIS:</strong></td>
                        <td>{{ $siswa->nis }}</td>
                    </tr>
                </table>
            </div>
            <div class="right-section">
                <p>asjaksj</p>
            </div>
        </div>
        <div class="center">
            <p>Telah mengikuti TryOut {{ $nilai->first()->first()->tryout->nama_tryout }} pada tanggal
                {{ \Carbon\Carbon::parse($nilai->first()->first()->tryout->tanggal)->format('d-m-Y') }} dan berlaku sebagai
                bukti kemajuan hasil belajar bimbel studi lanjut SMAIT IMBOS Pringsewu, dengan hasil sebagai berikut:</p>
        </div>
        <div class="table-container">
            <div class="left-section">
                {{-- <div class="barcode">
                    <!-- Space for barcode -->
                </div> --}}
            </div>
            <div class="right-section">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Mapel</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mataPelajaransFalse as $mataPelajaran)
                            <tr>
                                <td>{{ $mataPelajaran->namaMataPelajaran }}</td>
                                <td>{{ $nilai->first()->where('mata_pelajaran_id', $mataPelajaran->id)->first()->nilai ?? '-' }}</td>
                            </tr>
                        @endforeach
                        @if ($mataPelajaransTrue->isNotEmpty())
                            <tr>
                                <th colspan="2">Tes Potensi Skolastik</th>
                            </tr>
                            @foreach ($mataPelajaransTrue as $mataPelajaran)
                                <tr>
                                    <td>{{ $mataPelajaran->namaMataPelajaran }}</td>
                                    <td>{{ $nilai->first()->where('mata_pelajaran_id', $mataPelajaran->id)->first()->nilai ?? '-' }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2024 SMAIT IMBOS Pringsewu</p>
    </div>
</body>

</html>
