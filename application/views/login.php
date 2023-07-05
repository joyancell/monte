<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="<?php echo base_url() ?>assets/" data-template="vertical-menu-template-free" >
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Monte Carlo - Halaman Login</title>
  <meta name="description" content="Simulasi Monte Carlo" />
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>assets/img/favicon/pmi.jpg" />
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/fonts/boxicons.css" />
  <!-- Core CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/demo.css" />
  <!-- Vendors CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.3/sweetalert2.min.css" integrity="sha512-NvuRGlPf6cHpxQqBGnPe7fPoACpyrjhlSNeXVUY7BZAj1nNhuNpRBq3osC4yr2vswUEuHq2HtCsY2vfLNCndYA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/css/pages/page-auth.css" />
  <!-- Helpers -->
  <script src="<?php echo base_url() ?>assets/vendor/js/helpers.js"></script>
  <script src="<?php echo base_url() ?>assets/js/config.js"></script>
</head>
<body>
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="<?php echo base_url() ?>" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                  <img class="img-fluid" style="height: 100px;" src="<?php echo base_url() ?>assets/img/favicon/pmi.jpg">
                </span>

              </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-5">Selamat datang di aplikasi Analisa Monte Carlo</h4>
            

            <form id="login" class="mb-3">
              <input type="hidden" id="url" value="<?php echo base_url() ?>Login/proses_login">
              <div class="mb-3 form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username" />
              </div>
              <div class="mb-3 form-group form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Password</label>
                </div>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100 login" type="submit">Masuk</button>
              </div>
            </form>

            <p class="text-center">
              <a href="#">
                <span>Lupa Password</span>
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="<?php echo base_url() ?>assets/vendor/libs/jquery/jquery.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/libs/popper/popper.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/js/bootstrap.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="<?php echo base_url() ?>assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="<?php echo base_url() ?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/jquery-validation/additional-methods.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.3/sweetalert2.min.js" integrity="sha512-eN8dd/MGUx/RgM4HS5vCfebsBxvQB2yI0OS5rfmqfTo8NIseU+FenpNoa64REdgFftTY4tm0w8VMj5oJ8t+ncQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Main JS -->
  <script src="<?php echo base_url() ?>assets/js/main.js"></script>
  

  <!-- Page JS -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {

      $.validator.setDefaults({
        submitHandler: function () {
          $('.login').attr('disabled', true);
          $('.login').html('Loading...');
          let username = $('#username').val();
          let password = $('#password').val();
          let url      = $('#url').val();
          $.ajax({
            url : url,
            type : 'POST',
            data : {username : username, password : password},
            success : function(response) {
              setTimeout(function () {
                $('.login').attr('disabled', false);
                $('.login').html('Masuk');
                if(response == 'user'){
                  Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Username Salah!'
                  });
                }else if(response == 'pass'){
                  Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Password Salah!'
                  })
                }else{
                  window.location='./';
                } 
              }, 1500)
              
            }
          })
        }
      });
      $('#login').validate({
        rules: {
          username: {
            required: true,
            minlength: 5
          },
          password: {
            required: true,
            minlength: 5
          },
        },
        messages: {
          username: {
            required: "Masukan Username",
            minlength: "Username Minial 5 karakter"
          },
          password: {
            required: "Masukan Password",
            minlength: "Password Minimal 5 karakter"
          }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });

      

    })
  </script>
</body>
</html>
