<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Persediaan/</span> Tambh Data</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Frekuensi persediaan darah di tahun sebelumnya</h5>
                     
                    </div>
                    <div class="card-body">
                      <form method="post" action="<?php echo base_url() ?>distribusi/simpan">
                        <div class="mb-3 row">
                          <div class="col">
                            <select class="form-select" name="golongan" required>
                              <option value="">Pilih golongan darah</option>
                              <option value="A">Darah A</option>
                              <option value="B">Darah B</option>
                              <option value="AB">Darah AB</option>
                              <option value="O">Darah O</option>
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
                                  <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                  <?php 
                                }  
                              ?>
                            </select>  
                          </div>
                        </div>
                      	<?php
                      	$no = 0;
                      	foreach (list_bulan() as $key => $value) {
                      	  	?>
                      	  	<div class="row mb-3">
	                          <label class="col-sm-2 col-form-label"><?php echo $value ?></label>
	                          <div class="col-sm-10">
	                            <input type="number" class="form-control" name="frekuensi[]" placeholder="Frekuensi" required />
	                            <input type="hidden" name="bulan[]" value="<?php echo $value ?>">
	                          </div>
	                        </div>
                      	  	<?php
                      	  	$no ++; 
                      	  }  
                      	?>
                        
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Basic with Icons -->
                
              </div>