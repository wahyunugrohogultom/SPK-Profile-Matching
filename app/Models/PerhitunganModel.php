<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PerhitunganModel extends Model
{
    protected $table = 'penilaian';
    protected $primaryKey = 'id_penilaian';
    protected $fillable = ['id_alternatif', 'id_aspek', 'id_kriteria', 'nilai'];
    public $timestamps = false;

    public static function data_nilai($id_alternatif, $id_aspek, $id_kriteria)
    {
        return self::where('id_alternatif', $id_alternatif)
            ->where('id_aspek', $id_aspek)
            ->where('id_kriteria', $id_kriteria)
            ->first();
    }

    public static function hapus_hasil()
    {
        DB::table('hasil')->truncate();
        return true;
    }

    public static function get_hasil()
    {
        return DB::table('hasil')
            ->join('alternatif', 'hasil.id_alternatif', '=', 'alternatif.id_alternatif')
            ->orderBy('nilai', 'DESC')
            ->get();
    }
}
