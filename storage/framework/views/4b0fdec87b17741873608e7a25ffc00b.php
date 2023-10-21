<?php echo $__env->make('layouts.header_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users-cog"></i> Data User</h1>

	<a href="<?php echo e(url('User')); ?>" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger"><i class="fas fa-fw fa-edit"></i> Edit Data User</h6>
    </div>
	
    <form method="POST" action="<?php echo e(url('User/update/'.$user->id_user)); ?>">
        <?php echo e(csrf_field()); ?>

		<div class="card-body">
			<div class="row">
                <input type="hidden" name="id_user" value="<?php echo e($user->id_user); ?>">
				<div class="form-group col-md-6">
					<label class="font-weight-bold">E-Mail</label>
					<input autocomplete="off" type="email" name="email" value="<?php echo e($user->email); ?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Username</label>
					<input autocomplete="off" type="text" name="username" value="<?php echo e($user->username); ?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Password</label>
					<input autocomplete="off" type="password" name="password" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Nama Lengkap</label>
					<input autocomplete="off" type="text" name="nama" value="<?php echo e($user->nama); ?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Level</label>
					 <select class="form-control" name="privilege" required> 
					<?php $__currentLoopData = $user_level; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($k->id_user_level); ?>" <?php echo e($k->id_user_level == $user->id_user_level ? 'selected' : ''); ?>>
							<?php echo e($k->user_level); ?>

						</option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
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
<?php /**PATH C:\xampp\htdocs\AYO-PUBLISH\LARAVEL-10\SPK-SAW-LARAVEL-10\resources\views/user/edit.blade.php ENDPATH**/ ?>