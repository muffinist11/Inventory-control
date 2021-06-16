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
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  </head>
  <body class="hold-transition register-page">

    <?php 
      if(isset($clean)){
          $page_flag = 1;   
        } else {
          $page_flag = 0;
        }
    ?>

    <!-- 確認画面 $page_flag1-->
    <?php if($page_flag === 1):?>

    <div class="confirm" style="text-align:center;">
      <div class="register-box">
        <div class="register-logo">
          <img src="../img/giaicon.png" alt="ログインロゴ" style="width: 350px; height: 150px;">
        </div>
        <div class="card">
          <form action="db_act" method="post">
            <div>
              <p>名前: <?= $clean['user_name'];?></p>
              <p>ユーザーid: <?= $clean['user'];?></p>
              <p>パスワード: <?= $clean['pass'];?></p>
            </div>
            <input type="submit" name="btn_submit" class="btn btn-success" value="送信">
            <input type="hidden" name="user_name" value="<?php echo $clean['user_name']; ?>">
            <input type="hidden" name="user" value="<?php echo $clean['user']; ?>">
            <input type="hidden" name="pass" value="<?php echo $clean['pass']; ?>">
          </form>
          <br>
          <form action="/form/registar">
              <input type="submit" class="btn btn-info" value="戻る">
          </form>
          <br>
        </div>
      </div>
    </div>

    <?php else:?>
    <!-- エラー抽出 $page_flag0-->
    <?php if(!empty($error)):?>
    <ul class="error_list" 
        style="padding: 10px 30px;
        color: #ff2e5a;
        font-size: 86%;
        text-align: left;
        border: 1px solid #ff2e5a;
        border-radius: 5px;">
    <?php foreach($error as $value):?>
        <li><?php echo $value;?></li>
    <?php endforeach; ?>
    </ul>
    <?php endif?>
    <!-- 登録画面 $page_flag0 -->
    <div class="register-box">
      <div class="register-logo">
          <img src="../img/giaicon.png" alt="ログインロゴ" style="width: 350px; height: 150px;">
      </div>

      <div class="card">
        <div class="card-body register-card-body">
          <p class="login-box-msg">ユーザー新規登録</p>
          <form action="/form/validation" method="post">
            <div class="input-group mb-3">
              <input type="text" name="user_name" class="form-control" placeholder="Full name" required="required">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="text" name="user" class="form-control" placeholder="User id" required="required">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-address-card"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" name="pass"  class="form-control" placeholder="Password" required="required">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" name="compass" class="form-control" placeholder="Retype password" required="required">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <button type="submit" class="btn btn-primary" name="btn_submit">登録</button>
              </div>
            </div>
          </form>
          <br>
          <form action="/form/admin_page" method="post">
            <div class="row">
              <div class="col-4">
                <button type="submit" class="btn btn-primary" name="btn_submit">戻る</button>
              </div>  
            </div>  
          </form>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
  </body>
</html>
