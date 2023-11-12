<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="<?= base_url(); ?>./assets/img/absensi abc.png" alt="logo" width="100%">
                        </div>

                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="flashdata" id="flashdata" onload="clearmy()">
                                    <?= $this->session->flashdata('message'); ?>
                                </div>
                                <form method="POST" action="<?= base_url('proses-login') ?>" class="needs-validation" novalidate="">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                                        <p><?= form_error('username') ?></p>
                                        <div class="invalid-feedback">
                                            Please f`ill in your email
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            <div class="float-right">
                                            </div>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                        <p><?= form_error('password') ?></p>
                                        <div class="invalid-feedback">
                                            please fill in your password
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!---- General JS Scripts -->
    <script src="<?= base_url(); ?>./assets/modules/jquery.min.js"></script>
    <script src="<?= base_url(); ?>./assets/modules/popper.js"></script>
    <script src="<?= base_url(); ?>./assets/modules/tooltip.js"></script>
    <script src="<?= base_url(); ?>./assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>./assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url(); ?>./assets/modules/moment.min.js"></script>
    <script src="<?= base_url(); ?>./assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?= base_url(); ?>./assets/js/scripts.js"></script>
    <script src="<?= base_url(); ?>./assets/js/custom.js"></script>
    <!-- atur sesi muncul flashdata -->
    <script>
        setTimeout(function() {
            $('#flashdata').hide();
        }, 3000);
    </script>
    <script>
        function clearme() {
            <?php
            if (isset($_SESSION['message'])) :
                unset($_SESSION['message']);
            elseif (isset($_SESSION['message'])) :
                unset($_SESSION['message']);
            endif;
            ?>
        }
    </script>

</body>


</html>