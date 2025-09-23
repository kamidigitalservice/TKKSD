
   
<section class="page-title1" >
  <!-- Our Products -->
   <div class="container-fluid ">
         
            <div id="demo" class="carousel slide" data-ride="carousel" data-interval="4000">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                  <li data-target="#demo" data-slide-to="0" class="active"></li>
                  <li data-target="#demo" data-slide-to="1"></li>
                  <li data-target="#demo" data-slide-to="2"></li>
                </ul>
                
                <!-- The slideshow -->
                <div class="carousel-inner">
                    <?php
                    $no=1;
                    foreach($slide as $s):
                    $gambar=$s['gambar_slider'];

                      ?>
                    <div class="carousel-item <?php
                    if ($no=='1')
                    {
                        echo "active";
                    }
                    ?>">
                      <img src="<?= base_url(''); ?>/smi/uploads/tb_slider/<?= $gambar; ?>"  width="100%" >
                    </div>
                    
                    <?php $no++; 
                     endforeach;
                     ?>
                    
                </div>
                
                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
                </a>

                <a class="carousel-control-next" href="#demo" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                </a>

            </div>
         
    </div>
</section>
   
   <section class="services-section" style=" padding: 0 0 10px;" >
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>Prosedure</h2>
                <!--<div class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque <br> ipsa quae ab illo inventore veritatis et quasi architecto beatae.</div>-->
            </div>
            <div class="row">
                
                <!--<div class="col-lg-3 col-md-3 service-block-one">-->
                <!--    <div class="inner-box wow fadeInUp" data-wow-duration="1500ms">-->
                <!--        <div class="image"><img src="<?= base_url('smi'); ?>/uploads/tb_menu_pintas/business-partnership.png" alt="" style="max-width:150px; max-height:150px;"></div>-->
                <!--        <h4>KSDD</h4>-->
                <!--        <div class="text">Prosedur Kerjasama Daerah Dengan Daerah.</div>-->
                <!--    </div>-->
                <!--</div>-->
                
                <!--<div class="col-lg-3 col-md-3 service-block-one">-->
                <!--    <div class="inner-box wow fadeInDown" data-wow-duration="1500ms">-->
                <!--        <div class="image"><img src="<?= base_url('smi'); ?>/uploads/tb_menu_pintas/profile.png" alt="" style="max-width:150px; max-height:150px;"></div>-->
                <!--        <h4>KSDPK</h4>-->
                <!--        <div class="text">Prosedur Kerjasama Dengan Pihak Ke-3.</div>-->
                <!--    </div>-->
                <!--</div>-->
                
                <!--<div class="col-lg-3 col-md-3 service-block-one">-->
                <!--    <div class="inner-box wow fadeInUp" data-wow-duration="1500ms">-->
                <!--        <div class="image"><img src="<?= base_url('smi'); ?>/uploads/tb_menu_pintas/centralized.png" alt="" style="max-width:150px; max-height:150px;"></div>-->
                <!--        <h4>Sinergitas</h4>-->
                <!--        <div class="text">Prosedur Sinergitas Dengan Pemerintah Pusat.</div>-->
                <!--    </div>-->
                <!--</div>-->
                
                <!--<div class="col-lg-3 col-md-3 service-block-one">-->
                <!--    <div class="inner-box wow fadeInUp" data-wow-duration="1500ms">-->
                <!--        <div class="image"><img src="<?= base_url('smi'); ?>/uploads/tb_menu_pintas/20210215133529-2021-02-15tb_menu_pintas133527.png" alt="" style="max-width:150px; max-height:150px;"></div>-->
                <!--        <h4>KDLN</h4>-->
                <!--        <div class="text">Prosedur Sinergitas Dengan Pemerintah Pusat.</div>-->
                <!--    </div>-->
                <!--</div>-->
                
                <?php

                    foreach($pintas  as $pin):
                        $logop=$pin['logo_ikon']; 
                        $nmpintas=$pin['nama_menu_pintas'];
                        $linkp=$pin['url_menu_pintas'];

                ?>
                
                <div class="col-lg-3 col-md-3 service-block-one">
                    <div class="inner-box wow fadeInUp" data-wow-duration="1500ms">
                        <a href="<?= $linkp; ?>">
                        <div class="image"><img src="<?= base_url('smi'); ?>/uploads/tb_menu_pintas/<?=  $logop ?> " alt="" style="max-width:150px; max-height:150px;"></div>
                        <!--<h4>KDLN</h4>-->
                        <div class="text"><?= $nmpintas  ?></div>
                        </a>
                    </div>
                </div>
                
                <?php endforeach;?>
                
            </div>
            <!--<div class="view-all text-center mt-3"><a href="#" class="theme-btn btn-style-one style-two"><span>View all products</span></a></div>-->
        </div>
    </section>

