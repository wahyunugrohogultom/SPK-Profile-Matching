@include('layouts.header_admin')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></i> Data Kriteria</h1>
</div>

{!! session('message') !!}

@if (count($aspek)==0)
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Daftar Data Kriteria</h6>
    </div>

    <div class="card-body">
        <div class="alert alert-info">
            Data masih kosong.
        </div>
    </div>
</div>
@endif

@foreach ($aspek as $key)
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"> {{ $key->keterangan }} ({{ $key->kode_aspek }})</h6>
            
            <a href="#tambah{{ $key->id_aspek }}" data-toggle="modal" class="btn btn-sm btn-success"> Tambah Data </a>
        </div>
    </div>
    
    <div class="modal fade" id="tambah{{ $key->id_aspek }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Tambah {{ $key->keterangan }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form action="{{ url('Kriteria/simpan') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="hidden" name="id_aspek" value="{{ $key->id_aspek }}">
                        <div class="form-group">
							<label for="kode_kriteria" class="font-weight-bold">Kode Kriteria</label>
							<input autocomplete="off" type="text" id="kode_kriteria" class="form-control" name="kode_kriteria" required>
						</div>
						<div class="form-group">
							<label for="deskripsi" class="font-weight-bold">Nama Kriteria</label>
							<input autocomplete="off" type="text" id="deskripsi" class="form-control" name="deskripsi" required>
						</div>
						<div class="form-group">
							<label for="nilai" class="font-weight-bold">Nilai</label>
							<input autocomplete="off" type="number" id="nilai" min="1" max="5" name="nilai" class="form-control" required>
						</div>
						<div class="form-group">
							<label class="font-weight-bold">Jenis Kriteria</label>
							<select name="jenis" class="form-control" required>
								<option value="">--Pilih Jenis Kriteria--</option>
								<option value="Core Factor">Core Factor</option>
								<option value="Secondary Factor">Secondary Factor</option>						
							</select>
						</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr align="center">                        
                        <th width="5%">No</th>
                        <th>Kode</th>
						<th>Nama Kriteria</th>
						<th>Nilai</th>
						<th>Jenis</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sub_kriteria1 = \App\Models\KriteriaModel::data_kriteria($key->id_aspek);
                    $no = 1;
                    ?>

                    @foreach ($sub_kriteria1 as $key)
                    <tr align="center">
                        <td>{{ $no }}</td>
                        <td>{{ $key->kode_kriteria }}</td>
                        <td align="left">{{ $key->deskripsi }}</td>
                        <td>{{ $key->nilai }}</td>
                        <td>{{ $key->jenis }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a data-toggle="modal" title="Edit Data" href="#editsk{{ $key->id_kriteria }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <a data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="{{ url('Kriteria/destroy/'.$key->id_kriteria) }}" onclick="return confirm('Apakah anda yakin untuk menghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="editsk{{ $key->id_kriteria }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit {{ $key->deskripsi }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <form action="{{ url('Kriteria/edit/'.$key->id_kriteria) }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <input type="hidden" name="id_aspek" value="{{ $key->id_aspek }}">
                                        <div class="form-group">
											<label for="kode_kriteria" class="font-weight-bold">Kode Kriteria</label>
											<input autocomplete="off" type="text" id="kode_kriteria" class="form-control" value="{{ $key->kode_kriteria }}" name="kode_kriteria" required>
										</div>
										<div class="form-group">
											<label for="deskripsi" class="font-weight-bold">Nama Kriteria</label>
											<input type="text" id="deskripsi" autocomplete="off" class="form-control" value="{{ $key->deskripsi }}" name="deskripsi" required>
										</div>
										<div class="form-group">
											<label for="nilai" class="font-weight-bold">Nilai</label>
											<input type="number" autocomplete="off" id="nilai" min="1" max="5" name="nilai" class="form-control" value="{{ $key->nilai }}" required>
										</div>
										<div class="form-group">
											<label class="font-weight-bold">Jenis Kriteria</label>
											<select name="jenis" class="form-control" required>
												<option value="Core Factor" {{ $key->jenis == 'Core Factor' ? 'selected' : '' }}>Core Factor</option>
												<option value="Secondary Factor" {{ $key->jenis == 'Secondary Factor' ? 'selected' : '' }}>Secondary Factor</option>						
											</select>
										</div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <?php
                    $no++;
                    ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endforeach  
@include('layouts.footer_admin')

