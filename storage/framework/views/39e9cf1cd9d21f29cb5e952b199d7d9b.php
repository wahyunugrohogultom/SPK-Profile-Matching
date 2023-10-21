<?php echo $__env->make('layouts.header_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
\App\Models\PerhitunganModel::hapus_hasil();

//Matrix Keputusan (X)
$matriks_x = array();
foreach($alternatifs as $alternatif):
    foreach($kriterias as $kriteria):
        
        $id_alternatif = $alternatif->id_alternatif;
        $id_kriteria = $kriteria->id_kriteria;
        
        $data_pencocokan = \App\Models\PerhitunganModel::data_nilai($id_alternatif, $id_kriteria);
        if(!empty($data_pencocokan['nilai'])){$nilai = $data_pencocokan['nilai'];}else{$nilai = 0;}
        
        $matriks_x[$id_kriteria][$id_alternatif] = $nilai;
    endforeach;
endforeach;

//Matriks Normalisasi (R) & Matriks Normalisasi Terbobot & Nilai V
$matriks_r = array();
$matriks_rb = array();
$nilai_v = array();
foreach($alternatifs as $alternatif):
    $id_alternatif = $alternatif->id_alternatif;
    $nilai_total = 0;
    foreach($kriterias as $kriteria):
        $id_kriteria = $kriteria->id_kriteria;
        
        $nilai = $matriks_x[$id_kriteria][$id_alternatif];
        $type_kriteria = $kriteria->jenis;
        $bobot = $kriteria->bobot;
        
        $nilai_max = @(max($matriks_x[$id_kriteria]));
        $nilai_min = @(min($matriks_x[$id_kriteria]));
                
        if($type_kriteria == 'Benefit'):
			$r = $nilai != 0 ?$nilai/$nilai_max: 0;
        elseif($type_kriteria == 'Cost'):
			$r = $nilai != 0 ? $nilai_min / $nilai : 0;
        endif;
            
        $matriks_r[$id_kriteria][$id_alternatif] = $r;
        
        $nilai_penjumlahan = $bobot*$r;
        $matriks_rb[$id_kriteria][$id_alternatif] = $nilai_penjumlahan;
        $nilai_total += $nilai_penjumlahan;
    endforeach;
    //Nilai (V)
    $nilai_v[$id_alternatif] = $nilai_total;
endforeach;
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-calculator"></i> Data Perhitungan</h1>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger"><i class="fa fa-table"></i> Matriks Keputusan (X)</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-danger text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Nama Alternatif</th>
						<?php foreach ($kriterias as $kriteria): ?>
						<th><?= $kriteria->kode_kriteria ?></th>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no=1;
						foreach ($alternatifs as $alternatif): ?>
					<tr align="center">
						<td><?= $no; ?></td>
						<td align="left"><?= $alternatif->nama ?></td>
						<?php
						foreach ($kriterias as $kriteria):
							$id_alternatif = $alternatif->id_alternatif;
							$id_kriteria = $kriteria->id_kriteria;
							echo '<td>';
							echo $matriks_x[$id_kriteria][$id_alternatif];
							echo '</td>';
						endforeach
						?>
					</tr>
					<?php
						$no++;
						endforeach
					?>
					<tr align="center">
						<th colspan="2" class="bg-light">MIN</th>
						<?php
						foreach ($kriterias as $kriteria):
							$id_kriteria = $kriteria->id_kriteria;
							echo '<th class="bg-light">';
							echo min($matriks_x[$id_kriteria]);
							echo '</th>';
						endforeach
						?>
					</tr>
					<tr align="center">
						<th colspan="2" class="bg-light">MAX</th>
						<?php
						foreach ($kriterias as $kriteria):
							$id_kriteria = $kriteria->id_kriteria;
							echo '<th class="bg-light">';
							echo max($matriks_x[$id_kriteria]);
							echo '</th>';
						endforeach
						?>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger"><i class="fa fa-table"></i> Matriks Normalisasi (R)</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-danger text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Nama Alternatif</th>
						<?php foreach ($kriterias as $kriteria): ?>
						<th><?= $kriteria->kode_kriteria ?></th>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<?php
						$no=1;
						foreach ($alternatifs as $alternatif): ?>
					<tr align="center">
						<td><?= $no; ?></td>
						<td align="left"><?= $alternatif->nama ?></td>
						<?php
						foreach ($kriterias as $kriteria):
							$id_alternatif = $alternatif->id_alternatif;
							$id_kriteria = $kriteria->id_kriteria;
							echo '<td>';
							echo $matriks_r[$id_kriteria][$id_alternatif];
							echo '</td>';
						endforeach
						?>
					</tr>
					<?php
						$no++;
						endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger"><i class="fa fa-table"></i> Bobot Preferensi (W)</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-danger text-white">
					<tr align="center">
						<?php foreach ($kriterias as $kriteria): ?>
						<th><?= $kriteria->kode_kriteria ?> (<?= $kriteria->jenis ?>)</th>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<tr align="center">
						<?php foreach ($kriterias as $alternatif): ?>
						<td>
						<?php 
						echo $alternatif->bobot;
						?>
						</td>
						<?php endforeach ?>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger"><i class="fa fa-table"></i> Matriks Normalisasi Terbobot</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-danger text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Nama Alternatif</th>
						<?php foreach ($kriterias as $kriteria): ?>
						<th><?= $kriteria->kode_kriteria ?></th>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<?php
						$no=1;
						foreach ($alternatifs as $alternatif): ?>
					<tr align="center">
						<td><?= $no; ?></td>
						<td align="left"><?= $alternatif->nama ?></td>
						<?php
						foreach ($kriterias as $kriteria):
							$id_alternatif = $alternatif->id_alternatif;
							$id_kriteria = $kriteria->id_kriteria;
							echo '<td>';
							echo $matriks_rb[$id_kriteria][$id_alternatif];
							echo '</td>';
						endforeach
						?>
					</tr>
					<?php
						$no++;
						endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger"><i class="fa fa-table"></i> Nilai (V)</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-danger text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Nama Alternatif</th>
						<th width="15%">Nilai (V)</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no=1;
						foreach ($alternatifs as $alternatif): ?>
					<tr align="center">
						<td><?= $no; ?></td>
						<td align="left"><?= $alternatif->nama ?></td>
						<?php
							$id_alternatif = $alternatif->id_alternatif;
							echo '<td>';
							echo $v = $nilai_v[$id_alternatif];
							echo '</td>';
						?>
						</td>
					</tr>
					<?php
                        $no++;
                        $hasil_akhir = [
                            'id_alternatif' => $id_alternatif,
                            'nilai' => $v,
                        ];
                        
                        DB::table('hasil')->insert($hasil_akhir);
						endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php echo $__env->make('layouts.footer_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\AYO-PUBLISH\LARAVEL-10\SPK-SAW-LARAVEL-10\resources\views/perhitungan/index.blade.php ENDPATH**/ ?>