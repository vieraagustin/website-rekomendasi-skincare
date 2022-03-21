    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url()?>assets/template/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <!-- <script src="<?=base_url()?>assets/template/vendor/jquery-easing/jquery.easing.min.js"></script> -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url()?>assets/template/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="<?=base_url()?>assets/template/vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="<?=base_url()?>assets/template/js/demo/chart-area-demo.js"></script> -->
    <!-- <script src="<?=base_url()?>assets/template/js/demo/chart-pie-demo.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        });
        
        $('.js-example-basic-multiple').select2({
                placeholder: 'Silahkan pilih kriteria'
            });

    </script>

</body>

</html>