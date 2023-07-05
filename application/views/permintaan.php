
<div class="mb-1 row">
  <div class="col-md-6"> 
    <div class="row">
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
  <div class="col-md-6">
  <button class="btn btn-success tampil-hasil2">Tampilkan</button> 
  <a href="<?php echo base_url() ?>permintaan/tambah" class="btn btn-primary">Tambah Data</a> 
  </div>
  
</div>


<div class="hasil"></div>