
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
        Deskripsi Website        <small><?= cclang('new', ['Deskripsi Website']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/tb_deskripsi_web'); ?>">Deskripsi Website</a></li>
        <li class="active"><?= cclang('new'); ?></li>
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
                            <h3 class="widget-user-username">Deskripsi Website</h3>
                            <h5 class="widget-user-desc"><?= cclang('new', ['Deskripsi Website']); ?></h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name'    => 'form_tb_deskripsi_web', 
                            'class'   => 'form-horizontal form-step', 
                            'id'      => 'form_tb_deskripsi_web', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="nama_web" class="col-sm-2 control-label">Nama Web 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_web" id="nama_web" placeholder="Nama Web" value="<?= set_value('nama_web'); ?>">
                                <small class="info help-block">
                                <b>Input Nama Web</b> Max Length : 225.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="title_web" class="col-sm-2 control-label">Title 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="title_web" id="title_web" placeholder="Title" value="<?= set_value('title_web'); ?>">
                                <small class="info help-block">
                                <b>Input Title Web</b> Max Length : 225.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="deskripsi_web" class="col-sm-2 control-label">Deskripsi 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <textarea id="deskripsi_web" name="deskripsi_web" rows="5" class="textarea form-control"><?= set_value('deskripsi_web'); ?></textarea>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="author" class="col-sm-2 control-label">Author 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="author" id="author" placeholder="Author" value="<?= set_value('author'); ?>">
                                <small class="info help-block">
                                <b>Input Author</b> Max Length : 123.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="nama_kepala" class="col-sm-2 control-label">Nama Kepala 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_kepala" id="nama_kepala" placeholder="Nama Kepala" value="<?= set_value('nama_kepala'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="foto_kepala" class="col-sm-2 control-label">Foto Kepala 
                            </label>
                            <div class="col-sm-8">
                                <div id="tb_deskripsi_web_foto_kepala_galery"></div>
                                <input class="data_file" name="tb_deskripsi_web_foto_kepala_uuid" id="tb_deskripsi_web_foto_kepala_uuid" type="hidden" value="<?= set_value('tb_deskripsi_web_foto_kepala_uuid'); ?>">
                                <input class="data_file" name="tb_deskripsi_web_foto_kepala_name" id="tb_deskripsi_web_foto_kepala_name" type="hidden" value="<?= set_value('tb_deskripsi_web_foto_kepala_name'); ?>">
                                <small class="info help-block">
                                <b>Extension file must</b> JPG,PNG,JPEG,GIF.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="alamat" class="col-sm-2 control-label">Alamat Kantor 
                            </label>
                            <div class="col-sm-8">
                                <textarea id="alamat" name="alamat" rows="5" class="textarea form-control"><?= set_value('alamat'); ?></textarea>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="tlpon" class="col-sm-2 control-label">No Telepon 
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="tlpon" id="tlpon" placeholder="No Telepon" value="<?= set_value('tlpon'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="email" class="col-sm-2 control-label">Email 
                            </label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?= set_value('email'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="meta_tambahan" class="col-sm-2 control-label">Meta Tambahan 
                            </label>
                            <div class="col-sm-8">
                                <textarea id="meta_tambahan" name="meta_tambahan" rows="5" class="textarea form-control"><?= set_value('meta_tambahan'); ?></textarea>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="nama_deveoper" class="col-sm-2 control-label">Nama Developer 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_deveoper" id="nama_deveoper" placeholder="Nama Developer" value="<?= set_value('nama_deveoper'); ?>">
                                <small class="info help-block">
                                <b>Input Nama Deveoper</b> Max Length : 123.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="tahun_bangun" class="col-sm-2 control-label">Tahun Dibangun 
                            </label>
                            <div class="col-sm-2">
                                <select  class="form-control chosen chosen-select-deselect" name="tahun_bangun" id="tahun_bangun" data-placeholder="Select Tahun Dibangun" >
                                    <option value=""></option>
                                    <?php for ($i = 1970; $i < date('Y')+100; $i++){ ?>
                                    <option value="<?= $i;?>"><?= $i; ?></option>
                                    <?php }; ?>  
                                </select>
                                <small class="info help-block">
                                <b>Input Tahun Bangun</b> Max Length : 50.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="ikon_web" class="col-sm-2 control-label">Ikon Aplikasi 
                            </label>
                            <div class="col-sm-8">
                                <div id="tb_deskripsi_web_ikon_web_galery"></div>
                                <input class="data_file" name="tb_deskripsi_web_ikon_web_uuid" id="tb_deskripsi_web_ikon_web_uuid" type="hidden" value="<?= set_value('tb_deskripsi_web_ikon_web_uuid'); ?>">
                                <input class="data_file" name="tb_deskripsi_web_ikon_web_name" id="tb_deskripsi_web_ikon_web_name" type="hidden" value="<?= set_value('tb_deskripsi_web_ikon_web_name'); ?>">
                                <small class="info help-block">
                                <b>Extension file must</b> JPG,PNG,JPEG,ICO.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="logo_web" class="col-sm-2 control-label">Logo Aplikasi 
                            </label>
                            <div class="col-sm-8">
                                <div id="tb_deskripsi_web_logo_web_galery"></div>
                                <input class="data_file" name="tb_deskripsi_web_logo_web_uuid" id="tb_deskripsi_web_logo_web_uuid" type="hidden" value="<?= set_value('tb_deskripsi_web_logo_web_uuid'); ?>">
                                <input class="data_file" name="tb_deskripsi_web_logo_web_name" id="tb_deskripsi_web_logo_web_name" type="hidden" value="<?= set_value('tb_deskripsi_web_logo_web_name'); ?>">
                                <small class="info help-block">
                                <b>Extension file must</b> JPG,PNG,JPEG,ICO.</small>
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
            title: "<?= cclang('are_you_sure'); ?>",
            text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
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
              window.location.href = BASE_URL + 'administrator/tb_deskripsi_web';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_tb_deskripsi_web = $('#form_tb_deskripsi_web');
        var data_post = form_tb_deskripsi_web.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + '/administrator/tb_deskripsi_web/add_save',
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          $('form').find('.form-group').removeClass('has-error');
          $('.steps li').removeClass('error');
          $('form').find('.error-input').remove();
          if(res.success) {
            var id_foto_kepala = $('#tb_deskripsi_web_foto_kepala_galery').find('li').attr('qq-file-id');
            var id_ikon_web = $('#tb_deskripsi_web_ikon_web_galery').find('li').attr('qq-file-id');
            var id_logo_web = $('#tb_deskripsi_web_logo_web_galery').find('li').attr('qq-file-id');
            
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            resetForm();
            if (typeof id_foto_kepala !== 'undefined') {
                    $('#tb_deskripsi_web_foto_kepala_galery').fineUploader('deleteFile', id_foto_kepala);
                }
            if (typeof id_ikon_web !== 'undefined') {
                    $('#tb_deskripsi_web_ikon_web_galery').fineUploader('deleteFile', id_ikon_web);
                }
            if (typeof id_logo_web !== 'undefined') {
                    $('#tb_deskripsi_web_logo_web_galery').fineUploader('deleteFile', id_logo_web);
                }
            $('.chosen option').prop('selected', false).trigger('chosen:updated');
                
          } else {
            if (res.errors) {
                
                $.each(res.errors, function(index, val) {
                    $('form #'+index).parents('.form-group').addClass('has-error');
                    $('form #'+index).parents('.form-group').find('small').prepend(`
                      <div class="error-input">`+val+`</div>
                      `);
                });
                $('.steps li').removeClass('error');
                $('.content section').each(function(index, el) {
                    if ($(this).find('.has-error').length) {
                        $('.steps li:eq('+index+')').addClass('error').find('a').trigger('click');
                    }
                });
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

       $('#tb_deskripsi_web_foto_kepala_galery').fineUploader({
          template: 'qq-template-gallery',
          request: {
              endpoint: BASE_URL + '/administrator/tb_deskripsi_web/upload_foto_kepala_file',
              params : params
          },
          deleteFile: {
              enabled: true, 
              endpoint: BASE_URL + '/administrator/tb_deskripsi_web/delete_foto_kepala_file',
          },
          thumbnails: {
              placeholders: {
                  waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                  notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
              }
          },
          multiple : false,
          validation: {
              allowedExtensions: ["jpg","png","jpeg","gif"],
              sizeLimit : 0,
                        },
          showMessage: function(msg) {
              toastr['error'](msg);
          },
          callbacks: {
              onComplete : function(id, name, xhr) {
                if (xhr.success) {
                   var uuid = $('#tb_deskripsi_web_foto_kepala_galery').fineUploader('getUuid', id);
                   $('#tb_deskripsi_web_foto_kepala_uuid').val(uuid);
                   $('#tb_deskripsi_web_foto_kepala_name').val(xhr.uploadName);
                } else {
                   toastr['error'](xhr.error);
                }
              },
              onSubmit : function(id, name) {
                  var uuid = $('#tb_deskripsi_web_foto_kepala_uuid').val();
                  $.get(BASE_URL + '/administrator/tb_deskripsi_web/delete_foto_kepala_file/' + uuid);
              },
              onDeleteComplete : function(id, xhr, isError) {
                if (isError == false) {
                  $('#tb_deskripsi_web_foto_kepala_uuid').val('');
                  $('#tb_deskripsi_web_foto_kepala_name').val('');
                }
              }
          }
      }); /*end foto_kepala galery*/
                     var params = {};
       params[csrf] = token;

       $('#tb_deskripsi_web_ikon_web_galery').fineUploader({
          template: 'qq-template-gallery',
          request: {
              endpoint: BASE_URL + '/administrator/tb_deskripsi_web/upload_ikon_web_file',
              params : params
          },
          deleteFile: {
              enabled: true, 
              endpoint: BASE_URL + '/administrator/tb_deskripsi_web/delete_ikon_web_file',
          },
          thumbnails: {
              placeholders: {
                  waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                  notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
              }
          },
          multiple : false,
          validation: {
              allowedExtensions: ["jpg","png","jpeg","ico"],
              sizeLimit : 0,
                        },
          showMessage: function(msg) {
              toastr['error'](msg);
          },
          callbacks: {
              onComplete : function(id, name, xhr) {
                if (xhr.success) {
                   var uuid = $('#tb_deskripsi_web_ikon_web_galery').fineUploader('getUuid', id);
                   $('#tb_deskripsi_web_ikon_web_uuid').val(uuid);
                   $('#tb_deskripsi_web_ikon_web_name').val(xhr.uploadName);
                } else {
                   toastr['error'](xhr.error);
                }
              },
              onSubmit : function(id, name) {
                  var uuid = $('#tb_deskripsi_web_ikon_web_uuid').val();
                  $.get(BASE_URL + '/administrator/tb_deskripsi_web/delete_ikon_web_file/' + uuid);
              },
              onDeleteComplete : function(id, xhr, isError) {
                if (isError == false) {
                  $('#tb_deskripsi_web_ikon_web_uuid').val('');
                  $('#tb_deskripsi_web_ikon_web_name').val('');
                }
              }
          }
      }); /*end ikon_web galery*/
                     var params = {};
       params[csrf] = token;

       $('#tb_deskripsi_web_logo_web_galery').fineUploader({
          template: 'qq-template-gallery',
          request: {
              endpoint: BASE_URL + '/administrator/tb_deskripsi_web/upload_logo_web_file',
              params : params
          },
          deleteFile: {
              enabled: true, 
              endpoint: BASE_URL + '/administrator/tb_deskripsi_web/delete_logo_web_file',
          },
          thumbnails: {
              placeholders: {
                  waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                  notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
              }
          },
          multiple : false,
          validation: {
              allowedExtensions: ["jpg","png","jpeg","ico"],
              sizeLimit : 0,
                        },
          showMessage: function(msg) {
              toastr['error'](msg);
          },
          callbacks: {
              onComplete : function(id, name, xhr) {
                if (xhr.success) {
                   var uuid = $('#tb_deskripsi_web_logo_web_galery').fineUploader('getUuid', id);
                   $('#tb_deskripsi_web_logo_web_uuid').val(uuid);
                   $('#tb_deskripsi_web_logo_web_name').val(xhr.uploadName);
                } else {
                   toastr['error'](xhr.error);
                }
              },
              onSubmit : function(id, name) {
                  var uuid = $('#tb_deskripsi_web_logo_web_uuid').val();
                  $.get(BASE_URL + '/administrator/tb_deskripsi_web/delete_logo_web_file/' + uuid);
              },
              onDeleteComplete : function(id, xhr, isError) {
                if (isError == false) {
                  $('#tb_deskripsi_web_logo_web_uuid').val('');
                  $('#tb_deskripsi_web_logo_web_name').val('');
                }
              }
          }
      }); /*end logo_web galery*/
              
 
       

      
    
    
    }); /*end doc ready*/
</script>