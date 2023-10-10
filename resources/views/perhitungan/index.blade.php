@include('layouts.header_admin')
<?php
\App\Models\PerhitunganModel::hapus_hasil();

//Matrix Keputusan (X)
$matriks_x = array();
foreach($aspeks as $aspek):
	foreach($alternatifs as $alternatif):
		$kriterias = \App\Models\KriteriaModel::data_kriteria($aspek->id_aspek);
		foreach($kriterias as $kriteria):
			$id_aspek = $aspek->id_aspek;
			$id_alternatif = $alternatif->id_alternatif;
			$id_kriteria = $kriteria->id_kriteria;
			$data_pencocokan = \App\Models\PerhitunganModel::data_nilai($id_alternatif, $id_aspek, $id_kriteria);
        	if(!empty($data_pencocokan['nilai'])){$nilai = $data_pencocokan['nilai'];}else{$nilai = 0;}	
			$matriks_x[$id_kriteria][$id_alternatif] = $nilai;
		endforeach;
	endforeach;
endforeach;

//Menghitung & Konversi GAP
$menghitung_gap = array();
$konversi_gap = array();
foreach($aspeks as $aspek):
	foreach($alternatifs as $alternatif):
		$kriterias = \App\Models\KriteriaModel::data_kriteria($aspek->id_aspek);
		foreach($kriterias as $kriteria):
			$id_alternatif = $alternatif->id_alternatif;
			$id_kriteria = $kriteria->id_kriteria;
			$nilai = $kriteria->nilai;
			
			$x = $matriks_x[$id_kriteria][$id_alternatif];
			$selisih = $x-$nilai;
			if($selisih == "0"){
				$nilai_bobot = 5;
			}elseif($selisih == "1"){
				$nilai_bobot = 4.5;
			}elseif($selisih == "-1"){
				$nilai_bobot = 4;
			}elseif($selisih == "2"){
				$nilai_bobot = 3.5;
			}elseif($selisih == "-2"){
				$nilai_bobot = 3;
			}elseif($selisih == "3"){
				$nilai_bobot = 2.5;
			}elseif($selisih == "-3"){
				$nilai_bobot = 2;
			}elseif($selisih == "4"){
				$nilai_bobot = 1.5;
			}elseif($selisih == "-4"){
				$nilai_bobot = 1;
			}
			$menghitung_gap[$id_kriteria][$id_alternatif] = $selisih;
			$konversi_gap[$id_kriteria][$id_alternatif] = $nilai_bobot;
		endforeach;
	endforeach;
endforeach;

// NCF NSF
$ncf = array();
$nsf = array();
$t_perh = array();
$t_nilai = array();
foreach($alternatifs as $alternatif):
	$total_nilai = 0;
	$id_alternatif = $alternatif->id_alternatif;
	foreach($aspeks as $aspek):
		$id_aspek = $aspek->id_aspek;
		$nocf = 0;
		$nosf = 0;
		$totalncf = 0;
		$totalnsf = 0;
		
		$kriterias = \App\Models\KriteriaModel::data_kriteria($aspek->id_aspek);
		foreach($kriterias as $kriteria){
			$type_kriteria = $kriteria->jenis;
			if($type_kriteria == 'Core Factor'){
				$id_kriteria = $kriteria->id_kriteria;
				$nilaicf = $konversi_gap[$id_kriteria][$id_alternatif];
				$nocf += 1;
				$totalncf += $nilaicf;
			}
			
			if($type_kriteria == 'Secondary Factor'){
				$id_kriteria = $kriteria->id_kriteria;
				$nilaisf = $konversi_gap[$id_kriteria][$id_alternatif];
				$nosf += 1;
				$totalnsf += $nilaisf;
			}
		}
		$bobot_cf = $aspek->bobot_cf/100;
		$bobot_sf = $aspek->bobot_sf/100;
		$persentase= $aspek->persentase/100;
		$t_cf = $totalncf/$nocf;
		$t_sf = $totalnsf/$nosf;
		$tn = ($t_cf*$bobot_cf)+($t_sf*$bobot_sf);
		$ncf[$id_aspek][$id_alternatif] = $t_cf;
		$nsf[$id_aspek][$id_alternatif] = $t_sf;
		$t_perh[$id_aspek][$id_alternatif] = $tn;
		
		$p_aspek = $tn*$persentase;
		$total_nilai += $p_aspek;
	endforeach;
	$t_nilai[$id_alternatif] = $total_nilai;
endforeach;
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-calculator"></i> Data Perhitungan</h1>
</div>

@foreach($aspeks as $aspek)
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Aspek <?= $aspek->keterangan?></h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th width="5%" rowspan="2">No</th>
						<th>Alternatif</th>
						<?php 
						$kriterias = \App\Models\KriteriaModel::data_kriteria($aspek->id_aspek);
						foreach ($kriterias as $kriteria): ?>
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
						$kriterias = \App\Models\KriteriaModel::data_kriteria($aspek->id_aspek);
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
				</tbody>
			</table>
		</div>
	</div>
</div>
@endforeach

