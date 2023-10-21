<?php echo $__env->make('layouts.header_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"> Data User</h1>

	<a href="<?php echo e(url('User')); ?>" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<?php echo session('message'); ?>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data User</h6>
    </div>
	
    <form action="<?php echo e(url('User/simpan')); ?>" method="POST">
        <?php echo e(csrf_field()); ?>

        <div class="card-body">
			<div class="row">
				<div class="form-group col-md-6">
					<label class="font-weight-bold">NIP</label>
					<input autocomplete="off" type="number" name="nip" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Username</label>
					<input autocomplete="off" type="text" name="username" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Password</label>
					<input autocomplete="off" type="password" name="password" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Nama Lengkap</label>
					<input autocomplete="off" type="text" name="nama" required class="form-control"/>
				</div>

				<div class="form-group col-md-6">
					<label class="font-weight-bold">Tugas</label>
					<input autocomplete="off" type="text" name="tugas" class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Level</label>
					<select class="form-control" name ="privilege" required> 
						<option value="">--Pilih Level--</option>
						<?php $__currentLoopData = $user_level; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($k->id_user_level); ?>"><?php echo e($k->user_level); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>
			</div>
		</div>
		<div class="card-footer text-right">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
            <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
    </form>
</div>

<?php echo $__env->make('layouts.footer_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\Users\wahyu\Desktop\SPK-Profile-Matching\resources\views/user/tambah.blade.php ENDPATH**/ ?>