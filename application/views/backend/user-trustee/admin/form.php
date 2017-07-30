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

<?php
$this->load->view('backend/template/topbar');
$this->load->view('backend/template/sidebar');
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
      <div class="box-header">
      </div>
      <!-- /.box-header -->
      <form role="form" multipart="<?php echo $form['form_multipart'] ?>" id="<?php echo $form['form_id'] ?>" name="<?php echo $form['form_name'] ?>" action="<?php echo $form['form_action']; ?>" method="<?php echo $form['form_method'] ?>">
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>E-Mail</label>
                <input type="text" name="email" class="form-control" placeholder="E-Mail" value="<?php echo $data['email'] ?>">
              </div>
              <div class="form-group">
                <label >Password</label>
                <input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo $data['password'] ?>">
              </div>
              <div class="form-group">
                <label >Nama Admin</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Depan" value="<?php echo $data['nama'] ?>" >
              </div>
              <div class="form-group">
                <label >Nomor Handphone</label>
                <input  type="text" name="telepon" class="form-control" placeholder="Nomor Handphone" value="<?php echo $data['telepon'] ?>" >
              </div>
            </div><!--/.col (left) -->
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label" > Logo</label>
                <input type="file" name="image" class="form-control" id="imageUpload" onchange="makeFileList()">
              </div>
              <div class="form-group has-error">
                <div id="image_preview" class='row'>
                  <div class="col-md-4 col-xs-6 col-preview">
                      <div class="remove-img-preview" onclick="removePreview()"></div>
                        <div class="img-preview">
                          <img class="img-responsive img-thumbnail img-rounded" src="<?php echo base_url('assets/images/noimage.gif') ?>">
                        </div>
                      </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
          <a href="<?php echo base_url('backend/user-trustee/admin')?>" class="btn btn-primary pull-left">Back</a>
          <button type="submit" class="btn btn-primary pull-right">Save</button>
        </div>
      </form>
    </div>
</section>


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
<script>
  $(function () {
    $('#example1').DataTable();
  })
</script>
<?php
$this->load->view('backend/template/foot');
?>