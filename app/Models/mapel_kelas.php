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

    public function mapel_kelas()
    {
        return $this->hasMany(mapel_kelas::class, 'id_master_mapel');
    }

    public function master_mapel()
    {
        return $this->belongsTo(master_mapel::class, 'id_master_mapel');
    }
}
