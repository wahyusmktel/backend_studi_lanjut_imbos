<!DOCTYPE html>
<html>
<head>
    <title>Sertifikat Hasil Tryout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
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
        .content table, .content th, .content td {
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
        .barcode {
            text-align: right;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>SERTIFIKAT HASIL</h1>
        <p>TryOut {{ $nilai->first()->first()->tryout->nama_tryout }} Tahun Pelajaran {{ $nilai->first()->first()->tryout->tahunPelajaran->nama_tahun_pelajaran }} Semester {{ $nilai->first()->first()->tryout->tahunPelajaran->semester == 1 ? 'Ganjil' : 'Genap' }}</p>
    </div>
    <hr>
    <div class="content">
        <div class="left-section">
            <p><strong>Nama:</strong> {{ $siswa->nama_siswa }}</p>
            <p><strong>Tempat / Tanggal Lahir:</strong> {{ $siswa->tmpt_lahir }}, {{ $siswa->tgl_lahir }}</p>
            <p><strong>NIS:</strong> {{ $siswa->nis }}</p>
            <p><strong>No Sertifikat:</strong> {{ $sertifikat->no_sertifikat }}</p>
        </div>
        <div class="barcode">
            {!! $barcode !!}
        </div>
        <p>Telah mengikuti TryOut {{ $nilai->first()->first()->tryout->nama_tryout }} pada tanggal {{ \Carbon\Carbon::parse($nilai->first()->first()->tryout->tanggal)->format('d-m-Y') }} dan berlaku sebagai bukti kemajuan hasil belajar bimbel studi lanjut SMAIT IMBOS Pringsewu, dengan hasil sebagai berikut:</p>
        
        <table>
            <thead>
                <tr>
                    <th>Nama Mapel</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mataPelajaransFalse as $mataPelajaran)
                    <tr>
                        <td>{{ $mataPelajaran->namaMataPelajaran }}</td>
                        <td>{{ $nilai->first()->where('mata_pelajaran_id', $mataPelajaran->id)->first()->nilai ?? '-' }}</td>
                    </tr>
                @endforeach
                @if($mataPelajaransTrue->isNotEmpty())
                    <tr>
                        <th colspan="2">Tes Potensi Skolastik</th>
                    </tr>
                    @foreach($mataPelajaransTrue as $mataPelajaran)
                        <tr>
                            <td>{{ $mataPelajaran->namaMataPelajaran }}</td>
                            <td>{{ $nilai->first()->where('mata_pelajaran_id', $mataPelajaran->id)->first()->nilai ?? '-' }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        
    </div>
    <div class="footer">
        <p>&copy; 2024 SMAIT IMBOS Pringsewu</p>
    </div>
</body>
</html>
