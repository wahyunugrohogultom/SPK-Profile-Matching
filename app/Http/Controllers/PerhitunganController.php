<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerhitunganModel;
use App\Models\AlternatifModel;
use App\Models\AspekModel;
use App\Models\KriteriaModel;
use Illuminate\Support\Facades\DB;

class PerhitunganController extends Controller
{
    public function index()
    {
        $id_user_level = session('log.id_user_level');
        
        if ($id_user_level == 3) {
            ?>
            <script>
                window.location='<?php echo url("Dashboard"); ?>'
                alert('Anda tidak berhak mengakses halaman ini!');
            </script>
            <?php
        }

        $data['page'] = "Perhitungan";
        $data['data_alternatif'] = AlternatifModel::all();
        $data['data_aspek'] = AspekModel::all();
        return view('perhitungan.index', $data);
    }
}
