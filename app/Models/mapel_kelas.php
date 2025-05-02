<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mapel_kelas extends Model
{
    protected $guarded = ['id'];
    public function kelas()
    {
        return $this->belongsTo(kelas::class, 'tingkat_kelas');
    }
}
