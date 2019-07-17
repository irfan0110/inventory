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
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Cetak Laporan Periodik Barang Masuk</h3>
                </div>
                <div class="box-body">
                    <form action="<?= base_url(); ?>Barang_masuk/pdf_periodik" method="POST" target="_blank">
                        <div class="form-group row">
                            <label for="dari_tanggal" class="col-sm-2 col-form-label">Dari Tanggal</label>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="dari" class="form-control"  id="awal_masuk" value="" placeholder="Tanggal" required>
                                    </div>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="dari_tanggal" class="col-sm-2 col-form-label">Sampai Tanggal</label>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="sampai" class="form-control" id="sampai_masuk" value="" placeholder="Tanggal" required>
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
                    <h3 class="box-title">Cetak Semua Laporan Barang Masuk</h3>
                </div>
                <div class="box-body">
                    <form action="<?= base_url(); ?>Barang_masuk/cetak" method="POST" target="_blank">
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
