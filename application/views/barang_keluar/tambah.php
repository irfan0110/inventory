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
        <?php if($this->session->flashdata('validasi')) : ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong> Quantity </strong><?= $this->session->flashdata('validasi'); ?>
            </div>
        <?php endif;?>
            <div class="row">
                <div class="col-md-7">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Form Barang Keluar</h3>
                        </div>
                        <div class="box-body">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="no_transaksi">No Transaksi</label>
                                    <input type="text" name="no_transaksi" class="form-control" id="no_transaksi" value="<?= $no_tran ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="pallet_id">Pallet ID</label>
                                    <input type="text" name="pallet_id" class="form-control" id="pallet_id" value="<?= $barang['pallet_id'];?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="kode_barang">Kode Barang</label>
                                    <input type="text" name="kode_barang" class="form-control" id="kode_barang" value="<?= $barang['kode_barang']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" name="nama_barang" class="form-control" id="nama_barang" value="<?= $barang['nama_barang']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_barang">Jenis Barang</label>
                                    <input type="text" name="jenis_barang" class="form-control" id="jenis_barang" value="<?= $barang['jenis_barang']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="qty_lokasi">Quantity Lokasi</label>
                                    <input type="number" name="qty_lokasi" class="form-control" id="qty_lokasi" value="<?= $barang['qty']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="qty">Quantity</label>
                                    <input type="number" name="qty" class="form-control" id="qty" >
                                    <small class="form-text text-danger"><?= form_error('qty');?></small>
                                </div>
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <input type="text" name="lokasi" class="form-control" id="lokasi" value="<?= $barang['lokasi']; ?>" readonly>
                                </div><div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" class="form-control" rows="3" placeholder="Isi Keterangan"></textarea>
                                    <small class="form-text text-danger"><?= form_error('keterangan'); ?></small>
                                </div>
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
