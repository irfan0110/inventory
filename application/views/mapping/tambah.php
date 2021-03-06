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
            <div class="row">
                <div class="col-md-7">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Form Mapping</h3>
                        </div>
                        <div class="box-body">
                            <form action="" method="POST">
                            <input type="hidden" name="id" value="<?= $barang['id']; ?>">
                                <div class="form-group">
                                    <label for="pallet_id">Pallet ID</label>
                                    <input type="text" name="pallet_id" class="form-control" id="pallet_id" value="<?= $palletId;?>" readonly>
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
                                    <label for="qty">Quantity</label>
                                    <input type="number" name="qty" class="form-control" id="qty">
                                    <small class="form-text text-danger"><?= form_error('qty');?></small>
                                </div>
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <select name="lokasi" id="lokasi" class="form-control" style="width: 100%;">
                                        <?php foreach($lokasi as $lok ) : ?>
                                            <option value="<?= $lok['lokasi'] ?>"><?= $lok['lokasi']?></option>
                                        <?php endforeach; ?>
                                    <small class="form-text text-danger"><?= form_error('lokasi');?></small>
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
