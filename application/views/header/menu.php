
<body>

<div class="page-wrapper">
    <!-- Preloader -->
    <div class="loader-wrap">
        <!--<div class="preloader"><div class="preloader-close">Preloader Close</div></div>-->
        <div class="layer layer-one"><span class="overlay"></span></div>
        <div class="layer layer-two"><span class="overlay"></span></div>        
        <div class="layer layer-three"><span class="overlay"></span></div>        
    </div>

    <!-- Main Header -->
 <header class="main-header header-style-three">

        <!-- Header Top -->
        
        <!--End Header Top-->

        <!-- Main Menu -->
        <div class="main-menu style-two" style="margin: 0 20px">
            <div class="auto-container-fluid">
                <div class="inner-container">
                    <!--Logo-->
                    <div class="logo-box">
                        <div class="logo"><a href="<?= base_url(''); ?>"><img src="<?= base_url(''); ?>smi/uploads/tb_deskripsi_web/<?= $d11['ikon_web']; ?>" alt=""></a></div>
                    </div>
                    <!--Nav Box-->
                    <div class="nav-outer" >
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler"><img src="<?= base_url('assets'); ?>/images/icons/icon-bar.png" alt=""></div>

                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md navbar-light" style="margin-right:277px;">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent" ">
                                <ul class="navigation">

                                    <li class=" <?php 
                                    if ($tittle=='beranda'){
                                        echo "current";
                                    }?>
                                    >">
                                    <a href="<?= base_url(''); ?>">Beranda </a>
                                        
                                    </li>

                                    <li class="dropdown <?php 
                                    if ($tittle=='profil'){
                                        echo "current";
                                    }?>
                                    >"><a href="#">Profil</a>
                                        <ul>
                                            <li><a href="<?= base_url('profil/tkksd'); ?>">TKKSD</a></li>
                                            
                                            <li><a href="<?= base_url('profil/organisasi'); ?>">Struktur Organisasi</a></li>
                                            <li><a href="<?= base_url('profil/tupoksi'); ?>">Tugas Pokok TKKSD</a></li>
                                            
                                        </ul>
                                    </li>

                                  

                                    <li class="
                                    <?php 
                                    if ($tittle=='ph'){
                                        echo "current";
                                    }?>
                                    >"><a href="<?= base_url('produk_hukum'); ?>">Produk Hukum</a>
                                        
                                    </li>

                                    <li class="
                                    <?php 
                                    if ($tittle=='berita'){
                                        echo "current";
                                    }?>
                                    >"><a href="<?= base_url('berita'); ?>">Berita</a> 
                                    </li>
                                    
                                    

                                    
                                  
                                    <li class="dropdown
                                     <?php 
                                    if ($tittle=='kerjasama'){
                                        echo "current";
                                    }?>
                                    >"><a href="#">Kerjasama</a>
                                        <ul>
                                            <li><a href="<?= base_url('kerjasama'); ?>"> Kerjasama Dalam Negeri</a></li>
                                            <li><a href="<?= base_url('kerjasama/luar'); ?>"> Kerjasama Luar Negeri</a></li>
                                            
                                        </ul>
                                    </li>
                                    
                                    <li class="
                                    <?php 
                                    if ($tittle=='hasil'){
                                        echo "current";
                                    }?>
                                    >"><a href="<?= base_url('hasil_kerjasama'); ?>">Hasil Kerjasama</a> 
                                    </li>
                                   
                                    <li class="dropdown
                                     <?php 
                                    if ($tittle=='layanan'){
                                        echo "current";
                                    }?>
                                    >"><a href="#">Layanan</a>
                                        <ul >
                                            <li><a href="<?= base_url('layanan/konsultasi'); ?>"> Konsultasi</a></li>
                                            <li><a href="<?= base_url('layanan/dengan_daerah'); ?>"> Prosedur Kerjasama Daerah Dengan Daerah</a></li>
                                            <li><a href="<?= base_url('layanan/pihak_k3'); ?>"> Prosedur Kerjasama Dengan Pihak Ke-3</a></li>
                                            <li><a href="<?= base_url('layanan/sinergitas'); ?>"> Prosedur Sinergitas Dengan Pemerintah Pusat</a></li>
                                            
                                        </ul>
                                    </li>
                                    <li class=" <?php 
                                    if ($tittle=='peluang'){
                                        echo "current";
                                    }?>
                                    >">
                                    <a href="https://investasi.sukabumikab.go.id/pertanian.html">Peluang Investasi </a>
                                        
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->
                       <!--  <button type="button" class="theme-btn search-toggler"><span class="stroke-gap-icon icon-Search"></span></button>       -->                  
                    </div>
                </div>
            </div>
        </div>

        <!-- Sticky Header  -->
        <div class="sticky-header main-menu" >
            <div class="auto-container-fluid" >
                <div class="inner-container" style="padding: 10px 15px;">
                    <div class="nav-outer">
                        <div class="logo-box">
                            <div class="logo"><a href="<?= base_url('') ?>"><img src="<?= base_url(''); ?>smi/uploads/tb_deskripsi_web/<?= $d11['ikon_web']; ?>" alt=""></a></div>
                        </div>
                        <span class="border-shape"></span>
                        <!-- Main Menu -->
                        <nav class="main-menu" style="margin-left:22px;">
                            <!--Keep This Empty / Menu will come through Javascript-->
                        </nav><!-- Main Menu End-->
                        <!-- Main Menu End-->
                        <!-- <button type="button" class="theme-btn search-toggler"><span class="stroke-gap-icon icon-Search"></span></button> -->
                    </div>                        
                </div>
            </div>
        </div><!-- End Sticky Menu -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-remove"></span></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="<?= base_url(''); ?>"><img src="<?= base_url(''); ?>smi/uploads/tb_deskripsi_web/<?= $d11['ikon_web']; ?>" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                <!--Social Links-->
                <!--<div class="social-links">-->
                <!--    <ul class="clearfix">-->
                        
                <!--        <li><a href="#"><span class="fab fa-twitter"></span></a></li>-->
                <!--        <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>-->
                        <!-- <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li> -->
                <!--        <li><a href="#"><span class="fab fa-instagram"></span></a></li>-->
                <!--        <li><a href="#"><span class="fab fa-youtube"></span></a></li>-->
                <!--    </ul>-->
                <!--</div>-->
            </nav>
        </div><!-- End Mobile Menu -->

        <div class="nav-overlay">
            <div class="cursor"></div>
            <div class="cursor-follower"></div>
        </div>
    </header>
    