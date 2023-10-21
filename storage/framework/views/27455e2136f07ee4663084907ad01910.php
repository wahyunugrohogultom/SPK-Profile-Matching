<?php echo $__env->make('layouts.header_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"> Data User</h1>
    <?php if(session('log.id_user_level') == '1'): ?>
        <a href="<?php echo e(url('User/tambah')); ?>" class="btn btn-success"> Tambah User </a>
    <?php endif; ?>
</div>

<?php if(session('message')): ?>
    <?php echo session('message'); ?>

<?php endif; ?>

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
                    <?php
                        $no = 1;
                    ?>
                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr align="center">
                        <td><?php echo e($no); ?></td>
                        <td><?php echo e($data->nama); ?></td>
                        <td><?php echo e($data->nip); ?></td>
                        <td><?php echo e($data->tugas); ?></td>
                        <td><?php echo e($data->username); ?></td>
                        <td><?php echo e($data->user_level); ?></td>
                        <td>
                            <div class="btn-group" role="group">
                                <?php if(session('log.id_user_level') == '1'): ?>
                                    <a data-toggle="tooltip" data-placement="bottom" title="Detail User" href="<?php echo e(url('User/detail', $data->id_user)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                <?php endif; ?>
                                <a data-toggle="tooltip" data-placement="bottom" title="Edit User" href="<?php echo e(url('User/edit', $data->id_user)); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <?php if(session('log.id_user_level') == '1'): ?>
                                    <a data-toggle="tooltip" data-placement="bottom" title="Hapus User" href="<?php echo e(url('User/destroy', $data->id_user)); ?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php
                        $no++;
                    ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php echo $__env->make('layouts.footer_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\Users\wahyu\Desktop\SPK-Profile-Matching\resources\views/user/index.blade.php ENDPATH**/ ?>