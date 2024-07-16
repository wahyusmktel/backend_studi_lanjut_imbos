<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Siswa extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['kelas_id', 'program_bimbel_id', 'nama_siswa', 'tgl_lahir', 'tmpt_lahir', 'no_hp', 'nis', 'password', 'foto_siswa', 'status'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function programBimbel()
    {
        return $this->belongsTo(ProgramBimbel::class);
    }
}
