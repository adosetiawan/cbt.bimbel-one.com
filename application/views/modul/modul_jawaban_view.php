<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Mengelola Jawaban
		<small>Mengelola jawaban berdasarkan soal yang dipilih</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo site_url(); ?>/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Jawaban</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">Data Soal <?php if(!empty($topik)){ echo $topik; } ?></div>
                </div><!-- /.box-header -->

                <div class="box-body">
                    <div class="col-xs-12">
                        <input type="hidden" name="topik" id="topik" value="<?php if(!empty($id_topik)){ echo $id_topik; } ?>" />
                        <?php if(!empty($soal)){ echo $soal; } ?>
                    </div>
                </div>
                <div class="box-footer">
                    <p>Mengelola jawaban berdasarkan soal yang dipilih. Jika sudah selesai, silahkan kembali ke halaman Soal dengan menutup jendela ini atau memilih menu Soal</p>
                </div>
            </div>
        </div>
    </div>
	<div class="row">
        <div class="col-xs-12">
                <div class="box">
                        <div class="box-header with-border">
                            <div class="box-title">Mengelola Jawaban</div>
                        </div><!-- /.box-header -->

                        <div class="box-body">

                        <?php if($tipe_soal != 4){?>
                            <?php echo form_open_multipart($url.'/tambah','id="form-tambah" class="form-horizontal"'); ?>

                            <div id="form-pesan"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jawaban</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="tambah-soal-id" id="tambah-soal-id" value="<?php if(!empty($id_soal)){ echo $id_soal; } ?>">
                                    <input type="hidden" name="tambah-jawaban-id" id="tambah-jawaban-id" >
                                    <input type="hidden" name="tambah-jawaban" id="tambah-jawaban" >
                                    <textarea class="textarea" id="tambah_jawaban" name="tambah_jawaban" style="width: 100%; height: 100px; font-size: 13px; line-height: 25px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    <p class="help-block">File gambar dapat di copy langsung atau di upload terlebih dahulu. File gambar yang didukung adalah jpg dan png.</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jawaban</label>
                                <div class="col-sm-4">
                                    <select class="form-control input-sm" id="tambah-benar" name="tambah-benar">
                                        <option value="0">Salah</option>
                                        <option value="1">Benar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" id="btn-tambah-simpan" class="btn btn-primary"><span id="judul-tambah-simpan">Simpan</span></button>
                            <button type="button" id="btn-tambah-batal" class="btn btn-default"><span>Batal</span></button>
                                </div>
                            </div>
                            </form>

                            <?php  }else{ ?>
                                <button class="btn btn-primary" id="btn-tambah-jawaban" type="button">Tambah Pilihan</button>
                                <hr>
                                <div id="form-pesan-kecermatan-simpan"></div>
                                <?php echo form_open_multipart($url.'/tambah_kecermatan','id="form-tambah-kecermatan-simpan" class="form-horizontal"'); ?>
                                    <input type="hidden" name="tambah-soal-id" id="tambah-soal-id" value="<?php if(!empty($id_soal)){ echo $id_soal; } ?>">
                                    <div class="row" id="form-pilihan-jawaban">
                                    
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <button type="button"  id="btn-tambah-kecermatan-simpan" class="btn btn-primary"><span id="judul-tambah-kecermatan-simpan">Simpan</span></button>
                                            <button type="button" type="submit" id="btn-tambah-batal" class="btn btn-default"><span>Batal</span></button>
                                        </div>
                                    </div>
                                </form>
                            <?php  } ?>
                        </div>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                            <div class="box-title">Daftar Soal</div>
                    </div><!-- /.box-header -->

                    <div class="box-body">
                        <table id="table-jawaban" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Soal</th>
                                    <th>Jawaban</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                </tr>
                            </tbody>
                        </table>                        
                    </div>
                </div>
        </div>
    </div>

    <div class="modal" id="modal-image" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog" style="width: 950px">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <div id="trx-judul">Insert Image</div>
                </div>
                <div class="modal-body">
                    <div class="row-fluid">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    <?php echo form_open_multipart($url.'/upload_file','id="form-upload-image" class="form-horizontal"'); ?>
                                        <div class="box">
                                            <div class="box-header with-border">
                                                <div class="box-title">Upload File</div>
                                            </div><!-- /.box-header -->

                                            <div class="box-body">
                                                <div class="row-fluid">
                                                    <div class="box-body">
                                                        <div id="form-pesan-upload-image"></div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">File</label>
                                                            <div class="col-sm-10">
                                                                <input type="hidden" id="image-topik-id" name="image-topik-id" >
                                                                <input type="file" id="image-file" name="image-file" >
                                                                <p class="help-block">File yang didukung adalah jpg, jpeg, png</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" id="image-upload" class="btn btn-primary">Upload File</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-xs-6">
                                        <div class="box hide" id="box-preview" >
                                            <div class="box-body">
                                                <div class="row-fluid">
                                                    <div class="box-body" style="height: 132px;">
                                                        <input type="hidden" name="image-isi" id="image-isi">
                                                        <div id="image-preview" style="text-align: center;vertical-align: middle;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" id="btn-image-insert" class="btn btn-primary">Masukkan Gambar</button>
                                            </div>
                                        </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="box">
                                        <div class="box-body" style="max-height: 230px;overflow: auto;">
                                            <table id="table-image" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Nama File</th>
                                                        <th>Preview</th>
                                                        <th>Tanggal</th>
                                                        <th> </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td> </td>
                                                        <td> </td>
                                                        <td> </td>
                                                        <td> </td>
                                                        <td> </td>
                                                    </tr>
                                                </tbody>
                                            </table>                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modal-hapus-jawaban" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <?php echo form_open($url.'/hapus_jawaban','id="form-hapus-jawaban"'); ?>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <div id="trx-judul">Hapus Jawaban</div>
                </div>
                <div class="modal-body">
                    <div class="row-fluid">
                        <div class="box-body">
                            <div id="form-pesan-hapus"></div>
                            <div class="form-group">
                                <label>Jawaban</label>
                                <input type="hidden" name="hapus-id" id="hapus-id">
                                <div id="hapus-jawaban"  style="max-height: 250px;overflow: auto;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn-hapus-jawaban" class="btn btn-primary">Hapus</button>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>

    </form>
    </div>
