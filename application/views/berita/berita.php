

    <!-- Page Title -->
    <section class="page-title" style="background-image:url(<?= base_url('assets'); ?>/images/background/bg-7.jpg)">
        <div class="auto-container">
            <h2>Berita</h2>
            <ul class="page-breadcrumb">
                <li><a href="index.php">Beranda</a></li>
                <li>Berita</li>
            </ul>
        </div>
    </section>

    <!-- Our Services Two -->
    <section class="services-section-two">
       <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                
                <!--Content Side / Blog Classic -->
                <div class="content-side col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="auto-container">
                        <div class="sec-title">
                            <h2 class="gb">Berita </h2>
                            <!-- <div class="text">Berita .</div> -->

                        </div>
                        <div class="row">

                             <?php
                             // echo $total_berita;
                            foreach($berita as $i):

                                  $id=$i['id_publikasi'];
                                  $judul=$i['judul_publikasi'];
                                  $des=$i['deskripsi_publikasi'];
                                  $potong=substr($des, 0, 130);
                                  $gambar=$i['gambar_publikasi'];

                              ?>
                              
                            <div class="col-lg-4 service-block-two col-md-6 col-sm-12 col-xs-12">
                                <div class="inner-box" style="max-height: 500px !important; min-height: 500px !important;">
                                    
                                    <div class="image">
                                        <div class="image wow fadeInUp animated" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-name: fadeInUp;">
                                            <img style=" min-height: 250px;" src="<?= base_url(''); ?>/smi/uploads/tb_publikasi/<?= $gambar; ?>" alt="" title="<?= $judul; ?>">
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="content">

                                        <h4> <a href="<?= base_url('hasil_kerjasama/isi/'.$id) ?>" class="judul "><?= $judul; ?></a></h4>
                                        
                                    </div>
                                    
                                    
                                    
                                </div>
                            </div>
                            <?php endforeach;?>
                           

                            <div class="col-lg-12 service-block-two text-center">
                                <div class="link-box" style="align-content: center; padding-bottom: 20px;">
                                   <!-- <ul class="styled-pagination mb-30" style="margin-top: 10px;">
                                        <li><a href="#" class="active">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#"><span class="fas fa-angle-right"></span></a></li>
                                    </ul> -->
                                    <?= $this->pagination->create_links(); ?>
                                </div>
                            </div>

                        </div> <!-- endrow -->

                        

                    </div>
                </div>
                
               
                
            </div>
        </div>
    </div>
    </section>
   










