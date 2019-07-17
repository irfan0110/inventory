<!DOCTYPE html>
<html>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
        Halaman Mapping
        <small>Control panel</small>
        </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Pilih Data</h3>
                </div>
                <div class="box-body">
                    <table id="tablePilihData" class="table table-bordered table-striped table-xs">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jenis Barang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; ?>
                        <?php foreach($mapping as $map) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $map['kode_barang']; ?></td>
                                <td><?= $map['nama_barang']; ?></td>
                                <td><?= $map['jenis_barang']; ?></td>
                                <td align="center">
                                    <a href="<?= base_url(); ?>Mapping/tambah/<?= $map['id']; ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Pilih</a>
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
