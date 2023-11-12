      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Profiles</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
                      <div class="breadcrumb-item"><a href="<?= base_url('profiles-user') ?>">Profiles</a></div>
                      <div class="breadcrumb-item">Data</div>
                  </div>
              </div>

              <div class="section-body">
                  <h2 class="section-title">Hi, <?= $this->session->userdata('nama'); ?></h2>
              </div>
          </section>

          <div class="row">
              <div class="col-lg-12">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="card">
                              <div id="flashdata" onload="clearmy()">
                                  <?= $this->session->flashdata('message'); ?>
                              </div>
                              <div class="card-body">
                                  <div class="row">
                                      <div class="col-6">
                                          <div class="text-center">
                                              <div class="btn-group">
                                                  <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#ubahfoto"><i class="fas fa-image"></i> Ubah Foto</button>
                                              </div>
                                              <br>
                                              <br>
                                              <img src="<?= base_url('./assets/profile/') . $this->session->userdata('profile'); ?>" class="fotop">
                                          </div>
                                      </div>
                                      <div class="col-6">
                                          <div class="mx-auto">

                                              <div class="modal fade" id="ubahpassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                      <div class="modal-content">
                                                          <div class="modal-header bg-danger">
                                                              <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                              </button>
                                                          </div>
                                                          <div class="modal-body">
                                                              <form action="<?= base_url('password-edit-user/') . $this->session->userdata('id_user') ?>" method="POST" enctype="multipart/form-data">
                                                                  <div class="form-group">
                                                                      <label for="">Password Baru</label>
                                                                      <input type="password" name="password" class="form-control" required>
                                                                  </div>
                                                                  <div class="form-group">
                                                                      <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                                                                  </div>
                                                              </form>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>



                                              <div class="modal fade" id="ubahfoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                      <div class="modal-content">
                                                          <div class="modal-header bg-warning">
                                                              <h5 class="modal-title" id="exampleModalLabel">Foto Profile</h5>
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                              </button>
                                                          </div>
                                                          <div class="modal-body">
                                                              <form action="<?= base_url('foto-edit-user/') . $this->session->userdata('id_user') ?>" method="POST" enctype="multipart/form-data">
                                                                  <div class="form-group">
                                                                      <label for="">Foto Baru</label>
                                                                      <input type="file" name="profile" class="form-control" required>
                                                                  </div>
                                                                  <div class="form-group">
                                                                      <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                                                                  </div>
                                                              </form>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>



                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div class="card">
                              <div class="card-body">
                                  <h5><b>Profile Anda</b></h5>
                                  <div class="col-12">
                                      <ul>
                                          <?php foreach ($us as $d) { ?>
                                              <li>Nama : <?= $d->nama ?></li>
                                              <li>No Hp : <?= $d->no_hp ?></li>
                                              <li>Alamat : <?= $d->alamat ?></li>
                                          <?php } ?>
                                      </ul>
                                      
                                      <div class="btn-group">
                                                  <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubahpassword"><i class="fas fa-key"></i> Ubah Password</button>
                                              </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

      </div>