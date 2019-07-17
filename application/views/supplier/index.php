<!DOCTYPE html>
<html>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
        Halaman Supplier
        <small>Control panel</small>
        </h1>
        </section>

        <!-- Main content -->
        <section class="content">
        <?php if($this->session->flashdata('flash')) : ?>
            <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Data Supplier <strong>Berhasil </strong><?= $this->session->flashdata('flash'); ?>
            </div>
        <?php endif;?>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Supplier</h3>
                </div>
                <div class="box-body">
                    <a href="<?= base_url();?>supplier/tambah" class="btn btn-success btn-sm "><i class="fa fa-plus"></i> Tambah</a>
                    <br><br>
                    <table id="tableSupplier" class="table table-bordered table-striped table-xs">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Supplier</th>
                                <th>Nama Supplier</th>
                                <th>Alamat</th>
                                <th>No Telephone</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no =1; ?>
                        <?php foreach($suppliers as $sup) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $sup['kode_suppliers']; ?></td>
                                <td><?= $sup['nama_suppliers']; ?></td>
                                <td><?= $sup['alamat']; ?></td>
                                <td><?= $sup['no_tlp']; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>Supplier/edit/<?= $sup['id'];?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="<?= base_url(); ?>Supplier/hapus/<?= $sup['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Ingin Hapus Data?');"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php $no++ ?>
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
