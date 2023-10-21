<?php echo $__env->make('layouts.header_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Data Alternatif</h1>

    <a href="<?php echo e(url('Alternatif/tambah')); ?>" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Data </a>
</div>

<?php if(session('message')): ?>
    <?php echo session('message'); ?>

<?php endif; ?>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Daftar Data Alternatif</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr align="center">
                        <th width="5%">No</th>
                        <th>Nama Alternatif</th>
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
                            <td class="text-left"><?php echo e($data->nama); ?></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="<?php echo e(url('Alternatif/edit/'.$data->id_alternatif)); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <a data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?php echo e(url('Alternatif/destroy/'.$data->id_alternatif)); ?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
<?php /**PATH C:\xampp\htdocs\AYO-PUBLISH\LARAVEL-10\SPK-WP-LARAVEL-10\resources\views/alternatif/index.blade.php ENDPATH**/ ?>