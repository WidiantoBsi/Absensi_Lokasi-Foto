<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Absensi</h1>
        </div>
        <?php if ($this->session->userdata('role_id') == 2) { ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-dark"><b>Selamat Datang <?= $nama->nama ?></b></h5><br>
                        <div class="flashdata" id="flashdata" onload="clearmy()">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <?php if (!$cekabsen) { ?>
                            <h6 class="text-dark">Anda belum absen hari ini !</h6>
                            <button class="btn btn-danger" onclick="getLocation()" id="accesscamera" data-toggle="modal" data-target="#photoModal">
                            <i class="fas fa-hand-point-up"></i> Absen</button><br><br>
                            <h6 id="clock"></h6>
                            <h6>
                            <?php $now = date("d-m-Y") ;
                            echo date('l', strtotime($now));
                            echo ", ".$now;
                            ?>
                            </h6>
                        <?php } else if ($cekabsen->status == 1) { ?>
                            <h6 class="text-dark">Anda sudah absen hari ini.</h6>
                            <?php foreach ($dataabsen as $data) {?>
                            <p>Pada jam <?= $data->jam ?>
                            <br>Tanggal <?= $data->tgl ?>.</p>
                            <?php }
                        } else if ($cekabsen->status == 2){ ?>
                            <h5 class="text-dark">Status anda izin</h5>
                            <h6 class="text-dark">Anda tidak perlu absen hari ini.</h6>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <?php if (!$cekabsen) { ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-warning">
                    <div class="card-body">
                        <h6>Perhatian !</h6>
                        <p>Sistem absen memerlukan izin kamera dan lokasi, harap berikan izin kamera dan lokasi kepada web, jika tidak absen akan gagal.<br>
                        Jika izin sudah diberikan namun tetap tidak bisa absen coba gunakan perangkat lain.<br>
                        Dan jika masih belum bisa silahkan hubungi pengurus absen.</p>
                        <form action="<?= base_url('tutor') ?>">
                            <button type="submit" class="btn btn-warning" type="submit">Cara aktifkan izin yang terblokir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        
        <?php } else if ($this->session->userdata('role_id') == 1) { ?>
            <?php if ($cekizin->num_rows() > 0) { ?>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                        <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Ada Izin yang belum diproses</h4>
                            </div>
                            <div class="card-body">
                                <h6>
                                <?php echo $cekizin->num_rows(); ?>
                                 Izin</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            
            <h6><b>Jumlah Kehadiran Hari ini</b></h6>
            <div class="row">
                <?php foreach ($dapur as $data) { ?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                        <i class="fas fa-hand-point-up"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?= $data->nama_dapur ?></h4>
                            </div>
                            <div class="card-body">
                                <h6>
                                <?php 
                                $this->db->join('users', 'users.id_user=absen.id_user');
                                $this->db->where('status', 1);
                                $this->db->where('id_dapur', $data->id_dapur);
                                $this->db->where('tgl', date("Y-m-d"));
                                $jumlah = $this->db->get('absen');
                                echo $jumlah->num_rows();
                                ?>
                                 Karyawan</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h6><b>Ranking Kehadiran Bulan</b></h6>
                        <form action="<?= base_url('dashboard') ?>" method="post">
                            <div class="form-group col-md-3">
                                <input class="form-control" required type="month" name="bulan" value="<?= $bulan ?>">
                                <button type="submit" class="btn btn-block btn-warning"><i class="far fa-eye"></i> Lihat Ranking</button>
                                <br>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table id="table" class="table table-bordered text-center" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Karyawan</th>
                                                <th>Dapur</th>
                                                <th>Total Hadir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $n = 1;
                                            foreach ($rank as $data) { ?>
                                                <tr>
                                                    <td><?= $n ?></td>
                                                    <td><?= $data->nama ?></td>
                                                    <td><?= $data->nama_dapur ?></td>
                                                    <td><span class="badge badge-success"><?= $data->tot ?></span></td>
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
        <?php } ?>
    </section>


    <!-- Modal Absen -->
        <div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ambil Foto</h5>
                        <button type="button" class="close" id="closemodal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div id="my_camera" class="d-block mx-auto rounded overflow-hidden"></div>
                        </div>
                        <div id="results" class="d-none"></div>
                        <br>
                        <h5 class="modal-title" id="exampleModalLabel">Lokasi Anda : </h5>
                        <h7 id="lokasi"></h7><br>
                        <h6 id="link"></h6>
                        <form form action="<?= base_url('absen') ?>" method="post" enctype="multipart/form-data" id="photoForm">
                            <input type="hidden" id="photoStore" name="photoStore" value="">
                            <input type="hidden" id="lat" name="lat" value="">
                            <input type="hidden" id="lon" name="lon" value="">
                            <input type="hidden" id="map" name="map" value="">
                            <label>*Pastikan lokasi anda benar.</label>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning mx-auto text-white" id="takephoto">Ambil Foto</button>
                        <button type="button" class="btn btn-warning mx-auto text-white d-none" id="retakephoto">Foto Ulang</button>
                        <button type="submit" class="btn btn-primary mx-auto text-white d-none" id="uploadphoto" form="photoForm">Absen</button>
                    </div>
                </div>
            </div>
        </div>
        
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

    <script src="./plugin/sweetalert/sweetalert.min.js"></script>
    <script src="./plugin/webcamjs/webcam.min.js"></script>
    <script>
    //Lokasi
    var x = document.getElementById("lokasi");
    var link = document.getElementById("link");

    function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
    }

    function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude;
    link.innerHTML = "<a href='https://www.google.com/maps/search/?api=1&query=" + position.coords.latitude + "," + position.coords.longitude + "' target='_blank'>Buka Maps</a>";
        $('#lat').val(position.coords.latitude);
        $('#lon').val(position.coords.longitude);
        $('#map').val("https://www.google.com/maps/search/?api=1&query=" + position.coords.latitude + "," + position.coords.longitude);
    }

    function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
        x.innerHTML = "Tolong berikan izin lokasi !"
        document.getElementById("takephoto").disabled = true;
        break;
        case error.POSITION_UNAVAILABLE:
        x.innerHTML = "Informasi lokasi tidak tersedia."
        document.getElementById("takephoto").disabled = true;
        break;
        case error.TIMEOUT:
        x.innerHTML = "Permintaan untuk mendapatkan lokasi pengguna mencapai batas waktu."
        document.getElementById("takephoto").disabled = true;
        break;
        case error.UNKNOWN_ERROR:
        x.innerHTML = "Terjadi kesalahan yang tidak diketahui."
        document.getElementById("takephoto").disabled = true;
        break;
    }
    }

    //foto
    $(document).ready(function() {
        if (screen.height <= screen.width) {
            // Landscape
            Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90
            });
        } else {
            // Portrait
            Webcam.set({
            width: 240,
            height: 320,
            image_format: 'jpeg',
            jpeg_quality: 90
            });
        }

    $('#closemodal').on('click', function() {
        Webcam.reset();

        $('#my_camera').addClass('d-block');
        $('#my_camera').removeClass('d-none');

        $('#results').addClass('d-none');

        $('#takephoto').addClass('d-block');
        $('#takephoto').removeClass('d-none');

        $('#retakephoto').addClass('d-none');
        $('#retakephoto').removeClass('d-block');

        $('#uploadphoto').addClass('d-none');
        $('#uploadphoto').removeClass('d-block');

        $('#photoModal').modal('hide');
        $('.modal-backdrop').remove();
    });

    $('#accesscamera').on('click', function() {
        Webcam.reset();
        Webcam.on('error', function() {
            swal({
                title: 'Warning',
                text: 'Tolong berikan izin kamera !',
                icon: 'warning'
            });
            $('#photoModal').modal('hide');
            $('.modal-backdrop').remove();
            document.getElementById("takephoto").disabled = true;
        });
        Webcam.attach('#my_camera');
    });

    $('#takephoto').on('click', take_snapshot);

    $('#retakephoto').on('click', function() {
        $('#my_camera').addClass('d-block');
        $('#my_camera').removeClass('d-none');

        $('#results').addClass('d-none');

        $('#takephoto').addClass('d-block');
        $('#takephoto').removeClass('d-none');

        $('#retakephoto').addClass('d-none');
        $('#retakephoto').removeClass('d-block');

        $('#uploadphoto').addClass('d-none');
        $('#uploadphoto').removeClass('d-block');
        });
    });

    function take_snapshot()
    {
        //take snapshot and get image data
        Webcam.snap(function(data_uri) {
            //display result image
            $('#results').html('<img src="' + data_uri + '" class="d-block mx-auto rounded"/>');

            var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');
            $('#photoStore').val(raw_image_data);
        });

        $('#my_camera').removeClass('d-block');
        $('#my_camera').addClass('d-none');

        $('#results').removeClass('d-none');

        $('#takephoto').removeClass('d-block');
        $('#takephoto').addClass('d-none');

        $('#retakephoto').removeClass('d-none');
        $('#retakephoto').addClass('d-block');

        $('#uploadphoto').removeClass('d-none');
        $('#uploadphoto').addClass('d-block');
    }

    //jam

    var myVar = setInterval(function() {
        myTimer();
    }, 1000);

    function myTimer() {
        var d = new Date();
        document.getElementById("clock").innerHTML = d.toLocaleTimeString();
    }
    </script>
