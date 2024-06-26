@include('layouts.header_admin')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Penilaian</h1>
</div>

{!! session('message') !!}

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Daftar Data Penilaian</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr align="center">
                        <th width="5%">No</th>
                        <th>Alternatif</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($alternatif as $keys)
                    <tr align="center">
                        <td>{{ $no }}</td>
                        <td align="left">{{ $keys->nama }}</td>
                        <?php $cek_tombol = \App\Models\PenilaianModel::untuk_tombol($keys->id_alternatif); ?>

                        <td>
                            @if ($cek_tombol == 0)
                            <a data-toggle="modal" href="#set{{ $keys->id_alternatif }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Input</a>
                            @else
                            <a data-toggle="modal" href="#edit{{ $keys->id_alternatif }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                            @endif
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="set{{ $keys->id_alternatif }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Input Penilaian</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <form action="{{ url('Penilaian/tambah') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        @foreach ($aspek as $key)
                                            @php
                                            $kriteria = \App\Models\KriteriaModel::data_kriteria($key->id_aspek);
                                            @endphp
                                            @if ($kriteria != NULL)
                                            <span class="badge badge-primary">{{$key->keterangan}}</span><hr/>
                                                @foreach ($kriteria as $krt)
                                                <input type="hidden" name="id_alternatif" value="{{ $keys->id_alternatif }}">
                                                <input type="hidden" name="id_aspek[]" value="{{ $key->id_aspek }}">
                                                <input type="hidden" name="id_kriteria[]" value="{{ $krt->id_kriteria }}">
                                                <div class="row">
                                                    <div class="form-group col-md-1"></div>
                                                    <div class="form-group col-md-9">
                                                        <label class="font-weight-bold">({{ $krt->kode_kriteria }}) {{ $krt->deskripsi }}</label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <input autocomplete="off" type="number" step="0.01" name="nilai[]" required class="form-control"/>
                                                    </div>
                                                </div>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="edit{{ $keys->id_alternatif }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel"> Edit Penilaian</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <form action="{{ url('Penilaian/edit') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        @foreach ($aspek as $key)
                                            @php
                                            $kriteria = \App\Models\KriteriaModel::data_kriteria($key->id_aspek);
                                            @endphp
                                            @if ($kriteria != NULL)
                                            <span class="badge badge-primary">{{$key->keterangan}}</span><hr/>
                                                @foreach ($kriteria as $krt)
                                                <input type="hidden" name="id_alternatif" value="{{ $keys->id_alternatif }}">
                                                <input type="hidden" name="id_aspek[]" value="{{ $key->id_aspek }}">
                                                <input type="hidden" name="id_kriteria[]" value="{{ $krt->id_kriteria }}">
                                                <div class="row">
                                                    <div class="form-group col-md-1"></div>
                                                    <div class="form-group col-md-9">
                                                        <label class="font-weight-bold">({{ $krt->kode_kriteria }}) {{ $krt->deskripsi }}</label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        @php
                                                        $nilai = \App\Models\PenilaianModel::data_penilaian($keys->id_alternatif, $key->id_aspek, $krt->id_kriteria);
                                                        @endphp
                                                        <input autocomplete="off" type="number" step="0.01" value="{{ $nilai->nilai ?? '' }}" name="nilai[]" required class="form-control"/>
                                                    </div>
                                                </div>
                                                @endforeach
                                            @endif
                                        @endforeach
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

@include('layouts.footer_admin')


