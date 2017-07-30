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
  <!-- Important Owl stylesheet -->
  <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/owl.carousel.css') ?>">
  <!-- Default Theme -->
  <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/owl.theme.css') ?>">
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
            <li class="active"><a href="<?php echo base_url('/') ?>">BERANDA <span class="sr-only">(current)</span></a></li>
            <li><a href="<?php echo base_url('tentang-kami') ?>">TENTANG KAMI</a></li>
            <li><a href="<?php echo base_url('artikel') ?>">Artikel</a></li>
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
        <input type="search" autocomplete="off" name="cari" value="" placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
  </div>

  <!-- SLIDER -->
  <section class="slider">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="<?php echo base_url('assets/frontend/img/1.jpg')?>" alt="slider-image" class="img-slider">
        </div>
        <div class="item">
          <img src="<?php echo base_url('assets/frontend/img/2.jpg')?>" class="img-slider">
        </div>
        <div class="item">
          <img src="<?php echo base_url('assets/frontend/img/3.jpg') ?>" class="img-slider">
        </div>
        <div class="item">
          <img src="<?php echo base_url('assets/frontend/img/4.jpg') ?>" class="img-slider">
        </div>
      </div>
      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </section>

  <!-- CONTENT -->
  <section class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="row">
            <?php if ( $lapang ) { 
              foreach ($lapang as $key => $value) {
            ?>
              <div class="col-md-6">
                <div class="box-card">
                  <div class="img-card" style="background: url('assets/uploads/<?php echo $value->gambar ?>');"></div>
                  <div class="caption-box text-center">
                    <h3><?php echo $value->nama ?></h3>
                    <p>
                      <?php echo $value->alamat ?>
                    </p>
                    <p>
                      <?php echo $value->telepon ?>
                    </p>
                  </div>
                  <div class="text-center" align="middle">
                    <a href="<?php echo base_url('lapang').'/'.$value->id ?>" class="btn btn-lg btn-grey">SELENGKAPNYA</a>
                  </div>
                </div>
              </div>
            <?php 
              }
            } else{ 
            ?>
            <h3>Data yang anda cari tidak tersedia</h3>
            <?php } ?>
          </div>
        </div>
        <div class="col-md-4">
          <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-justified" role="tablist">
              <li role="presentation" class="active"><a href="#recent" aria-controls="recent" role="tab" data-toggle="tab">Daftar Lapang</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="recent">
                <?php foreach ($lapang as $key => $value) {?>
                  <div class="list-article" style="width: 100%">
                    <div class="col-xs-4 nopadding">
                      <div class="img-thumb" style="background: url('assets/uploads/<?php echo $value->gambar ?>');"></div>
                    </div>
                    <div class="col-xs-8 grey-bg">
                      <div class="desc-box">
                        <a href=""><h5><?php echo $value->nama ?></h5></a>
                        <p><?php echo $value->alamat ?></p>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
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

  <!-- jQuery Version 1.11.1 -->
  <script src="<?php echo base_url('assets/frontend/js/jquery.js')?>"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="<?php echo base_url('assets/frontend/js/bootstrap.min.js')?>"></script>
  <!-- Include js plugin -->
  <script src="<?php echo base_url('assets/frontend/js/owl.carousel.js') ?>"></script>
  <script type="text/javascript">
    $(function () {
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
  <script type="text/javascript">
    $(document).ready(function() {
 
      $("#owl-demo").owlCarousel({
     
          autoPlay: 3000, //Set AutoPlay to 3 seconds
     
          items : 5,
          itemsDesktop : [1199,3],
          itemsDesktopSmall : [979,3],
          pagination : false
     
      });
     
    });
  </script>

</body>

</html>
