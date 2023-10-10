<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AspekModel;

class AspekController extends Controller
{
    public function index()
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
        
        $data['page'] = "Aspek";
        $data['list'] = AspekModel::all();
        return view('aspek.index', $data);
    }

    public function tambah()
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

        $data['page'] = "Aspek";
        return view('aspek.tambah', $data);
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
            'kode_aspek' => 'required',
            'keterangan' => 'required',
            'persentase' => 'required',
            'bobot_cf' => 'required',
            'bobot_sf' => 'required'
        ]);

        $data = [
            'kode_aspek' => $request->kode_aspek,
            'keterangan' => $request->keterangan,
            'persentase' => $request->persentase,
            'bobot_cf' => $request->bobot_cf,
            'bobot_sf' => $request->bobot_sf
        ];

        $result = AspekModel::create($data);

        if ($result) {
            $request->session()->flash('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
            return redirect()->route('Aspek');
        } else {
            $request->session()->flash('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
            return redirect()->route('Aspek/tambah');
        }
    }

    public function edit($id_aspek)
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

        $data['page'] = "Aspek";
        $data['aspek'] = AspekModel::findOrFail($id_aspek);
        return view('aspek.edit', $data);
    }

    public function update(Request $request, $id_aspek)
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
            'kode_aspek' => 'required',
            'keterangan' => 'required',
            'persentase' => 'required',
            'bobot_cf' => 'required',
            'bobot_sf' => 'required'
        ]);

        $data = [
            'kode_aspek' => $request->kode_aspek,
            'keterangan' => $request->keterangan,
            'persentase' => $request->persentase,
            'bobot_cf' => $request->bobot_cf,
            'bobot_sf' => $request->bobot_sf
        ];

        $aspek = AspekModel::findOrFail($id_aspek);
        $aspek->update($data);

        $request->session()->flash('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
        return redirect()->route('Aspek');
    }

    public function destroy(Request $request, $id_aspek)
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

        AspekModel::findOrFail($id_aspek)->delete();        
        $request->session()->flash('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
        return redirect()->route('Aspek');
    }
}
