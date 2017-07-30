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
  #table-detail tr th{
    padding: 5px 15px;
  }
</style>

<?php
$this->load->view('backend/template/topbar');
$this->load->view('backend/template/sidebar');
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Reservasi
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li >Reservasi</li>
        <li class="active">Detail</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <?php 
          if ($reservasi->status==0){
            $hideKonfirmasi='';
            $hideLunas='';
            $status='Belum ada konfirmasi';
          }else if ($reservasi->status==1){
            $hideKonfirmasi='hide';
            $hideLunas='';
            $status='Konfirmasi';
          }else if ($reservasi->status==2){
            $hideKonfirmasi='hide';
            $hideLunas='';
            $status='DP dibayar';
          }else{
            $hideKonfirmasi='hide';
            $hideLunas='hide';
            $status='Lunas';
          }
          $urlEdit=base_url('admin/reservasi/konfirmasi').'/'.$reservasi->id;
          $urlDelete=base_url('admin/reservasi/lunas').'/'.$reservasi->id;
          $urlDetail=base_url('admin/reservasi/detail').'/'.$reservasi->id;
          $image='noimage.gif';
          if ($reservasi->gambar){
            $image =$reservasi->gambar;
          } 
        ?>
        <div class="box-header">
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-5">
              <table id="table-detail">
                <tr>
                  <th>Kode Reservasi</th>
                  <td> : <?php echo $reservasi->kode_reservasi ?></td>
                </tr>
                <tr>
                  <th>Tanggal Reservasi </th>
                  <td> : <?php echo $reservasi->tanggal_reservasi ?></td>
                </tr>
                <tr>
                  <th>Nama </th>
                  <td> : <?php echo $reservasi->nama_user ?></td>
                </tr>
                <tr>
                  <th>Status</th>
                  <td> : <?php echo $status ?></td>
                </tr>
              </table>
            </div>
            <div class="col-md-7">
              <h4>Bukti Transfer Uang Muka</h4>
              <img src="<?php echo base_url('assets/uploads/').$image ?>" class="img-responsive img-rounded">
            </div>
          </div>
        </div>
        <div class="box-footer">
          <a href="<?php echo base_url('admin/reservasi') ?>" class="btn btn-sm btn-default pull-left"><i class="fa fa-chevron-left"></i> Kembali</a>&nbsp;
          <a href="<?php echo $urlEdit ?>" class="btn btn-sm btn-warning pull-right <?php echo $hideKonfirmasi?>"><i class=""></i> Konfirmasi</a>&nbsp;
          <a href="<?php echo $urlDelete ?>" class="btn btn-sm btn-success pull-right  <?php echo $hideLunas?>"><i class=""></i> Lunas</a>
        </div>
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
<script>
  $(function () {
    $('#example1').DataTable();
  })
</script>
<?php
$this->load->view('backend/template/foot');
?>