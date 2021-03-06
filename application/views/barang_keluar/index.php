<!DOCTYPE html>
<html>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
        Halaman Barang Keluar
        <small>Control panel</small>
        </h1>
        </section>

        <!-- Main content -->
        <section class="content">
        <?php if($this->session->flashdata('flash')) : ?>
            <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Data Barang Keluar <strong>Berhasil </strong><?= $this->session->flashdata('flash'); ?>
            </div>
        <?php elseif($this->session->flashdata('validasi')) : ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong> DATA </strong><?= $this->session->flashdata('validasi'); ?>
            </div>
        <?php endif;?>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Barang Keluar</h3>
                </div>
                <div class="box-body">
                    <a href="<?= base_url();?>Barang_keluar/cari" class="btn btn-success btn-sm "><i class="fa fa-plus"></i> Tambah Data</a>
                    <br><br>
                    <table id="tableBarangKeluar" class="table table-bordered table-striped table-xs display nowrap" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Transaksi</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jenis Barang</th>
                                <th>Quantity</th>
                                <th>Lokasi</th>
                                <th>Pallet Id</th>
                                <th>Keterangan</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; ?>
                        <?php foreach($barang as $brg) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $brg['no_transaksi']; ?></td>
                                <td><?= $brg['kode_barang']; ?></td>
                                <td><?= $brg['nama_barang']; ?></td>
                                <td><?= $brg['jenis_barang']; ?></td>
                                <td><?= $brg['qty']; ?></td>
                                <td><?= $brg['lokasi']; ?></td>
                                <td><?= $brg['pallet_id']; ?></td>
                                <td><?= $brg['keterangan']; ?></td>
                                <td><?= $brg['created_at']; ?></td>
                                <td><?= $brg['updated_at']; ?></td>
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
