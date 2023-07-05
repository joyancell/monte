<?php  
if ($total == '0') {
  ?>
  <div class="card mt-5">
  
                <h5 class="card-header">Data Permintaan Darah</h5>
                
                <div class="card-body">
                  
                  <table class="mb-3"> 
                    <tr>
                      <td>Golongan Darah</td>
                      <td> : </td>
                      <td><?php echo $golongan ?></td>
                    </tr>
                    <tr>
                      <td>Tahun</td>
                      <td> : </td>
                      <td><?php echo $tahun ?></td>
                    </tr>
                  </table>
                  
                            
                <h5 class="text-center text-danger">Data Kosong</h5>
                </div>
                <?php  
                $a = 27;
                $b = 100;

                if ($a < $b){
                  $terkecil = $a;
                }else{
                  $terkecil = $b;
                }

                $i = $terkecil;
                while($a%$i != 0 || $b%$i != 0){
                  $i--;
                }

                // echo "FPB dari $a dan $b adalah $i";
                echo $total;
                ?>
              </div>
              <!--/ Bootstrap Table with Header Dark -->
  <?php 
} else {
  ?>
  <div class="card mt-5">
  <div class="d-flex justify-content-between">
                <h5 class="card-header">Data Permintaan Darah</h5>
                <div class="dropdown mt-3 me-3">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="<?php echo base_url() ?>distribusi/edit/<?php echo $golongan ?>/<?php echo $tahun ?>">Edit</a>
                                <a class="dropdown-item" href="javascript:void(0);">Hapus</a>
                              </div>
                            </div>
                            </div>
                <div class="card-body">
                  
                  <table class="mb-3"> 
                    <tr>
                      <td>Golongan Darah</td>
                      <td> : </td>
                      <td><?php echo $golongan ?></td>
                    </tr>
                    <tr>
                      <td>Tahun</td>
                      <td> : </td>
                      <td><?php echo $tahun ?></td>
                    </tr>
                  </table>
                  
                            
                <div class="table-responsive text-nowrap">
                  <table class="table table-bordered">
                    <thead class="table-primary">
                      <tr>
                        <th>Bulan/tahun</th>
                        <th>Frekuensi</th>
                        <th>Distribusi Probalitas</th>
                        <th>Distribusi Kumulatif</th>
                        <th>Interval Angka acak</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php
                      $kumu = 0;
                      foreach ($permintaan as $data) {
                        
                          ?>
                          <tr>
                            <td><?php echo $data->bulan ?></td>
                            <td><?php echo $data->frekuensi ?></td>
                            <td><?php echo round($data->dis_probabilitas, 3) ?></td>
                            <td><?php echo round($data->dis_kumulatif, 3) ?></td>
                            <td>
                              <?php echo $data->interval_awal ?> - <?php echo $data->interval_akhir ?>
                            </td>
                          </tr>
                          <?php 
                        }  
                      ?>
                    </tbody>
                  </table>

                </div>
                </div>
                
              </div>
              <!--/ Bootstrap Table with Header Dark -->
  <?php
}

?>

