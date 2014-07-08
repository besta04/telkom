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
    <title>Laporan Wifi LME</title>
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
            <div class="panel-body" style="text-align:center"><b style="font-size:x-large">Laporan LME Wifi Nasional</b></div>
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
        if (is_array($results))
        {
          foreach ($results as $data)
          {
          }
        }
              echo form_open('ReportController/search' );
          echo "<p>Surat Pesanan 
            <td><p>:</p></td>
          </td>
          <td> ";
          $suratPesananSelected = $this->session->userdata('suratPesananIndex');
            echo "<input type='hidden' name='suratPesanan_index' value='".$suratPesananSelected."' id='suratPesanan_index_id'/>
            <select name='suratPesanan' id='suratPesanan' onchange='setSuratPesananIndex()'>
            <option></option>";
            if (is_array($suratPesanan))
            {
              $j = 1;
              foreach ($suratPesanan as $data)
              {
                if($j == $suratPesananSelected)
                {
                  echo "<option selected='selected'>".$data->SURAT_PESANAN."</option>";
                }
                else
                {
                  echo "<option>".$data->SURAT_PESANAN."</option>";
                }
                $j++;
              }
            }
            echo "</select></p>
          </td>
          <td><p>|</p></td>
          <td><p>Project SP</td>
          <td><p>:</p></td>
          <td>";
          $statusSelected = $this->session->userdata('projectSPIndex');
            echo "<input type='hidden' name='projectSP_index' value='".$statusSelected."' id='projectSP_index_id'/>
            <select name='projectSP' id='projectSP' onchange='setProjectSPIndex()'>
            <option></option>";
            if (is_array($projectSP))
            {
              $i = 1;
              foreach ($projectSP as $data)
              {
                if($i == $statusSelected)
                {
                  echo "<option selected='selected'>".$data->PROJECT_SP."</option>";
                }
                else
                {
                  echo "<option>".$data->PROJECT_SP."</option>";
                }
                $i++;
              }
            }
            echo "</select></p>
          </td>
        </tr>
        <tr>
          <td>
          <p>TOC 
            <td>:</td> 
          </td>
          <td>";
            $statusSelected = $this->session->userdata('tocIndex');
            echo "<input type='hidden' name='toc_index' value='".$statusSelected."' id='toc_index_id'/>
            <select name='toc' id='toc' onchange='setTocIndex()'>
            <option></option>";
            if (is_array($toc))
            {
              $i = 1;
              foreach ($toc as $data)
              {
                if($i == $statusSelected)
                {
                  echo "<option selected='selected'>".$data->TOC."</option>";
                }
                else
                {
                  echo "<option>".$data->TOC."</option>";
                }
                $i++;
              }
            }
            echo "</select></p>
          </td>
          <td><p>|</p></td>
          <td><p>Witel</td>
          <td><p>:</p></td>
          <td>";
            $statusSelected = $this->session->userdata('witelIndex');
            echo "<input type='hidden' name='witel_index' value='".$statusSelected."' id='witel_index_id'/>
            <select name='witel' id='witel' onchange='setWitelIndex()'>
            <option></option>";
            if (is_array($witel))
            {
              $i = 1;
              foreach ($witel as $data)
              {
                if($i == $statusSelected)
                {
                  echo "<option selected='selected'>".$data->WITEL."</option>";
                }
                else
                {
                  echo "<option>".$data->WITEL."</option>";
                }
                $i++;
              }
            }
            echo "</select></p>
          </td>
        </tr>
        <tr>
          <td>
            <p>Nama Lokasi 
              <td>:</td> 
            </td>
            <td>";
            $statusSelected = $this->session->userdata('namaLokasiIndex');
            echo "<input type='hidden' name='namaLokasi_index' value='".$statusSelected."' id='namaLokasi_index_id'/>
            <select name='namaLokasi' id='namaLokasi' onchange='setNamaLokasiIndex()'>
            <option></option>";
            if (is_array($namaLokasi))
            {
              $i = 1;
              foreach ($namaLokasi as $data)
              {
                if($i == $statusSelected)
                {
                  echo "<option selected='selected'>".$data->NAMA_LOKASI."</option>";
                }
                else
                {
                  echo "<option>".$data->NAMA_LOKASI."</option>";
                }
                $i++;
              }
            }
            echo "</select></p>
          </td>
          <td><p>|</p></td>
          <td><p>Order</td>
          <td><p>:</p></td>
          <td>";
            $statusSelected = $this->session->userdata('orderIndex');
            echo "<input type='hidden' name='order_index' value='".$statusSelected."' id='order_index_id'/>
            <select name='order' id='order' onchange='setOrderIndex()'>
            <option></option>";
            if (is_array($order))
            {
              $i = 1;
              foreach ($order as $data)
              {
                if($i == $statusSelected)
                {
                  echo "<option selected='selected'>".$data->ORDERS."</option>";
                }
                else
                {
                  echo "<option>".$data->ORDERS."</option>";
                }
                $i++;
              }
            }
            echo "</select></p>
          </td>
        </tr>
        <tr>
          <td>
            <p>Nama Project 
              <td>:</td> 
            </td>
            <td>";
            $statusSelected = $this->session->userdata('namaProjectIndex');
            //echo "<script>alert('".$statusSelected."')</script>";
            echo "<input type='hidden' name='namaProject_index' value='".$statusSelected."' id='namaProject_index_id'/>
            <select name='namaProject' id='namaProject' onchange='setNamaProjectIndex()'>
            <option></option>";
            if (is_array($namaProject))
            {
              $i = 1;
              foreach ($namaProject as $data)
              {
                if($i == $statusSelected)
                {
                  echo "<option selected='selected'>".$data->NAMA_PROJECT."</option>";
                }
                else
                {
                  echo "<option>".$data->NAMA_PROJECT."</option>";
                }
                $i++;
              }
            }
            echo "</select></p>
          </td>
          <td><p>|</p></td>
          <td><p>Status</td>
          <td><p>:</p></td>
          <td>";
            $statusSelected = $this->session->userdata('statusIndex');
            //echo "<script>alert('".$statusSelected."')</script>";
            echo "<input type='hidden' name='status_index' value='".$statusSelected."' id='status_index_id'/>
            <select name='status' id='status' onchange='setStatusIndex()'>";
            echo "<option></option>";
            if (is_array($status))
            {
              $i = 1;
              foreach ($status as $data)
              {
                if($i == $statusSelected)
                {
                  echo "<option selected='selected'>".$data->KLAS_STAT_PROGRESS."</option>";
                }
                else
                {
                  echo "<option>".$data->KLAS_STAT_PROGRESS."</option>";
                }
                $i++;
              }
            }
            
            echo "</select></p>
          </td>";
          ?>
        </tr>
          </table>
          <button type='submit' class='btn btn-success btn-block'>Filter</button>
          <br>
          <?php echo form_close(); 
          ?>
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
          if(empty($data->ID_LME))
          {
             throw new Exception("No data found.");
          }
          else
          {
            $num = (int)$data->ID_LME;
            $num -=20;
          }
        }
        catch(Exception $e)
        {
          echo "<script>alert('No data found.')</script>";
          $num = -1;
        }
       $result2 = mysqli_query($con,"select distinct NAMA_LOKASI, ALAMAT from tabel_lme_main limit ".$num." , 20");
       $result3 = mysqli_query($con,"select distinct ID_LME, STAT_PROGRESS, KLAS_STAT_PROGRESS, KETERANGAN 
                              from tabel_lme_main limit ".$num." , 20");
        echo "<div id='overlay'>
           <div>
                <table class='table table-hover table-bordered'>
                  <thead>
                    <tr>
                      <th>Nama Lokasi</th>
                      <th>Alamat Lokasi</th>
                    </tr>
                  </thead>
                  <tbody>";
                  while ($row = mysqli_fetch_array($result2))
                  {
                    echo "<tr>";
                      echo "<td>" . $row['NAMA_LOKASI'] . "</td>";
                      echo "<td>" . $row['ALAMAT'] . "</td>";
                    echo "</tr>";
                  }
                  echo "</tbody>
                </table>
                Click here to [<a href='#' onclick='overlay()'>close</a>]
           </div>
          </div>";

          echo "<div id='overlayB'>
           <div>
                <table class='table table-hover table-bordered'>
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Klasifikasi Status</th>
                      <th>Status Progress</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>";
                  while ($row = mysqli_fetch_array($result3))
                  {
                    echo "<tr>";
                      echo "<td>" . $row['ID_LME'] . "</td>";
                      echo "<td>" . $row['KLAS_STAT_PROGRESS'] . "</td>";
                      echo "<td>" . $row['STAT_PROGRESS'] . "</td>";
                      echo "<td>" . $row['KETERANGAN'] . "</td>";
                    echo "</tr>";
                  }
                  echo "</tbody>
                </table>
                Click here to [<a href='#' onclick='overlayB()'>close</a>]
           </div>
          </div>";

        echo "<table id='thetable' class='table table-hover table-bordered'>
          <thead>
            <tr>
              <th>#</th>
              <th>Surat Pesanan</th>
              <th>TOC</th>
              <th>Nama Lokasi</th>
              <!--<th>Alamat</th>-->
              <th>Nama Project</th>
              <th>Project SP</th>
              <th>Witel</th>
              <th>Order</th>
              <th>Status</th>
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
            echo "<td>" . $data->ID_LME/*$row['ID_LME']*/ . "</td>";
            echo "<td>" . $data->SURAT_PESANAN/*$row['SURAT_PESANAN']*/ . "</td>";
            echo "<td>" . $data->TOC . "</td>";
            echo "<td><a href='#' onclick='overlay()'>" . $data->NAMA_LOKASI . "</a></td>";
            //echo "<td>" . $row['ALAMAT'] . "</td>";
            echo "<td>" . $data->NAMA_PROJECT . "</td>";
            echo "<td>" . $data->PROJECT_SP . "</td>";
            echo "<td>" . $data->WITEL . "</td>";
            echo "<td>" . $data->ORDERS . "</td>";
            echo "<td><a href='#' onclick='overlayB()'>" . $data->KLAS_STAT_PROGRESS . "</a></td>";
            echo "<td><button type='submit' onClick=window.location='" . site_url('/HomeController/editItem/' . $data->ID_LME) . "' >Edit</button>
            <button type='submit' onClick=window.location='" . site_url('/HomeController/deleteItem/' . $data->ID_LME) . "' >Delete</button></td>";
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