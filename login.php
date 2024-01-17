<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; SIMPATI</title>

  <link rel="shortcut icon"  href="assets/img/favicon.ico" />

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body style="background-image: url('assets/img/background.jpg');">
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <!-- <img src="assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle"> -->
              <h4 style="text-align: center;color: white;">SIMPATI <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-info-circle" title="Info"></i></a></h4>
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
                <form method="POST" action="javascript:void(0)" class="needs-validation" novalidate="" onsubmit="login()">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="user_id" tabindex="1" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <input type="password" class="form-control" id="user_pass" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <button class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer" style="color: white;">
              Copyright &copy; SIMPATI 2023
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Apa itu SIMPATI ?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <p style="text-align: justify;"><b>SIMPATI</b> Adalah Sebuah Aplikasi Yang Dirancang Untuk Mencatat Histori Surat Masuk Dan Keluar Yang Terjadi Pada TU ( Tata Usaha ) </p>
          </div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>

  <!-- General JS Scripts -->
  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  <script src="assets/js/page/bootstrap-modal.js"></script>

  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
  <script>
    function login() {
        var user_id = encodeURIComponent($("#user_id").val());
        var user_pass = encodeURIComponent($("#user_pass").val());
        var Login ='user_id='+user_id+'&user_pass='+user_pass;
        if (user_id != "" && user_pass != "") {
            $.ajax({
                url:'proses/proseslogin.php',
                type:'POST',
                data:Login,
                dataType:'text',
                success:function(respon){
                    var result=JSON.parse(respon);
                    if(result.success==true){
                        window.location.href = result.url;
                    }else{
                        alert('USER ID / PASSWORD SALAH');
                        location.reload();
                    }
                }
            });
        } else {
            alert('Data Tidak Boleh Kosong');
        }
    }
  </script>
</body>
</html>