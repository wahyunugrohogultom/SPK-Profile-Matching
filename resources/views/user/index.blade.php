@include('layouts.header_admin')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"> Data User</h1>
    @if(session('log.id_user_level') == '1')
        <a href="{{ url('User/tambah') }}" class="btn btn-success"> Tambah User </a>
    @endif
</div>

@if(session('message'))
    {!! session('message') !!}
@endif

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Daftar Data User</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-secondary text-white">
                    <tr align="center">
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Tugas</th> 
                        <th>Username</th>
                        <th>Level</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($list as $data)
                    <tr align="center">
                        <td>{{ $no }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->nip }}</td>
                        <td>{{ $data->tugas }}</td>
                        <td>{{ $data->username }}</td>
                        <td>{{ $data->user_level }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                @if(session('log.id_user_level') == '1')
                                    <a data-toggle="tooltip" data-placement="bottom" title="Detail User" href="{{ url('User/detail', $data->id_user) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                @endif
                                <a data-toggle="tooltip" data-placement="bottom" title="Edit User" href="{{ url('User/edit', $data->id_user) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                @if(session('log.id_user_level') == '1')
                                    <a data-toggle="tooltip" data-placement="bottom" title="Hapus User" href="{{ url('User/destroy', $data->id_user) }}" onclick="return confirm('Apakah anda yakin untuk menghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                @endif
                            </div>
                        </td>
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
