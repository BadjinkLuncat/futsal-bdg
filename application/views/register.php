<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Futsal Booking</title>

  <!-- Bootstrap Core CSS -->
  <link href="<?php echo base_url('assets/frontend/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/frontend/css/style.css') ?>" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="https://use.fontawesome.com/9e83980da6.js"></script>
  <style type="text/css">
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

</head>

<body>
  <div class="header">
    <div class="container">
      <div class="row">
      </div>
    </div>
  </div>

  <!-- NAVIGATION -->
  <div class="container">
    <nav class="navbar navbar-default navbar-red">
      <div class="container-fluid nopadding">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse nopadding" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url('/') ?>">BERANDA <span class="sr-only">(current)</span></a></li>
            <li><a href="<?php echo base_url('tentang-kami') ?>">TENTANG KAMI</a></li>
            <li><a href="<?php echo base_url('cara-booking') ?>">CARA BOOKING</a></li>
            <li><a href="<?php echo base_url('keranjang-booking') ?>">KERANJANG BOOKING</a></li>
            <li><a href="<?php echo base_url('kontak-kami') ?>">KONTAK KAMI</a></li>
            <li><a href="<?php echo base_url('konfirmasi-pembayaran') ?>">KONFIRMASI PEMBAYARAN</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#search"><i class="fa fa-search" aria-hidden="true"></i></a></li>
            <li class="dropdown grey">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><strong>Login</strong> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="box-login">
                  <h4>LOGIN</h4>
                  <form>
                    <div class="form-group">
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Remember me?
                      </label>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  </div>
  <!-- CONTENT -->
  <section class="content">
    <div class="container">
      <form action="<?php echo base_url('owner/register/create') ?>" method="post" enctype="multipart/form-data">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#user">Registrasi User</a></li>
          <li><a data-toggle="tab" href="#field">Registrasi Lapang</a></li>
        </ul>

        <div class="tab-content" style="padding: 15px">
            <div id="user" class="tab-pane fade in active">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>E-Mail</label>
                      <input type="text" name="email" class="form-control" placeholder="E-Mail" >
                    </div>
                    <div class="form-group">
                      <label >Password</label>
                      <input type="text" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label >Nama</label>
                      <input type="text" name="nama" class="form-control" placeholder="Nama Belakang" >
                    </div>
                    <div class="form-group">
                      <label >Nomor Handphone</label>
                      <input  type="text" name="telepon" class="form-control" placeholder="Nomor Handphone">
                    </div>
                  </div>
                </div>
              </div><!-- /.box-body -->
              <div class="box-footer" style="margin-bottom: 35px">
                <a data-toggle="tab" href="#field" class="btn btn-primary pull-right">Lanjutkan</a>
              </div>
            </div>
            <div id="field" class="tab-pane fade">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="field_nama" class="form-control" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                      <label >Nomor Telepon</label>
                      <input  type="text" name="field_telepon" class="form-control" placeholder="Enter Phone Number">
                    </div>
                    <div class="form-group">
                      <label >Nomor Handphone</label>
                      <input type="text" name="field_hp" class="form-control" placeholder="Enter Mobile Number">
                    </div>
                    <div class="form-group">
                      <label >E-Mail</label>
                      <input type="mail" name="field_email" class="form-control" placeholder="Enter E-Mail">
                    </div>
                    <div class="form-group">
                      <label >Jam Buka</label>
                      <input type="text" name="field_buka" class="form-control" placeholder="Enter E-Mail">
                    </div>
                    <div class="form-group">
                      <label >Jam Tutup</label>
                      <input type="text" name="field_tutup" class="form-control" placeholder="Enter E-Mail">
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
                    <div class="form-group">
                      <label >Alamat</label>
                      <input class="form-control" name="field_alamat" type="text"></textarea>
                    </div>
                    <div class="form-group">
                      <input type="hidden" id="location" name="location">
                      <div id="floating-panel">
                        <input id="address" type="text" value="Bandung">
                        <input id="submit" type="button" class="btn btn-primary btn-sm" value="Search">
                      </div>
                      <section id="field-map" style="width:100%;height:300px"></section>
                    </div>
                  </div>
                </div>
              </div><!-- /.box-body -->
              <div class="box-footer" style="margin-bottom: 35px">
                <a <a data-toggle="tab" href="#user" class="btn btn-primary pull-left" class="btn btn-primary pull-left">Back</a>
                <input type="submit" class="btn btn-primary pull-right" value="Simpan">
              </div>
            </div>
        </div>
      </form>
    </div>
  </section>

<footer>
    <div class="row">
      <div class="col-md-6 col-md-offset-3 text-center">
        <p class="social">
          <a href=""><img src="<?php echo base_url('assets/frontend/img/fb.png') ?>"></a>
          <a href=""><img src="<?php echo base_url('assets/frontend/img/ig.png') ?>"></a>
          <a href=""><img src="<?php echo base_url('assets/frontend/img/twit.png') ?>"></a>
        </p>
        <p class="white">
          Duis cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, 
          sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
      </div>
      
    </div>
  </footer>
<script async defer src ="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuFr8ruixp-T6l2wSB1tYRunNVM6ik7hs&callback=initMap"></script>
<script type="text/javascript">
    var map, marker, infoWindow;
    function initMap() {
        var uluru = {lat: -0.789275, lng: 113.92132700000002};
        map = new google.maps.Map(document.getElementById('field-map'), {
          zoom: 4,
          center: uluru
        });

        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });

        infoWindow = new google.maps.InfoWindow;
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            map.setCenter(pos);
            var marker = new google.maps.Marker({
              position: pos,
              map: map
            });
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }

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
            document.getElementById('location').value=results[0].geometry.location.lat()+','+results[0].geometry.location.lng();
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
  <!-- jQuery Version 1.11.1 -->
  <script src="<?php echo base_url('assets/frontend/js/jquery.js')?>"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="<?php echo base_url('assets/frontend/js/bootstrap.min.js')?>"></script>
</body>

</html>
