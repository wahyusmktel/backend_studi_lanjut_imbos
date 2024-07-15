<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mataPelajaranIds = DB::table('mata_pelajarans')->pluck('id')->toArray();
        $gurus = [];

        for ($i = 1; $i <= 20; $i++) {
            $gurus[] = [
                'id' => Str::uuid(),
                'nama' => "Guru $i",
                'nip' => "1234567890$i",
                'mata_pelajaran_id' => $mataPelajaranIds[array_rand($mataPelajaranIds)],
                'tempat_lahir' => "Kota $i",
                'tanggal_lahir' => Carbon::now()->subYears(rand(25, 40))->format('Y-m-d'),
                'foto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('gurus')->insert($gurus);
    }
}
