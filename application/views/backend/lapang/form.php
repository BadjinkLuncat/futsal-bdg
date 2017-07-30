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
    /*.remove-img-preview{
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
    }*/
    /*.img-preview{
        margin:15px;
        height:0px;
    }*/
    #floating-panel {
        position: absolute;
        /*top: 10px;*/
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
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
                <label>Nama Lapang</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $lapang->nama ? $lapang->nama : '' ?>">
              </div> 
              <div class="form-group">
                <label >Alamat</label>
                <textarea class="form-control" name="alamat" ><?php echo $lapang->alamat ? $lapang->alamat : '' ?></textarea>
              </div>
              <div class="form-group">
                <label >No. Telepon</label>
                <input  type="text" name="telepon" class="form-control" value="<?php echo $lapang->telepon ? $lapang->telepon : '' ?>">
              </div>
              <div class="form-group">
                <label >No. HP</label>
                <input type="text" name="hp" class="form-control" value="<?php echo $lapang->hp ? $lapang->hp : '' ?>">
              </div>
              <div class="form-group">
                <label >E-Mail</label>
                <input type="mail" name="email" class="form-control" value="<?php echo $lapang->email ? $lapang->email : '' ?>">
              </div>
              <div class="form-group">
                <label >Jam Buka</label>
                <input type="text" name="buka" class="form-control" value="<?php echo $lapang->buka ? $lapang->buka : '' ?>">
              </div>
              <div class="form-group">
                <label >Jam Tutup</label>
                <input type="text" name="tutup" class="form-control" value="<?php echo $lapang->tutup ? $lapang->tutup : '' ?>">
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
                          <img class="img-responsive img-thumbnail img-rounded" src="<?php echo base_url('assets/uploads/') ?><?php echo $lapang->gambar ? $lapang->gambar : 'noimage.gif' ?>">
                        </div>
                      </div>
                </div>
              </div>
              <div class="form-group">
                <label >Peta Lapang</label>
                <input type="hidden" id="lat_long" name="lat_long">
                <div id="floating-panel">
                  <input id="address" type="text" value="Indonesia">
                  <input id="submit" type="button" class="btn btn-primary btn-sm" value="Search">
                </div>
                <input type="hidden" id="latitude" value="<?php echo $peta[0]?>">
                <input type="hidden" id="longitude" value="<?php echo $peta[1]?>">
                <section class="field-map" style="height: 300px;width: 100%;" id="field-map">
                </section>
              </div>
                
            </div>
          </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
          <a href="<?php echo base_url('admin/lapang')?>" class="btn btn-primary pull-left">Back</a>
          <button type="submit" class="btn btn-primary pull-right">Save</button>
        </div>
      </form>
    </div>
    <!-- /.box-body -->
  </div>
</section><!-- /.content -->


<?php
$this->load->view('backend/template/js');
?>

<script async defer src ="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuFr8ruixp-T6l2wSB1tYRunNVM6ik7hs&callback=initMap"></script>
<script type="text/javascript">
    var map, marker, infoWindow;
    function initMap() {
        var latitude=Number(document.getElementById('latitude').value);
        var longitude=Number(document.getElementById('longitude').value);
        var uluru = {lat:latitude , lng: longitude};
        map = new google.maps.Map(document.getElementById('field-map'), {
          zoom: 4,
          center: uluru
        });

        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });

        // infoWindow = new google.maps.InfoWindow;
        // if (navigator.geolocation) {
        //   navigator.geolocation.getCurrentPosition(function(position) {
        //     var pos = {
        //       lat: position.coords.latitude,
        //       lng: position.coords.longitude
        //     };
        //     map.setCenter(pos);
        //     var marker = new google.maps.Marker({
        //       position: pos,
        //       map: map
        //     });
        //   });
        // } else {
        //   // Browser doesn't support Geolocation
        //   handleLocationError(false, infoWindow, map.getCenter());
        // }

        var geocoder = new google.maps.Geocoder();

        document.getElementById('submit').addEventListener('click', function() {
          geocodeAddress(geocoder, map);
        });
    }
    function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            document.getElementById('lat_long').value=results[0].geometry.location.lat()+','+results[0].geometry.location.lng();
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
  </script>
<script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>" type="text/javascript"></script>
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
  </script>
    
    
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
<!-- iCheck -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/iCheck/icheck.min.js') ?>" type="text/javascript"></script>

<?php
$this->load->view('backend/template/foot');
?>