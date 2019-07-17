<!DOCTYPE html>
<html>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
        Halaman Master Barang
        <small>Control panel</small>
        </h1>
        </section>

        <!-- Main content -->
        <section class="content">
        <?php if($this->session->flashdata('flash')) : ?>
            <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Data Barang <strong>Berhasil </strong><?= $this->session->flashdata('flash'); ?>
            </div>
        <?php endif;?>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Barang</h3>
                </div>
                <div class="box-body">
                    <a href="<?= base_url();?>Master_barang/tambah" class="btn btn-success btn-sm "><i class="fa fa-plus"></i> Tambah Data</a>
                    <br><br>
                    <table id="tableDataBarang" class="table table-bordered table-striped table-xs">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jenis Barang</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; ?>
                        <?php foreach($barang as $brg) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $brg['kode_barang']; ?></td>
                                <td><?= $brg['nama_barang']; ?></td>
                                <td><?= $brg['jenis_barang']; ?></td>
                                <td><?= $brg['created_at']; ?></td>
                                <td><?= $brg['updated_at']; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>Master_barang/edit/<?= $brg['id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="<?= base_url(); ?>Master_barang/hapus/<?= $brg['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Ingin Hapus Data?');"><i class="fa fa-trash"></i> Hapus</a>
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
