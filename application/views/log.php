<!doctype html>

<html>
  
  <head>
    
    <title>Changes Log Wifi LME</title>
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
        .table td {
   text-align: center;   
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
          <a class="navbar-brand" href='<?php echo site_url('HomeController/main') ?>'>Telkom LME</a>
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
            <div class="panel-body" style="text-align:center"><b style="font-size:x-large">Log LME Wifi Nasional</b></div>
          </div>
          <table>
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
        //echo "<script>alert(".$data->ID_LME.");</script>";
        try
        {
          if(empty($data->id_log))
          {
             throw new Exception("No data found.");
          }
          else
          {
            $num = (int)$data->id_log;
            $num -=20;
          }
        }
        catch(Exception $e)
        {
          echo "<script>alert('No data found.')</script>";
          $num = -1;
        }

        echo "<table id='thetable' class='table table-hover table-bordered' >
          <thead>
            <tr>
              
              <th>Keterangan</th>
              <th>Subjek</th>
              <th>Waktu</th>
              <th>Witel</th>
              <th>Lokasi</th>
              <th>Before</th>
              <th>After</th>
              <th>Action</th>
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
            //$num++;
            echo "<tr>";
            
            echo "<td>" . $data->keterangan . "</td>";
            echo "<td>" . $data->subjek . "</td>";
            echo "<td>" . $data->waktu . "</td>";
            echo "<td>" . $data->witel . "</td>";
            echo "<td>" . $data->lokasi . "</td>";
            echo "<td>" . $data->from . "</td>";
            echo "<td>" . $data->to . "</td>";
            if ($data->keterangan == 'DELETE' && $data->id_delete == '0000000')
            {
              echo "<td><i style='color:green'>restored</i></td>";
            }
            else if($data->keterangan == 'DELETE')
            {
              echo "<td><a href='" . site_url('/InputController/restoreItem/' . $data->id_log . "/" . $data->id_delete) . "'><i>restore</i><a></td>";
            }
            else
            {
              echo "<td><i>no action</i></td>";
            }
            echo "</tr>";
          //}
          }
        };
          echo "</tbody>";
          echo "</table>";

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