<?php

namespace App\Imports;

use App\Models\Alumni;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

class AlumniImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {

        // if (!isset($row[0]) || !isset($row[1]) || !isset($row[2]) || !isset($row[3]) || !isset($row[4])) {
        //     return null;
        // }

        return new Alumni([
            'id' => Str::uuid(),
            'nama_alumni' => $row[0],
            'jenis_perguruan_tinggi_id' => $row[1],
            'nama_universitas' => $row[2],
            'foto' => $row[3],
            'status' => $row[4] == 1 ? true : false,
        ]);
    }
}
