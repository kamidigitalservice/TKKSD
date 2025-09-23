<?= get_header(); ?>
<body id="page-top">
   <?= get_navigation(); ?>

     <header>
      <div class="header-content" >
         <div class="header-content-inner">
            <h1 style="text-transform: capitalize;"id="homeHeading">Ruang Kendali<br>
            Tim Koordinasi Kerja Sama Daerah (TKKSD)
            </h1>
            <p style="font-size:12px">Jaringan Website Pemerintah Kabupaten Sukabumi<br> V 0.1 2020</p>
            <hr>
            <img width="120px"src="<?= theme_asset(); ?>img/ikon.png" style="margin-bottom:70px">
            
            <p>  <br>
            <!--<code>dwi ibnu -test </code>-->
            </p>
            <a href="administrator/login" class="btn btn-primary btn-xl page-scroll" ><i class="fa fa-key"></i> Login</a>
         </div>
      </div>
   </header>
   <?= get_footer(); ?>