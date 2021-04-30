<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ユーザー管理画面</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../dist/css/adminlte.min.css">

<style>
    .item-box,
    .card{
        margin:0 auto;
    }


</style>

<body>

    <div class="wrapper">
            <div class="content-wrap">

                <!-- Content Header (Page header) -->
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

                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                                <div class="card">
                                    <form method="post">
                                    <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
                                        <div class="item-box">
                                        <label for="user_name">ユーザー名</label>
                                        <input id="user_name" type="text" name="user_name" value="<?php if(!empty($_POST['user_name'])){
                                        echo $_POST['user_name'];}?>">
                                        </div>
                                        <div class="item-box">
                                        <label for="user">ID</label>
                                        <input id="user" type="user" name="user" value="<?php if(!empty($_POST['user'])){
                                        echo $_POST['user'];}?>">
                                        </div>
                                        <div class="item-box">
                                        <label for="pass">パスワード</label>
                                        <input id="pass" type="pass" name="pass" value="<?php if(!empty($_POST['pass'])){
                                        echo $_POST['pass'];}?>">
                                        </div>
                                        <br>

                                        <div class="item-box">
                                            <input type="submit" name="change"  class="btn btn btn-app bg-success" value="更新">
                                            <input type="submit" name="delete"  class="btn btn-app bg-danger" value="削除">
                                        </form>
                                        <br>
                                        <a class="btn_cancel" href="users_edit">キャンセル</a>
                                        </div>
                                </div>
                        </div>
                    </div>    
                </section>        
            </div>
    </div>


<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->


</body>


</html>