</section><!-- /.content -->



<script lang="javascript">
    function clickEvent(first,last){
      if(first.value.length){
        document.getElementById(last).focus();
      }
    }
    function refresh_table(){
        $('#table-jawaban').dataTable().fnReloadAjax();
    }

    function refresh_table_image(){
        $('#table-image').dataTable().fnReloadAjax();
    }

    function edit(id){
        $("#modal-proses").modal('show');
        $.getJSON('<?php echo site_url().'/'.$url; ?>/get_by_id/'+id+'', function(data){
            if(data.data==1){
                $("#form-pesan").html('');
                $("#tambah-jawaban").val('');
                CKEDITOR.instances.tambah_jawaban.setData(data.jawaban)
                $('#tambah-benar').val(data.benar);
                $('#tambah-jawaban-id').val(data.id);

                $('html, body').animate({
                    scrollTop: $("#form-tambah").offset().top
                }, 500);
            }
            $("#modal-proses").modal('hide');
        });
    }
    $('#btn-tambah-jawaban').click(function(e){
        $('#form-pilihan-jawaban').append(`
              <div class="col-md-2">
                    <table border="1">
                        <tr>
                            <td style="width:50px;text-align:center">1</td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-a[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-b[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-c[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-d[]" maxlength="3"></td>
                        </tr>
                        <tr>
                            <td style="width:50px;text-align:center">2</td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-a[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-b[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-c[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-d[]" maxlength="3"></td>
                        </tr>
                        <tr>
                            <td style="width:50px;text-align:center">3</td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-a[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-b[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-c[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-d[]" maxlength="3"></td>
                        </tr>
                        <tr>
                            <td style="width:50px;text-align:center">4</td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-a[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-b[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-c[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-d[]" maxlength="3"></td>
                        </tr>
                        <tr>
                            <td style="width:50px;text-align:center">5</td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-a[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-b[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-c[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-d[]" maxlength="3"></td>
                        </tr>
                        <tr>
                            <td style="width:50px;text-align:center">6</td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-a[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-b[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-c[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-d[]" maxlength="3"></td>
                        </tr>
                        <tr>
                            <td style="width:50px;text-align:center">7</td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-a[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-b[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-c[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-d[]" maxlength="3"></td>
                        </tr>
                        <tr>
                            <td style="width:50px;text-align:center">8</td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-a[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-b[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-c[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-d[]" maxlength="3"></td>
                        </tr>
                        <tr>
                            <td style="width:50px;text-align:center">9</td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-a[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-b[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-c[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-d[]" maxlength="3"></td>
                        </tr>
                        <tr>
                            <td style="width:50px;text-align:center">10</td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-a[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-b[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-c[]" maxlength="3"></td>
                            <td><input type="text" style="width:50px;text-align:center" name="jawaban-d[]" maxlength="3"></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <button class="btn btn-danger btn-hapus-form-jawaban" type="button" style="width:100%">Hapus</button>
                            </td>
                        </tr>
                    </table>
                </div>
        `);
    });
    $('#form-pilihan-jawaban').delegate('.btn-hapus-form-jawaban','click',function(e){
        console.log($(this).parent().parent().parent().parent().parent().remove());
        //$(this).parent().parent().remove();
    });
    $('#form-pilihan-jawaban').delegate('td input','keyup',function(e){
        if (this.value.length == this.maxLength) {
            $(this).parent().next('input').focus();
        }
    //     if(first.value.length){
    //     document.getElementById(last).focus();
    //   }
        //$(this).parent().parent().remove();
    });
    function hapus(id){
        $('#hapus-id').val('');
        $('#hapus-jawaban').html('');
        $("#modal-proses").modal('show');
        $.getJSON('<?php echo site_url().'/'.$url; ?>/get_by_id/'+id+'', function(data){
            if(data.data==1){
                $('#hapus-id').val(data.id);
                $('#hapus-jawaban').html(data.jawaban);
                
                $("#modal-hapus-jawaban").modal("show");
            }
            $("#modal-proses").modal('hide');
        });
    }

    /**
     * Fungsi untuk upload image dari editor
     */
    function imageUpload(){
        $('#box-preview').addClass('hide');
        $('#image-preview').html('');
        $('#form-pesan-upload-image').html('');
        $('#image-isi').val('');
        $('#image-file').val('');

        refresh_table_image();

        $("#modal-image").modal("show");
    }

    function image_preview(posisi, image){
        $('#image-preview').html('<img src="<?php echo base_url(); ?>'+posisi+'/'+image+'" style="max-height: 110px;" />');
        $('#image-isi').val('<img src="<?php echo base_url(); ?>'+posisi+'/'+image+'" style="max-width: 600px;" />');
        $('#box-preview').removeClass('hide');
    }

    function batal_tambah(){
        $("#form-pesan").html('');
        $("#tambah-jawaban").val('');
        CKEDITOR.instances.tambah_jawaban.setData('')
        $('#tambah-benar').val('0');
        $('#tambah-jawaban-id').val('');
        $('#tambah-putar').val('1');
    }

    $(function(){
        $('#btn-tambah-kecermatan-simpan').click(function(e){
            $.ajax({
                url:"<?php echo site_url().'/'.$url; ?>/tambah_kecermatan",
                type:"POST",
                data:$('#form-tambah-kecermatan-simpan').serialize(),
                // cache: false,
                dataType:'JSON',
                success:function(respon){
                    if(respon.status==1){
                        $("#modal-proses").modal('hide');
                        notify_success(respon.pesan);
                    }else{
                        $("#modal-proses").modal('hide');
                        $('#form-pesan-kecermatan-simpan').html(pesan_err(respon.pesan));
                    }
                },error: function(xmlhttprequest, textstatus, message) {
                        if(textstatus==="timeout") {
                            $("#modal-proses").modal('hide');
                            notify_error("Gagal menyimpan Jawaban, Silahkan Refresh Halaman");
                        }else{
                            $("#modal-proses").modal('hide');
                            notify_error(textstatus);
                        }
                    }
            });
        });
        $('#btn-image-insert').click(function(){
            var image = $('#image-isi').val();
            CKEDITOR.instances.tambah_jawaban.insertHtml(image);
            $("#modal-image").modal("hide");
        });

        $('#btn-tambah-batal').click(function(){
            batal_tambah();
        });

        /**
         * Submit form tambah soal
         */
        $('#form-tambah').submit(function(){
            $('#tambah-jawaban').val(CKEDITOR.instances.tambah_jawaban.getData());
            $("#modal-proses").modal('show');
            $.ajax({
                    url:"<?php echo site_url().'/'.$url; ?>/tambah",
                    type:"POST",
                    timeout: 60000,
                    data:$('#form-tambah').serialize(),
                    cache: false,
                    success:function(respon){
                        var obj = $.parseJSON(respon);
                        if(obj.status==1){
                            refresh_table();
                            $("#modal-proses").modal('hide');
                            batal_tambah();
                            notify_success(obj.pesan);
                        }else{
                            $("#modal-proses").modal('hide');
                            $('#form-pesan').html(pesan_err(obj.pesan));
                        }
                    },
                    error: function(xmlhttprequest, textstatus, message) {
                        if(textstatus==="timeout") {
                            $("#modal-proses").modal('hide');
                            notify_error("Gagal menyimpan Jawaban, Silahkan Refresh Halaman");
                        }else{
                            $("#modal-proses").modal('hide');
                            notify_error(textstatus);
                        }
                    }
            });
            return false;
        });

        /**
         * Submit form hapus soal
         */
        $('#form-hapus-jawaban').submit(function(){
            $("#modal-proses").modal('show');
            $.ajax({
                    url:"<?php echo site_url().'/'.$url; ?>/hapus_jawaban",
                    type:"POST",
                    data:$('#form-hapus-jawaban').serialize(),
                    cache: false,
                    success:function(respon){
                        var obj = $.parseJSON(respon);
                        if(obj.status==1){
                            refresh_table();
                            $("#modal-proses").modal('hide');
                            $("#form-pesan-hapus").html('');
                            $("#modal-hapus-jawaban").modal('hide');
                            notify_success(obj.pesan);
                        }else{
                            $("#modal-proses").modal('hide');
                            $('#form-pesan-hapus').html(pesan_err(obj.pesan));
                        }
                    }
            });
            return false;
        });

        /**
         * Submit form upload pada image browser
         */
        $('#form-upload-image').submit(function(){
            $('#image-topik-id').val($('#topik').val());
            $("#modal-proses").modal('show');
            $.ajax({
                    url:"<?php echo site_url().'/'.$url; ?>/upload_file",
                    type:"POST",
                    data:new FormData(this),
                    mimeType: "multipart/form-data",
                    contentType:false,
                    cache: false,
                    processData: false,
                    success:function(respon){
                        var obj = $.parseJSON(respon);
                        if(obj.status==1){
                            refresh_table();
                            $('#image-preview').html(obj.image);
                            $('#image-isi').val(obj.image_isi);
                            $('#box-preview').removeClass('hide');
                            $("#modal-proses").modal('hide');
                            $("#form-pesan-upload-image").html('');
                            $('#image-file').val('');
                            refresh_table_image();
                            notify_success(obj.pesan);
                        }else{
                            $("#modal-proses").modal('hide');
                            $('#form-pesan-upload-image').html(pesan_err(obj.pesan));
                        }
                    }
            });
            return false;
        });
		 
		$( document ).ready(function() {
            $('#table-jawaban').DataTable({
                  "bPaginate": true,
                  "bProcessing": false,
                  "bServerSide": true, 
                  "searching": true,
                  "aoColumns": [
                        {"bSearchable": false, "bSortable": false, "sWidth":"20px"},
                        {"bSearchable": false, "bSortable": false},
                        {"bSearchable": false, "bSortable": false, "sWidth":"90px"},
                        {"bSearchable": false, "bSortable": false, "sWidth":"50px"}],
                  "sAjaxSource": "<?php echo site_url().'/'.$url; ?>/get_datatable/",
                  "autoWidth": false,
                  "fnServerParams": function ( aoData ) {
                    aoData.push( { "name": "soal", "value": $('#tambah-soal-id').val()} );
                  }
            });
            $('#table-image').DataTable({
                  "bPaginate": false,
                  "bProcessing": false,
                  "bServerSide": true, 
                  "searching": false,
                  "aoColumns": [
                        {"bSearchable": false, "bSortable": false, "sWidth":"20px"},
                        {"bSearchable": false, "bSortable": false},
                        {"bSearchable": false, "bSortable": false, "sWidth":"100px"},
                        {"bSearchable": false, "bSortable": false, "sWidth":"90px"},
                        {"bSearchable": false, "bSortable": false, "sWidth":"50px"}],
                  "sAjaxSource": "<?php echo site_url().'/'.$url; ?>/get_datatable_image/",
                  "autoWidth": false,
                  "fnServerParams": function ( aoData ) {
                    aoData.push( { "name": "topik", "value": $('#topik').val()} );
                  }
            });

            CKEDITOR.replace('tambah_jawaban');

            <?php if(!empty($data_jawaban)){ echo $data_jawaban; } ?>
		});
    });
</script>