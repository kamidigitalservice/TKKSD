
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
        Kerjasama (TKKSD)        <small><?= cclang('new', ['Kerjasama (TKKSD)']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/tb_tkksd'); ?>">Kerjasama (TKKSD)</a></li>
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
                            <h3 class="widget-user-username">Kerjasama (TKKSD)</h3>
                            <h5 class="widget-user-desc"><?= cclang('new', ['Kerjasama (TKKSD)']); ?></h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name'    => 'form_tb_tkksd', 
                            'class'   => 'form-horizontal form-step', 
                            'id'      => 'form_tb_tkksd', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="no_tkksd" class="col-sm-2 control-label">Nomor 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="no_tkksd" id="no_tkksd" placeholder="Nomor" value="<?= set_value('no_tkksd'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="tanggal_tkksd" class="col-sm-2 control-label">Tanggal Kerjasama 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="tanggal_tkksd"  placeholder="Tanggal Kerjasama" id="tanggal_tkksd">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="judul_tkksd" class="col-sm-2 control-label">Judul Kesepakatan (Kerjasama) 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="judul_tkksd" id="judul_tkksd" placeholder="Judul Kesepakatan (Kerjasama)" value="<?= set_value('judul_tkksd'); ?>">
                                <small class="info help-block">
                                <b>Input Judul Tkksd</b> Max Length : 225.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kategori_tkksd" class="col-sm-2 control-label">Kategori 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="kategori_tkksd" id="kategori_tkksd" data-placeholder="Select Kategori" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('tb_kategori_tkksd') as $row): ?>
                                    <option value="<?= $row->id_kat_tkksd ?>"><?= $row->nama_kat_tkksd; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                <b>Input Kategori Tkksd</b> Max Length : 50.</small>
                            </div>
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="deskripsi_tkksd" class="col-sm-2 control-label">Deskripsi 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <textarea id="deskripsi_tkksd" name="deskripsi_tkksd" rows="5" class="textarea form-control"><?= set_value('deskripsi_tkksd'); ?></textarea>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="pihak1" class="col-sm-2 control-label">Pihak 1 (Dalam Kerjasama) 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="pihak1" id="pihak1" placeholder="Pihak 1 (Dalam Kerjasama)" value="<?= set_value('pihak1'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="pihak2" class="col-sm-2 control-label">Pihak 2 (Dalam Kerjasama) 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="pihak2" id="pihak2" placeholder="Pihak 2 (Dalam Kerjasama)" value="<?= set_value('pihak2'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="ruang_lingkup" class="col-sm-2 control-label">Ruang Lingkup 
                            </label>
                            <div class="col-sm-8">
                                <textarea id="ruang_lingkup" name="ruang_lingkup" rows="5" class="textarea form-control"><?= set_value('ruang_lingkup'); ?></textarea>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="dokumen_tkksd" class="col-sm-2 control-label">Lampiran Dokumen (tidak Dipublikasikan) 
                            </label>
                            <div class="col-sm-8">
                                <div id="tb_tkksd_dokumen_tkksd_galery"></div>
                                <input class="data_file" name="tb_tkksd_dokumen_tkksd_uuid" id="tb_tkksd_dokumen_tkksd_uuid" type="hidden" value="<?= set_value('tb_tkksd_dokumen_tkksd_uuid'); ?>">
                                <input class="data_file" name="tb_tkksd_dokumen_tkksd_name" id="tb_tkksd_dokumen_tkksd_name" type="hidden" value="<?= set_value('tb_tkksd_dokumen_tkksd_name'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="gambar_tkksd" class="col-sm-2 control-label">Lampiran Dokumen (untuk Dipublikasikan) 
                            </label>
                            <div class="col-sm-8">
                                <div id="tb_tkksd_gambar_tkksd_galery"></div>
                                <input class="data_file" name="tb_tkksd_gambar_tkksd_uuid" id="tb_tkksd_gambar_tkksd_uuid" type="hidden" value="<?= set_value('tb_tkksd_gambar_tkksd_uuid'); ?>">
                                <input class="data_file" name="tb_tkksd_gambar_tkksd_name" id="tb_tkksd_gambar_tkksd_name" type="hidden" value="<?= set_value('tb_tkksd_gambar_tkksd_name'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="jangka_wktu_awal" class="col-sm-2 control-label">Jangka Waktu (Awal) 
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="jangka_wktu_awal"  placeholder="Jangka Waktu (Awal)" id="jangka_wktu_awal">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="jangka_wktu_akhir" class="col-sm-2 control-label">Jangka Waktu (Akhir) 
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="jangka_wktu_akhir"  placeholder="Jangka Waktu (Akhir)" id="jangka_wktu_akhir">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="pd_pemrakasa" class="col-sm-2 control-label">OPD/PD Pemrakarsa 
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="pd_pemrakasa" id="pd_pemrakasa" data-placeholder="Select OPD/PD Pemrakarsa" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('tb_daftar_pd') as $row): ?>
                                    <option value="<?= $row->nama_pede ?>"><?= $row->nama_pede; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="keterangan_lainnya" class="col-sm-2 control-label">Keterangan Lainnya 
                            </label>
                            <div class="col-sm-8">
                                <textarea id="keterangan_lainnya" name="keterangan_lainnya" rows="5" class="textarea form-control"><?= set_value('keterangan_lainnya'); ?></textarea>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="sumber_tkksd" class="col-sm-2 control-label">Sumber 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="sumber_tkksd" id="sumber_tkksd" placeholder="Sumber" value="<?= set_value('sumber_tkksd'); ?>">
                                <small class="info help-block">
                                <b>Input Sumber Tkksd</b> Max Length : 225.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="status_tkksd" class="col-sm-2 control-label">Status 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select" name="status_tkksd" id="status_tkksd" data-placeholder="Select Status" >
                                    <option value=""></option>
                                    <option value="no">Tidak Aktif</option>
                                    <option value="ya">Aktif</option>
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
              window.location.href = BASE_URL + 'administrator/tb_tkksd';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_tb_tkksd = $('#form_tb_tkksd');
        var data_post = form_tb_tkksd.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + '/administrator/tb_tkksd/add_save',
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          $('form').find('.form-group').removeClass('has-error');
          $('.steps li').removeClass('error');
          $('form').find('.error-input').remove();
          if(res.success) {
            var id_dokumen_tkksd = $('#tb_tkksd_dokumen_tkksd_galery').find('li').attr('qq-file-id');
            var id_gambar_tkksd = $('#tb_tkksd_gambar_tkksd_galery').find('li').attr('qq-file-id');
            
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            resetForm();
            if (typeof id_dokumen_tkksd !== 'undefined') {
                    $('#tb_tkksd_dokumen_tkksd_galery').fineUploader('deleteFile', id_dokumen_tkksd);
                }
            if (typeof id_gambar_tkksd !== 'undefined') {
                    $('#tb_tkksd_gambar_tkksd_galery').fineUploader('deleteFile', id_gambar_tkksd);
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

       $('#tb_tkksd_dokumen_tkksd_galery').fineUploader({
          template: 'qq-template-gallery',
          request: {
              endpoint: BASE_URL + '/administrator/tb_tkksd/upload_dokumen_tkksd_file',
              params : params
          },
          deleteFile: {
              enabled: true, 
              endpoint: BASE_URL + '/administrator/tb_tkksd/delete_dokumen_tkksd_file',
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
                   var uuid = $('#tb_tkksd_dokumen_tkksd_galery').fineUploader('getUuid', id);
                   $('#tb_tkksd_dokumen_tkksd_uuid').val(uuid);
                   $('#tb_tkksd_dokumen_tkksd_name').val(xhr.uploadName);
                } else {
                   toastr['error'](xhr.error);
                }
              },
              onSubmit : function(id, name) {
                  var uuid = $('#tb_tkksd_dokumen_tkksd_uuid').val();
                  $.get(BASE_URL + '/administrator/tb_tkksd/delete_dokumen_tkksd_file/' + uuid);
              },
              onDeleteComplete : function(id, xhr, isError) {
                if (isError == false) {
                  $('#tb_tkksd_dokumen_tkksd_uuid').val('');
                  $('#tb_tkksd_dokumen_tkksd_name').val('');
                }
              }
          }
      }); /*end dokumen_tkksd galery*/
                     var params = {};
       params[csrf] = token;

       $('#tb_tkksd_gambar_tkksd_galery').fineUploader({
          template: 'qq-template-gallery',
          request: {
              endpoint: BASE_URL + '/administrator/tb_tkksd/upload_gambar_tkksd_file',
              params : params
          },
          deleteFile: {
              enabled: true, 
              endpoint: BASE_URL + '/administrator/tb_tkksd/delete_gambar_tkksd_file',
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
                   var uuid = $('#tb_tkksd_gambar_tkksd_galery').fineUploader('getUuid', id);
                   $('#tb_tkksd_gambar_tkksd_uuid').val(uuid);
                   $('#tb_tkksd_gambar_tkksd_name').val(xhr.uploadName);
                } else {
                   toastr['error'](xhr.error);
                }
              },
              onSubmit : function(id, name) {
                  var uuid = $('#tb_tkksd_gambar_tkksd_uuid').val();
                  $.get(BASE_URL + '/administrator/tb_tkksd/delete_gambar_tkksd_file/' + uuid);
              },
              onDeleteComplete : function(id, xhr, isError) {
                if (isError == false) {
                  $('#tb_tkksd_gambar_tkksd_uuid').val('');
                  $('#tb_tkksd_gambar_tkksd_name').val('');
                }
              }
          }
      }); /*end gambar_tkksd galery*/
              
 
       

      
    
    
    }); /*end doc ready*/
</script>