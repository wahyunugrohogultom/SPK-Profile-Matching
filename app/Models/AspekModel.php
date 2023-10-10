<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AspekModel extends Model
{
    protected $table = 'aspek';
    protected $primaryKey = 'id_aspek';
    protected $fillable = ['keterangan', 'kode_aspek', 'persentase', 'bobot_cf', 'bobot_sf'];
    public $timestamps = false;
}
