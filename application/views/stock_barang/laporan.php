<!DOCTYPE html>
<html>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
        Halaman Stock Barang
        <small>Control panel</small>
        </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Cetak Costum Laporan Stock Barang </h3>
                </div>
                <div class="box-body">
                    <form action="<?= base_url(); ?>Stock_barang/cetakCostum" method="POST" target="_blank">
                        <div class="form-group row">
                            <label for="costum" class="col-sm-2 col-form-label">Cetak Costum</label>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-shopping-cart"></i>
                                        </div>
                                        <input type="text" name="cari" class="form-control"  id="cari" value="" placeholder="Kode / Nama / Jenis " required>
                                    </div>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="cetak" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-3">
                                <input type="submit" class="btn btn-sm btn-info" value="Cetak PDF">    
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="box box-warning">
                <div class="box-header">
                    <h3 class="box-title">Cetak Semua Laporan Stock Barang</h3>
                </div>
                <div class="box-body">
                    <form action="<?= base_url(); ?>Stock_barang/cetak" method="POST" target="_blank">
                        <input type="submit" class="btn btn-info btn-sm" value="Cetak PDF">
                    </form>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</body>
</html>
