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
        <?php if($this->session->flashdata('flash')) : ?>
            <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Data Mapping <strong>Berhasil </strong><?= $this->session->flashdata('flash'); ?>
            </div>
        <?php elseif($this->session->flashdata('validasi')) : ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong> DATA </strong><?= $this->session->flashdata('validasi'); ?>
            </div>
        <?php endif;?>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Mapping</h3>
                </div>
                <div class="box-body">
                    <a href="<?= base_url();?>Mapping/cari" class="btn btn-success btn-sm "><i class="fa fa-plus"></i> Tambah Data</a>
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#lokasi"><i class="fa fa-plus"></i> Tambah Lokasi</button>
                    
                    <div id="lokasi" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Tambah Lokasi</h4>
                                </div>
                                <form action="<?= base_url() ?>Mapping/lokasi" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="lokasi">Lokasi</label>
                                            <input type="text" name="lokasi" id="lokasi" class="form-control" required>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-info btn-sm" value="Tambah">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <table id="tableDataMapping" class="table table-bordered table-striped table-xs display nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pallet Id</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jenis Barang</th>
                                <th>Quantity</th>
                                <th>Lokasi</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; ?>
                        <?php foreach($mapping as $map) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $map['pallet_id']; ?></td>
                                <td><?= $map['kode_barang']; ?></td>
                                <td><?= $map['nama_barang']; ?></td>
                                <td><?= $map['jenis_barang']; ?></td>
                                <td><?= $map['qty']; ?></td>
                                <td><?= $map['lokasi']; ?></td>
                                <td><?= $map['created_at']; ?></td>
                                <td><?= $map['updated_at']; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>Mapping/edit/<?= $map['pallet_id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="<?= base_url(); ?>Mapping/hapus/<?= $map['pallet_id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Ingin Hapus Data?');"><i class="fa fa-trash"></i> Hapus</a>
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
