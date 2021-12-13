<?php
    //cek session
    if(!empty($_SESSION['admin'])){
?>

<noscript>
    <meta http-equiv="refresh" content="0;URL='./enable-javascript.html'" />
</noscript>

<!-- Footer START -->
<footer class="page-footer">
    <div class="container">
           <div class="row">
               <br/>
           </div>
    </div>
    <div class="footer-copyright teal darken-1 white-text">
        <div class="teal darken-1 container" id="footer">
            <?php
                $query = mysqli_query($config, "SELECT * FROM tbl_instansi");
                while($data = mysqli_fetch_array($query)){
            ?>
            <span class="white-text">&copy; <?php echo date("Y"); ?>
                <?php
                    if(!empty($data['nama'])){
                        echo $data['nama']/* .' &nbsp;|&nbsp; <a class="white-text" href="shipless-booms.000webhostapp.com" target="_blank">LURA</a>'*/;
                    } else {
                        echo 'LAYANAN UMUM RAJAWALI  &nbsp;|&nbsp; <a class="white-text" href="shipless-booms.000webhostapp.com" target="_blank">LURA</a>';
                    }
                ?>
            </a>
            </span>
            <div class="right hide-on-small-only">
                <?php
                    if(!empty($data['website'])){
                        echo '<i class="material-icons md-12">public</i> '.substr($data['website'],7,50).' &nbsp;&nbsp;';
                    } else {
                        echo '<i class="material-icons md-12">public</i> shipless-booms.000webhostapp.com &nbsp;&nbsp;';
                    }
                    if(!empty($data['email'])){
                        echo '<i class="material-icons">mail_outline</i> '.$data['email'].'';
                    } else {
                        echo '<i class="material-icons">mail_outline</i>  LURA@RNI.COM';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</footer>
<!-- Footer END -->

<!-- Javascript START -->
<script type="text/javascript" src="asset/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="asset/js/materialize.min.js"></script>
<script type="text/javascript" src="asset/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
<script data-pace-options='{ "ajax": false }' src='asset/js/pace.min.js'></script>
<script type="text/javascript">

//jquery dropdown
$(".dropdown-button").dropdown({ hover: false });

//jquery sidenav on mobile
$('.button-collapse').sideNav({
    menuWidth: 240,
    edge: 'left',
    closeOnClick: true
});

//jquery datepicker
$('#tgl_surat,#tgl_kembali,#batas_waktu,#dari_tanggal,#sampai_tanggal').pickadate({
    selectMonths: true,
    selectHours: true,
    selectMinutes: true,
    selectSeconds: true,
    selectYears: 10,
    format: "yyyy-mm-dd"
});

//jquery teaxtarea
$('#isi_ringkas').val('');
$('#isi_ringkas').trigger('autoresize');

//jquery dropdown select dan tooltip
$(document).ready(function(){
    $('select').material_select();
    $('.tooltipped').tooltip({delay: 10});
});

//jquery autocomplete
$(function() {
    $( "#kode" ).autocomplete({
        source: 'kode.php'
    });
});

//jquery untuk menampilkan pemberitahuan
$("#alert-message").alert().delay(5000).fadeOut('slow');

//jquery modal
$(document).ready(function(){
   $('.modal-trigger').leanModal();
 });

</script>
<!-- Javascript END -->

<?php
    } else {
        header("Location: ../");
        die();
    }
?>
