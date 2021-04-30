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
    .input-group{
        
        margin:0 auto;
    }

    .card{
        margin:0 auto;
    }
</style>

</head>
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
                    <div class="row">                                                
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg"
                            id="search"   placeholder="Type your keywords">
                            <input type="button" class="fas"  value="&#xf002" id="button">
                            <input type="button" class="fas"  value="all" id="button2">
                        </div>
                    </div>                   
                </section>
            </div>
            
        </section>



        <section class="content">
            <div class="container-fluid">
                <div class="row">
                        <div class="card">
                    <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered" id="result">
                            <thead>
                            <tr class="thred">
                                <th>Id</th>
                                <th>Name</th>
                                <th>User Id</th>
                                <th>Password</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                                <tbody>
                                <?php foreach ($result as $value) {?>
                                    <tr class="target-area">

                                        <td><?= $value['id']?></td>
                                        <td><?= $value['user_name']?></td>
                                        <td><?= $value['user']?></td>
                                        <td><?= $value['pass']?></td>

                                        <td>
                                        <form action="edit" method="post">
                                        <input type="submit" name="btn_submit" class="btn btn-app bg-danger" value="編集">
                                        <!-- <i class="fas fa-user-edit"></i> -->
                                            <input type="hidden" name="id" value="<?= $value['id']; ?>">
                                            <input type="hidden" name="user_name" value="<?= $value['user_name']; ?>">
                                            <input type="hidden" name="user" value="<?= $value['user']; ?>">
                                            <input type="hidden" name="pass" value="<?= $value['pass']; ?>">
                                        </form>                              
                                        </td>

                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                <!-- /.card-body -->

 
                        <div class=" clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                        </div>
                    </div>
                <!-- /.card -->
                </div>
            </div>
        </section>
        <!-- /.content -->
        </div>
    <!-- /.content-wrapper -->

    </div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script>
    'use strict'
    {

        $(function(){
            $('#button').on("click",function(){
                var re = new RegExp($('#search').val());
                $('#result tbody tr').each(function(){
                    var tr = $(this);
                    tr.hide();
                    $('td', this).each(function(){
                        var txt = $(this).html();
                        if(txt.match(re) != null){
                            tr.show();
                        }
                    });
                });
            });
            $('#button2').on("click",function(){
                $('#result tr').show();
            });
        });
    
    }
</script>


</body>


</html>
