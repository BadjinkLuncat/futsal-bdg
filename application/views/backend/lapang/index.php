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
    <h1>
        Lapang
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Lapang</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <!-- <h3 class="box-title">Field</h3> -->
      <!-- <a href="<?php echo base_url('admin/lapang/create') ?>" class="btn btn-info btn-sm btn-md"><i class="fa fa-plus"> Add Field</i></a> -->
    </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-5">
            <table id="table-lapang">
              <tr>
                <th>Nama Lapang</th>
                <td> : <?php echo $lapang->nama ?></td>
              </tr>
              <tr>
                <th>Alamat </th>
                <td> : <?php echo $lapang->alamat ?></td>
              </tr>
              <tr>
                <th>No Telepon</th>
                <td> : <?php echo $lapang->telepon ?></td>
              </tr>
              <tr>
                <th>Email</th>
                <td> : <?php echo $lapang->email ?></td>
              </tr>
            </table>
          </div>
          <div class="col-md-7">
            <a href="<?php echo base_url('admin/lapang/edit') ?>" class="btn btn-danger btn-sm pull-right"><i class="fa fa-edit"> </i> Edit</a>
            <input type="hidden" id="latitude" value="<?php echo $peta[0]?>">
            <input type="hidden" id="longitude" value="<?php echo $peta[1]?>">
            <section class="field-map" style="height: 300px;width: 100%;" id="field-map">
            </section>
          </div>
        </div>
        <hr>
        <div class="box-header">
          <h3>Data Lapang</h3>
          <a href="<?php echo base_url('admin/lapang/detail/tambah/') .$lapang->id?>" class="btn btn-default btn-sm pull-right"><i class="fa fa-plus"> </i> Tambah Lapang</a>
        </div>

        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Lapang</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Pilihan</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $number=1;
                foreach ($data as $key => $value) {
                  $no=$number++;
                  if ($value->tipe=1){
                    $tipe='Sintetis';
                  }
                  else if ($value->tipe=2){
                    $tipe='Karet';
                  }else{
                    $tipe='Biasa';
                  }
                ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $value->nama;?></td>
                  <td><?php echo $tipe;?></td>
                  <td><?php echo $value->harga;?></td>
                  <td><?php echo $value->deskripsi;?></td>
                  <td><a href="<?php echo base_url('admin/lapang/detail').'/'.$value->id ?>" class="btn btn-sm btn-info"><i class="fa fa-search"> </i> Detail</a> &nbsp;<a href="<?php echo base_url('admin/lapang/detail/jadwal').'/'.$value->id ?>" class="btn btn-sm btn-primary"><i class="fa fa-calendar"> </i> Jadwal</a> &nbsp; <a href="<?php echo base_url('admin/lapang/detail/edit').'/'.$value->id ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"> </i> Edit</a>&nbsp; <a href="<?php echo base_url('admin/lapang/detail/delete').'/'.$value->id ?>" class="btn btn-sm btn-danger"><i class="fa fa-edit"> </i> Hapus</a></td>
                </tr>
              <?php  }?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

</section><!-- /.content -->


<?php
$this->load->view('backend/template/js');
?>
<script async defer src ="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuFr8ruixp-T6l2wSB1tYRunNVM6ik7hs&callback=initMap"></script>
  <script type="text/javascript">
    function initMap() {
        var latitude=Number(document.getElementById('latitude').value);
        var longitude=Number(document.getElementById('longitude').value);
        var uluru = {lat:latitude , lng: longitude};
        var map = new google.maps.Map(document.getElementById('field-map'), {
          zoom: 16,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
    }
  </script>
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