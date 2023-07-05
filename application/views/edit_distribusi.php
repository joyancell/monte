<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Horizontal Layouts</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Frekuensi persediaan obat di tahun sebelumnya</h5>
                    </div>
                    <div class="card-body">
                      <form method="post" action="<?php echo base_url() ?>distribusi/update">
                        <input type="hidden" name="tahun_lama" value="<?php echo $distribusi[0]->tahun ?>">
                        <input type="hidden" name="golongan_lama" value="<?php echo $distribusi[0]->golongan ?>">
                        <div class="mb-3 row">
                          <div class="col">
                            <select class="form-select" name="golongan" required>
                              <option value="">Pilih golongan darah</option>
                              <option value="A" <?php echo $distribusi[0]->golongan == 'A' ? 'selected': '' ?>>Darah A</option>
                              <option value="B" <?php echo $distribusi[0]->golongan == 'B' ? 'selected': '' ?>>Darah B</option>
                              <option value="AB" <?php echo $distribusi[0]->golongan == 'AB' ? 'selected': '' ?>>Darah AB</option>
                              <option value="O" <?php echo $distribusi[0]->golongan == 'O' ? 'selected': '' ?>>Darah O</option>
                            </select>  
                          </div>
                          <div class="col">
                            <select class="form-select" name="tahun" required>
                              <option value="">Pilih Tahun</option>
                              <?php
                              $start = '2015';
                              $tahun = date('Y') - 1;
                              for ($i=$tahun; $i >= $start ; $i--) { 
                                  ?>
                                  <option value="<?php echo $i ?>" <?php echo $distribusi[0]->tahun == $i ? 'selected': '' ?>><?php echo $i ?></option>
                                  <?php 
                                }  
                              ?>
                            </select>  
                          </div>
                        </div>
                      	<?php
                      	$no = 0;
                      	foreach ($distribusi as $data) {
                      	  	?>
                      	  	<div class="row mb-3">
	                          <label class="col-sm-2 col-form-label"><?php echo $data->bulan ?></label>
	                          <div class="col-sm-10">
	                            <input type="number" class="form-control" name="frekuensi[]" placeholder="Frekuensi" value="<?php echo $data->frekuensi ?>" required />
	                            <input type="hidden" name="bulan[]" value="<?php echo $data->bulan ?>">
	                          </div>
	                        </div>
                      	  	<?php
                      	  	$no ++; 
                      	  }  
                      	?>
                        
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Basic with Icons -->
                
              </div>