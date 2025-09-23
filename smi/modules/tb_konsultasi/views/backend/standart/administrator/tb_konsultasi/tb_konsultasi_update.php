

<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
    function domo(){
     
       // Binding keys
       $('*').bind('keydown', 'Ctrl+s', function assets() {
          $('#btn_save').trigger('click');
           return false;
       });
    
       $('*').bind('keydown', 'Ctrl+x', function assets() {
          $('#btn_cancel').trigger('click');
           return false;
       });
    
      $('*').bind('keydown', 'Ctrl+d', function assets() {
          $('.btn_save_back').trigger('click');
           return false;
       });
        
    }
    
    jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Konsultasi        <small>Edit Konsultasi</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/tb_konsultasi'); ?>">Konsultasi</a></li>
        <li class="active">Edit</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row" >
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body ">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header ">
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">Konsultasi</h3>
                            <h5 class="widget-user-desc">Edit Konsultasi</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/tb_konsultasi/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_tb_konsultasi', 
                            'class'   => 'form-horizontal form-step', 
                            'id'      => 'form_tb_konsultasi', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="jenis_konsultasi" class="col-sm-2 control-label">Jenis 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="jenis_konsultasi" id="jenis_konsultasi" placeholder="Jenis" value="<?= set_value('jenis_konsultasi', $tb_konsultasi->jenis_konsultasi); ?>">
                                <small class="info help-block">
                                <b>Input Jenis Konsultasi</b> Max Length : 45.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="nama_konsultasi" class="col-sm-2 control-label">Nama  
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_konsultasi" id="nama_konsultasi" placeholder="Nama " value="<?= set_value('nama_konsultasi', $tb_konsultasi->nama_konsultasi); ?>">
                                <small class="info help-block">
                                <b>Input Nama Konsultasi</b> Max Length : 128.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="email_konsultasi" class="col-sm-2 control-label">Email 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="email_konsultasi" id="email_konsultasi" placeholder="Email" value="<?= set_value('email_konsultasi', $tb_konsultasi->email_konsultasi); ?>">
                                <small class="info help-block">
                                <b>Input Email Konsultasi</b> Max Length : 128.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="tlp_konsultasi" class="col-sm-2 control-label">No Telp 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="tlp_konsultasi" id="tlp_konsultasi" placeholder="No Telp" value="<?= set_value('tlp_konsultasi', $tb_konsultasi->tlp_konsultasi); ?>">
                                <small class="info help-block">
                                <b>Input Tlp Konsultasi</b> Max Length : 45.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="judul_konsultasi" class="col-sm-2 control-label">Judul 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="judul_konsultasi" id="judul_konsultasi" placeholder="Judul" value="<?= set_value('judul_konsultasi', $tb_konsultasi->judul_konsultasi); ?>">
                                <small class="info help-block">
                                <b>Input Judul Konsultasi</b> Max Length : 150.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="isi_konsultasi" class="col-sm-2 control-label">Isi Konsultasi 
                            </label>
                            <div class="col-sm-8">
                                <textarea id="isi_konsultasi" name="isi_konsultasi" rows="5" class="textarea form-control"><?= set_value('isi_konsultasi', $tb_konsultasi->isi_konsultasi); ?></textarea>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                
                                                 <div class="message"></div>
                                                <div class="row-fluid col-md-7 container-button-bottom">
                            <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                            <i class="fa fa-save" ></i> <?= cclang('save_button'); ?>
                            </button>
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                            <i class="ion ion-ios-list-outline" ></i> <?= cclang('save_and_go_the_list_button'); ?>
                            </a>
                            <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
                            <i class="fa fa-undo" ></i> <?= cclang('cancel_button'); ?>
                            </a>
                            <span class="loading loading-hide">
                            <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg"> 
                            <i><?= cclang('loading_saving_data'); ?></i>
                            </span>
                        </div>
                                                 <?= form_close(); ?>
                    </div>
                </div>
                <!--/box body -->
            </div>
            <!--/box -->
        </div>
    </div>
</section>
<!-- /.content -->
<!-- Page script -->
<script>
    $(document).ready(function(){
       
      
             
      $('#btn_cancel').click(function(){
        swal({
            title: "Are you sure?",
            text: "the data that you have created will be in the exhaust!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes!",
            cancelButtonText: "No!",
            closeOnConfirm: true,
            closeOnCancel: true
          },
          function(isConfirm){
            if (isConfirm) {
              window.location.href = BASE_URL + 'administrator/tb_konsultasi';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_tb_konsultasi = $('#form_tb_konsultasi');
        var data_post = form_tb_konsultasi.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_tb_konsultasi.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          $('form').find('.form-group').removeClass('has-error');
          $('form').find('.error-input').remove();
          $('.steps li').removeClass('error');
          if(res.success) {
            var id = $('#tb_konsultasi_image_galery').find('li').attr('qq-file-id');
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            $('.data_file_uuid').val('');
    
          } else {
            if (res.errors) {
               parseErrorField(res.errors);
            }
            $('.message').printMessage({message : res.message, type : 'warning'});
          }
    
        })
        .fail(function() {
          $('.message').printMessage({message : 'Error save data', type : 'warning'});
        })
        .always(function() {
          $('.loading').hide();
          $('html, body').animate({ scrollTop: $(document).height() }, 2000);
        });
    
        return false;
      }); /*end btn save*/
      
       
       
       

      async function chain(){
      }
       
      chain();


    
    
    }); /*end doc ready*/
</script>