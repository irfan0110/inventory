<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
            <img src="<?= base_url(); ?>gambar/<?= $this->session->userdata('avatar'); ?>"  class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $this->session->userdata('name'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active"><a href="<?= base_url(); ?>Home"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <?php if($this->session->userdata('roles') == 'ADMIN') : ?>
        <li><a href="<?php echo base_url(); ?>User"><i class="fa fa-user-circle"></i> <span>DATA USER</span></a></li>
        <?php endif; ?>
        <li><a href="<?= base_url(); ?>Supplier"><i class="fa fa-address-card"></i> <span>DATA SUPPLIER</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i> <span>TRANSAKSI</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?= base_url(); ?>Master_barang"><i class="fa fa-circle-o"></i> Data Barang</a></li>
            <li><a href="<?= base_url(); ?>Barang_masuk"><i class="fa fa-circle-o"></i> Barang Masuk</a></li>
            <li><a href="<?= base_url(); ?>Mapping"><i class="fa fa-circle-o"></i> Mapping</a></li>
            <li><a href="<?= base_url() ?>Barang_keluar"><i class="fa fa-circle-o"></i> Barang Keluar</a></li>
            <li><a href="<?= base_url(); ?>Stock_barang"><i class="fa fa-circle-o"></i> Stock barang</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i> <span>LAPORAN</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url(); ?>Barang_masuk/laporan"><i class="fa fa-circle-o"></i> Barang Masuk</a></li>
            <li><a href="<?= base_url() ?>Barang_keluar/laporan"><i class="fa fa-circle-o"></i> Barang Keluar</a></li>
            <li><a href="<?= base_url(); ?>Stock_barang/laporan"><i class="fa fa-circle-o"></i> Stock barang</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>