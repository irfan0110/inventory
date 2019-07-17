<!DOCTYPE html>
<html>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
        Halaman Supplier
        <small>Control panel</small>
        </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-7">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Form Edit Supplier</h3>
                        </div>
                        <div class="box-body">
                            <form action="" method="POST">
                                <input type="hidden" name="id" value="<?= $suppliers['id']; ?>">
                                <div class="form-group">
                                    <label for="name">Kode Supplier</label>
                                    <input type="text" name="kode_supplier" class="form-control" id="kode_supplier" value="<?= $suppliers['kode_suppliers']; ?>" disabled>
                                    <!-- <small class="form-text text-danger"><?= form_error('kode_supplier');?></small> -->
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama Supplier</label>
                                    <input type="text" name="nama_supplier" class="form-control" id="nama_supplier" value="<?= $suppliers['nama_suppliers']; ?>">
                                    <small class="form-text text-danger"><?= form_error('nama_supplier');?></small>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" cols="30" rows="8" class="form-control"><?= $suppliers['alamat']; ?></textarea>
                                    <small class="form-text text-danger"><?= form_error('alamat');?></small>
                                </div>
                                <div class="form-group">
                                    <label for="Telephone">Telephone</label>
                                    <input type="number" name="no_tlp" class="form-control" id="no_tlp" value="<?= $suppliers['no_tlp']; ?>">
                                    <small class="form-text text-danger"><?= form_error('no_tlp');?></small>
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
