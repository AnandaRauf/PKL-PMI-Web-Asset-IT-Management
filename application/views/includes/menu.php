<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top custom-navbar" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand custom-color-brand" href="<?php echo base_url('dashboard'); ?>"><strong>Palang Merah Indonesia</strong></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle custom-fullname" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>
                        <?php echo  $this->session->userdata['full_name']; ?>
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo base_url('login/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar custom-sideleft-bar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                         <li>
                             <a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-home fa-fw"></i> Halaman Utama</a>
                    
                         </li>
                        <li>
                            <a href="#"><i class="fa fa-folder fa-fw"></i> Data<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li> 
                                    <a href="<?php echo base_url('karyawan'); ?>"><i class="fa fa-users fa-fw"></i> Karyawan</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('scan'); ?>"><i class="fa fa-qrcode fa-fw"></i> Scan QR Code</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('barang'); ?>"><i class="fa fa-desktop fa-fw"></i> Barang</a>  
                                </li>
                                <li>
                                    <a href="<?php echo base_url('jenis'); ?>"><i class="fa fa-list fa-fw"></i> Jenis Barang</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('users'); ?>"><i class="glyphicon glyphicon-user"></i> Pengguna</a>
                                </li>
                              
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                       
                        <li>
                            <a href="#"><i class="fa fa-align-justify     fa-fw"></i> Transaksi<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li> 
                                    <a href="<?php echo base_url('peminjaman'); ?>"><i class="fa fa-share-square fa-fw"></i> Peminjaman</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('pengembalian'); ?>"><i class="fa fa-check-square fa-fw"></i> Pengembalian</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-file-text     fa-fw"></i> Laporan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <!-- <li> 
                                    <a href="<php echo base_url('laporan/karyawan'); ?>"><i class="fa fa-users fa-fw"></i> Data Karyawan</a>
                                </li>
                                <li>
                                    <a href="<php echo base_url('laporan/barang'); ?>"><i class="fa fa-desktop fa-fw"></i> Data Barang</a>
                                </li> -->
                                <li> 
                                    <a href="<?php echo base_url('laporan/peminjaman'); ?>"><i class="fa fa-share-square fa-fw"></i> Data Peminjaman</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('laporan/pengembalian'); ?>"><i class="fa fa-check-square fa-fw"></i> Data Pengembalian</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="<?php echo base_url('login/logout') ?>"><i class="fa fa-power-off fa-fw"></i> Logout</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>