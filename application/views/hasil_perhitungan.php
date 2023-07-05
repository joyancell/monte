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