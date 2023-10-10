<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KriteriaModel extends Model
{
    protected $table = 'kriteria';
    protected $primaryKey = 'id_kriteria';
    protected $fillable = ['kode_kriteria', 'id_aspek', 'deskripsi', 'nilai', 'jenis'];
    public $timestamps = false;

    public static function data_kriteria($id_aspek)
    {
        return self::where('id_aspek', $id_aspek)->get();
    }
}
