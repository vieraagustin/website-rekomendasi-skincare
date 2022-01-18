<!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
  
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                       <!-- Page Heading -->
                      <div class="d-sm-flex align-items-center justify-content-between mb-">
                        <h1 class="h6 ml-1 mb-10 text-info">REKOMENDASI PRODUK SKINCARE BERDASARKAN JENIS KULIT WAJAH</h1>
                    </div>
                        </li>

                    </ul>

                </nav>
                <div class="container-fluid">
                    <div class="card shadow mb-7  ">
                        <h1 class="h5 ml-3 mb-3 mt-3 ttext-gray-800">Silahkan Pilih Jenis Kulit yang Sesuai untuk Mengetahui Rekomendasi Skincare</h1>
                        <form action="" method="post" class="mb-3 mt-2 form-inline">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Kulit : </label>
                              <div class="form-group mx-sm-3 mb-0">
                                <select class="custom-select" name="jenis_kulit" id="JK">
                                        <option selected value="semua">Pilih Jenis Kulit</option>
                                        <option value="kulit normal">Kulit Normal</option>
                                        <option value="kulit kering">Kulit Kering</option>
                                        <option value="kulit berminyak">Kulit Berminyak</option>
                                        <option value="kulit kombinasi">Kulit Kombinasi</option>
                                    </select>
                              </div>
                        </form>
                    <div class="card-body">
                        <div class="table-responsive float-right">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="bg-info text-white">
                                        <th>No</th>
                                        <th>Jenis Skincare</th>
                                        <th>Merek</th>
                                        <th>Nama Produk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url()?>assets/template/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url()?>assets/template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url()?>assets/template/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?=base_url()?>assets/template/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?=base_url()?>assets/template/js/demo/chart-area-demo.js"></script>
    <script src="<?=base_url()?>assets/template/js/demo/chart-pie-demo.js"></script>

    <script>
        $(document).ready(function(){
            produk_data();
            $("#JK").change(function(){
                produk_data();
            });
        });
        function produk_data(){
            let jenis_kulit = $("#JK").val();
            $.ajax({
                type:'get',
                url:"<?= base_url('User/Rekomendasi/load_produk') ?>",
                data: 'jenis_kulit=' + jenis_kulit,
                success : function(data){
                    $("#dataTable tbody").html(data);
                    // console.log(data);
                }
            });
        }

    </script>

</body>

</html>