<div class="mb-1 row">
  <div class="col-md-9"> 
    <div class="row">
      <div class="col">
        <select class="form-select distribusi" name="distribusi" required>
          <option value="">Distibusi</option>
          <option value="Persediaan">Persediaan</option>
          <option value="Permintaan">Permintaan</option>
          
        </select>  
      </div>
      <div class="col">
        <select class="form-select golongan" name="golongan" required>
          <option value="">Pilih golongan darah</option>
          <option value="A">Darah A</option>
          <option value="B">Darah B</option>
          <option value="AB">Darah AB</option>
          <option value="O">Darah O</option>
        </select>  
      </div>
      <div class="col">
        <select class="form-select tahun" name="tahun" required>
          <option value="">Pilih Tahun</option>
          <?php
          $start = '2015';
          $tahun = date('Y') - 1;
          for ($i=$tahun; $i >= $start; $i--) { 
              ?>
              <option value="<?php echo $i ?>"><?php echo $i ?></option>
              <?php 
            }  
          ?>
        </select>  
      </div>  
    </div>
  </div>
  <div class="col-md-3">
  <button class="btn btn-success hasil">Hitung</button> 
  <button class="btn btn-danger reset">Reset</button> 
  
  </div>
  
</div>
<div class="hasil_akhir"></div>