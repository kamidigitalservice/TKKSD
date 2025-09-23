

<!-- Fine Uploader Gallery CSS file
    ====================================================================== -->
<link href="<?= BASE_ASSET; ?>/fine-upload/fine-uploader-gallery.min.css" rel="stylesheet">
<!-- Fine Uploader jQuery JS file
    ====================================================================== -->
<script src="<?= BASE_ASSET; ?>/fine-upload/jquery.fine-uploader.js"></script>
<?php $this->load->view('core_template/fine_upload'); ?>
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
        Publikasi Dokumen        <small>Edit Publikasi Dokumen</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/tb_file_publikasi'); ?>">Publikasi Dokumen</a></li>
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
                            <h3 class="widget-user-username">Publikasi Dokumen</h3>
                            <h5 class="widget-user-desc">Edit Publikasi Dokumen</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/tb_file_publikasi/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_tb_file_publikasi', 
                            'class'   => 'form-horizontal form-step', 
                            'id'      => 'form_tb_file_publikasi', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="judul_file_pub" class="col-sm-2 control-label">Judul File Dokumentasi 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="judul_file_pub" id="judul_file_pub" placeholder="Judul File Dokumentasi" value="<?= set_value('judul_file_pub', $tb_file_publikasi->judul_file_pub); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kategori_file_pub" class="col-sm-2 control-label">Jenis Dokumen 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="kategori_file_pub" id="kategori_file_pub" data-placeholder="Select Jenis Dokumen" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('tb_kategori_file') as $row): ?>
                                    <option <?=  $row->id_kat_file ==  $tb_file_publikasi->kategori_file_pub ? 'selected' : ''; ?> value="<?= $row->id_kat_file ?>"><?= $row->nama_kat_file; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                <b>Input Kategori File Pub</b> Max Length : 100.</small>
                            </div>
                        </div>


                                                 
                                                <div class="form-group ">
                            <label for="file_pub" class="col-sm-2 control-label">File Upload 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <div id="tb_file_publikasi_file_pub_galery"></div>
                                <input class="data_file data_file_uuid" name="tb_file_publikasi_file_pub_uuid" id="tb_file_publikasi_file_pub_uuid" type="hidden" value="<?= set_value('tb_file_publikasi_file_pub_uuid'); ?>">
                                <input class="data_file" name="tb_file_publikasi_file_pub_name" id="tb_file_publikasi_file_pub_name" type="hidden" value="<?= set_value('tb_file_publikasi_file_pub_name', $tb_file_publikasi->file_pub); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                  
                                                <div class="form-group ">
                            <label for="deskripsi_pub" class="col-sm-2 control-label">Deskripsi Dokumen 
                            </label>
                            <div class="col-sm-8">
                                <textarea id="deskripsi_pub" name="deskripsi_pub" rows="5" class="textarea form-control"><?= set_value('deskripsi_pub', $tb_file_publikasi->deskripsi_pub); ?></textarea>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="sumber" class="col-sm-2 control-label">Sumber 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="sumber" id="sumber" placeholder="Sumber" value="<?= set_value('sumber', $tb_file_publikasi->sumber); ?>">
                                <small class="info help-block">
                                <b>Input Sumber</b> Max Length : 225.</small>
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
              window.location.href = BASE_URL + 'administrator/tb_file_publikasi';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_tb_file_publikasi = $('#form_tb_file_publikasi');
        var data_post = form_tb_file_publikasi.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_tb_file_publikasi.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          $('form').find('.form-group').removeClass('has-error');
          $('form').find('.error-input').remove();
          $('.steps li').removeClass('error');
          if(res.success) {
            var id = $('#tb_file_publikasi_image_galery').find('li').attr('qq-file-id');
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
      
                     var params = {};
       params[csrf] = token;

       $('#tb_file_publikasi_file_pub_galery').fineUploader({
          template: 'qq-template-gallery',
          request: {
              endpoint: BASE_URL + '/administrator/tb_file_publikasi/upload_file_pub_file',
              params : params
          },
          deleteFile: {
              enabled: true, // defaults to false
              endpoint: BASE_URL + '/administrator/tb_file_publikasi/delete_file_pub_file'
          },
          thumbnails: {
              placeholders: {
                  waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                  notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
              }
          },
           session : {
             endpoint: BASE_URL + 'administrator/tb_file_publikasi/get_file_pub_file/<?= $tb_file_publikasi->id_file_publikasi; ?>',
             refreshOnRequest:true
           },
          multiple : false,
          validation: {
              allowedExtensions: ["*"],
              sizeLimit : 0,
                        },
          showMessage: function(msg) {
              toastr['error'](msg);
          },
          callbacks: {
              onComplete : function(id, name, xhr) {
                if (xhr.success) {
                   var uuid = $('#tb_file_publikasi_file_pub_galery').fineUploader('getUuid', id);
                   $('#tb_file_publikasi_file_pub_uuid').val(uuid);
                   $('#tb_file_publikasi_file_pub_name').val(xhr.uploadName);
                } else {
                   toastr['error'](xhr.error);
                }
              },
              onSubmit : function(id, name) {
                  var uuid = $('#tb_file_publikasi_file_pub_uuid').val();
                  $.get(BASE_URL + '/administrator/tb_file_publikasi/delete_file_pub_file/' + uuid);
              },
              onDeleteComplete : function(id, xhr, isError) {
                if (isError == false) {
                  $('#tb_file_publikasi_file_pub_uuid').val('');
                  $('#tb_file_publikasi_file_pub_name').val('');
                }
              }
          }
      }); /*end file_pub galey*/
              
       
       

      async function chain(){
      }
       
      chain();


    
    
    }); /*end doc ready*/
</script>