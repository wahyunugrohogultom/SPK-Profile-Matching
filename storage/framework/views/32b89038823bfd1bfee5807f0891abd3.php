<?php echo $__env->make('layouts.header_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-chart-area"></i> Data Hasil Akhir</h1>
	
    <a href="<?php echo e(url('Laporan')); ?>" class="btn btn-primary"> <i class="fa fa-print"></i> Cetak Data </a>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Hasil Akhir Perankingan</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr align="center">
                        <th>Nama Alternatif</th>
                        <th>Nilai</th>
                        <th width="15%">Ranking</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                    ?>
                    <?php $__currentLoopData = $hasil; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr align="center">
                        <td align="left"><?php echo e($keys->nama); ?></td>
                        <td><?php echo e($keys->nilai); ?></td>
                        <td><?php echo e($no); ?></td>
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
<?php /**PATH C:\xampp\htdocs\AYO-PUBLISH\LARAVEL-10\SPK-WP-LARAVEL-10\resources\views/hasil/index.blade.php ENDPATH**/ ?>