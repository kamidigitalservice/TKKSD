
    <!-- Page Title -->
    <section class="page-title" style="background-image:url(<?= base_url('assets'); ?>/images/background/bg-7.jpg)">
        <div class="auto-container">
            <h2>Berita</h2>
            <ul class="page-breadcrumb">
                <li><a href="<?= base_url(''); ?>">Beranda</a></li>
                <li><a href="<?= base_url('berita'); ?>">Berita</a></li>
                <li>Detail Berita</li>
            </ul>
        </div>
    </section>

    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                
                <!--Content Side / Blog Classic -->
                <div class="content-side col-xl-9 col-lg-8 col-md-12 col-sm-12">
                    <div class="blog-classic pr-lg-4">

                        <!-- News Block Three-->
                        <div class="news-block-three">

                            <div class="inner-box">
                                
                                <div class="lower-content">
                                    <h3 class="gb"><a href="#"><?= $berita['judul_publikasi'] ?></a></h3>
                                     
                                    <div class="text">
                                        <center> <img src="<?= base_url(''); ?>smi/uploads/tb_publikasi/<?= $berita['gambar_publikasi'] ?>" alt=""> </center>
                                        <br>
                                        <?= $berita['deskripsi_publikasi'] ?>
                                        </div>
                                
                                </div>
                            </div>
                        </div>
                        
                        
                      

                    </div>
                    
                   
                    
                </div>
                
                <!--Sidebar Side-->
               
 
