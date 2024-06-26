@include('layouts.header_admin')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></i> Data Alternatif</h1>
    @if(session('log.id_user_level') == '1')
    <a href="{{ url('Alternatif/tambah') }}" class="btn btn-success">Tambah Alternatif </a>
    @endif
</div>

@if (session('message'))
    {!! session('message') !!}
@endif

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Alternatif</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr align="center">
                        <th width="5%">No</th>
                        <th>Nama Alternatif</th>
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
                            <td class="text-left">{{ $data->nama }}</td>
                            @if(session('log.id_user_level') == '1')
                            <td>
                                <div class="btn-group" role="group">
                                    <a data-toggle="tooltip" data-placement="bottom" title="Edit Alternatif" href="{{ url('Alternatif/edit/'.$data->id_alternatif) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <a data-toggle="tooltip" data-placement="bottom" title="Hapus Alternatif" href="{{ url('Alternatif/destroy/'.$data->id_alternatif) }}" onclick="return confirm('Apakah anda yakin untuk menghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
