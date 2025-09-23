
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
                    
                    
                     <form method="post" action="http://html.tonatheme.com/2020/Hankcok/sendemail.php" class="contact-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="firstname" placeholder="First Name" required="">
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="text" name="lastname" placeholder="Last Name" required="">
                            </div>
                            
                            <div class="col-md-6 form-group">
                                <input type="email" name="email" placeholder="Email Address" required="">
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="text" name="phone" placeholder="Phone" required="">
                            </div>

                            <div class="col-md-12 form-group">
                                <select class="selectpicker" name="subject">
                                    <option value="*">Subject</option>
                                    <option value=".category-1">About Us</option>
                                    <option value=".category-2">Our Farmers</option>
                                    <option value=".category-3">Recipes</option>
                                    <option value=".category-4">Products</option>
                                </select>
                            </div>

                            <div class="col-md-12 form-group-two">
                                <textarea name="message" placeholder="Message goes here"></textarea>
                            </div>
    
                            <div class="col-md-12 form-group">
                                <button class="theme-btn btn-style-one style-two" type="submit" name="submit-form"><span class="btn-title">SEND MESSAGE</span></button>                                
                            </div>
                        </div>
                    </form>
                    
                   
                    
                </div>
                
                <!--Sidebar Side-->
               
 
