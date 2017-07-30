<?php
$this->load->view('backend/template/head');
?>

<!--tambahkan custom css disini-->
<!-- iCheck -->
<link href="<?php echo base_url('assets/AdminLTE/plugins/iCheck/flat/blue.css') ?>" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="<?php echo base_url('assets/AdminLTE/plugins/morris/morris.css') ?>" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="<?php echo base_url('assets/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.css') ?>" rel="stylesheet" type="text/css" />
<!-- Date Picker -->
<link href="<?php echo base_url('assets/AdminLTE/plugins/datepicker/datepicker3.css') ?>" rel="stylesheet" type="text/css" />
<!-- Daterange picker -->
<link href="<?php echo base_url('assets/AdminLTE/plugins/daterangepicker/daterangepicker-bs3.css') ?>" rel="stylesheet" type="text/css" />
<!-- bootstrap wysihtml5 - text editor -->
<link href="<?php echo base_url('assets/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/AdminLTE/plugins/datatables/dataTables.bootstrap.css') ?>" rel="stylesheet" type="text/css" />
<style type="text/css">
    .remove-img-preview{
        background-image: url('../../storage/images/icon/remove-red.png') ;
        background-position: center;
        background-repeat: no-repeat;
        background-size: 100%;
        float: right;
        right: 15px;
        top: 0px;
        position: absolute;
        z-index: 999;
        width:35px;
        height: 35px;
    }
    .img-preview{
        margin:15px;
        height:250px;
    }
</style>
<?php
$this->load->view('backend/template/topbar');
$this->load->view('backend/template/sidebar');
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Field
        <small>New Field</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li >Field</li>
        <li class="active">New</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <form role="form" enctype="multipart/form-data" id="<?php echo $form_id ?>" name="<?php echo $form_name ?>" action="<?php echo $form_action; ?>" method="<?php echo $form_method; ?>">
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Lapang</label>
                <input name="nama" class="form-control" value="<?php echo $nama ?>">
              </div>
              <div class="form-group">
                <label>Jenis Lapang</label>
                <select class="form-control" required>
                  <option value="1" selected >Sintetis</option>
                  <option value="2">Karet</option>
                  <option value="3">Lantai </option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi"><?php echo $deskripsi ?></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Harga</label>
                <input type="text" required class="form-control" name="harga" required value="<?php echo $harga ?>">
              </div>
            </div><!--/.col (left) -->
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label" > Image</label>
                <input type="file" name="image" class="form-control" id="imageUpload" multiple onchange="makeFileList()">
              </div>
              <div class="form-group has-error">
                <div class="form-group has-error">
                <div id="image_preview" class='row'>
                  <div class="col-md-4 col-xs-6 col-preview">
                      <div class="remove-img-preview" onclick="removePreview()"></div>
                        <div class="img-preview">
                          <img class="img-responsive img-thumbnail img-rounded" src="<?php echo base_url('assets/uploads/') ?><?php echo $gambar ? $gambar : 'noimage.gif' ?>">
                        </div>
                      </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
          <a href="<?php echo base_url('admin/lapang')?>" class="btn btn-default pull-left"><i class="fa fa-chevron-left"> </i> Kembali</a>
          <button type="submit" class="btn btn-primary pull-right">Simpan <i class="fa fa-chevron-right"> </i></button>
        </div>
      </form>
    </div>
    <!-- /.box-body -->
  </div>
</section><!-- /.content -->


<?php
$this->load->view('backend/template/js');
?>

<!--tambahkan custom js disini-->
<!-- jQuery UI 1.11.2 -->
<script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>" type="text/javascript"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('assets/js/raphael-min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE/plugins/morris/morris.min.js') ?>" type="text/javascript"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/sparkline/jquery.sparkline.min.js') ?>" type="text/javascript"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/knob/jquery.knob.js') ?>" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/daterangepicker/daterangepicker.js') ?>" type="text/javascript"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/datepicker/bootstrap-datepicker.js') ?>" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/iCheck/icheck.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/AdminLTE/plugins/datatables/jquery.dataTables.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/AdminLTE/plugins/datatables/dataTables.bootstrap.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/AdminLTE/plugins/ckeditor/ckeditor.js') ?>"></script>
<script>
  function makeFileList(event){
      var input = document.getElementById('imageUpload');
      var imagePreview = document.getElementById('image_preview');
      if (input.files && input.files.length) {
          $('#image_preview img').addClass('hide');
          for (var x = 0; x < input.files.length; x++) {
              var reader = new FileReader();
              reader.onload = function(event) {
                  $(imagePreview).append('<div class="col-md-4 col-xs-6 col-preview"><div class="remove-img-preview" onclick="removePreview()"></div><div class="img-preview"><img class="img-responsive img-thumbnail img-rounded" src="'+event.target.result+'"></div></div>');
              }
              reader.readAsDataURL(input.files[x]);
          }
      }
  }
  $(function () {
    CKEDITOR.replace('deskripsi')
  })
</script>
<?php
$this->load->view('backend/template/foot');
?>