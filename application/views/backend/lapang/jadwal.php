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
<link href="<?php echo base_url('assets/plugins/bootstrap-datepicker-master/dist/css/bootstrap-datepicker.css')?>" rel="stylesheet">
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
  #table-lapang tr th{
    padding: 5px 15px;
  }
</style>
<?php
$this->load->view('backend/template/topbar');
$this->load->view('backend/template/sidebar');
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Lapang<small>Detail</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li > <a href="<?php echo base_url('admin/lapang')?>">Lapang</a></li>
        <li class="detail">Jadwal</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
        <form method="post" action="<?php echo base_url('admin/lapang/detail/jadwal').'/'.$lapang->id ?>">
          <div class="form-group col-md-12 col-xs-12">
            <label class="control-label">Tanggal</label>
          </div>
          <div class="form-group col-md-4 col-xs-12">
            <input type="text" name="tanggal" class="form-control" id="datetimepicker" value="<?php echo $tanggal ?>">
          </div> 
          <div class="form-group col-md-6 col-xs-12">
            <button class="btn btn-default">Cari</button>  
          </div>
        </form>
      <?php if (count($jadwal)<1) { ?>
        <h4 class="text-center">Maaf Tidak Tersedia</h4>
      <?php  } ?>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Jam</th>
              <th>Status</th>
              <th>PIlihan</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($jadwal as $k => $val) { ?>
            <tr>
              <td><?php echo $val['number'] ?></td>
              <td><?php echo $val['jam'] ?></td>
              <td><?php echo $val['status'] ?></td>
              <td>
                <?php if ($val['status']=='Kosong'){ ?>
                  <form action="<?php echo base_url('booking') ?>" method="post">
                    <input type="hidden" name="id_lapang" value="<?php echo $val['detail_id'] ?>">
                    <input type="hidden" name="jam" value="<?php echo $val['jam'] ?>">
                    <input type="hidden" name="tanggal_reservasi" value="<?php echo $val['tanggal_reservasi'] ?>">
                    <input type="submit" class="btn btn-info btn-xs" name="pesan" value="Pesan">
                  </form>
                <?php } ?>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="box-footer">
      <a href="<?php echo base_url('admin/lapang') ?>" class="btn btn-default btn-sm pull-left"><i class="fa fa-chevron-left"> </i> Kembali</a>
            <a href="<?php echo base_url('admin/lapang/detail/edit').'/'.$lapang->id ?>" class="btn btn-danger btn-sm pull-right"><i class="fa fa-edit"> </i> Edit</a>
    </div>
    <!-- /.box-body -->
  </div>
</section><!-- /.content -->


<?php
$this->load->view('backend/template/js');
?>

<!--tambahkan custom js disini-->
<!-- jQuery UI 1.11.2 -->
<script>
        function makeFileList(event){
            var input = document.getElementById('imageUpload');
            var imagePreview = document.getElementById('image_preview');
            if (input.files && input.files.length) {
                for (var x = 0; x < input.files.length; x++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $(imagePreview).append('<div class="col-md-4 col-xs-6 col-preview"><div class="remove-img-preview" onclick="removePreview()"></div><div class="img-preview"><img class="img-responsive img-thumbnail img-rounded" src="'+event.target.result+'"></div></div>');
                    }
                    reader.readAsDataURL(input.files[x]);
                }
            }
        }
    </script>
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
<script src="<?php echo base_url('assets/plugins/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.js')?>"></script>
<script>
  $(function () {
    var currentDate= new Date();
        $('#datetimepicker').datepicker({
            todayBtn: true,
            clearBtn: true,
            language: "id",
            format: "yyyy-mm-dd",
            minDate: currentDate,
            autoclose: true,
            todayHighlight: true,
            toggleActive: true
        });
    $('#example1').DataTable();
  })
</script>
<?php
$this->load->view('backend/template/foot');
?>