@include('layouts.header_admin')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Aspek</h1>

    <a href="{{ url('Aspek') }}" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
        <span class="text">Kembali</span>
    </a>
</div>

@if (session('message'))
    {!! session('message') !!}
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Tambah Aspek</h6>
    </div>

    <form action="{{ url('Aspek/simpan') }}" method="POST">
        {{ csrf_field() }}
        <div class="card-body">
            <div class="row">
            <div class="form-group col-md-6">
					<label class="font-weight-bold">Kode Aspek</label>
					<input autocomplete="off" type="text" name="kode_aspek" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Nama Aspek</label>
					<input autocomplete="off" type="text" name="keterangan" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Persentase (%)</label>
					<input autocomplete="off" type="number" name="persentase" required step="0.01" class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Bobot Core Factor (%)</label>
					<input autocomplete="off" step="0.01"  type="number" name="bobot_cf" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Bobot Secondary Factor (%)</label>
					<input autocomplete="off" step="0.01"  type="number" name="bobot_sf" required class="form-control"/>
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
