 <footer class="main-footer">
     <div class="footer-left">
         Aira Baby Care. Copyright &copy; <?= date('Y') ?> Powered by <a href="https://www.narative.cf" target="blank">Narative</a>
     </div>
     <div class="footer-right">

     </div>
 </footer>
 </div>
 </div>
 <!-- General JS Scripts -->
 <script src="<?= base_url() ?>./assets/modules/jquery.min.js"></script>
 <script src="<?= base_url() ?>./assets/modules/popper.js"></script>
 <script src="<?= base_url() ?>./assets/modules/tooltip.js"></script>
 <script src="<?= base_url() ?>./assets/modules/bootstrap/js/bootstrap.min.js"></script>
 <script src="<?= base_url() ?>./assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
 <script src="<?= base_url() ?>./assets/modules/moment.min.js"></script>
 <script src="<?= base_url() ?>./assets/js/stisla.js"></script>

 <!-- JS Libraies -->
 <script src="<?= base_url() ?>./assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
 <script src="<?= base_url() ?>./assets/modules/chart.min.js"></script>
 <script src="<?= base_url() ?>./assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
 <script src="<?= base_url() ?>./assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
 <script src="<?= base_url() ?>./assets/modules/summernote/summernote-bs4.js"></script>
 <script src="<?= base_url() ?>./assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

 <!-- Page Specific JS File -->
 <script src="<?= base_url() ?>./assets/js/page/index-0.js"></script>

 <!-- Template JS File -->
 <script src="<?= base_url() ?>./assets/js/scripts.js"></script>
 <script src="<?= base_url() ?>./assets/js/custom.js"></script>

 <script src="<?= base_url(); ?>./assets/DataTables/datatables.min.js"></script>

 <!-- fontawesome -->
 <script src="<?= base_url(); ?>./assets/fontawesom/js/fontawesome.min.js"></script>


 <!-- atur sesi muncul flashdata -->
 <script>
     setTimeout(function() {
         $('#flashdata').hide();
     }, 30000);
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

<!-- datepicker -->
<script>
config = {
    maxDate: "today",
    dateFormat: "Y-m-d",
    "disable": [
        function(date) {
            // return true to disable
            return (date.getDay() === 0 || date.getDay() === 1 || date.getDay() === 2 || date.getDay() === 3 || date.getDay() === 4 || date.getDay() === 6);

        }
    ],
    "locale": {
        "firstDayOfWeek": 1 // start week on Monday
    }
}

config2 = {
    maxDate: "today",
    dateFormat: "Y-m-d",
    "disable": [
        function(date) {
            // return true to disable
            return (date.getDay() === 0 || date.getDay() === 1 || date.getDay() === 2 || date.getDay() === 3 || date.getDay() === 4 || date.getDay() === 5);

        }
    ],
    "locale": {
        "firstDayOfWeek": 1 // start week on Monday
    }
}

flatpickr("input[type=dategate]", config);
flatpickr("input[type=dategate2]", config2);
</script>

<script>
        $(".date")
.datepicker({
    onSelect: function(dateText) {
        console.log("Selected date: " + dateText + "; input's current value: " + this.value);
        $(this).change();
    }
})
.on("change", function() {
    console.log("Got change event from field");
});

$("#bulan").datepicker( {
    format: "mm-yyyy",
    viewMode: "months", 
    minViewMode: "months"
});
                            </script>

 <!-- script datatbles -->
 <script>
     $(document).ready(function() {
         $('#table').DataTable();
     });
 </script>

 


 <!--
 <script>
     $(document).ready(function() {
         $('#print').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
            ]
        });
     });
 </script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    -->


 </body>

 </html>