@foreach($aspeks as $aspek)
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Pemetaan GAP Aspek <?= $aspek->keterangan?></h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th width="5%" rowspan="2">No</th>
						<th>Alternatif</th>
						<?php 
						$kriterias = \App\Models\KriteriaModel::data_kriteria($aspek->id_aspek);
						foreach ($kriterias as $kriteria): ?>
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
						$kriterias = \App\Models\KriteriaModel::data_kriteria($aspek->id_aspek);
						foreach ($kriterias as $kriteria):
							$id_alternatif = $alternatif->id_alternatif;
							$id_kriteria = $kriteria->id_kriteria;
							echo '<td>';
							echo $menghitung_gap[$id_kriteria][$id_alternatif];
							echo '</td>';
						endforeach
						?>
					</tr>
					<?php
						$no++;
						endforeach
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endforeach

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Bobot Nilai GAP</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th>Selisih</th>
						<th>Nilai Bobot</th>
						<th>Keterangan</th>
					</tr>
				</thead>
				<tbody>
					<tr align="center">
						<td>0</td>
						<td>5</td>
						<td>Tidak ada selisih (kompetensi sesuai dgn yg dibutuhkan)</td>
					</tr>
					<tr align="center">
						<td>1</td>
						<td>4.5</td>
						<td>Kompetensi individu kelebihan 1 tingkat</td>
					</tr>
					<tr align="center">
						<td>-1</td>
						<td>4</td>
						<td>Kompetensi individu kekurangan 1 tingkat</td>
					</tr>
					<tr align="center">
						<td>2</td>
						<td>3.5</td>
						<td>Kompetensi individu kelebihan 2 tingkat</td>
					</tr>
					<tr align="center">
						<td>-2</td>
						<td>3</td>
						<td>Kompetensi individu kekurangan 2 tingkat</td>
					</tr>
					<tr align="center">
						<td>3</td>
						<td>2.5</td>
						<td>Kompetensi individu kelebihan 3 tingkat</td>
					</tr>
					<tr align="center">
						<td>-3</td>
						<td>2</td>
						<td>Kompetensi individu kekurangan 3 tingkat</td>
					</tr>
					<tr align="center">
						<td>4</td>
						<td>1.5</td>
						<td>Kompetensi individu kelebihan 4 tingkat</td>
					</tr>
					<tr align="center">
						<td>-4</td>
						<td>1</td>
						<td>Kompetensi individu kekurangan 4 tingkat</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

@foreach($aspeks as $aspek)
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Pembobotan Aspek <?= $aspek->keterangan?></h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th width="5%" rowspan="2">No</th>
						<th>Alternatif</th>
						<?php 
						$kriterias = \App\Models\KriteriaModel::data_kriteria($aspek->id_aspek);
						foreach ($kriterias as $kriteria): ?>
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
						$kriterias = \App\Models\KriteriaModel::data_kriteria($aspek->id_aspek);
						foreach ($kriterias as $kriteria):
							$id_alternatif = $alternatif->id_alternatif;
							$id_kriteria = $kriteria->id_kriteria;
							echo '<td>';
							echo $konversi_gap[$id_kriteria][$id_alternatif];
							echo '</td>';
						endforeach
						?>
					</tr>
					<?php
						$no++;
						endforeach
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endforeach

@foreach($aspeks as $aspek)
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Perhitungan Aspek <?= $aspek->keterangan?></h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th width="5%" rowspan="2">No</th>
						<th>Alternatif</th>
						<th>Core Factor N<sub>CF</sub>(i)</th>
						<th>Secondary Factor N<sub>SF</sub>(i)</th>
						<th>Nilai Total N(i)</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no=1;
						foreach ($alternatifs as $alternatif): ?>
					<tr align="center">
						<td><?= $no; ?></td>
						<td align="left"><?= $alternatif->nama ?></td>
						<td>
						<?php
						$id_aspek = $aspek->id_aspek;
						$id_alternatif = $alternatif->id_alternatif;
						echo $ncf[$id_aspek][$id_alternatif];
						?>
						</td>
						<td>
						<?php
						echo $nsf[$id_aspek][$id_alternatif];
						?>
						</td>
						<td>
						<?php
						echo $t_perh[$id_aspek][$id_alternatif];
						?>
						</td>
					</tr>
					<?php
						$no++;
						endforeach
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endforeach

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Perhitungan Total Semua Aspek</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th width="5%" rowspan="2">No</th>
						<th>Alternatif</th>
						<?php
						foreach ($aspeks as $aspek): ?>
						<th><?= $aspek->keterangan ?> (<?= $aspek->persentase ?>%)</th>
						<?php endforeach ?>
						<th>Nilai Total</th>
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
						<?php foreach($aspeks as $aspek){
							$id_aspek = $aspek->id_aspek;
						?>
						<td>
						<?php
						echo $t_perh[$id_aspek][$id_alternatif];
						?>
						</td>
						<?php } ?>
						<td>
						<?php
						echo $t_nilai[$id_alternatif];
						?>
						</td>
					</tr>
					<?php
						$no++;
						$hasil_akhir = [
							'id_alternatif' => $id_alternatif,
							'nilai' => $t_nilai[$id_alternatif]
						];
						DB::table('hasil')->insert($hasil_akhir);
						endforeach
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

@include('layouts.footer_admin')