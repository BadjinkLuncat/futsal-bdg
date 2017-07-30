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
            <li><a href="<?php echo base_url('artikel') ?>">Artikel</a></li>
            <li><a href="<?php echo base_url('cara-booking') ?>">CARA BOOKING</a></li>
            <li><a href="<?php echo base_url('keranjang-booking') ?>">KERANJANG BOOKING</a></li>
            <li><a href="<?php echo base_url('kontak-kami') ?>">KONTAK KAMI</a></li>
            <li class="active"><a href="<?php echo base_url('konfirmasi-pembayaran') ?>">KONFIRMASI PEMBAYARAN</a></li>
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
        <input type="search" autocomplete="off" value=""  name="cari" placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
  </div>

  <!-- CONTENT2 -->
  <section class="content2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="box-news">
            <div class="list-article-big">
              <div class="span-8 box form jarak-left">
                <h2>Konfirmasi Pembayaran</h2>
                <form action="<?php echo base_url('konfirmasi-pembayaran/check-kode') ?>" method="post">     
                  <div class="form-group">
                    <label>Kode Booking</label>
                    <input style="width:80%" type="text" name="kode_reservasi" id="kode_booking">  
                  </div> 
                  <div class="form-group">
                    <input type="submit" class="btn btn-md btn-default" value="Cek"> 
                  </div> 
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="box-news">
            <div class="list-article-big">
              <div class="span-8 box form jarak-left">
                <h4>Detail Booking</h4>
                <?php if ($transaksi) {?>
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Kode Booking</th>
                          <th>Nama</th>
                          <th>Nama Lapang</th>
                          <th>Harga</th>
                          <th>Status</th>
                          <th>Konfirmasi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td><?php echo $transaksi->kode_reservasi ?></td>
                          <td><?php echo $transaksi->nama_user ?></td>
                          <td><p><b><?php echo $transaksi->nama ?></b></p>
                          <p>Alamat : <?php echo $transaksi->alamat ?></p>
                          <p>Telepon : <?php echo $transaksi->telepon ?></p>
                          </td>
                          <td><?php echo $transaksi->harga ?></td>
                          <?php 
                            $hideBtn='hide';
                            if ($transaksi->status==0){
                            $hideBtn='';
                            $status='Menunggu Pembayaran';
                            }
                            else if ($transaksi->status==1){
                            $status='Menunggu Konfirmasi Admin';
                            }
                            else{
                              $status='Sukses';
                            } ?>
                          <td><?php echo $status ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <form enctype="multipart/form-data" action="<?php echo base_url('konfirmasi-pembayaran/konfirmasi') ?>" method="post">    
                      <input type="file" name="image" class="form-control" id="imageUpload" onchange="makeFileList()">
                      <input style="width:80%" type="hidden" name="kode_reservasi" id="kode_reservasi" value="<?php echo $transaksi->kode_reservasi ?>">
                      <input type="submit" class="btn btn-sm btn-primary <?php echo $hideBtn ?>" value="Konfirmasi"> 
                  </form>
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
      </div>
    </div>
  </footer>

  <!-- jQuery Version 1.11.1 -->
  <script src="<?php echo base_url('assets/frontend/js/jquery.js')?>"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="<?php echo base_url('assets/frontend/js/bootstrap.min.js')?>"></script>
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
</body>

</html>
