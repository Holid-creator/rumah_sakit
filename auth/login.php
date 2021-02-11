<?php
require_once "../config/config.php";

if (isset($_SESSION['username'])) {
  echo "<script>window.location = '" . base_url() . "'</script>";
} else {
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Rumah Sakit</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url() ?>css/simple-sidebar.css" rel="stylesheet">

  </head>

  <body>
    <div id="wrapper">
      <div class="container">
        <div style="margin-top: 250px; text-align: center;">
          <?php
          if (isset($_POST['login'])) {
            $username = trim(mysqli_real_escape_string($conn, $_POST['username']));
            $password = sha1(trim(mysqli_real_escape_string($conn, $_POST['password'])));
            $sql_login = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'") or die(mysqli_error($conn));
            if (mysqli_num_rows($sql_login) > 0) {
              $_SESSION['username'] = $username;
              echo "<script>window.location ='" . base_url() . "'; </script>";
            } else { ?>
              <div class="row">
                <div class="col-md-6 col-lg-offset-3">
                  <div class="alert alert-danger alert-dismissable" role="alert">
                    <a href="" class="close" data-dismiss="alert" aria-label="Close">&times;</a>
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <strong>Login Gagal</strong> Username/ Password Salah
                  </div>
                </div>
              </div>
          <?php }
          }
          ?>
          <form action="" method="post" class="navbar-form">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input type="text" name="username" class="form-control" required autofocus>
            </div>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input type="password" name="password" class="form-control" required>
            </div>
            <div class="input-group">
              <button type="submit" name="login" class="btn btn-primary">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /#wrapper -->

    <script src="<?= base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>

  </body>

  </html>
<?php } ?>