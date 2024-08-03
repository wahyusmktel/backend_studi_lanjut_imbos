<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kelas',
        'tingkat_kelas',
        'status_kedinasan',
        'status',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Str::uuid()->toString();
        });
    }

    public $incrementing = false;

    // Mutator untuk memastikan status_kedinasan selalu berupa integer
    public function getStatusKedinasanAttribute($value)
    {
        return (int) $value;
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
