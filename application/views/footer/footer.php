<!-- Main Footer -->
    <footer class="main-footer"  >
        <div class="auto-container">
            <!--Widgets Section-->
            <div class="widgets-section">
                <div class="row clearfix">
                    
                    <!--Column-->
                    <div class="column col-lg-4">
                        <div class="widget about-widget" style="padding-top: 20px">
                            <div class="logo"><a href="<?= base_url(''); ?>"><img src="<?= base_url(''); ?>smi/uploads/tb_deskripsi_web/<?= $d11['logo_web']; ?>" alt=""></a></div>
                            
                           

                        </div>     
                    </div>

                     <div class="column col-lg-4">
                        <div class="widget about-widget" >
                            <!--alamat-->
                            <h3 class="widget-title" style="color: #fff">Kontak Kami</h3>
                            <div class="testimonial-block-two">
                                <div class="inner-box"  style="margin-bottom: 5px !important;">
                                    <div class="lower-box" style="margin-top: 5px !important;">
                                        <div class="box-inner"style="padding-left: 70px !important;">
                                            <div class="image" style="padding-top: 10px"> 
                                              <i class="fa fa-circle fa-stack-2x"></i>
                                              <i style="padding-top:10px" class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                                            </div>
                                            <div class="text" style="color: #fff;">
                                            <?= $d11['alamat']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--tlp-->
                            <div class="testimonial-block-two">
                                <div class="inner-box" style="margin-bottom: 5px !important;" >
                                    <div class="lower-box" style="margin-top: 5px !important;">
                                        <div class="box-inner" style="padding-left: 70px !important;">
                                            <div class="image" style="padding-top:5px"> 
                                              <i class="fa fa-circle fa-stack-2x"></i>
                                              <i style="padding-top:10px" class="fa fa-phone fa-stack-1x fa-inverse"></i>
                                            </div>
                                             <div class="text" style="color: #fff;">
                                                 <?= $d11['tlpon']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--email-->
                            <div class="testimonial-block-two" style="margin-top:-30px;">
                                <div class="inner-box" style="margin-bottom: 5px !important;" >
                                    <div class="lower-box" style="margin-top: 5px !important;">
                                        <div class="box-inner" style="padding-left: 70px !important;">
                                            <div class="image" style="padding-top:5px"> 
                                              <i class="fa fa-circle fa-stack-2x"></i>
                                              <i style="padding-top:10px" class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                                            </div>
                                             <div class="text" style="color: #fff;">
                                                 <?= $d11['email']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>     
                    </div>
                    
                    <!--Column-->
                    <!-- <div class="column col-lg-4">
                        <div class="footer-widget links-widget">
                            <h3 class="widget-title">Useful Links</h3>
                            <div class="widget-content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul>
                                            <li><a href="index-2.html">Home</a></li>
                                            <li><a href="#">Organic Milk</a></li>
                                            <li><a href="#">Falvoured Milk</a></li>
                                            <li><a href="#">Our Recipes</a></li>
                                            <li><a href="#">Testimonials</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul>
                                            <li><a href="#">Meet Our Farmers</a></li>
                                            <li><a href="#">About Us</a></li>
                                            <li><a href="#">Latest Blogs</a></li>
                                            <li><a href="#">Faq</a></li>
                                            <li><a href="#">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                                        
                            </div>
                        </div>
                    </div>
                     -->
                    <!--Column-->
                    <div class="column col-lg-4">
                        <div class="footer-widget newsletter-widget">
                            <h3 class="widget-title" style="color: #fff">Sosial Media</h3>
                            <div class="widget-content">
                                
                                <div class="social-links">
                                    <ul>
                                         <?php
                                         // echo $total_berita;
                                        foreach($sosmed as $sos):
            
                                              $link=$sos['link_url'];
                                              $nm=$sos['nama_sosmed'];
                                              $icon=$sos['logo_gambar'];
            
                                          ?>
                                        <li><a href="<?= $link; ?> "><img style="border-radius:50%; width:95%;" src="<?= base_url(''); ?>/smi/uploads/tb_sosmed/<?= $icon; ?>" alt="" title="<?= $nm; ?>"></a></li>
                                         <?php endforeach;?>
                           
                                        <!--<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>-->
                                        <!--<li><a href="#"><i class="fab fa-twitter"></i></a></li>-->
                                        <!--<li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>-->
                                    </ul>
                                        
                                </div>
                                 <h3 class="widget-title" style="color: #fff; margin-bottom:10px;">Statistik Pengunjung</h3>
                                <!-- Histats.com  (div with counter) -->
                             
                                    <div id="histats_counter"></div>
                                
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="auto-container">
            <div class="footer-bottom" style="padding:10px; margin-left:25%;">
                <div class="copyright">
                    <div class="row m-0 justify-content-between">
                        <!--<div class="text">© Copyright  <a href="#">Hankcock Farm</a> . All right reserved.</div>-->
                        <div class="text" style="color:#fff;font-style: italic; font-size:13px; opacity:0.7;">COPYRIGHT © 2020 APTIKA - DKIP. All Rights Reserved. </div>
                    </div>
                </div>
            </div>
        </div> 
        

    </footer>
    
</div>
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="flaticon-right-arrow"></span></div>
<!--End pagewrapper-->



<!--Scroll to top-->




<script src="<?= base_url('assets'); ?>/js/jquery.js"></script>
<script src="<?= base_url('assets'); ?>/js/popper.min.js"></script>
<script src="<?= base_url('assets'); ?>/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets'); ?>/js/bootstrap-select.min.js"></script>
<script src="<?= base_url('assets'); ?>/js/jquery.fancybox.js"></script>
<script src="<?= base_url('assets'); ?>/js/isotope.js"></script>
<script src="<?= base_url('assets'); ?>/js/owl.js"></script>
<script src="<?= base_url('assets'); ?>/js/appear.js"></script>
<script src="<?= base_url('assets'); ?>/js/wow.js"></script>
<script src="<?= base_url('assets'); ?>/js/lazyload.js"></script>
<script src="<?= base_url('assets'); ?>/js/scrollbar.js"></script>
<script src="<?= base_url('assets'); ?>/js/TweenMax.min.js"></script>
<script src="<?= base_url('assets'); ?>/js/swiper.min.js"></script>

<script src="<?= base_url('assets'); ?>/js/script.js"></script>




</body>
 <!-- Histats.com  START  (aync)-->
<script type="text/javascript">var _Hasync= _Hasync|| [];
_Hasync.push(['Histats.start', '1,4508024,4,329,112,62,00011001']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
hs.src = ('//s10.histats.com/js15_as.js');
(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
})();</script>
<!--<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?4508024&101" alt="" border="0"></a></noscript>-->
<!-- Histats.com  END  -->
 
 
 
</html>

