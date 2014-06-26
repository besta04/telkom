<!doctype html>

<html>
  
  <head>
    <title>Off Canvas Nav</title>
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
        </div>
        <!-- /.nav-collapse -->
      </div>
      <!-- /.container -->
    </div>
    <!-- /.navbar -->
    <div class="container">
      <div class="row row-offcanvas row-offcanvas-right">
        <div class="">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button></p>
          <div class="row">
            <div class="panel panel-default">
            <div class="panel-body" style="text-align:center"><b style="font-size:x-large">Judul Reportnya</b></div>
          </div>
          <?php
        $con=mysqli_connect("localhost","root","root","telkom_lme");
        if (mysqli_connect_errno())
        {
          echo "Failed to connect : ". mysqli_connect_error();
        }
       $result = mysqli_query($con,"select tabel_lme_main.ID_LME, tabel_order.SURAT_PESANAN, tabel_order.TOC, tabel_site.NAMA_LOKASI, tabel_site.ALAMAT, tabel_lme_main.NAMA_PROJECT, tabel_lme_main.PROJECT_SP, tabel_lme_main.SP, tabel_lme_main.WITEL, tabel_lme_main.ORDERS FROM tabel_lme_main, tabel_order, tabel_site where tabel_lme_main.ID_ORDER = tabel_order.ID_ORDER and tabel_lme_main.ID_SITE = tabel_site.ID_SITE");
        
        echo "<table class='table table-hover table-bordered'>
          <thead>
            <tr>
              <th>#</th>
              <th>Surat Pesanan</th>
              <th>TOC</th>
              <th>Nama Lokasi</th>
              <th>Alamat</th>
              <th>Nama Project</th>
              <th>Project SP</th>
              <th>SP</th>
              <th>Witel</th>
              <th>Order</th>
            </tr>
          </thead>";
          echo "<tbody>";
          while ($row = mysqli_fetch_array($result))
          {
            echo "<tr>";
            echo "<td>" . $row['ID_LME'] . "</td>";
            echo "<td>" . $row['SURAT_PESANAN'] . "</td>";
            echo "<td>" . $row['TOC'] . "</td>";
            echo "<td>" . $row['NAMA_LOKASI'] . "</td>";
            echo "<td>" . $row['ALAMAT'] . "</td>";
            echo "<td>" . $row['NAMA_PROJECT'] . "</td>";
            echo "<td>" . $row['PROJECT_SP'] . "</td>";
            echo "<td>" . $row['SP'] . "</td>";
            echo "<td>" . $row['WITEL'] . "</td>";
            echo "<td>" . $row['ORDERS'] . "</td>";
            echo "</tr>";
          }
          echo "</tbody>";
          echo "</table>";

          mysqli_close($con);
          ?>
          </div>
          <!--/row-->
        </div>
        <!--/span-->
        <!--<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="well sidebar-nav">
            <ul class="nav">
              <li>Sidebar</li>
              <li class="active">
                <a href="#">Link</a>
              </li>
              <li>
                <a href="#">Link</a>
              </li>
              <li>
                <a href="#">Link</a>
              </li>
              <li>Sidebar</li>
              <li>
                <a href="#">Link</a>
              </li>
              <li>
                <a href="#">Link</a>
              </li>
              <li>
                <a href="#">Link</a>
              </li>
              <li>Sidebar</li>
              <li>
                <a href="#">Link</a>
              </li>
              <li>
                <a href="#">Link</a>
              </li>
            </ul>
          </div>
          
        </div>-->
        <!--/span-->
      </div>
      <!--/row-->
      <hr>
      <footer>
        <p>&copy; Company 2013</p>
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