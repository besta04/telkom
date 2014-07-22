<!doctype html>

<html>
  <head>
    <script type="text/javascript">
    function overlay() 
    {
      el = document.getElementById("overlay");
      el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
    }
    function overlayB() 
    {
      el = document.getElementById("overlayB");
      el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
    }
    function value()
    {
      $('#thetable').find('tr').click( function()
      {
        var row = $(this).find('td').eq(3).text();
        alert('You clicked ' + row);
        return row;
      });
    }
    
    
    </script>
    <title>Rekapitulasi - </title>
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
      body.modal-open {
    overflow: visible;
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
      #overlay {
     visibility: hidden;
     position: absolute;
     left: 0px;
     top: 0px;
     width:100%;
     height:300%;
     text-align:center;
     z-index: 1000;
     background-color: rgba(1,1,1,0.8)
      }
      #overlay div {
           width:700px;
           margin: 100px auto;
           background-color: #fff;
           border:1px solid #000;
           padding:15px;
           text-align:center;
           vertical-align: text-top;
      }
      #overlayB {
     visibility: hidden;
     position: absolute;
     left: 0px;
     top: 0px;
     width:100%;
     height:300%;
     text-align:center;
     z-index: 1000;
     background-color: rgba(1,1,1,0.8)
      }
      #overlayB div {
           width:500px;
           margin: 100px auto;
           background-color: #fff;
           border:1px solid #000;
           padding:15px;
           text-align:center;
           vertical-align: text-top;
      }
      #regional, #witel, #kota, #namaLokasi, #alamat, #suratPesanan, #toc, #order, #status, #statProg, #keterangan, #tipe
      {
        width:300px;   
        position:relative; 
        left:100px
      }
      #toc, #order, #status, #statProg, #keterangan, #tipe
      {
        position:relative; 
        left:250px
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
          <a class="navbar-brand" href='<?php echo site_url('HomeController/main') ?>'>Telkom LME</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li >
              <a href='<?php echo site_url('HomeController/main') ?>'>Home</a>
            </li>
            <li class="active">
              <a href="#">Laporan</a>
            </li>
            <li>
              <a href='<?php echo site_url('ReportController/reportDivre') ?>'>Rekap</a>
            </li>
            <li>
              <a href='<?php echo site_url('HomeController/statusProgress') ?>'>Chart</a>
            </li>
            <li>
              <a href="#about">About</a>
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
        <div class="">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button></p>
          <div class="row">
            <div class="panel panel-default">
            <div class="panel-body" style="text-align:center"><b style="font-size:x-large">Laporan LME Wifi Nasional</b></div>
          </div>
          <?php
        $con=mysqli_connect("localhost","root","root","telkom_lme");
        if (mysqli_connect_errno())
        {
          echo "Failed to connect : ". mysqli_connect_error();
        }
        if (is_array($results))
        {
          foreach ($results as $data)
          {
          }
        }
        

          echo "<div id='overlayB'>
           <div>
           Click here to [<a href='#' onclick='overlayB()'>close</a>]
           <br><br>
                <table class='table table-hover table-bordered'>
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Klasifikasi Status</th>
                      <th>Status Progress</th>
                      <th>Alasan Status Progress</th>
                    </tr>
                  </thead>
                  <tbody>";
                  if (is_array($results))
                  {
                    foreach ($results as $data)
                    {
                      echo "<tr>";
                      echo "<td>" . $data->ID_LME . "</td>";
                      echo "<td>" . $data->KLASIFIKASI_STATUS_SMILE . "</td>";
                      echo "<td>" . $data->STATUS_PROGRESS_WIFI . "</td>";
                      echo "<td>" . $data->ALASAN_STATUS_PROGRESS . "</td>";
                      echo "</tr>";
                    }
                  }/*
                  while ($row = mysqli_fetch_array($result3))
                  {
                    echo "<tr>";
                      echo "<td>" . $row['ID_LME'] . "</td>";
                      echo "<td>" . $row['KLASIFIKASI_STATUS_SMILE'] . "</td>";
                      echo "<td>" . $row['STATUS_PROGRESS_WIFI'] . "</td>";
                      echo "<td>" . $row['ALASAN_STATUS_PROGRESS'] . "</td>";
                    echo "</tr>";
                  }*/
                  echo "</tbody>
                </table>
                Click here to [<a href='#' onclick='overlayB()'>close</a>]
           </div>
          </div>";

        echo "<table id='thetable' class='table table-hover table-bordered'>
          <thead>
            <tr>
              <th>#</th>
              <th>Regional</th>
              <th>Witel</th>
              <th>Kota</th>
              <th>Nama Lokasi</th>
              <th>Surat Pesanan</th>
              <th>TOC</th>
              <th>Order</th>
              <th>Status</th>
              <th>Tipe LME</th>
              <th>Last Updated</th>
            </tr>
          </thead>";
          echo "<tbody>";
          //$num = 0;
          //while ($row = mysqli_fetch_array($result))
          //{
          
          if (is_array($results))
          {
          foreach ($results as $data)
          {
            $date = $data->LAST_UPDATE == '' ? 'Never' : $data->LAST_UPDATE;
            //$num++;
            echo "<tr>";
            echo "<td>" . $data->ID_LME/*$row['ID_LME']*/ . "</td>";
            echo "<td>" . $data->DIVRE . "</td>";
            echo "<td>" . $data->WITEL . "</td>";
            echo "<td>" . $data->KOTA . "</td>";
            echo "<td><a href='#' onclick='overlay()'>" . $data->NAMA_LOKASI . "</a></td>";
            echo "<td>" . $data->SURAT_PESANAN/*$row['SURAT_PESANAN']*/ . "</td>";
            echo "<td>" . $data->TOC . "</td>";
            echo "<td>" . $data->ORDERS . "</td>";
            echo "<td><a href='#' onclick='overlayB()'>" . $data->KLASIFIKASI_STATUS_SMILE . "</a></td>";
            echo "<td>" . $data->TYPE_LME . "</td>";
            echo "<td>". (string)$date ."</td>";
            echo "</tr>";
          //}
          }
        };
          echo "</tbody>";
          echo "</table>";

          echo "<div id='overlay'>
           <div>
           Click here to [<a href='#' onclick='overlay()'>close</a>]
           <br><br>
                <table class='table table-hover table-bordered'>
                  <thead>
                    <tr>
                      <th>Nama Lokasi</th>
                      <th>Alamat Lokasi</th>
                    </tr>
                  </thead>
                  <tbody>";
                  if (is_array($results))
                  {
                    foreach ($results as $data)
                    {
                      echo "<tr>";
                      echo "<td>" . $data->NAMA_LOKASI . "</td>";
                      echo "<td>" . $data->ALAMAT . "</td>";
                      echo "</tr>";
                    }
                  }/*
                  while ($row = mysqli_fetch_array($result2))
                  {
                    echo "<tr>";
                      echo "<td>" . $row['NAMA_LOKASI'] . "</td>";
                      echo "<td>" . $row['ALAMAT'] . "</td>";
                    echo "</tr>";
                  }*/
                  echo "</tbody>
                </table>
                Click here to [<a href='#' onclick='overlay()'>close</a>]
           </div>
          </div>";

          mysqli_close($con);
          ?>
          <p><?php echo $links; ?></p>
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