<!--Berita kab-->
     <section class="services-section-two" style="padding: 5px !important;">
       <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                
                <!--Content Side / Blog Classic -->
                <div class="content-side col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="auto-container">
                        <div class="sec-title">
                            <h2 class="gb">Berita Kabupaten Sukabumi </h2>
                            <!--<div class="text">Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing.</div>-->
                        </div>
                        <div class="row">
                        
                       <?php
                       
                            $source_api_b_ppid='https://sukabumikab.go.id/portal/apikami/berita.php?user=ppidkabsukabumi&APIkey=AzzykneyUkmdu873udnB3rk4hM4nD1R1&keywordsatu=bupa'; //API URL Berita Sukabumi PORTAL
                            $url_b_ppid=$source_api_b_ppid;
                            $ch_b_ppid=curl_init($url_b_ppid);
                            curl_setopt($ch_b_ppid, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                            curl_setopt($ch_b_ppid, CURLOPT_RETURNTRANSFER, true);
                            $result_b_ppid=curl_exec($ch_b_ppid);
                            curl_close($ch_b_ppid); //ucwords
                            $json_b_ppid=json_decode($result_b_ppid, true);
                            if ($json_b_ppid) {
                                $nona=1;
                                foreach($json_b_ppid["data-berita"] as $item_b_ppid) {
                                    if ($nona<=3){
                                    $id =$item_b_ppid['id'];
                                    $gambar =$item_b_ppid['gambar'];
                                    $judul_rev_b_ppid =strtolower($item_b_ppid['judul']);
                                    $inti_b_ppid      =substr($item_b_ppid['inti'], 0, 150);
                                    $date_b_ppid      =date_create($item_b_ppid['tanggal']);
                                    $tanggal_b_ppid   =date_format($date_b_ppid, 'd M Y');
                                    print '
                                    <div class="col-lg-4 service-block-two col-md-12 col-sm-12 col-xs-12">
                                         <div class="inner-box">
                                            <div class="image">
                                                <img style=" min-height: 250px;" src="https://sukabumikab.go.id/portal/foto_berita/'.$item_b_ppid['gambar'].'" alt="" title="'.$item_b_ppid['judul'].'">
                                            </div>
                                            <div class="content">
        
                                                <h4> <a href="https://sukabumikab.go.id/web/b/'.$id.'.asp" class="judul ">'.$item_b_ppid['judul'].'</a></h4>
                                               <li><p style="padding:0 0 0 0; margin:0 0 0 0;line-height:11px;text-align:left;color:grey;font-size:9px">&#128197;
                                        '.$tanggal_b_ppid.' &nbsp | '.($item_b_ppid['jenis']).' </p></li>
                                            </div>
                                            <div class="link-box" style="position: relative;  bottom: 1px; left: 25px;">
                                                    <a href="https://sukabumikab.go.id/web/b/'.$id.'.asp" class="theme-btn btn-style-one" style="box-shadow: -2px 2px 6px 0px rgb(11 117 76 / 51%);  "><span>Selengkapnya</span></a>
                                            </div>
                                        </div>                               
                                    </div>
                                    ';
                                    
                                    }
                                    $nona++;
                                    
                                }
                            }
                            
                            else {
                                echo "Data API Portal Pemkab.Sukabumi, gagal terhubung";
                            }
                            
                        ?>
                            
                            
                           
                            <div class="col-lg-12 service-block-two text-center">
                                <div class="link-box" style="align-content: center; padding-bottom: 20px;">
                                    <a href="https://sukabumikab.go.id/web/b.asp" class="theme-btn btn-style-one" style="box-shadow: -2px 2px 6px 0px rgb(11 117 76 / 51%);  "><span>Hasil Lainya</span></a>
                                </div>
                            </div>

                        </div> <!-- endrow -->

                        

                    </div>
                </div>
                
               
                
            </div>
        </div>
    </div>
    </section>
    <!--end berita kab-->
    
    
    <!-- Our Services Two -->
    <section class="services-section-two" style="padding: 5px !important;">
       <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                
                <!--Content Side / Blog Classic -->
                <div class="content-side col-xl-9 col-lg-8 col-md-12 col-sm-12">
                    <div class="auto-container">
                        <div class="sec-title">
                            <h2 class="gb">Berita Terbaru</h2>
                            
                        </div>
                        <div class="row">

                            <?php

                            foreach($data->result_array() as $i):

                                  $id=$i['id_publikasi'];
                                  $judul=$i['judul_publikasi'];
                                  $des=$i['deskripsi_publikasi'];
                                  $potong=substr($des, 0, 130);
                                  $gambar=$i['gambar_publikasi'];

                              ?>
                            <div class="col-lg-6 service-block-two col-md-12 col-sm-12 col-xs-12">
                                <div class="inner-box">
                                    <div class="image">
                                        <img style=" min-height: 250px;" src="<?= base_url(''); ?>/smi/uploads/tb_publikasi/<?= $gambar; ?>" alt="" title="<?= $judul; ?>">
                                    </div>
                                    <div class="content">

                                        <h4> <a href="<?= base_url('berita/detail/'.$id) ?>" class="judul "><?= $judul; ?></a></h4>
                                       
                                    </div>
                                    <div class="link-box" style="position: relative;  bottom: 1px; left: 25px;">
                                            <a href="<?= base_url('berita/detail/'.$id) ?>" class="theme-btn btn-style-one" style="box-shadow: -2px 2px 6px 0px rgb(11 117 76 / 51%);  "><span>Selengkapnya</span></a>
                                    </div>
                                </div>
                            </div>
                            
                            <?php endforeach;?>
                        <div class="col-lg-12 service-block-two text-center">
                            <div class="link-box" style="align-content: center; padding-bottom: 20px;">
                                <a href="<?= base_url('berita'); ?>" class="theme-btn btn-style-one" style="box-shadow: -2px 2px 6px 0px rgb(11 117 76 / 51%);  "><span>Berita Lainya</span></a>
                            </div>
                        </div>
                            
                        </div> <!-- endrow -->

                        

                    </div>
                </div>
                
                <!--Sidebar Side-->
                <div class="sidebar-side col-xl-3 col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar">
                        
                        <!--kepala-->
                        <div class="widget team-block-one sisi">
                            <h3 class="widget-title gb">Kepala</h3>
                            <div class="inner-box">
                                <div class="image">
                                    <img src="<?= base_url(''); ?>smi/uploads/tb_deskripsi_web/<?= $d11['foto_kepala']; ?>" alt="">
                                    <div class="overlay-box">
                                        <ul class="social-links">
                                            <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                            <li><a href="#"><span class="fab fa-google-plus-g"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content">
                                    <h4><?= $d11['nama_kepala']; ?></h4>
                                    <!--<?php var_dump($des); ?>-->
                                    <!--<div class="designation">Field Farmer</div>-->
                                </div>
                            </div>
                        </div>
                        
                        <!--kerjasama-->

                        
                        <!--Blog Category Widget-->
                        <div class="widget sidebar-blog-category sisi" >
                            

                            <h3 class="widget-title gb">Kerjasama</h3>
                            <ul class="cat-list">
                                <li><a href="<?= base_url('kerjasama'); ?>">Dalam Negeri</a></li>
                                <li><a href="<?= base_url('kerjasama/luar'); ?>">Luar Negeri</a></li>
                               
                            </ul>
                        </div>
                        
                        
                        <!--ph-->
                        <div class="widget sidebar-blog-category sisi" >
                            

                            <h3 class="widget-title gb">Produk Hukum</h3>
                            <ul class="cat-list">
                               
                                <?php

                            foreach($publikasi->result_array() as $p):

                                  $idp=$p['id_kat_file'];
                                  $nmp=$p['nama_kat_file'];
                                  

                              ?>
                                <li><a href="<?= base_url('produk_hukum/filter/'.$idp) ?>"><?= $nmp; ?></a></li>
                                
                                <?php endforeach;?>
                            </ul>
                        </div>
                        
                        
                        <!-- Popular Produk Hukum -->
                        <!--<div class="widget popular-tags sisi">-->
                        <!--      <h3 class="widget-title gb">Produk Hukum</h3>-->
                        <!--    <a href="#">Undang - Undang</a>-->
                        <!--    <a href="#">Peraturan Pemerintah</a>-->
                        <!--    <a href="#">Kementerian Dalam Negeri Republik Indonesia </a>-->
                        <!--    <a href="#">Peraturan Bupati</a>-->
                        <!--    <a href="#">Dalam Negeri</a>-->
                            
                        <!--</div>-->
                        
                    </aside>
                </div>
                
            </div>
        </div>
    </div>
    </section>
    <!--Sidebar Page Container-->
    
    <!--hasil kerjasama-->
     <section class="services-section-two" style="padding: 5px !important;">
       <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                
                <!--Content Side / Blog Classic -->
                <div class="content-side col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="auto-container">
                        <div class="sec-title">
                            <h2 class="gb">Hasil Kerjasama </h2>
                            <!--<div class="text">Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing.</div>-->
                        </div>
                        <div class="row">
                            
                            <?php

                            foreach($hasil->result_array() as $has):

                                 $idh=$has['id_publikasi'];
                                  $judulh=$has['judul_publikasi'];
                                  
                                  $gambarh=$has['gambar_publikasi'];

                              ?>
                            <div class="news-block-one col-lg-4">
                                <div class="inner-box">
                                    <div class="image">
                                        <a href="#">
                                        <img style=" min-height: 250px;" src="<?= base_url(''); ?>/smi/uploads/tb_publikasi/<?= $gambarh; ?>" alt="" title="<?= $judulh; ?>">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <!--<div class="date">May 02, 2020</div>-->
                                        <a href="<?= base_url('hasil_kerjasama/isi/'.$idh) ?>"><h4 class="judul" style="font-size:17px; line-height:25px;"><?= $judulh; ?></h4></a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                             
                            
                            <div class="col-lg-12 service-block-two text-center">
                                <div class="link-box" style="align-content: center; padding-bottom: 20px;">
                                    <a href="<?= base_url(''); ?>hasil_kerjasama" class="theme-btn btn-style-one" style="box-shadow: -2px 2px 6px 0px rgb(11 117 76 / 51%);  "><span>Hasil Lainya</span></a>
                                </div>
                            </div>

                        </div> <!-- endrow -->

                        

                    </div>
                </div>
                
               
                
            </div>
        </div>
    </div>
    </section>
    <!--end hasil kerjasam-->
    
   <!-- OPD TERKSIT -->
    <!--<section class="products-section" style="background-color: #fff; padding-top: 10px;" >-->
    <!--    <div class="auto-container">-->
    <!--        <div class="sec-title text-center">-->
    <!--            <h2 class="gb">OPD Terkait</h2>-->
    <!--        </div>-->

    <!--        <div class="theme_carousel owl-theme owl-carousel" data-options='{"loop": true, "margin": 40, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "2" }, "768" :{ "items" : "3" } , "992":{ "items" : "4" }, "1200":{ "items" : "4" }}}'>-->
    <!--            <div class="shop-item">-->
    <!--                <div class="inner-box">-->
    <!--                    <div class="image">-->
    <!--                        <a href="product-details.html"><img src="<?= base_url('assets'); ?>/images/opd/1.jpg" alt=""></a>-->
    <!--                    </div>-->
                        
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="shop-item">-->
    <!--                <div class="inner-box">-->
    <!--                    <div class="image">-->
    <!--                        <a href="product-details.html"><img src="<?= base_url('assets'); ?>/images/opd/2.jpg" alt=""></a>-->
    <!--                    </div>-->
                        
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="shop-item">-->
    <!--                <div class="inner-box">-->
    <!--                    <div class="image">-->
    <!--                        <a href="product-details.html"><img src="<?= base_url('assets'); ?>/images/opd/3.jpg" alt=""></a>-->
    <!--                    </div>-->
                        
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="shop-item">-->
    <!--                <div class="inner-box">-->
    <!--                    <div class="image">-->
    <!--                        <a href="product-details.html"><img src="<?= base_url('assets'); ?>/images/opd/4.jpg" alt=""></a>-->
    <!--                    </div>-->
                       
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="shop-item">-->
    <!--                <div class="inner-box">-->
    <!--                    <div class="image">-->
    <!--                        <a href="product-details.html"><img src="<?= base_url('assets'); ?>/images/opd/5.jpg" alt=""></a>-->
    <!--                    </div>-->
                       
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="shop-item">-->
    <!--                <div class="inner-box">-->
    <!--                    <div class="image">-->
    <!--                        <a href="product-details.html"><img src="<?= base_url('assets'); ?>/images/opd/6.jpg" alt=""></a>-->
    <!--                    </div>-->
                        
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="shop-item">-->
    <!--                <div class="inner-box">-->
    <!--                    <div class="image">-->
    <!--                        <a href="product-details.html"><img src="<?= base_url('assets'); ?>/images/opd/7.jpg" alt=""></a>-->
    <!--                    </div>-->
                       
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->


    













