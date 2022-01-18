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
                       <div class="row ml-4">
                      <div class="d-sm-flex align-items-center justify-content-between ">
                        <h1 class="h6 mb-10 text-gray-700">REKOMENDASI PRODUK SKINCARE BERDASARKAN JENIS KULIT WAJAH</h1>
                    </div>
                </div>

                 </li>
            </ul>
                </nav>
                <div class="container-fluid">
                    <div class="card shadow mb-7  ">
                        <h1 class="h3 ml-5 mb-3"></h1>
                        <h1 class="h6 ml-1 mb-2 text-gray-800">Kenali jenis kulit wajah anda dengan mengisi kuesioner permasalahan kulit yang anda alami di bawah ini :  </h1>
                    <form method="post" action="<?= base_url('User/Jenis_Kulit/proses_perhitungan') ?>">
                        <div class="card-body">
                        <div class="table-responsive float-right">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="bg-info text-white">
                                        <th>No</th>
                                        <th>kriteria</th>
                                        <th>indikator</th>
                                    </tr>
                                </thead>
                                 <tbody>
                                    <?php $i =1; ?> 
                                    <?php foreach($List_Kriteria as $kriteria):?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $kriteria->kriteria ?></td>
                                        <td>
                                            <select class="custom-select" name=<?= "nilai_bobot" . $i ?> id="id_bobot">
                                                <option value="kriteria tidak muncul">kriteria tidak muncul</option>
                                                <option value="kriteria kurang muncul">kriteria kurang muncul</option>
                                                <option value="kriteria agak muncul">kriteria agak muncul</option>
                                                <option value="kriteria yakin muncul">kriteria yakin muncul</option>
                                            </select>
                                        </td>
                                    <tr>
                                </tbody>
                                <?php $i++ ?>
                            <?php endforeach ?>
                            </table>
                        </div>
                    </div>
          
                        <div class="form-group row mt-3 mr-4 ml-2 col-sm-3 ">
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </div>
                        </div>
                    </form>
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

</body>

</html>