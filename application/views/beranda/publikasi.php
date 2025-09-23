<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html.tonatheme.com/2020/Hankcok/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Nov 2020 02:49:59 GMT -->
<head>
 <?php include('head.php');?>
</head>

<body>

<div class="page-wrapper">
    <!-- Preloader -->
    <div class="loader-wrap">
        <div class="preloader"><div class="preloader-close">Preloader Close</div></div>
        <div class="layer layer-one"><span class="overlay"></span></div>
        <div class="layer layer-two"><span class="overlay"></span></div>        
        <div class="layer layer-three"><span class="overlay"></span></div>        
    </div>

    <!-- Main Header -->
      <?php include('menu.php');?>
    <!-- End Main Header -->
    
    <!--Search Popup-->
    

     <!-- Page Title -->
    <section class="page-title" style="background-image:url(<?= base_url('assets'); ?>/images/background/bg-7.jpg)">
        <div class="auto-container">
            <h2>Publikasi</h2>
            <ul class="page-breadcrumb">
                <li><a href="index.php">Beranda</a></li>
                <li>Publikasi</li>
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
                            
                            <div class="widget widget_Publikasi">
                                <h3 class="widget-title gb">Kategori</h3>
                                <div class="widget-content">
                                    <ul class="Publikasi-list clearfix">
                                        <li><a href="#">File<span>(02)</span></a></li>
                                        <li><a href="#">e-Book <span>(08)</span></a></li>
                                        <li><a href="#">Brosur Event <span>(14)</span></a></li>
                                        <li><a href="#">SK Admin <span>(8)</span></a></li>
                                        <li><a href="#">PPID <span>(11)</span></a></li>
                                    </ul>
                                </div>
                            </div>
                             
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <h3 class="gb">Undang - Undang </h3>
                         <table id="table" 
                                 data-toggle="table"
                                 data-pagination="true"
                                 lengthchange="false"
                                 data-search="true"
                                 data-filter-control="true" 
                                 data-show-export="false"
                                 data-click-to-select="false"
                                 data-toolbar="#toolbar">
                        <thead>
                            <tr>
                         
                                <th  data-sortable="true">No</th>
                                <th  data-sortable="true">Nama File</th>
                                <th  data-sortable="true">Download</th>
                                
                            </tr>
                        </thead>
                         <tbody>
                            <tr>
                                
                                <td>1</td>
                                <td>Undang-Undang No. 7 Tahun 2017 tentang Pemilihan Umum</td>
                                <td>Lihat</td>
                                 
                            </tr>
                            <tr>
                                
                                <td>2</td>
                                <td>Undang-Undang No. 10 Tahun 2016 tentang Perubahan Kedua atas Undang-Undang No. 1 tahun 2015 tentng Penetapan Peraturan pemerintah Pengganti Undang-Undang No. 1 Tahun 2014 tentang Pemilihan Gubernur, Bupati, dan Walikota menjadi Undang-Undang</td>
                                <td>Lihat</td>
                                 
                            </tr>
                            <tr>
                            
                                <td>3</td>
                                <td>Undang-Undang No. 9 Tahun 2015 tentang Perubahan Kedua atas Undang-Undang No. 23 Tahun 2014 tentang Pemerintahan Daerah</td>
                                <td>Lihat</td>
                                 
                            </tr>
                            <tr>
                                
                                <td>4</td>
                                <td>Undang-Undang No. 7 Tahun 2017 tentang Pemilihan Umum</td>
                                <td>Lihat</td>
                                 
                            </tr>
                            <tr>
                            
                                <td>5</td>
                                <td>Undang-Undang No. 7 Tahun 2017 tentang Pemilihan Umum</td>
                                <td>Lihat</td>
                                 
                            </tr>
                            <tr>
                                
                                <td>6</td>
                                <td>Undang-Undang No. 7 Tahun 2017 tentang Pemilihan Umum</td>
                                <td>Lihat</td>
                                 
                            </tr>
                            <tr>
                                
                                <td>7</td>
                                <td>Undang-Undang No. 7 Tahun 2017 tentang Pemilihan Umum</td>
                                <td>Lihat</td>
                                 
                            </tr>
                            <tr>
                                
                                <td>8</td>
                                <td>Undang-Undang No. 7 Tahun 2017 tentang Pemilihan Umum</td>
                                <td>Lihat</td>
                                 
                            </tr>
                            <tr>
                            
                                <td>9</td>
                                <td>Undang-Undang No. 7 Tahun 2017 tentang Pemilihan Umum</td>
                                <td>Lihat</td>
                                 
                            </tr>
                            <tr>
                            
                                <td>10</td>
                                <td>Undang-Undang No. 7 Tahun 2017 tentang Pemilihan Umum</td>
                                <td>Lihat</td>
                                 
                            </tr>
                            <tr>
                                
                                <td>11</td>
                                <td>Undang-Undang No. 7 Tahun 2017 tentang Pemilihan Umum</td>
                                <td>Lihat</td>
                                 
                            </tr>
                            <tr>
                                    <td>12</td>
                                <td>Undang-Undang No. 7 Tahun 2017 tentang Pemilihan Umum</td>
                                <td>Lihat</td>
                                 
                                 
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

     

  <?php include('footer.php');?>
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













