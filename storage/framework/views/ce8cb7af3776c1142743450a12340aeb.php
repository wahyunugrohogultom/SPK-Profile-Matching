<?php echo $__env->make('layouts.header_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-edit"></i> Data Penilaian</h1>
</div>

<?php echo session('message'); ?>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Daftar Data Penilaian</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr align="center">
                        <th width="5%">No</th>
                        <th>Alternatif</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php $__currentLoopData = $alternatif; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr align="center">
                        <td><?php echo e($no); ?></td>
                        <td align="left"><?php echo e($keys->nama); ?></td>
                        <?php $cek_tombol = \App\Models\PenilaianModel::untuk_tombol($keys->id_alternatif); ?>

                        <td>
                            <?php if($cek_tombol == 0): ?>
                            <a data-toggle="modal" href="#set<?php echo e($keys->id_alternatif); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Input</a>
                            <?php else: ?>
                            <a data-toggle="modal" href="#edit<?php echo e($keys->id_alternatif); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                            <?php endif; ?>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="set<?php echo e($keys->id_alternatif); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Input Penilaian</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <form action="<?php echo e(url('Penilaian/tambah')); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="modal-body">
                                        <?php $__currentLoopData = $kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                            $sub_kriteria = \App\Models\SubKriteriaModel::data_sub_kriteria($key->id_kriteria);
                                            ?>
                                            <?php if($sub_kriteria != NULL): ?>
                                                <input type="hidden" name="id_alternatif" value="<?php echo e($keys->id_alternatif); ?>">
                                                <input type="hidden" name="id_kriteria[]" value="<?php echo e($key->id_kriteria); ?>">
                                                <div class="form-group">
                                                    <label class="font-weight-bold" for="<?php echo e($key->id_kriteria); ?>"><?php echo e($key->keterangan); ?></label>
                                                    <select name="nilai[]" class="form-control" id="<?php echo e($key->id_kriteria); ?>" required>
                                                        <option value="">--Pilih--</option>
                                                        <?php $__currentLoopData = $sub_kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subs_kriteria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($subs_kriteria['id_sub_kriteria']); ?>"><?php echo e($subs_kriteria['deskripsi']); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="edit<?php echo e($keys->id_alternatif); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Penilaian</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <form action="<?php echo e(url('Penilaian/edit')); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="modal-body">
                                        <?php $__currentLoopData = $kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                            $sub_kriteria = \App\Models\SubKriteriaModel::data_sub_kriteria($key->id_kriteria);
                                            ?>
                                            <?php if($sub_kriteria != NULL): ?>
                                                <input type="hidden" name="id_alternatif" value="<?php echo e($keys->id_alternatif); ?>">
                                                <input type="hidden" name="id_kriteria[]" value="<?php echo e($key->id_kriteria); ?>">
                                                <div class="form-group">
                                                    <label class="font-weight-bold" for="<?php echo e($key->id_kriteria); ?>"><?php echo e($key->keterangan); ?></label>
                                                    <select name="nilai[]" class="form-control" id="<?php echo e($key->id_kriteria); ?>" required>
                                                        <option value="">--Pilih--</option>
                                                        <?php $__currentLoopData = $sub_kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subs_kriteria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                            $nilai = \App\Models\PenilaianModel::data_penilaian($keys->id_alternatif, $subs_kriteria['id_kriteria']);
                                                            ?>
                                                            <option value="<?php echo e($subs_kriteria['id_sub_kriteria']); ?>" <?php echo e(isset($subs_kriteria['id_sub_kriteria']) && $nilai && $subs_kriteria['id_sub_kriteria'] == $nilai->nilai ? 'selected' : ''); ?>><?php echo e($subs_kriteria['deskripsi']); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('layouts.footer_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php /**PATH C:\xampp\htdocs\AYO-PUBLISH\LARAVEL-10\SPK-WP-LARAVEL-10\resources\views/penilaian/index.blade.php ENDPATH**/ ?>