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
            <div class="row">
                <div class="col-md-7">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Form Tambah Barang</h3>
                        </div>
                        <div class="box-body">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="kode_barang">Kode Barang</label>
                                    <input type="text" name="kode_barang" class="form-control" id="kode_barang">
                                    <small class="form-text text-danger"><?= form_error('kode_barang');?></small>
                                </div>
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" name="nama_barang" class="form-control" id="nama_barang">
                                    <small class="form-text text-danger"><?= form_error('nama_barang');?></small>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_barang">Jenis Barang</label>
                                    <select name="jenis_barang" id="jenis_barang" class="form-control select2" style="width: 100%;">
                                    <?php foreach($jenis_barang as $jenis) : ?>
                                        <option value="<?= $jenis ?>"><?= $jenis ?></option>
                                    <?php endforeach; ?>
                                    <small class="form-text text-danger"><?= form_error('jenis_barang');?></small>
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
