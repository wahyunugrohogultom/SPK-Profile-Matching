<?php echo $__env->make('layouts.header_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cubes"></i> Data Sub Kriteria</h1>
</div>

<?php echo session('message'); ?>


<?php if(count($kriteria)==0): ?>
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Daftar Data Sub Kriteria</h6>
    </div>

    <div class="card-body">
        <div class="alert alert-info">
            Data masih kosong.
        </div>
    </div>
</div>
<?php endif; ?>

<?php $__currentLoopData = $kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> <?php echo e($key->keterangan); ?> (<?php echo e($key->kode_kriteria); ?>)</h6>
            
            <a href="#tambah<?php echo e($key->id_kriteria); ?>" data-toggle="modal" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i> Tambah Data </a>
        </div>
    </div>
    
    <div class="modal fade" id="tambah<?php echo e($key->id_kriteria); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Tambah <?php echo e($key->keterangan); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form action="<?php echo e(url('SubKriteria/simpan')); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <div class="modal-body">
                        <input type="hidden" name="id_kriteria" value="<?php echo e($key->id_kriteria); ?>">
                        <div class="form-group">
                            <label for="deskripsi" class="font-weight-bold">Nama Sub Kriteria</label>
                            <input autocomplete="off" type="text" id="deskripsi" class="form-control" name="deskripsi" required>
                        </div>
                        <div class="form-group">
                            <label for="nilai" class="font-weight-bold">Nilai</label>
                            <input autocomplete="off" type="text" id="nilai" name="nilai" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr align="center">                        
                        <th width="5%">No</th>
                        <th>Nama Sub Kriteria</th>
                        <th>Nilai</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sub_kriteria1 = \App\Models\SubKriteriaModel::data_sub_kriteria($key->id_kriteria);
                    $no = 1;
                    ?>

                    <?php $__currentLoopData = $sub_kriteria1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr align="center">
                        <td><?php echo e($no); ?></td>
                        <td align="left"><?php echo e($key->deskripsi); ?></td>
                        <td><?php echo e($key->nilai); ?></td>
                        <td>
                            <div class="btn-group" role="group">
                                <a data-toggle="modal" title="Edit Data" href="#editsk<?php echo e($key->id_sub_kriteria); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <a data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?php echo e(url('SubKriteria/destroy/'.$key->id_sub_kriteria)); ?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="editsk<?php echo e($key->id_sub_kriteria); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit <?php echo e($key->deskripsi); ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <form action="<?php echo e(url('SubKriteria/edit/'.$key->id_sub_kriteria)); ?>" method="POST">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="modal-body">
                                        <input type="hidden" name="id_kriteria" value="<?php echo e($key->id_kriteria); ?>">
                                        <div class="form-group">
                                            <label for="deskripsi" class="font-weight-bold">Nama Sub Kriteria</label>
                                            <input type="text" id="deskripsi" autocomplete="off" class="form-control" value="<?php echo e($key->deskripsi); ?>" name="deskripsi" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nilai" class="font-weight-bold">Nilai</label>
                                            <input type="text" autocomplete="off" id="nilai" name="nilai" class="form-control" value="<?php echo e($key->nilai); ?>" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <?php
                    $no++;
                    ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
<?php echo $__env->make('layouts.footer_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH C:\xampp\htdocs\AYO-PUBLISH\LARAVEL-10\SPK-WP-LARAVEL-10\resources\views/sub_kriteria/index.blade.php ENDPATH**/ ?>