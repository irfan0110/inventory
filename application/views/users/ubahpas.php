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
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Form Ubah Password</h3>
                        </div>
                        <div class="box-body">
                            <form action="" method="POST">
                                <input type="hidden" name="id" value="<?= $users['id']; ?>">
                                <div class="form-group">
                                    <label for="pas">Masukan Password Baru</label>
                                    <input type="password" name="pas" class="form-control" id="pas">
                                    <small class="form-text text-danger"><?= form_error('pas');?></small>
                                </div>
                                
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
