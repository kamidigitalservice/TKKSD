

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
        Menu Pintas        <small>Edit Menu Pintas</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/tb_menu_pintas'); ?>">Menu Pintas</a></li>
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
                            <h3 class="widget-user-username">Menu Pintas</h3>
                            <h5 class="widget-user-desc">Edit Menu Pintas</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/tb_menu_pintas/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_tb_menu_pintas', 
                            'class'   => 'form-horizontal form-step', 
                            'id'      => 'form_tb_menu_pintas', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="nama_menu_pintas" class="col-sm-2 control-label">Nama Menu Pintas 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_menu_pintas" id="nama_menu_pintas" placeholder="Nama Menu Pintas" value="<?= set_value('nama_menu_pintas', $tb_menu_pintas->nama_menu_pintas); ?>">
                                <small class="info help-block">
                                <b>Input Nama Menu Pintas</b> Max Length : 225.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="url_menu_pintas" class="col-sm-2 control-label">Link URL 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="url_menu_pintas" id="url_menu_pintas" placeholder="Link URL" value="<?= set_value('url_menu_pintas', $tb_menu_pintas->url_menu_pintas); ?>">
                                <small class="info help-block">
                                <b>Input Url Menu Pintas</b> Max Length : 225.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="logo_ikon" class="col-sm-2 control-label">Logo Ikon/gambar 
                            </label>
                            <div class="col-sm-8">
                                <div id="tb_menu_pintas_logo_ikon_galery"></div>
                                <input class="data_file data_file_uuid" name="tb_menu_pintas_logo_ikon_uuid" id="tb_menu_pintas_logo_ikon_uuid" type="hidden" value="<?= set_value('tb_menu_pintas_logo_ikon_uuid'); ?>">
                                <input class="data_file" name="tb_menu_pintas_logo_ikon_name" id="tb_menu_pintas_logo_ikon_name" type="hidden" value="<?= set_value('tb_menu_pintas_logo_ikon_name', $tb_menu_pintas->logo_ikon); ?>">
                                <small class="info help-block">
                                <b>Extension file must</b> JPG,JPEG,PNG,GIF,ICO.</small>
                            </div>
                        </div>
                                                  
                                                <div class="form-group ">
                            <label for="aktif" class="col-sm-2 control-label">Status 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select" name="aktif" id="aktif" data-placeholder="Select Status" >
                                    <option value=""></option>
                                    <option <?= $tb_menu_pintas->aktif == "no" ? 'selected' :''; ?> value="no">Tidak Aktif</option>
                                    <option <?= $tb_menu_pintas->aktif == "ya" ? 'selected' :''; ?> value="ya">Aktif</option>
                                    </select>
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
              window.location.href = BASE_URL + 'administrator/tb_menu_pintas';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_tb_menu_pintas = $('#form_tb_menu_pintas');
        var data_post = form_tb_menu_pintas.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_tb_menu_pintas.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          $('form').find('.form-group').removeClass('has-error');
          $('form').find('.error-input').remove();
          $('.steps li').removeClass('error');
          if(res.success) {
            var id = $('#tb_menu_pintas_image_galery').find('li').attr('qq-file-id');
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

       $('#tb_menu_pintas_logo_ikon_galery').fineUploader({
          template: 'qq-template-gallery',
          request: {
              endpoint: BASE_URL + '/administrator/tb_menu_pintas/upload_logo_ikon_file',
              params : params
          },
          deleteFile: {
              enabled: true, // defaults to false
              endpoint: BASE_URL + '/administrator/tb_menu_pintas/delete_logo_ikon_file'
          },
          thumbnails: {
              placeholders: {
                  waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                  notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
              }
          },
           session : {
             endpoint: BASE_URL + 'administrator/tb_menu_pintas/get_logo_ikon_file/<?= $tb_menu_pintas->id_menu_pintas; ?>',
             refreshOnRequest:true
           },
          multiple : false,
          validation: {
              allowedExtensions: ["jpg","jpeg","png","gif","ico"],
              sizeLimit : 0,
                        },
          showMessage: function(msg) {
              toastr['error'](msg);
          },
          callbacks: {
              onComplete : function(id, name, xhr) {
                if (xhr.success) {
                   var uuid = $('#tb_menu_pintas_logo_ikon_galery').fineUploader('getUuid', id);
                   $('#tb_menu_pintas_logo_ikon_uuid').val(uuid);
                   $('#tb_menu_pintas_logo_ikon_name').val(xhr.uploadName);
                } else {
                   toastr['error'](xhr.error);
                }
              },
              onSubmit : function(id, name) {
                  var uuid = $('#tb_menu_pintas_logo_ikon_uuid').val();
                  $.get(BASE_URL + '/administrator/tb_menu_pintas/delete_logo_ikon_file/' + uuid);
              },
              onDeleteComplete : function(id, xhr, isError) {
                if (isError == false) {
                  $('#tb_menu_pintas_logo_ikon_uuid').val('');
                  $('#tb_menu_pintas_logo_ikon_name').val('');
                }
              }
          }
      }); /*end logo_ikon galey*/
              
       
       

      async function chain(){
      }
       
      chain();


    
    
    }); /*end doc ready*/
</script>