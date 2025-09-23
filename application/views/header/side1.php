 <!--Sidebar Side-->
                <div class="sidebar-side col-xl-3 col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar" style="padding-top:25px;">

                        
                        <!--kerjasama-->

                        
                        <!--Blog Category Widget-->
                        <div class="widget sidebar-blog-category sisi" >
                            

                            <h3 class="widget-title gb">Kerjasama</h3>
                            <ul class="cat-list">
                                <li><a href="<?= base_url('kerjasama'); ?>">Dalam Negeri</a></li>
                                <li><a href="<?= base_url('kerjasama/luar'); ?>">Luar Negeri</a></li>
                               
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
                                <figure class="post-thumb"><a href="<?= base_url('berita/detail/'.$id) ?>" title="<?= $judul; ?>"><img src="<?= base_url(''); ?>/smi/uploads/tb_publikasi/<?= $gambar; ?>" alt="" tittle="<?= $judul; ?>"></a></figure>
                                <div class="text"><a href="<?= base_url('berita/detail/'.$id) ?>" title="<?= $judul; ?>"><?= $potong1; ?> ...</a></div>
                                <!-- <div class="post-info">12 April. 2019</div> -->
                            </article>
                            <?php endforeach;?>

                           

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