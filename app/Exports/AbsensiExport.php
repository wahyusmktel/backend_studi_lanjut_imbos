<?php

namespace App\Exports;

use App\Models\AbsensiDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AbsensiExport implements FromCollection, WithHeadings
{
    protected $date;
    protected $mata_pelajaran_id;

    public function __construct($date, $mata_pelajaran_id)
    {
        $this->date = $date;
        $this->mata_pelajaran_id = $mata_pelajaran_id;
    }

    public function collection()
    {
        $query = AbsensiDetail::with('siswa', 'absensi.guru', 'absensi.kelas', 'absensi.guru.mataPelajaran');

        if ($this->date) {
            $query->whereHas('absensi', function($q) {
                $q->whereDate('tanggal', $this->date);
            });
        }

        if ($this->mata_pelajaran_id) {
            $query->whereHas('absensi.guru.mataPelajaran', function ($q) {
                $q->where('id', $this->mata_pelajaran_id);
            });
        }

        $absensiDetails = $query->get();

        return $absensiDetails->map(function ($detail) {

            $kehadiranText = '';

            switch ($detail->kehadiran) {
                case 1:
                    $kehadiranText = 'Hadir';
                    break;
                case 0:
                    $kehadiranText = 'Tidak Hadir';
                    break;
                case 2:
                    $kehadiranText = 'Sakit';
                    break;
            }
            
            return [
                'Nama Siswa' => $detail->siswa->nama_siswa,
                'Kelas' => $detail->absensi->kelas->nama_kelas,
                'Mata Pelajaran' => $detail->absensi->guru->mataPelajaran->namaMataPelajaran,
                'Guru' => $detail->absensi->guru->nama,
                'Tanggal' => $detail->absensi->tanggal,
                'Kehadiran' => $kehadiranText,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama Siswa',
            'Kelas',
            'Mata Pelajaran',
            'Guru',
            'Tanggal',
            'Kehadiran',
        ];
    }
}
