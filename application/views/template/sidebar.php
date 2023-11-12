  <div id="app">
      <div class="main-wrapper main-wrapper-1">
          <div class="navbar-bg"></div>
          <nav class="navbar navbar-expand-lg main-navbar">
              <form class="form-inline mr-auto">
                  <ul class="navbar-nav mr-3">
                      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                  </ul>
                  <h6 class="text-left text-white mt-3">Absen Online</h6>
              </form>
              <ul class="navbar-nav navbar-right">
                  <a href="<?= base_url('profiles-user') ?>" class="nav-link nav-link-lg">
                        <img alt="image" src="<?= base_url('./assets/profile/') . $this->session->userdata('profile'); ?>" class="foto">
                        <div class="d-sm-none d-lg-inline-block">Hi, <?= $this->session->userdata('nama'); ?></div>
                    </a>
              </ul>
          </nav>
          <div class="main-sidebar sidebar-style-2">
              <aside id="sidebar-wrapper">
                  <div class="sidebar-brand">
                      
                      <a href="<?= base_url('dashboard') ?>"><img src="<?= base_url(); ?>./assets/img/absensi abc.png" alt="logo" width="180"></a>
                  </div>
                  <ul class="sidebar-menu">
                      <li class="menu-header">Dashboard</li>
                      <li class=" <?= $this->uri->segment('1') == 'dashboard' ? 'active' : '' ?>"><a href="<?= base_url('dashboard'); ?>" class="nav-link"><i class="fas fa-tachometer-alt"></i>

                  
                  <?php if ($this->session->userdata('role_id') == 1) { ?>
                          <span>Dashboard</span></a></li>
                      <?php } else if ($this->session->userdata('role_id') == 2) { ?>
                          <span>Absensi</span></a></li>
                      <?php } ?>


                        <li class="<?= $this->uri->segment('1') == 'riwayat' || $this->uri->segment('1') == 'riwayat-' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('riwayat') ?>"><i class="fas fa-history"></i>
                        <span>Riwayat Absen</span></a></li>
                          <li class="<?= $this->uri->segment('1') == 'izin' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('izin') ?>"><i class="fas fa-envelope">
                          </i> <span>Izin & Cuti</span></a></li>


                          <?php if ($this->session->userdata('role_id') == 1) { ?>
                          <li class="<?= $this->uri->segment('1') == 'rekap' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('rekap') ?>"><i class="fas fa-book">
                          </i> <span>Rekap</span></a></li>

                      <ul class="sidebar-menu">
                          <li class="menu-header">Data</li>
                          <li class="<?= $this->uri->segment('1') == 'dapur' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('dapur') ?>"><i class="fas fa-building"></i>
                          <span>Data Dapur</span></a></li>
                          <li class="<?= $this->uri->segment('1') == 'data-user' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('data-user') ?>"><i class="fas fa-users">
                          </i> <span>Data User</span></a></li>
                      </ul>
                      <?php } ?>


                      <li class="menu-header">Akun</li>
                          <li class="<?= $this->uri->segment('1') == 'profiles-user' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('profiles-user') ?>"><i class="fas fa-user">
                          </i> <span>Profile</span></a></li>
                          <li class="<?= $this->uri->segment('1') == 'logout' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('logout') ?>"><i class="fas fa-sign-out-alt">
                          </i> <span>Logout</span></a></li>
                          <br>
                          <li class="menu-header"><center>version 1.0.0</center></li>
                  </ul>
              </aside>
          </div>