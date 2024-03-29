        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                </nav>

                <div class="container-fluid">
                    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6> -->
            <a href="<?= base_url('admin/Jenis_Kulit/tambah_data') ?>" class="btn btn-success mr-1 font-weight-bold"><i class="fas  fa-print"></i> Tambah Data</a>

        </div>
        <div class="card-body">
            <div class="table-responsive float-right">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="bg-info text-white">
                            <th>No</th>
                            <th>nama jenis kulit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i =1; ?> 
                        <?php foreach($List_JK as $JK):?>
                            <tr>
                            <td><?= $i ?></td>
                            <td><?= $JK->nama_Jk ?></td>
                            <td>
                                <a href="<?= base_url()?>admin/Jenis_Kulit/editdata/<?= $JK->id_JK ?>"><button type="button" class="btn btn-success btn-icon-text">Edit</button></a>
                                <a href="<?= base_url()?>admin/Jenis_Kulit/hapusdata/<?= $JK->id_JK ?>"><button type="button" class="btn btn-danger btn-icon-text">Hapus</button></a>
                            </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach ?>
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
        </div>
    </div>
    </div>