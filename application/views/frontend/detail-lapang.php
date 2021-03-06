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
  <link href="<?php echo base_url('assets/plugins/bootstrap-datepicker-master/dist/css/bootstrap-datepicker.css')?>" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="https://use.fontawesome.com/9e83980da6.js"></script>

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
            <li  class="active"><a href="<?php echo base_url('artikel') ?>">Artikel</a></li>
            <li><a href="<?php echo base_url('cara-booking') ?>">CARA BOOKING</a></li>
            <li><a href="<?php echo base_url('keranjang-booking') ?>">KERANJANG BOOKING</a></li>
            <li><a href="<?php echo base_url('kontak-kami') ?>">KONTAK KAMI</a></li>
            <li><a href="<?php echo base_url('konfirmasi-pembayaran') ?>">KONFIRMASI PEMBAYARAN</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#search"><i class="fa fa-search" aria-hidden="true"></i></a></li>
            <?php if(!$login) { ?>
              <li class="dropdown grey">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sign-in" aria-hidden="true"> </i> Login <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li class="box-login">
                    <h4>LOGIN</h4>
                    <form method="post" action="<?php echo base_url('auth/login') ?>">
                      <div class="form-group">
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Remember me?
                        </label>
                      </div>
                      <button type="submit" class="btn btn-default pull-right">Login</button>
                      <a href="<?php echo base_url('auth/register') ?>" class="btn btn-default pull-left">Register</a>
                    </form>
                  </li>
                </ul>
              </li>
            <?php } else { ?>
              <li><a href="<?php echo base_url('auth/logout') ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout </a></li>
            <?php } ?>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  </div>

  <!-- SEARCHBOX -->
  <div id="search">
    <button type="button" class="close">×</button>
    <form action="<?php echo base_url('cari-lapang') ?>" method="post">
        <input type="search" autocomplete="off" value="" name="cari"  placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
  </div>

  <!-- CONTENT2 -->
  <section class="content2">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="box-news">
            <div class="list-article-big">
              <div class="span-18 last" style="padding-top:10px">    
                <h3><?php echo $lapang->nama ?></h3>
                <p style="text-align: justify;"><?php echo $lapang->alamat ?></p>
                <p style="text-align: justify;"><?php echo $lapang->telepon ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <input type="hidden" id="latitude" value="<?php echo $peta[0]?>">
          <input type="hidden" id="longitude" value="<?php echo $peta[1]?>">
          <section class="field-map" style="height: 300px;width: 100%;" id="field-map">
          </section>
        </div>
        
        <div class="col-md-12"> 
          <hr>
          <div class="col-md-12">
            <form method="post" action="<?php echo base_url('lapang').'/'.$lapang->id ?>">
              <div class="form-group col-md-12 col-xs-12">
                <label class="control-label">Tanggal</label>
              </div>
              <div class="form-group col-md-6 col-xs-12">
                <input type="text" name="tanggal" class="form-control" id="datetimepicker" value="<?php echo $tanggal ?>">  
              </div>
              <div class="form-group col-md-6 col-xs-12">
                <button class="btn btn-default">Cari</button>  
              </div>
            </form>
          </div>
          <?php if (count($jadwal)<1) { ?>
            <h4 class="text-center">Maaf Tidak Tersedia</h4>
          <?php  } ?>
          <?php foreach ($jadwal as $key => $value) { ?>
            <div class="col-md-6 col-xs-12">
              <h4 style="text-align: center;"> Lapang <?php echo $key+1 ?></h4>
              <h4 style="text-align: center;"> Harga : Rp <?php echo $detail_lapang[$key]->harga ?></h4>
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
                  <?php foreach ($value as $k => $val) { ?>
                    <tr>
                      <td><?php echo $val['number'] ?></td>
                      <td><?php echo $val['jam'] ?></td>
                      <td><?php echo $val['status'] ?></td>
                      <td>
                        <?php if ($val['status']=='Kosong'){ ?>
                          <form action="<?php echo base_url('booking') ?>" method="post">
                            <input type="hidden" name="id_lapang" value="<?php echo $val['detail_id'] ?>">
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
          <?php } ?>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <div class="row">
      <div class="col-md-6 col-md-offset-3 text-center">
      </div>
      
    </div>
  </footer>
  <!-- jQuery Version 1.11.1 -->
  <script src="<?php echo base_url('assets/frontend/js/jquery.js')?>"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="<?php echo base_url('assets/frontend/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/plugins/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.js')?>"></script>
  <script async defer src ="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuFr8ruixp-T6l2wSB1tYRunNVM6ik7hs&callback=initMap"></script>
  <script type="text/javascript">
    function initMap() {
        var latitude=Number(document.getElementById('latitude').value);
        var longitude=Number(document.getElementById('longitude').value);
        var uluru = {lat:latitude , lng: longitude};
        var map = new google.maps.Map(document.getElementById('field-map'), {
          zoom: 6,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          content:'sd',
          map: map
        });
    }
  </script>
   <script type="text/javascript">
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
        $('a[href="#search"]').on('click', function(event) {
            event.preventDefault();
            $('#search').addClass('open');
            $('#search > form > input[type="search"]').focus();
        });
        
        $('#search, #search button.close').on('click keyup', function(event) {
            if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
                $(this).removeClass('open');
            }
        });
    });
  </script>

</body>

</html>
