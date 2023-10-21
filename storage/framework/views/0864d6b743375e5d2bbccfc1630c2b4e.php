<?php echo $__env->make('layouts.header_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Profile</h1>
</div>

<?php if(session('message')): ?>
    <?php echo session('message'); ?>

<?php endif; ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Profile</h6>
    </div>
	
	<form method="POST" action="<?php echo e(url('Profile/update/'.$profile->id_user)); ?>">
        <?php echo e(csrf_field()); ?>

		<div class="card-body">
			<div class="row">
				<input type="hidden" name="id_user" value="<?php echo e($profile->id_user); ?>">
				<div class="form-group col-md-6">
					<label class="font-weight-bold">NIP</label>
					<input autocomplete="off" type="email" name="email" value="<?php echo e($profile->nip); ?>" required class="form-control">
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Username</label>
					<input autocomplete="off" type="text" name="username" value="<?php echo e($profile->username); ?>" required class="form-control">
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Password</label>
					<input autocomplete="off" type="password" name="password" required class="form-control">
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Nama Lengkap</label>
					<input autocomplete="off" type="text" name="nama" value="<?php echo e($profile->nama); ?>" required class="form-control">
				</div>

				<div class="form-group col-md-6">
					<label class="font-weight-bold">Tugas</label>
					<input autocomplete="off" type="text" name="tugas" value="<?php echo e($profile->tugas); ?>" required class="form-control">
				</div>
			</div>
		</div>
		<div class="card-footer text-right">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
            <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
	</form>
</div>

<?php echo $__env->make('layouts.footer_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\Users\wahyu\Desktop\SPK-Profile-Matching\resources\views/profile/index.blade.php ENDPATH**/ ?>