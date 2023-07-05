</div>
            
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="#" target="_blank" class="footer-link fw-bolder">Joy Ancell</a>
                </div>
                
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    

    <!-- Core JS -->
    <!-- build:js <?php echo base_url() ?>assets/vendor/js/core.js -->
    <script src="<?php echo base_url() ?>assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/libs/popper/popper.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/js/bootstrap.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?php echo base_url() ?>assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?php echo base_url() ?>assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="<?php echo base_url() ?>assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="<?php echo base_url() ?>assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script type="text/javascript">
      $('.tampil-hasil').on('click', function () {
        
        let golongan = $('.golongan').val();
        let tahun = $('.tahun').val();
        if (golongan == '') {
          alert('silahkan pilih golongan darah')
        }else{
          if (tahun == '') {
            alert('silahkan pilih tahun')
          } else {
            $('.hasil').html('')
            $('.tampil-hasil').html('loading...')
            $('.tampil-hasil').prop('disabled', true)
            $.ajax({
              url: '<?php echo base_url() ?>distribusi/filter',
              type: 'post',
              data: {golongan: golongan, tahun:tahun},
              success: function (argument) {
                setTimeout(function () {
                  $('.tampil-hasil').html('Tampilkan')
                  $('.tampil-hasil').prop('disabled', false)
                  $('.hasil').html(argument)
                }, 2000)
                
              }
            })
          }
        }
        
      })

      $('.tampil-hasil2').on('click', function () {
        let golongan = $('.golongan').val();
        let tahun = $('.tahun').val();
        if (golongan == '') {
          alert('silahkan pilih golongan darah')
        }else{
          if (tahun == '') {
            alert('silahkan pilih tahun')
          } else {
            $('.hasil').html('')
            $('.tampil-hasil2').html('loading...')
            $('.tampil-hasil2').prop('disabled', true)
            $.ajax({
              url: '<?php echo base_url() ?>permintaan/filter',
              type: 'post',
              data: {golongan: golongan, tahun:tahun},
              success: function (argument) {
                setTimeout(function () {
                  $('.tampil-hasil2').html('Tampilkan')
                  $('.tampil-hasil2').prop('disabled', false)
                  $('.hasil').html(argument)
                }, 2000)
              }
            })
          }
        }
        
      })
      $('.hitungNilaiAcak').on('click', function (e) {
        e.preventDefault();
        $('.hitungNilaiAcak').html('loading...')
        $('.hitungNilaiAcak').prop("disabled", true);
        let a = $('#nilai_a').val();
        let c = $('#nilai_c').val();
        let m = $('#nilai_m').val();
        let z = $('#nilai_z').val();
        $.ajax({
          url: '<?php base_url() ?>angka_random/cek_nilai',
          type: 'post',
          data: {a:a, c:c, m:m,z:z},
          success: function (argument) {
            $('.hitungNilaiAcak').html('Hitung')
            $('.hitungNilaiAcak').prop("disabled", false);
            if (argument == '1') {
              alert('Nilai C dan M harus prima')

            }else{
              $('.hasilPerhitungan').html(argument)
                
            }
            
          }
        })
      });
      $('.hasil').on('click', function () {
        let distribusi = $('.distribusi').val();
        let golongan = $('.golongan').val();
        let tahun = $('.tahun').val();
        if (distribusi == '') {
          alert('silahkan pilih jenis distribusi')
        }else{
          if (golongan == '') {
            alert('silahkan pilih golongan darah')
          }else{
            if (tahun == '') {
              alert('silahkan pilih tahun')
            } else {
              $('.hasil_akhir').html('')
              $('.hasil').html('loading...')
              $('.hasil').prop('disabled', true)
              $.ajax({
                url: '<?php echo base_url() ?>hasil/hitung',
                type: 'post',
                data: {golongan: golongan, tahun:tahun, distribusi:distribusi},
                success: function (argument) {
                  setTimeout(function () {
                    $('.hasil').html('Tampilkan')
                    $('.hasil').prop('disabled', false)
                    $('.hasil_akhir').html(argument)
                  }, 2000)
                  // $('.hasil_akhir').html(argument)
                }
              })
            }
          }  
        }
        
      })

      $('.hasil_akhir').on('keyup', 'table input', function() {
        let nilai = $(this).val();
        let bulan = $(this).data('bulan');
        let tahun = $(this).data('tahun');
        let golongan = $(this).data('golongan');
        clearTimeout($.data(this, 'timer'));
        var wait = setTimeout(saveData(nilai, bulan, tahun, golongan), 500); // delay after user types
        $(this).data('timer', wait);
      });
      function saveData(nilai, bulan, tahun, golongan) {
        // alert(nilai + ' ' + tahun+' '+golongan)
        $.ajax({
          url: '<?php echo base_url() ?>hasil/update',
          type: 'post',
          data: {nilai:nilai, bulan:bulan, tahun:tahun, golongan:golongan},
          success: function (argument) {
            // alert(argument)
            $('#'+bulan).html(argument+' %')
          }
        })
      }

      $('.reset').on('click', function () {
        $.ajax({
          url: '<?php echo base_url() ?>hasil/reset',
          type: 'post',
          success: function (argument) {
            alert(argument)
            location.reload();
          }
        })
      })
    </script>
  </body>
</html>