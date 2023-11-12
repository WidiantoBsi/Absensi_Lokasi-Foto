      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Riwayat Absen</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="<?= base_url('riwayat') ?>">Riwayat Absen</a></div>
                  </div>
              </div>
          </section>

          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                      <div class="col-lg-4">
                      <div class="form-group">
                            <form action="<?= base_url('riwayat') ?>" method="post" enctype="multipart/form-data">
                                <label for="tgl">Tanggal</label>
                                <input name="tanggal" id="tgl" value="<?= $tgl ?>" class="form-control" type="date"> 
                                <button class="btn btn-primary btn-sm" type="submit"><i class="fas fa-search"></i></button>
                            </form>
                            </div>
                      </div>
                          <div class="flashdata" id="flashdata" onload="clearmy()">
                              <?= $this->session->flashdata('message'); ?>
                          </div>
                          <div class="table-responsive">
                              <table id="table" class="table table-bordered text-center" style="width:100%">
                                  <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Nama Karyawan</th>
                                          <th>Dapur</th>
                                          <th>Foto</th>
                                          <th>Lokasi</th>
                                          <th>Jam</th>
                                          <th>Tanggal</th>
                                          <th>Status</th>
                          <?php if ($this->session->userdata('role_id') == 1) { ?>
                                          <th>Aksi</th>
                                          <?php } ?>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $n = 1;
                                        foreach ($riwayat as $data) { ?>
                                          <tr>
                                                <td><?= $n; ?></td>
                                                <td><?= $data->nama ?></td>
                                                <td><?= $data->nama_dapur ?></td>
                                                <td>
                                                <a href="#" data-toggle="modal" data-target="#zoom<?= $data->id_absen ?>">
                                                    <img src="<?= base_url('./assets/img/foto/') . $data->foto ?>" alt="foto-absen" class="fotokotak" style="cursor:zoom-in">
                                                </a>
                                                </td>
                                                <td>Lat : <?= $data->lat ?><br>Long : <?= $data->lon ?><br><a href="<?= $data->map ?>" target="_blank">Buka Maps<a></td>
                                                <td><?= $data->jam ?></td>
                                                <td><?= $data->tgl ?></td>
                                                <td>
                                                <?php if ($data->status == '1') { ?>
                                                    <span class="badge badge-success">Hadir</span><br><br>
                                                <?php } else if ($data->status == '2') { ?>
                                                    <span class="badge badge-warning">Izin</span>
                                                <?php } ?>
                                                </td>
                          <?php if ($this->session->userdata('role_id') == 1) { ?>
                                                <td>
                                                    <div class="btn-group">
                                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $data->id_absen ?>"><i class="fas fa-trash-alt"></i> Tidak Sah</button>
                                                    </div>
                                                </td>
                                                <?php } ?>

                                                <!-- Modal Hapus -->
                                              <div class="modal fade" id="hapus<?= $data->id_absen ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                      <div class="modal-content">
                                                          <div class="modal-header bg-danger">
                                                              <h5 class="modal-title text-white" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                          </div>
                                                          <div class="modal-body">
                                                              <div class="alert alert-warning text-center" role="alert">

                                                                  <p><b>Apakah anda yakin ingin menghapus data ini ?</b></p>
                                                                  <p class="text-dark"><b><?= $data->nama ?> : <?= $data->tgl ?></b></p>

                                                              </div>
                                                          </div>
                                                          <div class="modal-footer">
                                                              <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
                                                              <a href="<?= base_url('hapus-absen/') . $data->id_absen ?>" type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Hapus Data</a>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                                
                                                <!-- Modal Zoom -->
                                              <div class="modal fade" id="zoom<?= $data->id_absen ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog modal-dialog-centered">
                                                      <div class="modal-content">
                                                          <div class="modal-header bg-primary">
                                                              <h5 class="modal-title text-white" id="exampleModalLabel">Foto Absen</h5>
                                                          </div>
                                                          <div class="modal-body">
                                                            <img src="<?= base_url('./assets/img/foto/') . $data->foto ?>" alt="foto-absen" class="fotozoom">
                                                          </div>
                                                          <div class="modal-footer">
                                                              <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>

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

        </div>
      </div>