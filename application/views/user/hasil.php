<style type="text/css">
    .btn-salmon-custom {
        background: salmon;
        color: white;
    }

    .checked {
        color: orange;
    }

    .rating {
        cursor: pointer;
    }
</style>

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
</ul>
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
            <h1 class="h6 mb-0 text-primary">HASIL JENIS KULIT WAJAH</h1>
        </div>
        <div class="row ml-3"></div>
    </li>
</ul>
</nav>
<div class="container-fluid">
<div class="container">
    <div class="card rounded-lg mt-5 mb-5">
        <div class="card-body">
            <div class="table-responsive float-right">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <h1 class="text-uppercase">   <?= $this->session->userdata('sess_skincare_nama') ?'Hi.. '.$this->session->userdata('sess_skincare_nama'):''; ?></h1>
                    <h1 class="h6 ml-1 mb-3 text-gray-800">hasil skor jenis kulit anda sebagai berikut :</h1>
                    <thead>
                        <tr class="bg-info text-white">
                            <th>NORMAL</th>
                            <th>BERMINYAK</th>
                            <th>KERING</th>
                            <th>KOMBINASI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= number_format($p_normal, 2) ?>%</td>
                            <td><?= number_format($p_berminyak, 2) ?>%</td>
                            <td><?= number_format($p_kering, 2) ?>%</td>
                            <td><?= number_format($p_kombinasi, 2) ?>%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <h1 class="h6 ml-5 mb-3 text-danger font-italic">*catatan : untuk hasil yang lebih jelas, anda bisa melakukan konsultasi langsung dengan ahli kulit </h1>
        <div class="container">
            <div class="row my-4">
                <div class="col-6">
                    <button class="btn btn-warning" data-toggle="modal" data-target="#recommendationModal" onclick="showPofileMatchRecommendation()">
                        <i class="fas fa-fw fa-star"></i> | Rekomendasi
                    </button>
                </div>
                <div class="col-6">
                    <button id="submit-button" onclick="submitMyData(this)" class="btn btn-success float-right border-radius" disabled>
                        SUBMIT REKOMENDASI
                    </button>
                    <button class="btn btn-primary float-right mr-2" data-toggle="modal" data-target="#filterModal">FILTER</button>
                </div>
            </div>
            <div class="row my-4">
                <?php foreach($list_produk as $list): ?>
                    <div class="col-3 mb-2">
                        <div class="card">
                            <img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17f4057855a%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17f4057855a%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2299.4375%22%20y%3D%2296.3%22%3EImage%20cap%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="">
                            <div class="card-body" style="height: 150px">
                                <div class="row mb-2">
                                    <div class="col-6">
                                        <span class="badge badge-danger badge-sm">
                                            <?= $list->jenis_skincare ?>
                                        </span>
                                    </div>
                                    <div class="col-6">
                                        <div class="float-right">
                                            <small class="text-right">
                                                <i class="fas fa-fw fa-heart text-danger"></i>
                                                <span class="text-danger">
                                                    <?= $list->rekomendasi ?>
                                                </span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <span class="text-muted">
                                    Rp <?= number_format($list->harga, 0, '', '.') ?>
                                </span>
                                <span class="float-right text-muted font-weight-bold">
                                    <sup class="badge badge-sm badge-primary">
                                        <?= $list->merek_produk ?>
                                    </sup>
                                </span>
                                <p class="mt-2 card-text font-weight-bold">
                                    <?= $list->nama_produk ?>
                                </p>
                            </div>
                            <div class="card-footer">
                                <button onclick="favIt(this)" data-id="<?= $list->id_produk ?>" class="btn btn-lg btn-primary btn-block">Fav It!</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="filterModalLabel">Filter Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('User/Jenis_Kulit/rekomendasi') ?>" method="post">
          <div class="modal-body">
            <input type="checkbox" id="all-checked-button" name="filter_semua" value="all" checked onchange="selectAllFilter(this)">
            &nbsp; &nbsp; <label for="all-checked-button">semua</label>
            <br>
            <?php foreach($filters as $filter): ?>
                <input type="checkbox" class="list_filter" id="id-<?= $filter['id_js'] ?>" onclick="checkFilterCondition(this)" name="filter_produk[]" value="<?= $filter['id_js'] ?>" checked>
                &nbsp; &nbsp; <label for="id-<?= $filter['id_js'] ?>"><?= $filter['jenis_skincare'] ?></label>
                <br>
            <?php endforeach; ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">TAMPILKAN FILTER</button>
          </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="recommendationModal" tabindex="-1" aria-labelledby="recommendationModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="min-width: 80% !important">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="recommendationModalLabel">Rekomendasi Lain</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-striped table-hovered">
            <thead>
                <th>#</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Merk</th>
                <th>Jenis Produk</th>
            </thead>
            <tbody id="list-recommendation">
                <tr>
                    <td colspan="4" class="text-center">Sedang proses...</td>
                </tr>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 70% !important">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="feedbackModalLabel">Rating Feedback</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('User/KBSController/submit_feedback') ?>" method="post">
          <div class="modal-body text-center">
            <?php $number = 1; ?>
            <?php foreach($question as $quest): ?>
                <section>
                    <p><?= $number ?>. <?= $quest['soal'] ?></p>
                    <div>
                        <input type="hidden" name="soal_<?= $number ?>" id="soal-<?= $number ?>">
                        <?php for($i = 1; $i <= 5; $i++): ?>
                            <span class="fa fa-star rate-<?= $quest['id'] ?> rating" onclick="giveRate(this, <?= $quest['id'] ?>, <?= $i ?>, <?= $number ?>)"></span>
                        <?php endfor; ?>
                        <!-- <span class="fa fa-star rate-1 rating checked"></span>
                        <span class="fa fa-star rate-1 rating checked"></span>
                        <span class="fa fa-star rate-1 rating"></span>
                        <span class="fa fa-star rate-1 rating"></span> -->
                    </div>
                    <br>
                    <?php $number++ ?>
                </section>
            <?php endforeach; ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Belum</button>
            <button type="submit" class="btn btn-primary" onclick="hasSubmitFeedback()">Kirimkan Feedback</button>
          </div>
      </form>
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

