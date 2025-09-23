 <!--Sidebar Side-->
                <div class="sidebar-side col-xl-3 col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar">

                        
                        <!--Blog Category Widget-->
                        <div class="widget sidebar-blog-category sisi" >
                            

                            <h3 class="widget-title gb">Publikasi</h3>
                            <ul class="cat-list">
                                <?php

                            foreach($publikasi->result_array() as $p):

                                  $idp=$p['id_kat_file'];
                                  $nmp=$p['nama_kat_file'];
                                  

                              ?>
                                <li><a href="#"><?= $nmp; ?></a></li>
                                <!-- <li><a href="#">Cattle Breeding</a></li>
                                <li><a href="#">Organic Milk</a></li>
                                <li><a href="#">Recipes</a></li>
                                <li><a href="#">Farmer</a></li>
                                <li><a href="#">Cows</a></li> -->
                                <?php endforeach;?>
                            </ul>
                        </div>
                        
                        <!-- Popular Posts -->
                        <div class="widget popular-posts sisi">
                            <h3 class="widget-title gb">Berita Terbaru</h3>
                            <?php

                            foreach($data->result_array() as $i):

                                  $id=$i['id_publikasi'];
                                  $judul=$i['judul_publikasi'];
                                  
                                  $potong1=substr($judul, 0, 30);
                                  $gambar=$i['gambar_publikasi'];

                              ?>

                            <article class="post">
                                <figure class="post-thumb"><a href="#"><img src="<?= base_url(''); ?>/smi/uploads/tb_publikasi/<?= $gambar; ?>" alt="" tittle="<?= $judul; ?>"></a></figure>
                                <div class="text"><a href="blog-details.html" title="<?= $judul; ?>"><?= $potong1; ?> ...</a></div>
                                <!-- <div class="post-info">12 April. 2019</div> -->
                            </article>
                            <?php endforeach;?>

                           

                        </div>
                        <div class="widget team-block-one sisi">
                            <h3 class="widget-title gb">Kepala</h3>
                            <div class="inner-box">
                                <div class="image">
                                    <img src="<?= base_url('assets'); ?>/images/resource/team-2.jpg" alt="">
                                    <div class="overlay-box">
                                        <ul class="social-links">
                                            <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                            <li><a href="#"><span class="fab fa-google-plus-g"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content">
                                    <h4>Mark John</h4>
                                    <div class="designation">Field Farmer</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Popular Produk Hukum -->
                        <div class="widget popular-tags sisi">
                            <h3 class="widget-title gb">Produk Hukum</h3>
                            <a href="#">Organic Milk</a>
                            <a href="#">Dairy</a>
                            <a href="#">Recipe</a>
                            <a href="#">Cattle Farm</a>
                            <a href="#">Farmer</a>
                            <a href="#">Agriculture</a>
                        </div>
                        
                    </aside>
                </div>
        </div>
    </div>
</div>