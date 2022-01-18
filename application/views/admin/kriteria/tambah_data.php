        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                </nav>

                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="row">
    <div class="col">
        <form method="POST" action="<?= base_url('admin/Kriteria/proses_tambah_data') ?>">
        <div class="form-group row mt-3 mr-2 ml-2">
            <label for="kriteria" class="col-sm-3 col-form-label">Kriteria</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="kriteria" name="kriteria">
            </div>
        </div>
        <div class="form-group row mt-3 mr-4 ml-2 float-right">
            <button type="submit" class="btn btn-info">Simpan</button>
        </div>
        </form>
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