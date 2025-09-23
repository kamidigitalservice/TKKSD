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
                <li>Kerjasama Dalam Negeri</li>
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
                                <h3 class="widget-title gb">Kategori</h3>
                                <div class="widget-content">
                                    <ul class="categories-list ">
                                        <li><a href="#" id="flip">Daerah Dengan Daerah
                                            <span class="fa fa-angle-down" style=""></span>
                                            </a>
                                        </li>
                                        <div class="" id="panel" >
                                            <li><a href="<?= base_url('kerjasama/filter_dalam/8') ?>"  >Wajib </a> </li>
                                            <li><a href="<?= base_url('kerjasama/filter_dalam/9') ?>"  >Sukarela </a> </li>
                                            
                                        </div>
                                        </li>

                                        <li><a href="<?= base_url('kerjasama/filter_dalam/7') ?>">Daerah Dengan Pihak Ke-3 </a></li>
                                        <li><a href="<?= base_url('kerjasama/filter_dalam/6') ?>">Data Kerjasama Dalam Negri </a></li>

                                    </ul>

                                </div>
                            </div>
                             
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <h3 class="gb">Kerjasama Dalam Negeri </h3>
                         <table id="table" 
                                 data-toggle="table"
                                 data-pagination="true"
                                 lengthchange="false"
                                 data-search="true"
                                 data-filter-control="true" 
                                 data-show-export="false"
                                 data-click-to-select="false"
                                 data-escape="false"
                                 data-toolbar="#toolbar">
                        <thead>
                            <tr>
                         
                                <th  data-sortable="true">No</th>
                                <th  data-sortable="true">Nama Kerjasama</th>
                                <th  data-sortable="true">Kategori</th>
                                <th  data-sortable="true">Mulai </th>
                                <th  data-sortable="true">Berakhir </th>
                                <th  data-sortable="true">Download</th>
                                
                            </tr>
                        </thead>
                         <tbody>
                             <?php
                                // var_dump($allph); 
                                $no=1;
                                foreach($all_kerjasama as $dalam):
                                    list($thn, $bln, $tgl) = explode ( '-', $dalam['jangka_wktu_awal']);
                                        $tgl1=$tgl."-".$bln."-".$thn;
                                        list($thn2, $bln2, $tgl2) = explode ( '-', $dalam['jangka_wktu_akhir']);
                                        $tgl22=$tgl2."-".$bln2."-".$thn2

                              ?>
                        <?php if( $dalam['jangka_wktu_akhir'] <= date('Y-m-d') )
                        { ?>
                            <?php if($dalam['jangka_wktu_akhir']=='0000-00-00')
                             { ?>
                             <tr >
                                
                                <td ><?= $no; ?></td>
                                <td><?= $dalam['judul_tkksd']; ?></td>
                                <td><?= $dalam['nama_kat_tkksd']; ?></td>
                                <td><?= $tgl1; ?></td>
                                <td>Sampai Sekarang</td>
                                <td>
                                    <a href="<?= base_url('kerjasama/detail_dalam/'.$dalam['id_tkksd']); ?>" >
                                        <img src="<?= base_url('')?>smi/asset/img/icon/pdf.png" style="width: 25%; margin-left: auto; display: block; margin-right: auto;"> 
                                    </a>
                                </td>
                                 
                            </tr>
                            <?php
                        }else { ?>
                            
                            <tr class="table-danger">
                                
                                <td ><?= $no; ?></td>
                                <td><?= $dalam['judul_tkksd']; ?></td>
                                <td><?= $dalam['nama_kat_tkksd']; ?></td>
                                <td><?= $tgl1; ?></td>
                                <td><?= $tgl22; ?></td>
                                <td>
                                    <a href="<?= base_url('kerjasama/detail_dalam/'.$dalam['id_tkksd']); ?>" >
                                        <img src="<?= base_url('')?>smi/asset/img/icon/pdf.png" style="width: 25%; margin-left: auto; display: block; margin-right: auto;"> 
                                    </a>
                                </td>
                                 
                            </tr>
                           <?php } ?>
                        <?php
                        }else { ?>
                            <tr >
                                
                                <td ><?= $no; ?></td>
                                <td><?= $dalam['judul_tkksd']; ?></td>
                                <td><?= $dalam['nama_kat_tkksd']; ?></td>
                                <td><?= $tgl1; ?></td>
                                <td><?= $tgl22; ?></td>
                                <td>
                                    <a href="<?= base_url('kerjasama/detail_dalam/'.$dalam['id_tkksd']); ?>" >
                                        <img src="<?= base_url('')?>smi/asset/img/icon/pdf.png" style="width: 25%; margin-left: auto; display: block; margin-right: auto;"> 
                                    </a>
                                </td>
                                 
                                 
                            </tr>
                        <?php    } ?>
                             <?php $no++; 
                             endforeach;
                             ?>
                             
                            <!--<tr>-->
                                
                            <!--    <td>2</td>-->
                            <!--    <td>Undang-Undang No. 10 Tahun 2016 tentang Perubahan Kedua atas Undang-Undang No. 1 tahun 2015 tentng Penetapan Peraturan pemerintah Pengganti Undang-Undang No. 1 Tahun 2014 tentang Pemilihan Gubernur, Bupati, dan Walikota menjadi Undang-Undang</td>-->
                            <!--    <td> 13-05-2010 </td> <td> 13-05-2025</td> <td><a href="<?= base_url('kerjasama/detail_dalam'); ?> ">Lihat</a></td>-->
                                 
                            <!--</tr>-->
                            <!--<tr>-->
                            
                            <!--    <td>3</td>-->
                            <!--    <td>Undang-Undang No. 9 Tahun 2015 tentang Perubahan Kedua atas Undang-Undang No. 23 Tahun 2014 tentang Pemerintahan Daerah</td>-->
                            <!--    <td> 13-05-2010 </td> <td> 13-05-2025</td> <td><a href="<?= base_url('kerjasama/detail_dalam'); ?> ">Lihat</a></td>-->
                                 
                            <!--</tr>-->
                            <!--<tr>-->
                                
                            <!--    <td>4</td>-->
                            <!--    <td>Undang-Undang No. 7 Tahun 2017 tentang Pemilihan Umum</td>-->
                            <!--    <td> 13-05-2010 </td> <td> 13-05-2025</td> <td><a href="<?= base_url('kerjasama/detail_dalam'); ?> ">Lihat</a></td>-->
                                 
                            <!--</tr>-->
                            <!--<tr>-->
                            
                            <!--    <td>5</td>-->
                            <!--    <td>Undang-Undang No. 7 Tahun 2017 tentang Pemilihan Umum</td>-->
                            <!--    <td> 13-05-2010 </td> <td> 13-05-2025</td> <td><a href="<?= base_url('kerjasama/detail_dalam'); ?> ">Lihat</a></td>-->
                                 
                            <!--</tr>-->
                            <!--<tr>-->
                                
                            <!--    <td>6</td>-->
                            <!--    <td>Undang-Undang No. 7 Tahun 2017 tentang Pemilihan Umum</td>-->
                            <!--    <td> 13-05-2010 </td> <td> 13-05-2025</td> <td><a href="<?= base_url('kerjasama/detail_dalam'); ?> ">Lihat</a></td>-->
                                 
                            <!--</tr>-->
                            <!--<tr>-->
                                
                            <!--    <td>7</td>-->
                            <!--    <td>Undang-Undang No. 7 Tahun 2017 tentang Pemilihan Umum</td>-->
                            <!--    <td> 13-05-2010 </td> <td> 13-05-2025</td> <td><a href="<?= base_url('kerjasama/detail_dalam'); ?> ">Lihat</a></td>-->
                                 
                            <!--</tr>-->
                            <!--<tr>-->
                                
                            <!--    <td>8</td>-->
                            <!--    <td>Undang-Undang No. 7 Tahun 2017 tentang Pemilihan Umum</td>-->
                            <!--    <td> 13-05-2010 </td> <td> 13-05-2025</td> <td><a href="<?= base_url('kerjasama/detail_dalam'); ?> ">Lihat</a></td>-->
                                 
                            <!--</tr>-->
                            <!--<tr>-->
                            
                            <!--    <td>9</td>-->
                            <!--    <td>Undang-Undang No. 7 Tahun 2017 tentang Pemilihan Umum</td>-->
                            <!--    <td> 13-05-2010 </td> <td> 13-05-2025</td> <td><a href="<?= base_url('kerjasama/detail_dalam'); ?> ">Lihat</a></td>-->
                                 
                            <!--</tr>-->
                            <!--<tr>-->
                            
                            <!--    <td>10</td>-->
                            <!--    <td>Undang-Undang No. 7 Tahun 2017 tentang Pemilihan Umum</td>-->
                            <!--    <td> 13-05-2010 </td> <td> 13-05-2025</td> <td><a href="<?= base_url('kerjasama/detail_dalam'); ?> ">Lihat</a></td>-->
                                 
                            <!--</tr>-->
                            <!--<tr>-->
                                
                            <!--    <td>11</td>-->
                            <!--    <td>Undang-Undang No. 7 Tahun 2017 tentang Pemilihan Umum</td>-->
                            <!--    <td> 13-05-2010 </td> <td> 13-05-2025</td> <td><a href="<?= base_url('kerjasama/detail_dalam'); ?> ">Lihat</a></td>-->
                                 
                            <!--</tr>-->
                            <!--<tr>-->
                            <!--        <td>12</td>-->
                            <!--    <td>Undang-Undang No. 7 Tahun 2017 tentang Pemilihan Umum</td>-->
                            <!--    <td> 13-05-2010 </td> <td> 13-05-2025</td> <td><a href="<?= base_url('kerjasama/detail_dalam'); ?> ">Lihat</a></td>-->
                                 
                                 
                            <!--</tr>-->
                        </tbody>
                    </table>
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













