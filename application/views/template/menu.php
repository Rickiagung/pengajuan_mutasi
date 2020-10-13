<div class="horizontal-menu">
  <nav class="navbar top-navbar col-lg-12 col-12 p-0">
    <div class="container">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo text-white" href="<?= base_url('') ?>"><strong><img class="mb-2" src="<?= base_url('assets/img/logoprovjateng.png') ?>" alt=""> APLIKASI PENGAJUAN  MUTASI PEGAWAI</strong></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav navbar-nav-right">

        <?php $link = $this->uri->segment(1,0); ?>
          <li class="nav-item nav-profile dropdown mr-0 mr-sm-3">
            <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="<?= base_url('assets/img/'.$this->session->userdata('gambar')); ?>" />
              <span class="nav-profile-name mr-2"><?= $this->session->userdata('nama') ?></span>  
              <i class="fas fa-sort-down mb-2"></i>            
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="<?= base_url($link.'/user') ?>">
                <i class="fas fa-fw fa-cog text-primary"></i>
                Profil
              </a>
              <a class="dropdown-item" href="<?= base_url($link.'/user/ubahpassword') ?>">
                <i class="fas fa-fw fa-key text-primary"></i>
                Ubah Password
              </a>
              <a class="dropdown-item" href="<?= base_url() ?>auth/logout">
                <i class="fas fa-sign-out-alt text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </div>
  </nav>
  <nav class="bottom-navbar">
    <div class="container">
      <ul class="nav page-navigation">

        <?php if($link == "admin") { ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('admin/home'); ?>">
            <i class="fas fa-tachometer-alt menu-icon"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        <!--<li class="nav-item">
          <a class="nav-link" href="<?= base_url('admin/cekdata'); ?>">
            <i class="fas fa-users menu-icon"></i>
            <span class="menu-title">Cek Data</span>
          </a>
        </li>
        -->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('admin/pegawai'); ?>">
            <i class="fas fa-users menu-icon"></i>
            <span class="menu-title">Data Pegawai</span>
          </a>
        </li>
        <!--<li class="nav-item">
          <a class="nav-link" href="<?= base_url('admin/jabatan'); ?>">
            <i class="fas fa-users menu-icon"></i>
            <span class="menu-title">Data Jabatan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('admin/pensiun'); ?>">
            <i class="fas fa-list-ul menu-icon"></i>
            <span class="menu-title">Data Pensiun</span>
          </a>
        </li>
        -->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('admin/mutasi'); ?>">
            <i class="fas fa-list-ul menu-icon"></i>
            <span class="menu-title">Data Mutasi</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('admin/pengguna'); ?>">
            <i class="fas fa-users menu-icon"></i>
            <span class="menu-title">Data Pengguna</span>
          </a>
        </li>

        <?php } elseif($link == "pegawai") { ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('pegawai/home'); ?>">
            <i class="fas fa-tachometer-alt menu-icon"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('pegawai/pengajuan'); ?>">
            <i class="fas fa-list-ul menu-icon"></i>
            <span class="menu-title">Pengajuan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('pegawai/Statusmutasi'); ?>">
            <i class="fas fa-list-ul menu-icon"></i>
            <span class="menu-title">Status Pengajuan Mutasi</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('pegawai/user'); ?>">
            <i class="fas fa-user  menu-icon"></i>
            <span class="menu-title">Profil</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('pegawai/user/ubahpassword'); ?>">
            <i class="fas fa-key  menu-icon"></i>
            <span class="menu-title">Ubah Password</span>
          </a>
        </li>

        <?php } elseif($link == "pimpinan") { ?>

        <li class="nav-item">
        <a class="nav-link" href="<?= base_url('pimpinan/home'); ?>">
          <i class="fas fa-tachometer-alt menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('pimpinan/pegawai'); ?>">
          <i class="fas fa-users menu-icon"></i>
          <span class="menu-title">Data pegawai</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('pimpinan/pensiun'); ?>">
          <i class="fas fa-list-ul menu-icon"></i>
          <span class="menu-title">Data Pensiun</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('pimpinan/mutasi'); ?>">
          <i class="fas fa-list-ul menu-icon"></i>
          <span class="menu-title">Data Mutasi</span>
        </a>
      </li>
        <?php }; ?>
      </ul>
    </div>
  </nav>
</div>