<style type="text/css">
   .widget-user-header {
      padding-left: 20px !important;
   }
</style>

<link rel="stylesheet" href="<?= BASE_ASSET; ?>admin-lte/plugins/morris/morris.css">

<section class="content-header">
    <h1>
        Wilujeng Sumping
        <small>
            
        | Admin
        </small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fa fa-dashboard">
                </i>
                <?= cclang('home') ?>
            </a>
        </li>
        <li class="active">
            <?= cclang('dashboard') ?>
        </li>
    </ol>
</section>

<section class="content">
    <div class="row">
      <?php cicool()->eventListen('dashboard_content_top'); ?>
        <div class="col-md-12 col-sm-12 col-xs-12">
             <div class="info-box" style="text-align:center;padding:20px;">
                 <h2>Dashboard <strong>Admin</strong></h2>
                 <p>Ruang Kendali panel administrator</p>
                 <div class="row">
                     <div class="col-md-6 col-sm-6 col-xs-12" style="text-align:left">
                         <h4>
                         <br><hr>
                         <strong>Tentang</strong>
                         </h4>
                         
                         <h5><i>About</i></h5>
                         <p style="text-align:justyfy">
                             Website Ruang Kendali Admin merupakan Backend Kendali utama Aplikasi, yang kontrol dan setingnya disediakan melalui tools dan fasilitas pengendali aplikasi layanan yang ada dalam website ini. <br>
                             Layanan ini dibangun dalam jaringan website Kabupaten Sukabumi yang tertanam dalam server milik kabupaten sukabumi<br>
                             Adapun rincian komponen aplikasi ini diantaranya:<br><br>
                             <i>Bahasa Pemrograman : <strong>PHP (>7.0)</strong><br>
                             Framework: <strong>Codeigniter (Ci)</strong><br>
                             Database : <strong>MySQl</strong><br>
                             Integrasi aplikasi : <strong style="color:green">API Ready</strong><br>
                             Server OS : <strong>Unix OS</strong><br>
                             Disk Space : <strong>20 GB</strong><br>
                             Bandwith : <strong>Unlimited</strong><br>
                             Server Location: <strong>Sukabumi Kabupaten</strong><br>
                            
                             IP Server : <strong>103.15.226.14</strong><br>
                             
                             </i>
                         </p>
                     </div>
                     
                     <div class="col-md-6 col-sm-6 col-xs-12" style="padding:50px">
                         <br><br><br><img width="150px"src="../cc-content/themes/cicool/asset//img/ikon.png"><br>
                         <h3>
                             Pemerintah Kabupaten<br>
                             <strong>S U K A B U M I</strong>
                         </h3>
                     </div>
                 </div>
             </div>
        </div>
       <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box button" onclick="goUrl('administrator/user')">
                <span class="info-box-icon bg-aqua">
                    <i class="ion ion-person-stalker">
                    </i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text" style="margin-top:10px">
                        Manajemen User
                    </span>
                    <p>User Akun</p>
                </div>
            </div>
        </div>
         <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box button" onclick="goUrl('administrator/auth/logout')">
                <span class="info-box-icon bg-red">
                    <i class="ion ion-power">
                    </i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text" style="margin-top:10px">
                        Log Out
                    </span>
                    <p>Keluar Akses</p>
                </div>
            </div>
        </div>
        
       

        

    </div>
  
      <!-- /.row -->
      <?php cicool()->eventListen('dashboard_content_bottom'); ?>

</section>
<!-- /.content -->
