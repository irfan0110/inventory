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
            <div class="box box-danger">
                <div class="box-header">
                    <h3>Detail Data User</h3>
                </div>
                <div class="box-body">
                    <b>Nama User :</b><br>
                    <?= $users['name']; ?>
                    <br><br>
                    <?php if($users['avatar']) : ?>
                        <img src="<?= base_url(); ?>gambar/<?= $users['avatar']; ?>" width="128px">
                    <?php else : ?>
                        Tidak Ada Avatar
                    <?php endif; ?>
                    <br>
                    <br>

                    <b>Username :</b><br>
                    <?= $users['username']; ?>
                    <br>
                    <br>

                    <b>Roles</b><br>
                    <?= $users['roles']; ?>
                    <br>
                    <br>

                    <b>Status</b><br>
                    <?= $users['status']; ?>
                    <br>
                    <br>

                    <b>Bergabung</b><br>
                    <?= $users['created_at']; ?>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</body>
</html>
