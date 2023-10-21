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
$total_bobot = 0;
foreach($kriterias as $kriteria):				
	$bobot = $kriteria->bobot;
	$total_bobot += $bobot;
endforeach;

// Nilai S
$nilai_s = array();
$total_s = array();
$t_vs = 0;
foreach($alternatifs as $alternatif):
	$t_s = 1;
	$id_alternatif = $alternatif->id_alternatif;
	foreach($kriterias as $kriteria):
		
		$id_kriteria = $kriteria->id_kriteria;
		$type_kriteria = $kriteria->jenis;
		$bobot = $kriteria->bobot;
		$x = $matriks_x[$id_kriteria][$id_alternatif];
		
		if($type_kriteria == 'Benefit'):
			$bobot_r = @(($bobot/$total_bobot)*1);
			$s = pow($x,$bobot_r);
		elseif($type_kriteria == 'Cost'):
			$bobot_r = @(($bobot/$total_bobot)*-1);
			$s = pow($x,$bobot_r);
		endif;
		$t_s *= $s;
		$nilai_s[$id_kriteria][$id_alternatif] = $s;
	endforeach;
	$t_vs += $t_s;
	$total_s[$id_alternatif] = $t_s;
endforeach;

// Nilai V
$nilai_v = array();
foreach($alternatifs as $alternatif):
	$id_alternatif = $alternatif->id_alternatif;
	
	$t_s = $total_s[$id_alternatif];
	$nilai_v[$id_alternatif] = $t_s/$t_vs;
endforeach;
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-calculator"></i> Data Perhitungan</h1>
</div>


<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Matriks Keputusan (X)</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th width="5%" rowspan="2">No</th>
						<th>Nama Alternatif</th>
						<?php foreach ($kriterias as $kriteria): ?>
							<th><?= $kriteria->kode_kriteria ?></th>
						<?php endforeach; ?>
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
						endforeach;
						?>
					</tr>
					<?php
						$no++;
						endforeach;
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Bobot Kriteria (W)</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<?php foreach ($kriterias as $key): ?>
						<th><?= $key->kode_kriteria ?> (<?= $key->jenis ?>)</th>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<tr align="center">
						<?php foreach ($kriterias as $key): ?>
						<td>
						<?php 
						echo $key->bobot;
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
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Normalisasi Bobot Kriteria (W)</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<?php foreach ($kriterias as $key): ?>
						<th><?= $key->kode_kriteria ?> (<?= $key->jenis ?>)</th>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<tr align="center">
						<?php 
						foreach ($kriterias as $key):
						?>
						<td>
						<?php 
							if ($key->jenis == "Benefit") {
								echo @(($key->bobot/$total_bobot)*1);
							}else {
								echo @(($key->bobot/$total_bobot)*-1);
							}
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
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Nilai Vektor (S)</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th width="5%" rowspan="2">No</th>
						<th>Nama Alternatif</th>
						<?php foreach ($kriterias as $kriteria): ?>
							<th><?= $kriteria->kode_kriteria ?></th>
						<?php endforeach; ?>
						<th width="15%">Nilai (S)</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no=1;
						foreach ($alternatifs as $alternatif):
						$id_alternatif = $alternatif->id_alternatif;
						?>
					<tr align="center">
						<td><?= $no; ?></td>
						<td align="left"><?= $alternatif->nama ?></td>
						<?php
						foreach ($kriterias as $kriteria):
							$id_kriteria = $kriteria->id_kriteria;
							echo '<td>';
							echo $nilai_s[$id_kriteria][$id_alternatif];
							echo '</td>';
						endforeach;
						?>
						<td><?= $total_s[$id_alternatif]; ?></td>
					</tr>
					<?php
						$no++;
						endforeach;
					?>
					<tr align="center">
						<th colspan="<?= count($kriterias)+2; ?>" class="bg-light">Total</th>
						<th class="bg-light"><?= $t_vs;?></th>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Nilai Vektor (V)</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th width="5%" rowspan="2">No</th>
						<th>Nama Alternatif</th>
						<th>Perhitungan</th>
						<th width="15%">Nilai (V)</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no=1;
						foreach ($alternatifs as $alternatif):
						$id_alternatif = $alternatif->id_alternatif;
						?>
					<tr align="center">
						<td><?= $no; ?></td>
						<td align="left"><?= $alternatif->nama ?></td>
						<td><?= $total_s[$id_alternatif]; ?> / <?= $t_vs; ?></td>
						<td><?= $nilai_v[$id_alternatif]; ?></td>
					</tr>
					<?php
						$no++;
						$hasil_akhir = [
							'id_alternatif' => $id_alternatif,
							'nilai' => $nilai_v[$id_alternatif]
						];
						DB::table('hasil')->insert($hasil_akhir);
						endforeach;
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php echo $__env->make('layouts.footer_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\AYO-PUBLISH\LARAVEL-10\SPK-WP-LARAVEL-10\resources\views/perhitungan/index.blade.php ENDPATH**/ ?>