<script type="text/javascript">
    let wasRate = false;
    let pause = false;

    let answer = {};

    let selectedProduct = [];

    const submitRecommendation = async (action, id) => {
        return await axios.get(`<?= base_url('User/KBSController/product_button/') ?>${action}/${id}`).then(res => res.data);
    }

    const saveMyRecommendation = async (allID) => {
        return await axios.get(`<?= base_url('User/KBSController/save_my_recommendation/') ?>${allID}`).then(res => res.data);
    }

    const getProfileMatchingRecommendation = async () => {
        return await axios.get(`<?= base_url('User/KBSController/profile_matching') ?>`).then(res => res.data);
    }

    const showPofileMatchRecommendation = async () => {
        console.info('Algoritma dijalankan...');
        const result = await getProfileMatchingRecommendation().then(res => res);

        let temp = ``;

        // <th>Nama Produk</th>
        //         <th>Harga</th>
        //         <th>Merk</th>
        //         <th>Jenis Produk</th>

        if(result.profile_matching != null) {
            console.table(result.profile_matching);

            result.products.forEach((res, index) => {
                temp += `<tr>
                            <td>${index + 1}</td>
                            <td>${res.nama_produk}</td>
                            <td>${res.harga}</td>
                            <td>${res.merek_produk}</td>
                            <td>${res.jenis_skincare}</td>
                        </tr>`;
            });
        } else {
            result.products.forEach((res, index) => {
                temp += `<tr>
                            <td>${index + 1}</td>
                            <td>${res.nama_produk}</td>
                            <td>${res.harga}</td>
                            <td>${res.merek_produk}</td>
                            <td>${res.jenis_skincare}</td>
                        </tr>`;
            });
        }

        document.getElementById('list-recommendation').innerHTML = temp;
    }

    const giveRate = (target, questId, starId, number) => {
        console.info(questId, starId);
        const stars = document.querySelectorAll(`.rate-${questId}`);

        stars.forEach((res, index) => {
            // console.log(res);
            if((index + 1) <= starId) {
                res.classList.add('checked');
            } else {
                res.classList.remove('checked');
            }
        });

        answer[`soal_${questId}`] = starId;

        document.getElementById(`soal-${number}`).value = starId;

        console.info(answer);
    }

    const favIt = async (target) => {
        let id = target.getAttribute('data-id');

        if(target.classList.contains('btn-primary')) {
            console.info('add', id);
            target.classList.remove('btn-primary');
            target.classList.add('btn-salmon-custom');

            selectedProduct.push(id);

            await submitRecommendation('add', id).then(res => res);
        } else {
            console.info('remove', id);
            target.classList.remove('btn-salmon-custom');
            target.classList.add('btn-primary');
            
            let temp = selectedProduct.filter(res => res != id);

            selectedProduct = [...temp];

            await submitRecommendation('remove', id).then(res => res);
        }

        console.log(selectedProduct);

        const submitButton = document.getElementById('submit-button');

        if(selectedProduct.length > 0) {
            if(submitButton.hasAttribute('disabled')) {
                submitButton.removeAttribute('disabled');
            }
        } else if(selectedProduct.length == 0) {
            submitButton.setAttribute('disabled', true);
        }
    }

    const selectAllFilter = async (target) => {
        const listFilter = document.querySelectorAll('.list_filter');

        listFilter.forEach(res => {
            res.checked = target.checked;
        });
    }

    const checkFilterCondition = async (target) => {
        const listFilter = document.querySelectorAll('.list_filter');

        let numOfChecked = 0;

        listFilter.forEach(res => {
            if(res.checked) {
                numOfChecked += 1;
            }
        });

        document.getElementById('all-checked-button').checked = (numOfChecked == listFilter.length);
    }

    const submitMyData = async (target) => {
        let allID = '';
        
        selectedProduct.forEach(res => {
            allID += `${res}_`;
        });

        const result = await saveMyRecommendation(allID).then(res => res);

        if(result.status == "berhasil") {
            Swal.fire('Terimakasih rekomendasi anda disimpan');
        } else {
            Swal.fire('Gagal eh bro');
        }
    }

    const hasSubmitFeedback = () => {
        wasRate = true;
    }

    const showRateModal = async () => {
        pause = true;

        setTimeout(() => {
            pause = false;
        }, 30000);

        $("#feedbackModal").modal();
    }

    document.addEventListener('DOMContentLoaded', () => {
        if('<?= $has_submit ?>' == 'false' || '<?= $has_submit ?>' == "") {
            console.info("Jalan harusnya");
            setInterval(() => {
                if(!pause) {
                    // if(wasRate) {
                    //     clearInterval();
                    // } else {
                    //     showRateModal();
                    // }
                    (wasRate) ? clearInterval() : showRateModal();
                }
            }, 31000);
        }

    });
</script>
</body>
</html>

<!-- <td><?= $list->jenis_skincare?></td>
<td><?= $list->merek_produk?></td>
<td><?= $list->nama_produk?></td> -->