<!DOCTYPE html>
<html>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
        Halaman Barang Masuk
        <small>Control panel</small>
        </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-7">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Form Barang Masuk</h3>
                        </div>
                        <div class="box-body">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="no_transaksi">No Transaksi</label>
                                    <input type="text" name="no_transaksi" class="form-control" id="no_transaksi" value="<?= $no_transaksi; ?>" readyonly>
                                </div>
                                <div class="form-group">
                                    <label for="kode_barang">Kode Barang</label>
                                    <input type="text" name="kode_barang" class="form-control" id="kode_barang" onkeyup="autofill()">
                                    <small class="form-text text-danger"><?= form_error('kode_barang');?></small>
                                </div>
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" name="nama_barang" class="form-control" id="nama_barang">
                                    <small class="form-text text-danger"><?= form_error('nama_barang');?></small>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_barang">Jenis Barang</label>
                                    <input type="text" name="jenis_barang" class="form-control" id="jenis_barang">
                                    <small class="form-text text-danger"><?= form_error('jenis_barang');?></small>
                                </div>
                                <div class="form-group">
                                    <label for="qty">Quantity</label>
                                    <input type="number" name="qty" class="form-control" id="qty">
                                    <small class="form-text text-danger"><?= form_error('qty');?></small>
                                </div>
                                <div class="form-group">
                                    <label for="supplier">Supplier</label>
                                    <select name="supplier" id="supplier" class="form-control select2" style="width: 100%;">
                                    <?php foreach ($supplier as $sup ): ?>
                                        <option value="<?= $sup['nama_suppliers']; ?>"><?= $sup['nama_suppliers']; ?></option>
                                    <?php endforeach;?>
                                    <small class="form-text text-danger"><?= form_error('supplier');?></small>
                                    </select>
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
