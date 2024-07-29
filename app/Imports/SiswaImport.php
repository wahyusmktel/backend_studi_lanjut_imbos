<?php

namespace App\Imports;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\ProgramBimbel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

class SiswaImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Gunakan header yang benar
        $kelas = Kelas::where('nama_kelas', $row['kelompok'])->first();
        $programBimbel = ProgramBimbel::where('nama_program', $row['nama_program'])->first();

        if (!$kelas || !$programBimbel) {
            throw new \Exception('Kelas atau Program Bimbel tidak ditemukan untuk baris ini');
        }

        // Periksa apakah siswa sudah ada berdasarkan NIS
        $siswa = Siswa::where('nis', $row['nis'])->first();

        if ($siswa) {
            // Jika siswa sudah ada, perbarui data
            $siswa->update([
                'kelas_id' => $kelas->id,
                'program_bimbel_id' => $programBimbel->id,
                'nama_siswa' => $row['nama_siswa'],
                'tgl_lahir' => $row['tgl_lahir'],
                'tmpt_lahir' => $row['tmpt_lahir'],
                'no_hp' => $row['no_hp'],
                'foto_siswa' => $row['foto_siswa'],
                'password' => Hash::make($row['password']),
                'status' => true,
            ]);
        } else { 
            // Jika siswa belum ada, buat data baru
            return new Siswa([
                'id' => Str::uuid(),
                'kelas_id' => $kelas->id,
                'program_bimbel_id' => $programBimbel->id,
                'nama_siswa' => $row['nama_siswa'],
                'tgl_lahir' => $row['tgl_lahir'],
                'tmpt_lahir' => $row['tmpt_lahir'],
                'no_hp' => $row['no_hp'],
                'foto_siswa' => $row['foto_siswa'],
                'nis' => $row['nis'],
                'password' => Hash::make($row['password']),
                'status' => true,
            ]);
        }
    }
}
