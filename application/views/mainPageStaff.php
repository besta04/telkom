<!doctype html>

<html>
  
  <head>
    <title>Main Page</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootswatch/3.0.0/simplex/bootstrap.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <style type="text/css">
      /*       * Style tweaks       * --------------------------------------------------       */
      body {
        padding-top: 70px;
      }
      footer {
        padding-left: 15px;
        padding-right: 15px;
      }
      /*       * Off Canvas       * --------------------------------------------------       */
      @media screen and(max-width: 768px) {
        .row-offcanvas {
          position: relative;
          -webkit-transition: all 0.25s ease-out;
          -moz-transition: all 0.25s ease-out;
          transition: all 0.25s ease-out;
        }
        .row-offcanvas-right .sidebar-offcanvas {
          right: -50%;
          /* 6 columns */
        }
        .row-offcanvas-left .sidebar-offcanvas {
          left: -50%;
          /* 6 columns */
        }
        .row-offcanvas-right.active {
          right: 50%;
          /* 6 columns */
        }
        .row-offcanvas-left.active {
          left: 50%;
          /* 6 columns */
        }
        .sidebar-offcanvas {
          position: absolute;
          top: 0;
          width: 50%;
          /* 6 columns */
        }
      }
    </style>
  </head>
  
  <body>
    <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active">
              <a href="#">Home</a>
            </li>
            <li>
              <a href="#about">About</a>
            </li>
            <li>
              <a href="#contact">Contact</a>
            </li>
          </ul>
          <div class="navbar-form navbar-right">
            <button type="submit" class="btn btn-danger" onClick="window.location='<?php echo "../LoginController/logout" ?>'" >Sign Out</button>
          </div>
        </div>
        <!-- /.nav-collapse -->
      </div>
      <!-- /.container -->
    </div>
    <!-- /.navbar -->
    <div class="container">
      <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button></p>
          <div class="jumbotron">
            <h1>Monitoring LME Wifi Nasional</h1>
            <p>PT. Telekomunikasi Indonesia</p>
          </div>
          <div class="row">
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Laporan Wifi Nasional</h2>
              <p>Lihat dan edit laporan LME Wifi Nasional Telkom Indonesia</p>
              <p><a class="btn btn-default" href="<?php echo "../ReportController/report1" ?>">View details &raquo;</a></p>
            </div>
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Chart</h2>
              <p>Lihat chart LME Wifi Nasional Telkom Indonesia</p>
              <p><a class="btn btn-default" href="<?php echo "../HomeController/statusProgress" ?>">View details &raquo;</a></p>
            </div>
            
            <!--/span-->
          </div>
          <!--/row-->
        </div>
        <!--/span-->
        
        <!--/span-->
      </div>
      <!--/row-->
      <hr>
      <footer>
        <p>&copy; PT. Telekomunikasi Indonesia 2014</p>
      </footer>
    </div>
    <!--/.container-->
    <script>
      $(document).ready(function() {
        $('[data-toggle=offcanvas]').click(function() {
          $('.row-offcanvas').toggleClass('active');
        });
      });
    </script>
  </body>

</html>