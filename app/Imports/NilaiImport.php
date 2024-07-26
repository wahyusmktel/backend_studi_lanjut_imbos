<?php

namespace App\Imports;

use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\MataPelajaran;
use App\Models\Tryout;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class NilaiImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        DB::transaction(function() use ($rows) {
            foreach ($rows as $row) {
                // Get Siswa
                $siswa = Siswa::where('nama_siswa', $row['nama_siswa'])->first();
                $tryout = Tryout::where('nama_tryout', $row['tryout'])->first();

                if (!$siswa) {
                    Log::warning("Siswa dengan nama {$row['nama_siswa']} tidak ditemukan");
                    continue;
                }

                if (!$tryout) {
                    Log::warning("Tryout dengan nama {$row['tryout']} tidak ditemukan");
                    continue;
                }

                // Process each MataPelajaran and save the score
                foreach ($row as $key => $value) {
                    if ($key !== 'nama_siswa' && $key !== 'tryout') {
                        $mataPelajaran = MataPelajaran::where('namaMataPelajaran', $key)->first();

                        if ($mataPelajaran) {
                            Nilai::updateOrCreate(
                                [
                                    'siswa_id' => $siswa->id,
                                    'mata_pelajaran_id' => $mataPelajaran->id,
                                    'tryout_id' => $tryout->id,
                                ],
                                [
                                    'nilai' => $value,
                                    'status' => true,
                                ]
                            );
                        }
                    }
                }
            }
        });
    }
}
