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
    
    </script>
    <title>R7 KTI</title>
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
            <div class="panel-body" style="text-align:center"><b style="font-size:x-large">DIVISI 7 REGIONAL KTI</b></div>
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
        
       $result1 = mysqli_query($con,"SELECT COUNT(KLASIFIKASI_STATUS_SMILE)-1 as JUMLAH FROM tabel_lme_main WHERE DIVRE = 'R7 KTI'
        AND WITEL = 'TELKOM BALI SELATAN (DENPASAR)' GROUP BY WITEL, KLASIFIKASI_STATUS_SMILE ORDER BY KLASIFIKASI_STATUS_SMILE ASC");
       $result2 = mysqli_query($con,"SELECT COUNT(KLASIFIKASI_STATUS_SMILE)-1 as JUMLAH FROM tabel_lme_main WHERE DIVRE = 'R7 KTI'
        AND WITEL = 'TELKOM BALI UTARA (SINGARAJA)' GROUP BY WITEL, KLASIFIKASI_STATUS_SMILE ORDER BY KLASIFIKASI_STATUS_SMILE ASC");
       $result3 = mysqli_query($con,"SELECT COUNT(KLASIFIKASI_STATUS_SMILE)-1 as JUMLAH FROM tabel_lme_main WHERE DIVRE = 'R7 KTI'
        AND WITEL = 'TELKOM NTB (MATARAM)' GROUP BY WITEL, KLASIFIKASI_STATUS_SMILE ORDER BY KLASIFIKASI_STATUS_SMILE ASC");
       $result4 = mysqli_query($con,"SELECT COUNT(KLASIFIKASI_STATUS_SMILE)-1 as JUMLAH FROM tabel_lme_main WHERE DIVRE = 'R7 KTI'
        AND WITEL = 'TELKOM NTT (KUPANG)' GROUP BY WITEL, KLASIFIKASI_STATUS_SMILE ORDER BY KLASIFIKASI_STATUS_SMILE ASC");
       $result5 = mysqli_query($con,"SELECT COUNT(KLASIFIKASI_STATUS_SMILE)-1 as JUMLAH FROM tabel_lme_main WHERE DIVRE = 'R7 KTI'
        AND WITEL = 'TELKOM SULSEL MAKASAR' GROUP BY WITEL, KLASIFIKASI_STATUS_SMILE ORDER BY KLASIFIKASI_STATUS_SMILE ASC");
       $result6 = mysqli_query($con,"SELECT COUNT(KLASIFIKASI_STATUS_SMILE)-1 as JUMLAH FROM tabel_lme_main WHERE DIVRE = 'R7 KTI'
        AND WITEL = 'TELKOM SULTENG PALU' GROUP BY WITEL, KLASIFIKASI_STATUS_SMILE ORDER BY KLASIFIKASI_STATUS_SMILE ASC");
       $result7 = mysqli_query($con,"SELECT COUNT(KLASIFIKASI_STATUS_SMILE)-1 as JUMLAH FROM tabel_lme_main WHERE DIVRE = 'R7 KTI'
        AND WITEL = 'TELKOM SULTRA (KENDARI)' GROUP BY WITEL, KLASIFIKASI_STATUS_SMILE ORDER BY KLASIFIKASI_STATUS_SMILE ASC");
       $result8 = mysqli_query($con,"SELECT COUNT(KLASIFIKASI_STATUS_SMILE)-1 as JUMLAH FROM tabel_lme_main WHERE DIVRE = 'R7 KTI'
        AND WITEL = 'TELKOM SULUT MANADO' GROUP BY WITEL, KLASIFIKASI_STATUS_SMILE ORDER BY KLASIFIKASI_STATUS_SMILE ASC");
       $result9 = mysqli_query($con,"SELECT COUNT(KLASIFIKASI_STATUS_SMILE)-1 as JUMLAH FROM tabel_lme_main WHERE DIVRE = 'R7 KTI'
        AND WITEL = 'TELKOM SULUT SELATAN' GROUP BY WITEL, KLASIFIKASI_STATUS_SMILE ORDER BY KLASIFIKASI_STATUS_SMILE ASC");
        echo "<div>
           <div>
                <table class='table table-hover table-bordered'>
                  <thead>
                    <tr>
                      <th>--WITEL--</th>
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
                  echo "<td>TELKOM BALI SELATAN (DENPASAR)</td>";
                  while ($row = mysqli_fetch_array($result1))
                  {
                      echo "<td>" . $row['JUMLAH'] . "</td>";
                  }
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td>TELKOM BALI UTARA (SINGARAJA)</td>";
                  while ($row = mysqli_fetch_array($result2))
                  {
                      echo "<td>" . $row['JUMLAH'] . "</td>";
                  }
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td>TELKOM NTB (MATARAM)</td>";
                  while ($row = mysqli_fetch_array($result3))
                  {
                      echo "<td>" . $row['JUMLAH'] . "</td>";
                  }
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td>TELKOM NTT (KUPANG)</td>";
                  while ($row = mysqli_fetch_array($result4))
                  {
                      echo "<td>" . $row['JUMLAH'] . "</td>";
                  }
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td>TELKOM SULSEL MAKASAR</td>";
                  while ($row = mysqli_fetch_array($result5))
                  {
                      echo "<td>" . $row['JUMLAH'] . "</td>";
                  }
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td>TELKOM SULTENG PALU</td>";
                  while ($row = mysqli_fetch_array($result6))
                  {
                      echo "<td>" . $row['JUMLAH'] . "</td>";
                  }
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td>TELKOM SULTRA (KENDARI)</td>";
                  while ($row = mysqli_fetch_array($result7))
                  {
                      echo "<td>" . $row['JUMLAH'] . "</td>";
                  }
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td>TELKOM SULUT MANADO</td>";
                  while ($row = mysqli_fetch_array($result8))
                  {
                      echo "<td>" . $row['JUMLAH'] . "</td>";
                  }
                  echo "</tr>";
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td>TELKOM SULUT SELATAN</td>";
                  while ($row = mysqli_fetch_array($result9))
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