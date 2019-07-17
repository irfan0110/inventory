<!DOCTYPE html>
<html>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h2 align="center">Stock Barang</h2>
              <h3 align="center"><?= $stock['stock']; ?></h3>

              <p align="center">Total Stock</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?= base_url() ?>Stock_barang" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h2 align="center">Barang Masuk</h2>
              <h3 align="center"><?= $barang_masuk['stock']; ?></h3>

              <p align="center">Total Barang Masuk</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?= base_url() ?>Barang_masuk" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        </div>
        <div class="row">
        <!-- ./col -->
        <div class="col-lg-1"></div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h2 align="center">Barang Keluar</h2>
              <h3 align="center"><?= $barang_keluar['stock']; ?></h3>

              <p align="center">Total Barang Keluar</p>
            </div>
            <div class="icon">
              <i class="ion ion-cube"></i>
            </div>
            <a href="<?= base_url() ?>Barang_keluar" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h2 align="center">Mapping</h2>
              <h3 align="center"><?= $mapping['stock']; ?></h3>

              <p align="center">Total Mapping</p>
            </div>
            <div class="icon">
              <i class="ion ion-clipboard"></i>
            </div>
            <a href="<?= base_url() ?>Mapping" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h2 align="center">Difference</h2>
              <h3 align="center"><?= $mapping['stock'] - $stock['stock']; ?></h3>
              <?php 
                $cek = $mapping['stock'] - $stock['stock'];
              ?>
              <p align="center">Mapping 
              <?php 
                if($cek > 0 ) {
                  echo ">";
                } else if($cek < 0 ){
                  echo "<";
                }else {
                  echo "=";
                }
              ?>
              stock Barang
              </p>
            </div>
            <div class="icon">
              <i class="ion ion-checkmark"></i>
            </div>
            
            <?php if($cek == 0) : ?>
              <a href="<?= base_url(); ?>Stock_barang" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            <?php elseif($cek < 0 or $cek > 0) : ?>
              <a href="<?= base_url(); ?>Mapping" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            <!-- <?php else : ?>
              <a href="<?= base_url(); ?>Stock_barang" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
            <?php endif; ?>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</body>
</html>
