<div class="card mt-5">
  <div class="d-flex justify-content-between">
    <h5 class="card-header">Data Angka Random</h5>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col">
        <h5>Parameter</h5>
        <form>
          <div class="form-group mb-3">
            <label for="nilai_a">Nilai A</label>
            <input type="number" name="nilai_a" id="nilai_a" class="form-control">  
          </div>
          <div class="form-group mb-3">
            <label for="nilai_c">Nilai C</label>
            <input type="number" name="nilai_c" id="nilai_c" class="form-control">  
          </div>
          <div class="form-group mb-3">
            <label for="nilai_m">Nilai M</label>
            <input type="number" name="nilai_m" class="form-control" id="nilai_m">  
          </div>
          <div class="form-group mb-3">
            <label for="nilai_z">Nilai Z</label>
            <input type="number" class="form-control" name="nilai_z" id="nilai_z">  
          </div>
          <div class="mt-3">
            <button class="btn btn-primary hitungNilaiAcak">Hitung</button>  
          </div>
          
          
        </form>
      </div>
      <div class="col hasilPerhitungan">
        
        <h5>Hasil Perhitungan</h5>
        <?php
        $no = 1;
        foreach ($angka as $data) {
            ?>
            <div class="form-group mb-3">
              <label for="satu">Nilai <?php echo $no++ ?></label>
              <input type="" name="" id="satu" class="form-control" value="<?php echo $data->nilai ?>" disabled>  
            </div>  
            <?php 
        }
          
        ?>
        
      </div>
      
    </div>
    
  </div>
  
</div>