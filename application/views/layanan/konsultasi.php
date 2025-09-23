
    <!-- Page Title -->
    <section class="page-title" style="background-image:url(<?= base_url('assets'); ?>/images/background/bg-7.jpg)">
        <div class="auto-container">
            <h2>Layanan</h2>
            <ul class="page-breadcrumb">
                <li><a href="<?= base_url(''); ?>">Beranda</a></li>
                <!--<li><a href="<?= base_url('berita'); ?>">Berita</a></li>-->
                <li>Konsultasi</li>
            </ul>
        </div>
    </section>

    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                
                <!--Content Side / Blog Classic -->
                <div class="content-side col-xl-9 col-lg-8 col-md-12 col-sm-12">
                    <h2 class="gb">Konsultasi </h2>
                    <?= $this->session->flashdata('message'); ?>
                     <form method="post"  class="contact-form form user-form" style="padding-top:20px;" action="<?= base_url('layanan/konsultasi'); ?>" >
                        <div class="row">
                            
                            <div class="col-md-12 form-group">
                                <select class="" name="jenis" requered="">
                                    <option value="">Jenis Form</option>
                                    <option value="Konsultasi">Konsultasi</option>
                                    <option value="Pengaduan">Pengaduan</option>
                                    
                                </select>
                                <?= form_error('jenis', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            
                            <div class="col-md-12 form-group">
                                <input type="text" name="nama" placeholder="Nama Lengkap" >
                                 <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                           
                            
                            
                            <div class="col-md-6 form-group">
                                <input type="email" name="email" placeholder="Email" >
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="text" name="tlp" placeholder="No Tlp" >
                                <?= form_error('tlp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            
                            <div class="col-md-12 form-group">
                                <input type="text" name="judul" placeholder="Judul Pesan" >
                                <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            

                            <div class="col-md-12 form-group-two">
                                <textarea name="isi" placeholder="Isi Pesan"></textarea>
                                <?= form_error('isi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-12 form-group-two form-check">
                                
                                <div class="g-recaptcha" data-sitekey="6LfIQjsaAAAAADOvEbqnP3gQyueWMP-4JgvKmCqg"></div>
                            </div>
                            
                            
                            <div class="col-md-12 form-group">
                                <button class="theme-btn btn-style-one style-two" type="submit" name="submit-form"><span class="btn-title">Kirim</span></button>                                
                            </div>
                        </div>
                    </form>
                    
                   
                    
                </div>
                
                <!--Sidebar Side-->
                
                
              
 
