<!DOCTYPE html>
<html>
<head>
	<title>Sistem Pendukung Keputusan Metode WP</title>
</head>
<style>
    table {
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid black;
    }
</style>
<body>
<h4>Hasil Akhir Perankingan</h4>
<table border="1" width="100%">
	<thead>
		<tr align="center">
			<th>Alternatif</th>
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
<script>
	window.print();
</script>
</body>
</html><?php /**PATH C:\xampp\htdocs\AYO-PUBLISH\LARAVEL-10\SPK-WP-LARAVEL-10\resources\views/hasil/laporan.blade.php ENDPATH**/ ?>