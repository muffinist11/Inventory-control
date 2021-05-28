<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>編集・詳細</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition detail_page">
<div class="wrapper">
<div class="card-body">
<!--戻る-->
    <div class="row">
    <p><a href="index">戻る</a></p>
    </div>
<!--編集-->     
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">編集・詳細</h3>
        </div>
        <form action="/Management/update_row" method="post">
        <div class="card-body">
            <div><?php //if(!empty($_POST['id'])){echo $_POST['id'];}?></div>
            <div class="form-group">
                <label for="">名前</label>
                <input type="text" class="form-control" name="title" value="<?php if(!empty($_POST['title'])){echo $_POST['title'];}?>">
            </div>
            <div>
                <label for="">数量</label>
                <div class="input-group mb-3">
                <input type="number" class="form-control" name="num" value="<?php if(!empty($_POST['num'])){echo $_POST['num'];}?>">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" id="button-addon2">変更</button>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">保存場所</label>
                <input type="text" class="form-control" name="place" value="<?php if(!empty($_POST['place'])){echo $_POST['place'];}?>">
            </div>
            <div class="form-group">
                <label for="">購入日</label>
                <input type="date" class="form-control" name="pc" value="<?php if(!empty($_POST['pc'])){echo $_POST['pc'];}?>">
            </div>
            <div class="form-group pb-3">
                <label for="Textarea">備考</label>
                <textarea class="form-control" id="Textarea" rows="5" name="etc" value=""><?php if(!empty($_POST['etc'])){echo $_POST['etc'];}?></textarea>
                <div class="invalid-feedback"></div>
            </div>
            <input type="hidden" name="id" value="<?= $_POST['id']; ?>">
            <div class="text-center">
                <input type="submit" name="change" class="btn btn-primary" value="編集登録">
                <input type="submit" name="delete" class="btn btn-danger"  value="削除">
                <!--<input type="hidden" name="stock_id" value="<?php echo $stocks['id']; ?>">-->
            </div>
        </form>
    </div>
</div>
</div>

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
