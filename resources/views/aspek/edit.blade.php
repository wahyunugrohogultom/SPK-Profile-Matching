@include('layouts.header_admin')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cube"></i> Data Aspek</h1>

    <a href="{{ url('Aspek') }}" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
        <span class="text">Kembali</span>
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-edit"></i> Edit Data Aspek</h6>
    </div>

    <form method="POST" action="{{ url('Aspek/update/'.$aspek->id_aspek) }}">
        {{ csrf_field() }}
        <div class="card-body">
            <div class="row">
                <input type="hidden" name="id_aspek" value="{{ $aspek->id_aspek }}">
                <div class="form-group col-md-6">
                    <label class="font-weight-bold">Kode Aspek</label>
                    <input autocomplete="off" type="text" name="kode_aspek" value="{{ $aspek->kode_aspek }}" required class="form-control"/>
                </div>

                <div class="form-group col-md-6">
                    <label class="font-weight-bold">Nama Aspek</label>
                    <input autocomplete="off" type="text" name="keterangan" value="{{ $aspek->keterangan }}" required class="form-control"/>
                </div>

                <div class="form-group col-md-6">
                    <label class="font-weight-bold">Persentase (%)</label>
                    <input autocomplete="off" type="number" name="persentase" step="0.01" value="{{ $aspek->persentase }}" required class="form-control"/>
                </div>

                <div class="form-group col-md-6">
                    <label class="font-weight-bold">Bobot Core Factor (%)</label>
                    <input autocomplete="off" type="number" name="bobot_cf" step="0.01" value="{{ $aspek->bobot_cf }}" required class="form-control"/>
                </div>

                <div class="form-group col-md-6">
                    <label class="font-weight-bold">Bobot Secondary Factor (%)</label>
                    <input autocomplete="off" type="number" name="bobot_sf" step="0.01" value="{{ $aspek->bobot_sf }}" required class="form-control"/>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
            <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
    </form>

</div>

@include('layouts.footer_admin')
