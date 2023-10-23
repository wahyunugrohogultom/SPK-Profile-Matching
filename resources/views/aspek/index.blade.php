@include('layouts.header_admin')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></i> Data Aspek</h1> 
</div>

@if (session('message'))
    {!! session('message') !!}
@endif

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"> Daftar Aspek</h6>
            @if(session('log.id_user_level') == '1')
                <a href="{{ url('Aspek/tambah') }}" class="btn btn-sm btn-success"> Tambah Aspek </a>
            @endif
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr align="center">
                        <th width="5%">No</th>
                        <th>Kode Aspek</th>
						<th>Nama Aspek</th>
						<th>Persentase (%)</th>
						<th>Bobot Core Factore (%)</th>
						<th>Bobot Secondary Factor (%)</th>
                        @if(session('log.id_user_level') == '1')
                        <th width="15%">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($list as $data)
                        <tr align="center">
                            <td>{{ $no }}</td>
                            <td>{{ $data->kode_aspek }}</td>
                            <td>{{ $data->keterangan }}</td>
                            <td>{{ $data->persentase }}</td>
                            <td>{{ $data->bobot_cf }}</td>
                            <td>{{ $data->bobot_sf }}</td>
                            @if(session('log.id_user_level') == '1')
                            <td>
                                <div class="btn-group" role="group">
                                    <a data-toggle="tooltip" data-placement="bottom" title="Edit Aspek" href="{{ url('Aspek/edit/'.$data->id_aspek) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <a data-toggle="tooltip" data-placement="bottom" title="Hapus Aspek" href="{{ url('Aspek/destroy/'.$data->id_aspek) }}" onclick="return confirm('Apakah anda yakin untuk menghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                            @endif
                        </tr>
                        @php
                            $no++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('layouts.footer_admin')
