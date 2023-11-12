<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=rekap-absen-$bulan.xls"); 

?>
<p align="center" style="font-weight:bold;font-size:14pt">Rekap absen <?= $bulan ?></p>

<div class="table-responsive">
    <table id="print" style="width:100%" border='1'>
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
                    <td align='center'><?= $n; ?></td>
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
                            ?><td align='center'><?php echo "-"; ?></td><?php
                        } else {
                            foreach ($hasil as $a) {
                                if ($a->status == 1) {
                                    ?><td align='center'><?php echo "H"; ?></td><?php
                                } else if ($a->status == 2) {
                                    ?><td align='center'><?php echo "I"; ?></td><?php
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
                        ?><td align='center'><?php echo $hadir->num_rows(); ?></td>

                    <!-- Total Izin -->
                    <?php
                        $this->db->where('id_user', $data->id_user);
                        $this->db->where('status', 2);
                        $this->db->where("DATE_FORMAT(tgl,'%Y-%m') = '".$bulan."'");
                        $hadir = $this->db->get('absen');
                        ?><td align='center'><?php echo $hadir->num_rows(); ?></td>
                </tr>
            <?php $n++;
            } ?>
        </tbody>
    </table>
</div>