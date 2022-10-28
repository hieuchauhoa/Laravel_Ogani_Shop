
<!-- jQuery -->
<script src="../{{$ur}}public/backend/plugins/jquery/jquery.min.js"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script> -->
<!-- Bootstrap 4 -->
<script src="../{{$ur}}public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../{{$ur}}public/backend/dist/js/adminlte.min.js"></script>
<script src="../{{$ur}}public/backend/js/main.js"></script>


<!-- Bootstrap 4 -->
<script src="../{{$ur}}public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTabl../{{$ur}}public/backend Plugins -->
<script src="../{{$ur}}public/backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../{{$ur}}public/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../{{$ur}}public/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../{{$ur}}public/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../{{$ur}}public/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../{{$ur}}public/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../{{$ur}}public/backend/plugins/jszip/jszip.min.js"></script>
<script src="../{{$ur}}public/backend/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../{{$ur}}public/backend/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../{{$ur}}public/backend/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../{{$ur}}public/backend/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../{{$ur}}public/backend/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- AdminLT../{{$ur}}public/backenddemo purposes -->
<script src="../{{$ur}}public/backend/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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

@yield('footer')
