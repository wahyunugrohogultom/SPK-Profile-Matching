<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AspekModel;
use App\Models\KriteriaModel;

class KriteriaController extends Controller
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

        $data['page'] = "Kriteria";
        $data['aspek'] = AspekModel::all();
        return view('kriteria.index', $data);
    }

    public function simpan(Request $request)
    {
        $id_user_level = session('log.id_user_level');
        
        if ($id_user_level != 1) {
            ?>
            <script>
                window.location='<?php echo url("Dashboard"); ?>'
                alert('Anda tidak berhak mengakses halaman ini!');
            </script>
            <?php
        }

        $this->validate($request, [
            'kode_kriteria' => 'required',
            'id_aspek' => 'required',
            'deskripsi' => 'required',
            'nilai' => 'required',
            'jenis' => 'required'
        ]);

        $data = [
            'kode_kriteria' => $request->kode_kriteria,
            'id_aspek' => $request->id_aspek,
            'deskripsi' => $request->deskripsi,
            'nilai' => $request->nilai,
            'jenis' => $request->jenis,
        ];

        $result = KriteriaModel::create($data);

        if ($result) {
            $request->session()->flash('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
            return redirect('Kriteria');
        } else {
            $request->session()->flash('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
            return redirect('Kriteria');
        }
    }

    public function edit(Request $request, $id_kriteria)
    {
        $id_user_level = session('log.id_user_level');
        
        if ($id_user_level != 1) {
            ?>
            <script>
                window.location='<?php echo url("Dashboard"); ?>'
                alert('Anda tidak berhak mengakses halaman ini!');
            </script>
            <?php
        }

        $this->validate($request, [
            'kode_kriteria' => 'required',
            'id_aspek' => 'required',
            'deskripsi' => 'required',
            'nilai' => 'required',
            'jenis' => 'required'
        ]);

        $data = [
            'kode_kriteria' => $request->kode_kriteria,
            'id_aspek' => $request->id_aspek,
            'deskripsi' => $request->deskripsi,
            'nilai' => $request->nilai,
            'jenis' => $request->jenis,
        ];

        $subkriteria = KriteriaModel::findOrFail($id_kriteria);
        $subkriteria->update($data);

        $request->session()->flash('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
        return redirect('Kriteria');
    }

    public function destroy(Request $request, $id_kriteria)
    {
        $id_user_level = session('log.id_user_level');
        
        if ($id_user_level != 1) {
            ?>
            <script>
                window.location='<?php echo url("Dashboard"); ?>'
                alert('Anda tidak berhak mengakses halaman ini!');
            </script>
            <?php
        }
        
        KriteriaModel::findOrFail($id_kriteria)->delete();
        $request->session()->flash('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
        return redirect('Kriteria');
    }
}
