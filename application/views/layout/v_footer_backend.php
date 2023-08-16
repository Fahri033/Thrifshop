</div> <!-- /.row -->
</div> <!-- /.container-fluid -->
</div> <!-- /.content -->
</div> <!-- /.content-wrapper -->

 <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2023 <a href="https://adminlte.io">Ian Fahri</a>.</strong> All rights reserved.
  </footer>
</div> <!-- ./wrapper -->

<!-- Tampilan pada card admin agar lebih rapi dalam hal mengurutkan, mencari, dll. id="example1" taruh di views-->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- Durasi waktu notifikasi -->
<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() { $(this).remove(); } );
  }, 1500)
</script>
</body>
</html>