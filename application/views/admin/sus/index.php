   <!-- Content Wrapper -->
   <div id="content-wrapper" class="d-flex flex-column">

       <!-- Main Content -->
       <div id="content">

           <!-- Topbar -->
           <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
           </nav>

           <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-4">
                <div class="card">
                  <div class="card-body">
                    <h1>Skor SUS : <?= $skor_SUS ?></h1>
                  </div>
                </div>
              </div>
              <div class="col-4"></div>
              <div class="col-4"></div>
            </div>

            <div class="row">
              <div class="col-12">
               <div class="card">
                 <div class="card-body">
                   <table class="table" id="myTable">
                    <thead>
                      <th>#</th>
                      <th>feedback id</th>
                      <th>soal</th>
                      <th>jawaban</th>
                    </thead>
                    <tbody>
                      <?php $number = 1; ?>
                      <?php foreach($soal_jawaban as $sj): ?>
                        <tr>
                          <td><?= $number++; ?></td>
                          <td><?= $sj['feedback_id'] ?></td>
                          <td><?= $sj['soal'] ?></td>
                          <td><?= $sj['jawaban'] ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                   </table>
                 </div>
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
           <!-- End of Footer -->

       </div>
       <!-- End of Content Wrapper -->

   </div>