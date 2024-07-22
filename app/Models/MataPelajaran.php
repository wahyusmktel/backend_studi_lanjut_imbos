<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaMataPelajaran',
        'status',
        'opsi_test_tps'
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    protected $attributes = [
        'opsi_test_tps' => false,
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public function nilais()
    {
        return $this->hasMany(Nilai::class, 'mata_pelajaran_id', 'id');
    }
}
