    </div>
  </div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-warning" type="button" data-dismiss="modal"><i class="fas fa-fw fa-times mr-1"></i>Cancel</button>
        <a class="btn btn-danger" href="<?php echo e(url('Logout')); ?>"><i class="fas fa-fw fa-sign-out-alt mr-1"></i>Logout</a>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo e(asset('vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo e(asset('js/sb-admin-2.min.js')); ?>"></script>

<!-- Page level plugins -->
<script src="<?php echo e(asset('vendor/chart.js/Chart.min.js')); ?>"></script>

<!-- Page level plugins -->
<script src="<?php echo e(asset('vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>

<!-- Page level custom scripts -->
<script src="<?php echo e(asset('js/demo/datatables-demo.js')); ?>"></script>

<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\AYO-PUBLISH\LARAVEL-10\SPK-SAW-LARAVEL-10\resources\views/layouts/footer_admin.blade.php ENDPATH**/ ?>