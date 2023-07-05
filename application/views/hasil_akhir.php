
<div class="card mt-5">
  <div class="d-flex justify-content-between">
    <h5 class="card-header">Hasil Perhitungan simulasi Monte Carlo <?php echo $distribusi ?> Darah</h5>
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
                        <th>Bulan</th>
                        <th>Angka Acak</th>
                        <th>Hasil</th>
                        <th>Data Thn <?php echo $tahun ?></th>
                        <th>Akurasi (%)</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php
                      $no = 0;
                      foreach (list_bulan() as $key => $value) {
                        	?>
                        	<tr>
                        		<td><?php echo $hasil[$no]->bulan ?></td>
                        		<td><?php echo $angka[$no]->nilai ?></td>
                            <td><?php echo $hasil[$no]->hasil ?></td>
                            <td width="30"><input type="number" value="<?php echo $hasil[$no]->data_real ?>" data-bulan="<?php echo $hasil[$no]->bulan ?>" data-tahun="<?php echo $hasil[$no]->tahun ?>" data-golongan="<?php echo $hasil[$no]->golongan ?>" class="form-control"></td>
                            <td id="<?php echo $hasil[$no]->bulan ?>"><?php echo $hasil[$no]->persentase ?> %</td>
                        		
                        	</tr>
                        	<?php
                        	$no++; 
                        }  
                      ?>
                      
                    </tbody>
                  </table>

                </div>
    
  </div>
  
</div>