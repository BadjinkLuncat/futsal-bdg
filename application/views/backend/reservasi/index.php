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
        Reservasi
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Reservasi</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Reservasi</th>
                  <th>Tanggal</th>
                  <th>Nama</th>
                  <th>Durasi</th>
                  <th>Status</th>
                  <th>Pilihan</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  $number=1;
                  foreach ($data as $key => $value) {
                    $no=$number++;
                    $kode_reservasi=$value->kode_reservasi;
                    $tanggal=$value->tanggal_reservasi;
                    $nama=$value->nama_user;
                    $durasi=$value->durasi;
                    if ($value->status==0){
                      $hideKonfirmasi='';
                      $hideLunas='';
                      $status='Belum ada konfirmasi';
                    }else if ($value->status==1){
                      $hideKonfirmasi='';
                      $hideLunas='';
                      $status='Konfirmasi';
                    }else if ($value->status==2){
                      $hideKonfirmasi='hide';
                      $hideLunas='';
                      $status='DP dibayar';
                    }else{
                      $hideKonfirmasi='hide';
                      $hideLunas='hide';
                      $status='Lunas';
                    }
                    $urlEdit=base_url('admin/reservasi/konfirmasi').'/'.$value->id;
                    $urlDelete=base_url('admin/reservasi/lunas').'/'.$value->id;
                    $urlDetail=base_url('admin/reservasi/detail').'/'.$value->id;
                ?>
                    <tr>
                      <td><?php echo $no;?></td>
                      <td><?php echo $kode_reservasi;?></td>
                      <td><?php echo $tanggal;?></td>
                      <td><?php echo $nama;?></td>
                      <td><?php echo $durasi;?></td>
                      <td><?php echo $status;?></td>
                      <td><a href="<?php echo $urlDetail ?>" class="btn btn-sm btn-info"><i class="fa fa-search"></i> Detail</a>&nbsp;<a href="<?php echo $urlEdit ?>" class="btn btn-sm btn-warning <?php echo $hideKonfirmasi?>"><i class=""></i> Konfirmasi</a>&nbsp;<a href="<?php echo $urlDelete ?>" class="btn btn-sm btn-success <?php echo $hideLunas?>"><i class=""></i> Lunas</a></td>
                    </tr>
                <?php  }?>
                </tbody>
              </table>
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
<script>
  $(function () {
    $('#example1').DataTable();
  })
</script>
<?php
$this->load->view('backend/template/foot');
?>