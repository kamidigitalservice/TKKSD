<style>
#panel {
  padding: 10px;
  display: none;
}
</style>
     <!-- Page Title -->
    <section class="page-title" style="background-image:url(<?= base_url('assets'); ?>/images/background/bg-7.jpg)">
        <div class="auto-container">
            <h2>Kerjasama</h2>
            <ul class="page-breadcrumb">
                <li><a href="<?= base_url('');?>">Beranda</a></li>
                <li><a href="<?= base_url('kerjasama/luar'); ?>">Kerjasama Luar Negeri </a></li>
                <li>Detail Dokumen Kerjasama Luar Negeri</li>
            </ul>
        </div>
    </section> 

    <!-- Our Products -->
    <section class="products-section" style="background-color: #fff">
        <div class="auto-container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="sidebar">
                        <div class="shop-sidebar">
                            
                            <div class="widget widget_categories">
                                <h3 class="widget-title gb">Kategori </h3>
                                <div class="widget-content">
                                    
                                    <ul class="categories-list ">
                                        <li><a href="<?= base_url('kerjasama/filter_luar/5') ?>" >Kerjasama Daerah di Luar Negeri</a></li>

                                        <li><a href="<?= base_url('kerjasama/filter_luar/4') ?>">Kerjasama dengan Lembaga Luar Negeri </a></li>
                                        <li><a href="<?= base_url('kerjasama/filter_luar/3') ?>">Data Kerjasama Luar Negeri </a></li>

                                    </ul>
                                </div>
                            </div>
                             
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <h3 class="gb">Detail Dokumen <?= $get_file_luar['judul_tkksd']; ?></h3>
                        <div class="text">
                            
                            
                            <!--<?php var_dump($get_file_luar);?>-->
                            <center> <img src="<?= base_url(''); ?>smi/uploads/tb_tkksd/<?= $get_file_luar['gambar_tkksd']; ?>" alt="" style="padding-bottom:20px;"> </center>
                            <br>
                            <b>Nomor : <?= $get_file_luar['no_tkksd']; ?> </b> <br><br>
                            <b>Pihak :  </b> <br>
                            1. <?= $get_file_luar['pihak1']; ?> <br><br>
                            
                            2. <?= $get_file_luar['pihak2']; ?> <br><br>
                            
                            <?php
                                list($thn, $bln, $tgl) = explode ( '-', $get_file_luar['jangka_wktu_awal']);
                                $tgl1=$tgl."-".$bln."-".$thn;
                                list($thn2, $bln2, $tgl2) = explode ( '-', $get_file_luar['jangka_wktu_akhir']);
                                $tgl22=$tgl2."-".$bln2."-".$thn2
                            ?>
                            
                            
                            <b>Ditandatangani : <?= $tgl1; ?> Sampai <?= $tgl22; ?> </b> <br>
                            
                            <b>Deskripsi : </b><br>
                            
                            <?= $get_file_luar['deskripsi_tkksd']; ?> <br><br>
                            
                            <b>PD Pamakarsa : </b><br>
                            
                            <?= $get_file_luar['pd_pemrakasa']; ?> <br><br>
                            
                            <b>Keterangan Lainnya : </b><br>
                            
                            <?= $get_file_luar['keterangan_lainnya']; ?> <br><br>
                            
                            <b>Sumber : </b><br>
                            
                            <?= $get_file_luar['sumber_tkksd']; ?> <br>
                            
                        </div>
                </div>
            </div>
        </div>
    </section>

     
<script src='<?= base_url('assets'); ?>/tambahantabel/tab.js'></script>
     
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});
</script>
  
   <script src='<?= base_url('assets'); ?>/tambahantabel/jquery.min.js'></script>
<script src='<?= base_url('assets'); ?>/tambahantabel/bootstrap.min.js'></script>
<script src='<?= base_url('assets'); ?>/tambahantabel/bootstrap-table.js'></script>
<script src='<?= base_url('assets'); ?>/tambahantabel/bootstrap-table-editable.js'></script>
<script src='<?= base_url('assets'); ?>/tambahantabel/bootstrap-table-export.js'></script>
<script src='<?= base_url('assets'); ?>/tambahantabel/tableExport.js'></script>
<script src='<?= base_url('assets'); ?>/tambahantabel/bootstrap-table-filter-control.js'></script>
<!-- <script  src="./script.js"></script> -->

</body>

<!-- Mirrored from html.tonatheme.com/2020/Hankcok/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Nov 2020 02:50:00 GMT -->
</html>













