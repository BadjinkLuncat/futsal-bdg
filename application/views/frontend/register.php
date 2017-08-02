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
      <form action="<?php echo base_url('auth/register/insert') ?>" method="post" enctype="multipart/form-data">
      <div class="box-body">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
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
            <div class="form-group">
              <input type="submit" class="btn btn-primary pull-left" value="Simpan">
            </div>
          </div>
        </div>
      </div><!-- /.box-body -->
      <div class="box-footer" style="margin-bottom: 35px">
      </div>
      </form>
    </div>
  </section>

<footer>
    <div class="row">
      <div class="col-md-6 col-md-offset-3 text-center">
      </div>
    </div>
  </footer>
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
  <!-- jQuery Version 1.11.1 -->
  <script src="<?php echo base_url('assets/frontend/js/jquery.js')?>"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="<?php echo base_url('assets/frontend/js/bootstrap.min.js')?>"></script>
</body>

</html>
