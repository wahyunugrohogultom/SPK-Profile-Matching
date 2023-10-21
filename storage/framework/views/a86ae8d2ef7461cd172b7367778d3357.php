<?php echo $__env->make('layouts.header_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"> Data User</h1>

	<a href="<?php echo e(url('User')); ?>" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Detail Data User</h6>
    </div>
	
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<tr>
					<th class="bg-light">NIP</th>
					<td><?php echo e($user->nip); ?></td>
				</tr>
				<tr>
					<th class="bg-light">Username</th>
					<td><?php echo e($user->username); ?></td>
				</tr>
				<tr>
					<th class="bg-light">Password</th>
					<td><?php echo e($user->password); ?></td>
				</tr>
				<tr>
					<th class="bg-light">Nama Lengkap</th>
					<td><?php echo e($user->nama); ?></td>
				</tr>
				<tr>
					<th class="bg-light">Tugas</th>
					<td><?php echo e($user->tugas); ?></td>
				</tr>
				<tr>
					<th class="bg-light">Level</th>
					<td>
					<?php $__currentLoopData = $user_level; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($k->id_user_level == $user->id_user_level): ?>
							<?php echo e($k->user_level); ?>

						<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>

<?php echo $__env->make('layouts.footer_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\Users\wahyu\Desktop\SPK-Profile-Matching\resources\views/user/detail.blade.php ENDPATH**/ ?>