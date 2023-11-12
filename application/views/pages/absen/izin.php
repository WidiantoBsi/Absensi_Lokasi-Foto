      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Izin & Cuti</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="<?= base_url('izin') ?>">Izin & Cuti</a></div>
                  </div>
              </div>
          </section>

          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                          <?php if ($this->session->userdata('role_id') == 2) { ?>
                          <button class="btn btn-success btn-sm mb-2" data-toggle="modal" data-target="#tambahData"><i class="fas fa-plus-circle"></i> Ajukan Izin</button>
                          <?php } ?>
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
                                          <th>Jenis</th>
                                          <th>Keterangan</th>
                                          <th>Bukti</th>
                                          <th>Tanggal Izin</th>
                                          <th>Status Izin</th>
                                          <th>Tanggal input</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $n = 1;
                                        foreach ($izin as $data) { ?>
                                          <tr>
                                                <td><?= $n; ?></td>
                                                <td><?= $data->nama ?></td>
                                                <td><?= $data->nama_dapur ?></td>
                                                <td><?= $data->jenis ?></td>
                                                <td><?= $data->keterangan ?></td>
                                                <td>
                                                <a href="#" data-toggle="modal" data-target="#zoom<?= $data->id_izin ?>">
                                                    <img src="<?= base_url('./assets/img/foto/') . $data->bukti ?>" alt="foto-bukti" class="fotokotak" style="cursor:zoom-in">
                                                </a>
                                                </td>
                                                <td><?= $data->tgl_awal ?> s/d <?= $data->tgl_akhir ?></td>
                                                <td>
                                                <?php if ($data->status_izin == 'Pending') { ?>
                                                    <span class="badge badge-warning">Pending</span><br><br>
                          <?php if ($this->session->userdata('role_id') == 1) { ?>
                                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#status<?= $data->id_izin ?>"><i class="fas fa-edit"></i></button>
                                                    <?php } ?>
                                                <?php } else if ($data->status_izin == 'Disetujui') { ?>
                                                    <span class="badge badge-success">Disetujui</span>
                                                <?php } else if ($data->status_izin == 'Ditolak') { ?>
                                                    <span class="badge badge-danger">Ditolak</span>
                                                <?php } ?>
                                                </td>
                                                <td><?= $data->tgl ?></td>
                                                
                                                <!-- Modal Zoom -->
                                              <div class="modal fade" id="zoom<?= $data->id_izin ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog modal-dialog-centered">
                                                      <div class="modal-content">
                                                          <div class="modal-header bg-primary">
                                                              <h5 class="modal-title text-white" id="exampleModalLabel">Foto Bukti</h5>
                                                          </div>
                                                          <div class="modal-body">
                                                            <img src="<?= base_url('./assets/img/foto/') . $data->bukti ?>" alt="foto-absen" class="fotozoom">
                                                          </div>
                                                          <div class="modal-footer">
                                                              <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>

                                              <!-- Modal Edit Status -->
                                              <div class="modal fade" id="status<?= $data->id_izin ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog modal-dialog-centered">
                                                      <div class="modal-content">
                                                          <div class="modal-header bg-primary">
                                                              <h5 class="modal-title text-white" id="exampleModalLabel">Ubah Status Izin</h5>
                                                          </div>
                                                          <div class="modal-body">
                                                              <form action="<?= base_url('status-edit/') . $data->id_izin ?>" method="POST" enctype="multipart/form-data">
                                                                  <div class="form-group">
                                                                      <label for="">Pilih Status Izin</label>
                                                                        <select name="statusbaru" id="" class="form-control" required>
                                                                            <option value="" disabled selected>-- PILIH STATUS --</option>
                                                                            <option value="Pending" <?= $data->status_izin == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                                                            <option value="Disetujui" <?= $data->status_izin == 'Disetujui' ? 'selected' : '' ?>>Disetujui</option>
                                                                            <option value="Ditolak" <?= $data->status_izin == 'Ditolak' ? 'selected' : '' ?>>Ditolak</option>
                                                                        </select>
                                                                        <input type="hidden" name="id_user" class="form-control" value="<?= $data->id_user ?>">
                                                                        <input type="hidden" name="bukti" class="form-control" value="<?= $data->bukti ?>">
                                                                        <input type="hidden" name="awal" class="form-control" value="<?= $data->tgl_awal ?>">
                                                                        <input type="hidden" name="akhir" class="form-control" value="<?= $data->tgl_akhir ?>">
                                                                        <br>
                                                                        <label>*Jika sudah disetujui atau ditolak status tidak akan bisa diubah kembali.</label>
                                                                  </div>
                                                                  <div class="form-group">
                                                                      <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                                                                  </div>
                                                              </form>
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

      <!-- Modal Tambah -->
      <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-md">
              <div class="modal-content modal-content-centered">
                  <div class="modal-header bg-success text-white">
                      <h5 class="modal-title" id="exampleModalLabel">Ajukan Izin</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-md-12">
                              <form action="<?= base_url('tambah-izin') ?>" method="POST" enctype="multipart/form-data">
                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <label for="">Jenis</label>
                                                <select name="jenis" id="" class="form-control" required>
                                                    <option value="" disabled selected>-- PILIH STATUS --</option>
                                                    <option value="Izin">Izin</option>
                                                    <option value="Sakit">Sakit</option>
                                                    <option value="Cuti">Cuti</option>
                                                </select>
                                          </div>
                                          <div class="form-group">
                                              <label for="">Keterangan</label>
                                              <textarea id="keterangan" name="keterangan" rows="4" cols="50" required></textarea>
                                          </div>
                                          <div class="form-group">
                                              <label for="">Foto Bukti</label>
                                              <input type="file" name="bukti" class="form-control" required>
                                          </div>
                                          <div class="form-group">
                                              <label for="">Tanggal Awal</label>
                                              <input type="date" name="tgl-awal" class="form-control" required>
                                          
                                              <label for="">Tanggal Akhir</label>
                                              <input type="date" name="tgl-akhir" class="form-control" required>
                                          </div>
                                              <input type="hidden" name="status" class="form-control" value="Pending">
                                            <div class="form-group">
                                                <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                                            </div>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
      <script>
        config = {
            mode: "range",
            minDate: "today",
            dateFormat: "Y-m-d"
        }

        flatpickr("input[type=datetime-local]", config)
      </script>