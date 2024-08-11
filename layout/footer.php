<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="asset-admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="asset-admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="asset-admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="asset-admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="asset-admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="asset-admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="asset-admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="asset-admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="asset-admin/plugins/moment/moment.min.js"></script>
<script src="asset-admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="asset-admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="asset-admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="asset-admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="asset-admin/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="asset-admin/dist/js/pages/dashboard.js"></script>
<!-- DataTables  & Plugins -->
<script src="asset-admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="asset-admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="asset-admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="asset-admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="asset-admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="asset-admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- asset plugin datatable untuk perhitungan tabel -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.bootstrap5.js"></script>

<!-- load font awesome -->
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

<!-- load ckeditor -->
<script src="https://cdn.ckeditor.com/4.19.0/full/ckeditor.js"></script>

<script>
    CKEDITOR.replace('alamat', {
        filebrowserBrowseUrl: 'asset/ckfinder/ckfinder.html',
        filebrowserUploadUrl: 'asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        height: '400px',
        removePlugins: 'notification',
        on: {
            instanceReady: function() {
                this.removeNotification(this._.notification.getId());
            }
        }
    });
</script>

<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</body>
</html> 