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
        <?php if($this->session->flashdata('flash')) : ?>
            <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Data User <strong>Berhasil </strong><?= $this->session->flashdata('flash'); ?>
            </div>
        <?php endif;?>
            <?php $this->image_lib->display_errors(); ?>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data User</h3>
                </div>
                <div class="box-body">

                    <a href="<?= base_url();?>user/tambah" class="btn btn-success btn-xs "><i class="fa fa-plus"></i> Tambah</a>
                    <br><br>
                    <table id="tableUser" class="table table-bordered table-striped table-xs">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama User</th>
                                <th>Username</th>
                                <th>Roles</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; ?>
                        <?php foreach($users as $usr ): ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $usr['name'];?></td>
                                <td><?= $usr['username'];?></td>
                                <td><?= $usr['roles'];?></td>
                                <td><?= $usr['status'];?></td>
                                <td>
                                    <a href="<?= base_url(); ?>user/edit/<?= $usr['id'];?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="<?= base_url(); ?>user/detail/<?= $usr['id']; ?>" class="btn bg-purple btn-sm"><i class="fa fa-user-circle "> Detail</i></a>
                                    <a href="<?= base_url(); ?>user/hapus/<?= $usr['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Ingin Hapus Data?');"><i class="fa fa-trash"></i> Hapus</a>
                                    <a href="<?= base_url(); ?>user/ubahpas/<?= $usr['id']; ?>" class="btn btn-warning btn-xs"><i class="fa fa-key"></i> Ubah Password</a>
                                </td>
                            </tr>
                        <?php $no++;?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</body>
</html>
