<!DOCTYPE html>
<html lang="en">
<!-- Content Wrapper -->

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>home - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/template/css/sb-admin-2.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            background: url(<?php echo base_url("assets/image/bg1.jpg"); ?>);
            background-repeat: no-repeat;
            background-size: 100% 700px;
        }

        .center {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>

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
                        <h1 class="h6 mb-10 text-gray-700 text-uppercase"> REKOMENDASI PRODUK SKINCARE <?= isset($_SESSION['nama']) ? 'UNTUK ' . $_SESSION['nama'] : ''; ?> BERDASARKAN JENIS KULIT WAJAH</h1>
                    </div>
                </div>

                </li>
                </ul>
            </nav>
            <div class="container-fluid">
                <div class="card shadow mb-7  ">
                    <h1 class="h3 ml-5 mb-3"></h1>
                    <h1 class="h6 ml-1 mb-2 text-gray-800">Kenali jenis kulit wajah anda dengan mengisi kuesioner permasalahan kulit yang anda alami di bawah ini : </h1>
                    <form method="post" action="<?= base_url('User/Jenis_Kulit/proses_perhitungan') ?>">
                        <div class="card-body">
                            <?php $i = 1; ?>
                            <?php foreach ($List_Kriteria as $kriteria) : ?>

                                <div class="form-group">
                                    <label class="form-check-label"> <?= $i . " Apakah " . $kriteria->kriteria ?></label>
                                    <div class="">
                                        <div class="custom-control custom-radio custom-control-inline ml-3 mt-1  ">
                                            <input class="form-check-input" type="radio" name="<?= "nilai_bobot" . $i ?>" value="kriteria tidak muncul">
                                            <label class="form-check-label" for="inlineRadio1">kriteria tidak muncul</label>
                                        </div>

                                        <div class="custom-control custom-radio custom-control-inline ml-3 ">
                                            <input class="form-check-input" type="radio" name="<?= "nilai_bobot" . $i ?>" value="kriteria kurang muncul">
                                            <label class="form-check-label" for="inlineRadio1">kriteria kurang muncul</label>
                                        </div>

                                        <div class="custom-control custom-radio custom-control-inline ml-3 ">
                                            <input class="form-check-input" type="radio" name="<?= "nilai_bobot" . $i ?>" value="kriteria agak muncul">
                                            <label class="form-check-label" for="inlineRadio1">kriteria agak muncul</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline  ml-3">
                                            <input class="form-check-input" type="radio" name="<?= "nilai_bobot" . $i ?>" value="kriteria yakin muncul">
                                            <label class="form-check-label" for="inlineRadio1">kriteria yakin muncul</label>
                                        </div>
                                    </div>
                                </div>

                                <?php $i++ ?>
                            <?php endforeach ?>

                            <div class=" float-right form-group ">
                                <button type="submit" class=" float-right btn btn-info">Simpan</button>
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
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>assets/template/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>assets/template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>assets/template/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url() ?>assets/template/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url() ?>assets/template/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url() ?>assets/template/js/demo/chart-pie-demo.js"></script>

</body>

</html>