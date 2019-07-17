<!DOCTYPE html>
<html>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
        Halaman User
        <small>Control panel</small>
        </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-7">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Form Tambah User</h3>
                        </div>
                        <div class="box-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name">Nama User</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                    <small class="form-text text-danger"><?= form_error('name');?></small>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" id="username">
                                    <small class="form-text text-danger"><?= form_error('username');?></small>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                    <small class="form-text text-danger"><?= form_error('password');?></small>
                                </div>
                                <div class="form-group">
                                    <label for="avatar">Avatar</label>
                                    <input type="file" name="avatar" class="form-control" id="avatar">
                                </div>
                                <label for="">Roles</label>
                                <br>
                                <input type="checkbox" name="roles[]" id="ADMIN" value="ADMIN">
                                <label for="ADMIN">Administrator</label>
                                <input type="checkbox" name="roles[]" id="STAFF" value="STAFF">
                                <label for="STAFF">Staff</label>
                                <small class="form-text text-danger"><?= form_error('roles[]');?></small>
                                
                                <br>
                                <input class="btn btn-primary" type="submit" value="Save">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

</body>
</html>
