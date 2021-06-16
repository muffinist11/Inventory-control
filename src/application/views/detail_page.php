<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory Control</title>
    <link rel="shortcut icon" href="../img/favicon.ico">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <style>
        .item-box,
        .card{
            margin:0 auto;
        }
    </style>
  </head>
  <body>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/form/admin_page">Home</a></li>
            </ol>
          </div>
        </div>
      </div>

      <div class="search">
        <!-- Main content -->
        <section class="content">
            <h2 class="text-center display-4">Users</h2>                                   
        </section>
      </div>
    </section>

    <div class="register-box" style="margin:0 auto;">
      <div class="register-logo">
          <img src="../img/giaicon.png" alt="ログインロゴ" style="width: 350px; height: 150px;">
      </div>
      <div class="card">
        <div class="card-body register-card-body">
          <p class="login-box-msg">ユーザー編集</p>
          <form method="post">
            <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
            <p>名前</p>
            <div class="input-group mb-3">
              <input type="text" name="user_name" class="form-control" value="<?php if(!empty($_POST['user_name'])){
                  echo $_POST['user_name'];}?>">
              <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
              </div>
            </div>
            <p>ユーザーID</p>
            <div class="input-group mb-3">
              <input type="text" name="user" class="form-control" value="<?php if(!empty($_POST['user'])){
                echo $_POST['user'];}?>">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-address-card"></span>
                </div>
              </div>
            </div>
            <p>パスワード</p>
            <div class="input-group mb-3">
              <input type="text" name="pass"  class="form-control" value="<?php if(!empty($_POST['pass'])){
                echo $_POST['pass'];}?>">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="item-box">
                <input type="submit" name="change"  class="btn btn btn-app bg-success" value="更新">
                <input type="submit" name="delete"  class="btn btn-app bg-danger" value="削除">
                <input type="submit" name="back"  class="btn btn-app bg-success" value="戻る">         
              </div>
            </div>
          </form>
        </div>
      </div>       
    </div>    
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
  </body>
</html>
