<?php
include "inc/koneksi.php";
session_start();

if (isset($_POST['btnLogin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM tb_pengguna WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['ses_id'] = $row['id'];
        $_SESSION['ses_nama'] = $row['nama'];
        $_SESSION['ses_username'] = $row['username'];
        $_SESSION['ses_level'] = $row['level'];

        header("Location: index.php");
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | SI Perpustakaan</title>
    <link rel="icon" href="dist/img/lgo1.png">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <h3>
                <font color="green">
                    <b>Sistem Informasi Perpustakaan</b>
                </font>
            </h3>
        </div>
        <div class="login-box-body">
            <center>
                <img src="dist/img/lgo1.png" width=160px />
            </center>
            <br>
            <p class="login-box-msg">Login System</p>

            <?php
            if (isset($error)) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
            ?>

            <form action="" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-success btn-block btn-flat" name="btnLogin" title="Masuk Sistem">
                            <b>Masuk</b>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
  
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</body>

</html>
