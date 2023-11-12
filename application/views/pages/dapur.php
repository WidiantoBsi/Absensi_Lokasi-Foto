      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Data Dapur</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
                      <div class="breadcrumb-item">Dapur</div>
                  </div>
              </div>
          </section>
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                          <button class="btn btn-success btn-sm mb-2" data-toggle="modal" data-target="#tambahdapur"><i class="fas fa-plus-circel"></i>Tambah Data</button>
                          <div class="flashdata" id="flashdata" onload="clearmy()">
                              <?= $this->session->flashdata('message'); ?>
                          </div>
                          <small class="text-danger">
                              <?= form_error('id_dapur'); ?>
                              <?= form_error('nama_dapur'); ?>
                              <?= form_error('alamat_dapur'); ?>
                              <?= form_error('is_active'); ?>
                          </small>
                          <div class="table-responsive">
                              <table id="table" class="table table-bordered text-center" style="width:100%">
                                  <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Nama Dapur</th>
                                          <th>Alamat Dapur</th>
                                          <th>Status</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $n = 1;
                                        foreach ($dapur as $dataP) { ?>
                                          <tr>
                                              <td><?= $n; ?></td>




                                              <!-- Modal Hapus -->
                                              <div class="modal fade" id="hapus<?= $dataP->id_dapur ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                      <div class="modal-content">
                                                          <div class="modal-header bg-danger">
                                                              <h5 class="modal-title text-white" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                          </div>
                                                          <div class="modal-body">
                                                              <div class="alert alert-warning text-center" role="alert">

                                                                  <p><b>Apakah anda yakin ingin menghapus data ini ?</b></p>
                                                                  <p class="text-dark"><b><?= $dataP->nama_dapur ?></b></p>

                                                              </div>
                                                          </div>
                                                          <div class="modal-footer">
                                                              <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
                                                              <a href="<?= base_url('hapus-dapur/') . $dataP->id_dapur ?>" type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Hapus Data</a>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>





                                              <!-- Modal -->
                                              <div class="modal fade" id="edit<?= $dataP->id_dapur ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog modal-md">
                                                      <div class="modal-content">
                                                          <div class="modal-header bg-success">
                                                              <h5 class="modal-title text-white" id="exampleModalLabel">Edit Data Dapur</h5>
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                              </button>
                                                          </div>
                                                          <div class="modal-body">
                                                              <div class="row">
                                                                  <div class="col-lg-12">
                                                                      <form action="<?= base_url('edit-dapur/') . $dataP->id_dapur ?>" method="post" enctype="multipart/form-data">
                                                                          <div class="row">
                                                                              <div class="col-lg-12">
                                                                                  <div class="form-group">
                                                                                      <label for="">Nama Dapur</label>
                                                                                      <input type="text" name="nama_dapur" value="<?= $dataP->nama_dapur ?>" id="" class="form-control" required>
                                                                                  </div>
                                                                                  <div class="form-group">
                                                                                      <label for="">Alamat Dapur</label>
                                                                                      <textarea name="alamat_dapur" id="" cols="30" rows="10" class="form-control" required><?= $dataP->alamat_dapur ?></textarea>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                          <div class="form-group">
                                                                              <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                                                                          </div>
                                                                      </form>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>




                                              <td><?= $dataP->nama_dapur ?></td>
                                              <td><?= $dataP->alamat_dapur ?></td>
                                              <td>
                                                  <div class="btn-group">
                                                      <form action="<?= base_url('active/') . $dataP->id_dapur . '?aktif=' . 1 ?>" method="post" enctype="multipart/form-data">
                                                          <button class="btn btn-<?= $dataP->is_active_dapur == 1 ? 'success' : 'light' ?> btn-sm mt-2">Aktif</button>
                                                      </form>
                                                      <form action="<?= base_url('active/') . $dataP->id_dapur . '?aktif=' . 0  ?>" method="post" enctype="multipart/form-data">
                                                          <button class="btn btn-<?= $dataP->is_active_dapur == 0 ? 'danger' : 'light' ?> btn-sm mt-2">Tidak Aktif</button>
                                                      </form>
                                                  </div>
                                              </td>
                                              <td>
                                                  <div class="btn-group">
                                                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $dataP->id_dapur ?>"><i class="fas fa-trash-alt"></i></button>
                                                      <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $dataP->id_dapur ?>"><i class="fas fa-edit"></i></button>
                                                  </div>
                                              </td>
                                          </tr>
                                      <?php $n++;
                                        } ?>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>



          <!-- Modal -->
          <div class="modal fade" id="tambahdapur" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-md">
                  <div class="modal-content">
                      <div class="modal-header bg-success">
                          <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Data Dapur</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <div class="row">
                              <div class="col-lg-12">
                                  <form action="<?= base_url('tambah-dapur') ?>" method="post" enctype="multipart/form-data">
                                      <div class="row">
                                          <div class="col-lg-12">
                                              <div class="form-group">
                                                  <label for="">Nama Dapur</label>
                                                  <input type="text" name="nama_dapur" id="" class="form-control" required>
                                              </div>
                                              <div class="form-group">
                                                  <label for="">Alamat Dapur</label>
                                                  <textarea name="alamat_dapur" id="" cols="30" rows="10" class="form-control" required></textarea>
                                              </div>
                                              <div class="form-group">
                                                  <label for="a">Status Aktif</label>
                                                  <select name="is_active_dapur" id="a" class="form-control" required>
                                                      <option value="" selected disabled>-- PILIH STATUS AKTIF --</option>
                                                      <option value="1">Aktif</option>
                                                      <option value="0">Tidak Aktif</option>
                                                  </select>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>



      </div>