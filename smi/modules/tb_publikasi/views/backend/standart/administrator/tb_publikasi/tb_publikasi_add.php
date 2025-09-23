
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
        Publikasi Informasi        <small><?= cclang('new', ['Publikasi Informasi']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/tb_publikasi'); ?>">Publikasi Informasi</a></li>
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
                            <h3 class="widget-user-username">Publikasi Informasi</h3>
                            <h5 class="widget-user-desc"><?= cclang('new', ['Publikasi Informasi']); ?></h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name'    => 'form_tb_publikasi', 
                            'class'   => 'form-horizontal form-step', 
                            'id'      => 'form_tb_publikasi', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="kategori_publikasi" class="col-sm-2 control-label">Kategori 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="kategori_publikasi" id="kategori_publikasi" data-placeholder="Select Kategori" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('tb_kategori_publikasi') as $row): ?>
                                    <option value="<?= $row->id_kat_publikasi ?>"><?= $row->nama_kat_pub; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                <b>Input Kategori Publikasi</b> Max Length : 123.</small>
                            </div>
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="judul_publikasi" class="col-sm-2 control-label">Judul 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="judul_publikasi" id="judul_publikasi" placeholder="Judul" value="<?= set_value('judul_publikasi'); ?>">
                                <small class="info help-block">
                                <b>Input Judul Publikasi</b> Max Length : 225.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="deskripsi_publikasi" class="col-sm-2 control-label">Isi Konten 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <textarea id="deskripsi_publikasi" name="deskripsi_publikasi" rows="5" cols="80"><?= set_value('Deskripsi Publikasi'); ?></textarea>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="gambar_publikasi" class="col-sm-2 control-label">Gambar Konten 
                            </label>
                            <div class="col-sm-8">
                                <div id="tb_publikasi_gambar_publikasi_galery"></div>
                                <input class="data_file" name="tb_publikasi_gambar_publikasi_uuid" id="tb_publikasi_gambar_publikasi_uuid" type="hidden" value="<?= set_value('tb_publikasi_gambar_publikasi_uuid'); ?>">
                                <input class="data_file" name="tb_publikasi_gambar_publikasi_name" id="tb_publikasi_gambar_publikasi_name" type="hidden" value="<?= set_value('tb_publikasi_gambar_publikasi_name'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="author_publikasi" class="col-sm-2 control-label">Author 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="author_publikasi" id="author_publikasi" placeholder="Author" value="<?= set_value('author_publikasi'); ?>">
                                <small class="info help-block">
                                <b>Input Author Publikasi</b> Max Length : 225.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="sumber_publikasi" class="col-sm-2 control-label">Sumber Publikasi 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="sumber_publikasi" id="sumber_publikasi" placeholder="Sumber Publikasi" value="<?= set_value('sumber_publikasi'); ?>">
                                <small class="info help-block">
                                <b>Input Sumber Publikasi</b> Max Length : 225.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="aktif_publikasi" class="col-sm-2 control-label">Status Publikasi 
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select" name="aktif_publikasi" id="aktif_publikasi" data-placeholder="Select Status Publikasi" >
                                    <option value=""></option>
                                    <option value="ya">Ya</option>
                                    <option value="no">Tidak</option>
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
<script src="<?= BASE_ASSET; ?>ckeditor/ckeditor.js"></script>
<!-- Page script -->
<script>
    $(document).ready(function(){

      CKEDITOR.replace('deskripsi_publikasi',{
        filebrowserUploadUrl: BASE_URL + 'uploadna.php',
        filebrowserBrowseUrl: BASE_URL + 'uploads'
            });  
      var deskripsi_publikasi = CKEDITOR.instances.deskripsi_publikasi;
      
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
              window.location.href = BASE_URL + 'administrator/tb_publikasi';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
        $('#deskripsi_publikasi').val(deskripsi_publikasi.getData());
                    
        var form_tb_publikasi = $('#form_tb_publikasi');
        var data_post = form_tb_publikasi.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + '/administrator/tb_publikasi/add_save',
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          $('form').find('.form-group').removeClass('has-error');
          $('.steps li').removeClass('error');
          $('form').find('.error-input').remove();
          if(res.success) {
            var id_gambar_publikasi = $('#tb_publikasi_gambar_publikasi_galery').find('li').attr('qq-file-id');
            
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            resetForm();
            if (typeof id_gambar_publikasi !== 'undefined') {
                    $('#tb_publikasi_gambar_publikasi_galery').fineUploader('deleteFile', id_gambar_publikasi);
                }
            $('.chosen option').prop('selected', false).trigger('chosen:updated');
            deskripsi_publikasi.setData('');
                
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

       $('#tb_publikasi_gambar_publikasi_galery').fineUploader({
          template: 'qq-template-gallery',
          request: {
              endpoint: BASE_URL + '/administrator/tb_publikasi/upload_gambar_publikasi_file',
              params : params
          },
          deleteFile: {
              enabled: true, 
              endpoint: BASE_URL + '/administrator/tb_publikasi/delete_gambar_publikasi_file',
          },
          thumbnails: {
              placeholders: {
                  waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                  notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
              }
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
                   var uuid = $('#tb_publikasi_gambar_publikasi_galery').fineUploader('getUuid', id);
                   $('#tb_publikasi_gambar_publikasi_uuid').val(uuid);
                   $('#tb_publikasi_gambar_publikasi_name').val(xhr.uploadName);
                } else {
                   toastr['error'](xhr.error);
                }
              },
              onSubmit : function(id, name) {
                  var uuid = $('#tb_publikasi_gambar_publikasi_uuid').val();
                  $.get(BASE_URL + '/administrator/tb_publikasi/delete_gambar_publikasi_file/' + uuid);
              },
              onDeleteComplete : function(id, xhr, isError) {
                if (isError == false) {
                  $('#tb_publikasi_gambar_publikasi_uuid').val('');
                  $('#tb_publikasi_gambar_publikasi_name').val('');
                }
              }
          }
      }); /*end gambar_publikasi galery*/
              
 
       

      
    
    
    }); /*end doc ready*/
</script>