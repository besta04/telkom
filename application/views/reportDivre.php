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
    function setSuratPesananIndex() 
    {
      document.getElementById("suratPesanan_index_id").value = document.getElementById("suratPesanan").selectedIndex;
    }
    function setTocIndex() 
    {
      document.getElementById("toc_index_id").value = document.getElementById("toc").selectedIndex;
    }
    function setNamaLokasiIndex() 
    {
      document.getElementById("namaLokasi_index_id").value = document.getElementById("namaLokasi").selectedIndex;
    }
    function setNamaProjectIndex() 
    {
      document.getElementById("namaProject_index_id").value = document.getElementById("namaProject").selectedIndex;
    }
    function setProjectSPIndex() 
    {
      document.getElementById("projectSP_index_id").value = document.getElementById("projectSP").selectedIndex;
    }
    function setWitelIndex() 
    {
      document.getElementById("witel_index_id").value = document.getElementById("witel").selectedIndex;
    }
    function setOrderIndex() 
    {
      document.getElementById("order_index_id").value = document.getElementById("order").selectedIndex;
    }
    function setStatusIndex() 
    {
      document.getElementById("status_index_id").value = document.getElementById("status").selectedIndex;
    }
    </script>
    <title>Rekapitulasi Wifi LME</title>
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
     height:200%;
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
     height:200%;
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
        <div class="">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button></p>
          <div class="row">
            <div class="panel panel-default">
            <div class="panel-body" style="text-align:center"><b style="font-size:x-large">Rekapitulasi LME WIFI Nasional</b></div>
          </div>
          <table>
            <tr>
            <td>
              <?php 
              $con=mysqli_connect("localhost","root","root","telkom_lme");
        if (mysqli_connect_errno())
        {
          echo "Failed to connect : ". mysqli_connect_error();
        }
        
       $resultSumatera = mysqli_query($con,"SELECT DISTINCT KLASIFIKASI_STATUS_SMILE as 'STATUS SMILE', COUNT(KLASIFIKASI_STATUS_SMILE)-12 AS JUMLAH FROM tabel_lme_main WHERE DIVRE = 'R1 SUMATERA' GROUP BY KLASIFIKASI_STATUS_SMILE ORDER BY KLASIFIKASI_STATUS_SMILE ASC");
       $resultJakarta = mysqli_query($con,"SELECT DISTINCT KLASIFIKASI_STATUS_SMILE as 'STATUS SMILE', COUNT(KLASIFIKASI_STATUS_SMILE)-11 AS JUMLAH FROM tabel_lme_main WHERE DIVRE = 'R2 JAKARTA' GROUP BY KLASIFIKASI_STATUS_SMILE ORDER BY KLASIFIKASI_STATUS_SMILE ASC");
       $resultJabar = mysqli_query($con,"SELECT DISTINCT KLASIFIKASI_STATUS_SMILE as 'STATUS SMILE', COUNT(KLASIFIKASI_STATUS_SMILE)-5 AS JUMLAH FROM tabel_lme_main WHERE DIVRE = 'R3 JABAR' GROUP BY KLASIFIKASI_STATUS_SMILE ORDER BY KLASIFIKASI_STATUS_SMILE ASC");
       $resultJateng = mysqli_query($con,"SELECT DISTINCT KLASIFIKASI_STATUS_SMILE as 'STATUS SMILE', COUNT(KLASIFIKASI_STATUS_SMILE)-9 AS JUMLAH FROM tabel_lme_main WHERE DIVRE = 'R4 JATENG' GROUP BY KLASIFIKASI_STATUS_SMILE ORDER BY KLASIFIKASI_STATUS_SMILE ASC");
       $resultJatim = mysqli_query($con,"SELECT DISTINCT KLASIFIKASI_STATUS_SMILE as 'STATUS SMILE', COUNT(KLASIFIKASI_STATUS_SMILE)-10 AS JUMLAH FROM tabel_lme_main WHERE DIVRE = 'R5 JATIM' GROUP BY KLASIFIKASI_STATUS_SMILE ORDER BY KLASIFIKASI_STATUS_SMILE ASC");
       $resultKalimantan = mysqli_query($con,"SELECT DISTINCT KLASIFIKASI_STATUS_SMILE as 'STATUS SMILE', COUNT(KLASIFIKASI_STATUS_SMILE)-7 AS JUMLAH FROM tabel_lme_main WHERE DIVRE = 'R6 KALIMANTAN' GROUP BY KLASIFIKASI_STATUS_SMILE ORDER BY KLASIFIKASI_STATUS_SMILE ASC");
       $resultKTI = mysqli_query($con,"SELECT DISTINCT KLASIFIKASI_STATUS_SMILE as 'STATUS SMILE', COUNT(KLASIFIKASI_STATUS_SMILE)-10 AS JUMLAH FROM tabel_lme_main WHERE DIVRE = 'R7 KTI' GROUP BY KLASIFIKASI_STATUS_SMILE ORDER BY KLASIFIKASI_STATUS_SMILE ASC");
        echo "<div>
           <div>
                <table class='table table-hover table-bordered'>
                  <thead>
                    <tr>
                      <th>--DIVISI REGIONAL--</th>
                      <th>A. NON PROGRESS</th>
                      <th>B. SURVEY</th>
                      <th>C. ON PROGRESS</th>
                      <th>D. SELESAI INSTALASI</th>
                      <th>E. REKON</th>
                      <th>F. KENDALA SITAC</th>
                      <th>G. KENDALA NON SITAC</th>
                      <th>H. BATAL</th>
                      <th>I. BAST</th>
                    </tr>
                  </thead>
                  <tbody>";
                  echo "<tr>";
                  echo "<td><a href='".site_url()."/ReportController/R1'>R1 SUMATERA</a> </td>";
                  while ($row = mysqli_fetch_array($resultSumatera))
                  {
                      echo "<td>" . $row['JUMLAH'] . "</td>";
                  }
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td><a href='".site_url()."/ReportController/R2'>R2 JAKARTA</a> </td>";
                  while ($row = mysqli_fetch_array($resultJakarta))
                  {
                      echo "<td>" . $row['JUMLAH'] . "</td>";
                  }
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td><a href='".site_url()."/ReportController/R3'>R3 JABAR</a> </td>";
                  while ($row = mysqli_fetch_array($resultJabar))
                  {
                      echo "<td>" . $row['JUMLAH'] . "</td>";
                  }
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td><a href='".site_url()."/ReportController/R4'>R4 JATENG</a> </td>";
                  while ($row = mysqli_fetch_array($resultJateng))
                  {
                      echo "<td>" . $row['JUMLAH'] . "</td>";
                  }
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td><a href='".site_url()."/ReportController/R5'>R5 JATIM</a></td>";
                  while ($row = mysqli_fetch_array($resultJatim))
                  {
                      echo "<td>" . $row['JUMLAH'] . "</td>";
                  }
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td><a href='".site_url()."/ReportController/R6'>R6 KALIMANTAN</a></td>";
                  while ($row = mysqli_fetch_array($resultKalimantan))
                  {
                      echo "<td>" . $row['JUMLAH'] . "</td>";
                  }
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td><a href='".site_url()."/ReportController/R7'>R7 KTI</a></td>";
                  while ($row = mysqli_fetch_array($resultKTI))
                  {
                      echo "<td>" . $row['JUMLAH'] . "</td>";
                  }
                  echo "</tr>";
                  echo "</tbody>
                </table>";
                
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