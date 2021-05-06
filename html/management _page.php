<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>管理画面</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!--　ヘッダー -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  <!-- ログアウト -->
    <div class="navbar-nav ml-auto">
      <a href="" class="">ログアウト</a>
    </div>
  </nav>

  <?php include('./side.php'); ?>
  <!--
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="" class="brand-link">
      <span class="brand-text font-weight-light">カテゴリー</span>
    </a>
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item menu-open">
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                      <p>在庫</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                      <p>備品</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
  </aside> -->

  <!-- body --> 
    <div class="content-wrapper">
      <div class="content-header">
        <h1 class="text-center">管理画面</h1>
      </div>
    <div>
      <div class="card-body"> 
        <div class="row g-3">
          <div class="col-sm-5">
            <input type="search" class="form-control" data-table="table" placeholder="検索">
          </div>
          <div class="text-right ml-auto">
            <button type="submit" class="btn btn-primary">新規追加</button>
          </div>
        </div>
      </div>
    </div>
      
  <!-- 管理表 -->    
    <div class="card-body">
      <table id="" class="table">
        <thead>
          <tr>
            <th>名前</th>
            <th>数量</th>
            <th>保管場所</th>
            <th>購入日</th>
            <th>更新日</th>
            <th>編集・詳細</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>イス</td>
            <td>10</td>
            <td>2F</td>
            <td>20.4.1</td>
            <td>20.4.1</td>
            <td><button type="button" class="btn btn-primary">詳細・編集</button></td>
          </tr>
          <tr>
            <td>加湿器</td>
            <td>2</td>
            <td>1F倉庫</td>
            <td>20.12.1</td>
            <td>20.12.1</td>
            <td><button type="button" class="btn btn-primary">詳細・編集</button></td>
          </tr>
            <tr>
              <td>つくえ</td>
              <td>５</td>
              <td>2F</td>
              <td>20.7.1</td>
              <td>20.7.1</td>
              <td><button type="button" class="btn btn-primary">詳細・編集</button></td>
            </tr>
        </tbody>
      </table>
    </div>
  
       
<script>
  (function(document) {
    'use strict';
    var LightTableFilter = (function(Arr) {
      var _input;
      function _onInputEvent(e) {
        _input = e.target;
        var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
        Arr.forEach.call(tables, function(table) {
          Arr.forEach.call(table.tBodies, function(tbody) {
            Arr.forEach.call(tbody.rows, _filter);
          });
        });
      }
  
      function _filter(row) {
        var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
        row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
      }
  
      return {
        init: function() {
          var inputs = document.getElementsByClassName('form-control');
          Arr.forEach.call(inputs, function(input) {
            input.oninput = _onInputEvent;
          });
        }
      };
    })(Array.prototype);
  
    document.addEventListener('readystatechange', function() {
      if (document.readyState === 'complete') {
        LightTableFilter.init();
      }
    });
  
  })(document);
</script>


<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
