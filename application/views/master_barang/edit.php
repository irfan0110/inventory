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
                            <h3 class="box-title">Form Edit Barang</h3>
                        </div>
                        <div class="box-body">
                            <form action="" method="POST">
                            <input type="hidden" name="id" value="<?= $barang['id']; ?>">
                                <div class="form-group">
                                    <label for="kode_barang">Kode Barang</label>
                                    <input type="text" name="kode_barang" class="form-control" id="kode_barang" value="<?= $barang['kode_barang']; ?>" disabled>
                                    <small class="form-text text-danger"><?= form_error('kode_barang');?></small>
                                </div>
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" name="nama_barang" class="form-control" id="nama_barang" value="<?= $barang['nama_barang']; ?>">
                                    <small class="form-text text-danger"><?= form_error('nama_barang');?></small>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_barang">Jenis Barang</label>
                                    <select name="jenis_barang" id="jenis_barang" class="form-control">
                                    <?php foreach($jenis_barang as $jenis) : ?>
                                        <?php if($jenis == $barang['jenis_barang']) : ?>
                                            <option value="<?= $jenis ?>" selected><?= $jenis ?></option>
                                        <?php else : ?>
                                        <option value="<?= $jenis ?>"><?= $jenis ?></option>
                                        <?php endif; ?>
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
