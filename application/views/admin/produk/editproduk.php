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
                                <form method="POST" enctype="multipart/form-data" action="<?= site_url("admin/Produk/proses_editdata/" . $data_produk[0]->id_produk); ?>">
                                    <div class="form-group row mt-3 mr-2 ml-2">
                                        <label for="jenis_skincare" class="col-sm-3 col-form-label">Jenis Skincare</label>
                                        <div class="col-sm-9">
                                            <select name="jenis_skincare" class="form-control">
                                                <?php foreach ($List_JS as $list) : ?>
                                                    <?php if ($list->id_js == $data_produk[0]->jenis_skincare) { ?>
                                                        <option selected value="<?php echo $list->id_js ?>"><?= $list->jenis_skincare ?></option>
                                                    <?php } else if (set_value('jenis_skincare') == $list->id_js) { ?>
                                                        <option selected value="<?php echo $list->id_js ?>"><?php echo $list->jenis_skincare ?></option>
                                                    <?php } ?>

                                                    <?php if ($list->id_js != $data_produk[0]->jenis_skincare) { ?>
                                                        <option value="<?php echo $list->id_js ?>"><?php echo $list->jenis_skincare ?></option>
                                                    <?php } ?>

                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3 mr-2 ml-2">
                                        <label for="kriteria" class="col-sm-3 col-form-label">Merek</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="merek_produk" name="merek_produk" value="<?= $data_produk[0]->merek_produk ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3 mr-2 ml-2">
                                        <label for="kriteria" class="col-sm-3 col-form-label">Nama Produk</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= $data_produk[0]->nama_produk ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3 mr-2 ml-2">
                                        <label for="nama_Jk" class="col-sm-3 col-form-label">Jenis Kulit</label>
                                        <div class="col-sm-9">
                                            <select name="nama_Jk" class="form-control">
                                                <?php foreach ($List_JK as $list) : ?>
                                                    <option value="<?= $list->id_JK ?>"><?= $list->nama_Jk ?></option>

                                                    <?php if ($list->id_JK == $data_produk[0]->id_JK) { ?>
                                                        <option selected value="<?php echo $list->id_JK ?>"><?= $list->nama_Jk ?></option>
                                                    <?php } else if (set_value('nama_Jk') == $list->id_JK) { ?>
                                                        <option selected value="<?php echo $list->id_JK ?>"><?php echo $list->nama_Jk ?></option>
                                                    <?php } ?>

                                                    <?php if ($list->id_JK != $data_produk[0]->id_JK) { ?>
                                                        <option value="<?php echo $list->id_JK ?>"><?php echo $list->nama_Jk ?></option>
                                                    <?php } ?>
                                                <?php endforeach ?>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group row mt-3 mr-2 ml-2">
                                        <label for="harga" class="col-sm-3 col-form-label">Harga Produk</label>
                                        <div class="col-sm-9">
                                            <input type="number" min=0 class="form-control" id="harga" value="<?= $data_produk[0]->harga ?>" name="harga_produk" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3 mr-2 ml-2">
                                        <label for="gambar" class="col-sm-3 col-form-label"> Upload Gambar</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" id="gambar" name="image" accept="image/png, image/jpeg, image/jpg, image/gif">
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
