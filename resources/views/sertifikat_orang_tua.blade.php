<!DOCTYPE html>
<html>

<head>
    <title>Sertifikat Nilai</title>
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
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Sertifikat Nilai</h1>
        <h3>{{ $siswa->nama_siswa }}</h3>
        <p><strong>NIS:</strong> {{ $siswa->nis }}</p>
        <p><strong>No Sertifikat:</strong> {{ $sertifikatperkembangan->no_sertifikat }}</p>
    </div>
    <div class="content">
        <table class="table table-hover table-bordered mb-0">
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Try Out</th>
                    <th rowspan="2">Tahun Pelajaran</th>
                    <th rowspan="2">Semester</th>
                    @foreach ($mataPelajaransFalse as $mataPelajaran)
                        <th rowspan="2">{{ $mataPelajaran->namaMataPelajaran }}</th>
                    @endforeach
                    <th colspan="{{ $mataPelajaransTrue->count() }}">Tes Potensi Skolastik</th>
                </tr>
                <tr>
                    @foreach ($mataPelajaransTrue as $mataPelajaran)
                        <th>{{ $mataPelajaran->namaMataPelajaran }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @php
                    $index = 1;
                @endphp
                @foreach ($nilai as $tryoutId => $nilaiGroup)
                    <tr>
                        <td>{{ $index }}</td>
                        <td>{{ $nilaiGroup->first()->tryout->nama_tryout }}</td>
                        <td>{{ $nilaiGroup->first()->tryout->tahunPelajaran->nama_tahun_pelajaran }}</td>
                        <td>{{ $nilaiGroup->first()->tryout->tahunPelajaran->semester == 1 ? 'Ganjil' : 'Genap' }}</td>
                        @foreach ($mataPelajaransFalse as $mataPelajaran)
                            <td>{{ $nilaiGroup->where('mata_pelajaran_id', $mataPelajaran->id)->first()->nilai ?? '-' }}
                            </td>
                        @endforeach
                        @foreach ($mataPelajaransTrue as $mataPelajaran)
                            <td>{{ $nilaiGroup->where('mata_pelajaran_id', $mataPelajaran->id)->first()->nilai ?? '-' }}
                            </td>
                        @endforeach
                    </tr>
                    @php
                        $index++;
                    @endphp
                @endforeach
                @if ($nilai->isEmpty())
                    <tr>
                        <td colspan="{{ 4 + $mataPelajaransFalse->count() + $mataPelajaransTrue->count() }}"
                            class="text-center">Data tidak ditemukan</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>

</html>
