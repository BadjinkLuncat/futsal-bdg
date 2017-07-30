<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Bare - Start Bootstrap Template</title>

  <!-- Bootstrap Core CSS -->
  <link href="<?php echo base_url('assets/frontend/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/frontend/css/dds.css') ?>" rel="stylesheet">
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
  <?php
    $this->load->view('frontend/template/navbar');
  ?>

  

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
          <img src="assets/frontend/img/slide.png" alt="slider-image">
          <div class="carousel-caption">
            <h3 class="grey-caption">Lorem ipsum dolor sit amet</h3>
            <h3 class="grey-caption">reprehenderit in voluptate velit esse.</h3>
            <a href="" class="btn btn-lg btn-red">REGISTER NOW &nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
          </div>
        </div>
        <div class="item">
          <img src="assets/frontend/img/slide.png" alt="slider-image">
          <div class="carousel-caption">
            <h3 class="grey-caption">Lorem ipsum dolor sit amet</h3>
            <h3 class="grey-caption">reprehenderit in voluptate velit esse.</h3>
            <a href="" class="btn btn-lg btn-red">REGISTER NOW &nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
          </div>
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
        <div class="col-md-4">
          <div class="box-card">
            <div class="img-card" style="background: url('assets/frontend/img/1.jpg');"></div>
            <div class="caption-box text-center">
              <h3>EXERCITATION</h3>
              <p>
                Duis cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, 
                sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
            </div>
            <div class="text-center" align="middle">
              <a href="" class="btn btn-lg btn-grey">READ MORE</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box-card">
            <div class="img-card" style="background: url('assets/frontend/img/2.jpg');"></div>
            <div class="caption-box text-center">
              <h3>OCCAECAT</h3>
              <p>
                Duis cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, 
                sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
            </div>
            <div class="text-center" align="middle">
              <a href="" class="btn btn-lg btn-grey">READ MORE</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box-card">
            <div class="img-card" style="background: url('assets/frontend/img/3.jpg');"></div>
            <div class="caption-box text-center">
              <h3>REPREHENDERIT</h3>
              <p>
                Duis cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, 
                sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
            </div>
            <div class="text-center" align="middle">
              <a href="" class="btn btn-lg btn-grey">READ MORE</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CONTENT2 -->
  <section class="content2">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="box-calendar">
            
          </div>
          <div class="box-news">
            <div class="list-article-big">
              <div class="col-md-4 nopadding">
                <div class="img-thumb-big" style="background: url('assets/frontend/img/2.jpg');"></div>
              </div>
              <div class="col-md-8 grey-bg-big">
                <div class="desc-box-big">
                  <a href=""><h3>Excepteur sint occaecat</h3></a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat...</p>
                  <a href="" class="btn btn-red pull-right">READ MORE</a>
                </div>
              </div>
              <nav aria-label="Page navigation">
                <ul class="pagination pull-right">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">6</a></li>
                  <li><a href="#">7</a></li>
                  <li><a href="#">8</a></li>
                  <li><a href="#">9</a></li>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#recent" aria-controls="recent" role="tab" data-toggle="tab">RECENT</a></li>
              <li role="presentation"><a href="#popular" aria-controls="popular" role="tab" data-toggle="tab">POPULAR</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="recent">
                <div class="list-article">
                  <div class="col-xs-4 nopadding">
                    <div class="img-thumb" style="background: url('assets/frontend/img/1.jpg');"></div>
                  </div>
                  <div class="col-xs-8 grey-bg">
                    <div class="desc-box">
                      <a href=""><h5>Excepteur sint occaecat</h5></a>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor...</p>
                    </div>
                  </div>
                </div>
                <div class="list-article">
                  <div class="col-xs-4 nopadding">
                    <div class="img-thumb" style="background: url('assets/frontend/img/2.jpg');"></div>
                  </div>
                  <div class="col-xs-8 grey-bg">
                    <div class="desc-box">
                      <a href=""><h5>Excepteur sint occaecat</h5></a>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor...</p>
                    </div>
                  </div>
                </div>
                <div class="list-article">
                  <div class="col-xs-4 nopadding">
                    <div class="img-thumb" style="background: url('assets/frontend/img/3.jpg');"></div>
                  </div>
                  <div class="col-xs-8 grey-bg">
                    <div class="desc-box">
                      <a href=""><h5>Excepteur sint occaecat</h5></a>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor...</p>
                    </div>
                  </div>
                </div>
                <div class="list-article">
                  <div class="col-xs-4 nopadding">
                    <div class="img-thumb" style="background: url('assets/frontend/img/1.jpg');"></div>
                  </div>
                  <div class="col-xs-8 grey-bg">
                    <div class="desc-box">
                      <a href=""><h5>Excepteur sint occaecat</h5></a>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor...</p>
                    </div>
                  </div>
                </div>
                <div class="list-article">
                  <div class="col-xs-4 nopadding">
                    <div class="img-thumb" style="background: url('assets/frontend/img/2.jpg');"></div>
                  </div>
                  <div class="col-xs-8 grey-bg">
                    <div class="desc-box">
                      <a href=""><h5>Excepteur sint occaecat</h5></a>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor...</p>
                    </div>
                  </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="popular">
                <div class="list-article">
                  <div class="col-xs-4 nopadding">
                    <div class="img-thumb" style="background: url('assets/frontend/img/3.jpg');"></div>
                  </div>
                  <div class="col-xs-8 grey-bg">
                    <div class="desc-box">
                      <a href=""><h5>Excepteur sint occaecat</h5></a>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor...</p>
                    </div>
                  </div>
                </div>
                <div class="list-article">
                  <div class="col-xs-4 nopadding">
                    <div class="img-thumb" style="background: url('assets/frontend/img/2.jpg');"></div>
                  </div>
                  <div class="col-xs-8 grey-bg">
                    <div class="desc-box">
                      <a href=""><h5>Excepteur sint occaecat</h5></a>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor...</p>
                    </div>
                  </div>
                </div>
                <div class="list-article">
                  <div class="col-xs-4 nopadding">
                    <div class="img-thumb" style="background: url('assets/frontend/img/1.jpg');"></div>
                  </div>
                  <div class="col-xs-8 grey-bg">
                    <div class="desc-box">
                      <a href=""><h5>Excepteur sint occaecat</h5></a>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor...</p>
                    </div>
                  </div>
                </div>
                <div class="list-article">
                  <div class="col-xs-4 nopadding">
                    <div class="img-thumb" style="background: url('assets/frontend/img/2.jpg');"></div>
                  </div>
                  <div class="col-xs-8 grey-bg">
                    <div class="desc-box">
                      <a href=""><h5>Excepteur sint occaecat</h5></a>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor...</p>
                    </div>
                  </div>
                </div>
                <div class="list-article">
                  <div class="col-xs-4 nopadding">
                    <div class="img-thumb" style="background: url('assets/frontend/img/3.jpg');"></div>
                  </div>
                  <div class="col-xs-8 grey-bg">
                    <div class="desc-box">
                      <a href=""><h5>Excepteur sint occaecat</h5></a>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor...</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- GALLERY -->
  <section class="gallery">
    <div class="container">
      <div id="owl-demo">
        <div class="item">
          <div class="owl-gallery" style="background: url('assets/frontend/img/1.jpg');"></div>
        </div>
        <div class="item">
          <div class="owl-gallery" style="background: url('assets/frontend/img/2.jpg');"></div>
        </div>
        <div class="item">
          <div class="owl-gallery" style="background: url('assets/frontend/img/3.jpg');"></div>
        </div>
        <div class="item">
          <div class="owl-gallery" style="background: url('assets/frontend/img/1.jpg');"></div>
        </div>
        <div class="item">
          <div class="owl-gallery" style="background: url('assets/frontend/img/2.jpg');"></div>
        </div>
        <div class="item">
          <div class="owl-gallery" style="background: url('assets/frontend/img/3.jpg');"></div>
        </div>
        <div class="item">
          <div class="owl-gallery" style="background: url('assets/frontend/img/1.jpg');"></div>
        </div>
      </div>
    </div>
  </section>

<?php
$this->load->view('frontend/template/footer');
?>

  <!-- jQuery Version 1.11.1 -->
  <script src="<?php echo base_url('assets/frontend/js/jquery.js')?>"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="<?php echo base_url('assets/frontend/js/bootstrap.min.js')?>"></script>
  <!-- Include js plugin -->
  <script src="<?php echo base_url('assets/frontend/js/owl.carousel.js')?>"></script>
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
        
        
        //Do not include! This prevents the form from submitting for DEMO purposes only!
        $('form').submit(function(event) {
            event.preventDefault();
            return false;
        })
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
