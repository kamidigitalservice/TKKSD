
     <!-- Page Title -->
    <section class="page-title" style="background-image:url(<?= base_url('assets'); ?>/images/background/bg-7.jpg)">
        <div class="auto-container">
            <h2>Produk Hukum</h2>
            <ul class="page-breadcrumb">
                <li><a href="index.php">Beranda</a></li>
                <li>Produk Hukum</li>
            </ul>
        </div>
    </section> 

    <!-- Our Products -->
    <section class="products-section" style="background-color: #fff">
        <div class="auto-container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="sidebar">
                        <div class="shop-sidebar">
                            
                            <div class="widget widget_categories">
                                <h3 class="widget-title gb">Kategori </h3>
                                <div class="widget-content">
                                    <ul class="categories-list clearfix">
                                     <?php

                                        foreach($publikasi->result_array() as $p):
        
                                          $idp=$p['id_kat_file'];
                                          $nmp=$p['nama_kat_file'];

                                      ?>
                                        <li><a href="<?= base_url('produk_hukum/filter/'.$idp) ?>"><?= $nmp; ?></a></li>
                                        
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                             
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <h3 class="gb"> <?= $np['nama_kat_file']; ?>  </h3>
                         <table id="table" 
                                 data-toggle="table"
                                 data-pagination="true"
                                 lengthchange="false"
                                 data-search="true"
                                 data-filter-control="true" 
                                 data-show-export="false"
                                 data-click-to-select="false"
                                 data-escape="false"
                                 data-toolbar="#toolbar">
                        <thead>
                            <tr>
                         
                                <th  data-sortable="true">No</th>
                                
                                <th  data-sortable="true">Nama File</th>
                                <th  data-sortable="true">Download</th>
                                
                            </tr>
                        </thead>
                         <tbody>
                             <?php
                              //var_dump($np); 
                            $no=1;
                            foreach($file as $i):

                                  $id=$i['id_file_publikasi'];
                                //   $np=$i['nama_kat_file'];
                                  $judul=$i['judul_file_pub'];
                                  
                                  
                                  

                              ?>
                              
                            <tr>
                                
                                <td><?= $no; ?></td>
                                
                                <td><?= $judul; ?></td>
                                <td><a href="<?= base_url('produk_hukum/detail_ph/'.$id); ?>" target="_blank"><img src="<?= base_url('')?>smi/asset/img/icon/pdf.png" style="width: 25%; margin-left: auto; display: block; margin-right: auto;"> </a></td>
                                 
                            </tr>
                                
                             <?php $no++; 
                             endforeach;
                             ?>
                             
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

     

  
   <script src='<?= base_url('assets'); ?>/tambahantabel/jquery.min.js'></script>
<script src='<?= base_url('assets'); ?>/tambahantabel/bootstrap.min.js'></script>
<script src='<?= base_url('assets'); ?>/tambahantabel/bootstrap-table.js'></script>
<script src='<?= base_url('assets'); ?>/tambahantabel/bootstrap-table-editable.js'></script>
<script src='<?= base_url('assets'); ?>/tambahantabel/bootstrap-table-export.js'></script>
<script src='<?= base_url('assets'); ?>/tambahantabel/tableExport.js'></script>
<script src='<?= base_url('assets'); ?>/tambahantabel/bootstrap-table-filter-control.js'></script>
<!-- <script  src="./script.js"></script> -->

</body>

<!-- Mirrored from html.tonatheme.com/2020/Hankcok/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Nov 2020 02:50:00 GMT -->
</html>













