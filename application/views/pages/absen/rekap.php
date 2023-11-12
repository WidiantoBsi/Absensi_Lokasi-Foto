      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Rekap Absen</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="<?= base_url('rekap') ?>">Rekap Absen</a></div>
                  </div>
              </div>
          </section>

          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                        <div class="col-md-6">
                            <form action="<?= base_url('rekap') ?>" method="post">
                                <div class="form-group col-md-6">
                                    <h6>Bulan</h6>
                                    <input class="form-control" required type="month" name="bulan" value="<?= $bulan ?>">
                                    <button type="submit" class="btn btn-block btn-warning"><i class="far fa-eye"></i> Lihat Rekap</button>
                                    <br>
                                </div>
                            </form>
                            </div>
                            <form action="<?= base_url('print-rekap') ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="bulan" value="<?= $bulan ?>">
                            <button class="btn btn-success btn-sm" type="submit"><i class="fas fa-download"></i> Download Rekap</button>
                            </form>
                          <div class="flashdata" id="flashdata" onload="clearmy()">
                              <?= $this->session->flashdata('message'); ?>
                          </div>
                          <div class="table-responsive">
                              <table id="table" class="table table-bordered text-center" style="width:100%">
                                  <thead>
                                      <tr>
                                          <th rowspan="2">No</th>
                                          <th rowspan="2">Nama Karyawan</th>
                                          <th rowspan="2">Dapur</th>
                                          <th colspan="31">Tanggal</th>
                                          <th colspan="2">Total</th>
                                      </tr>
                                        <tr>
                                        <?php
                                        for ($x = 1; $x <= 31; $x++) {
                                        ?><th><?php echo $x; ?></th><?php
                                        }
                                        ?>
                                        <th>Hadir</th>
                                        <th>Izin</th>
                                        </tr>
                                  </thead>
                                  <tbody>
                                      <?php $n = 1;
                                        foreach ($nama as $data) { ?>
                                          <tr>
                                                <td><?= $n; ?></td>
                                                <td><?= $data->nama ?></td>
                                                <td><?= $data->nama_dapur ?></td>

                                                <!-- Kehadiran -->
                                                <?php for ($x = 1; $x <= 31; $x++) {
                                                    $this->db->select('status');
                                                    $this->db->from('absen');
                                                    $this->db->where('id_user', $data->id_user);
                                                    if ($x <= 9) {
                                                        $this->db->where('DATE_FORMAT(tgl,"%Y-%m-%d") = "'.$bulan.'-0'.$x.'"');
                                                    } else {
                                                        $this->db->where('DATE_FORMAT(tgl,"%Y-%m-%d") = "'.$bulan.'-'.$x.'"');
                                                    }
                                                    $hasil = $this->db->get()->result();
                                                    if (!$hasil) {
                                                        ?><td><?php echo "-"; ?></td><?php
                                                    } else {
                                                        foreach ($hasil as $a) {
                                                            if ($a->status == 1) {
                                                                ?><td><?php echo "H"; ?></td><?php
                                                            } else if ($a->status == 2) {
                                                                ?><td><?php echo "I"; ?></td><?php
                                                            }
                                                        }
                                                    }
                                                    
                                                }
                                                ?>

                                                <!-- Total Hadir -->
                                                <?php
                                                    $this->db->where('id_user', $data->id_user);
                                                    $this->db->where('status', 1);
                                                    $this->db->where("DATE_FORMAT(tgl,'%Y-%m') = '".$bulan."'");
                                                    $hadir = $this->db->get('absen');
                                                    ?><td><?php echo $hadir->num_rows(); ?></td>

                                                <!-- Total Izin -->
                                                <?php
                                                    $this->db->where('id_user', $data->id_user);
                                                    $this->db->where('status', 2);
                                                    $this->db->where("DATE_FORMAT(tgl,'%Y-%m') = '".$bulan."'");
                                                    $hadir = $this->db->get('absen');
                                                    ?><td><?php echo $hadir->num_rows(); ?></td>
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