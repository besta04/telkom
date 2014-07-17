<!doctype html>

<html>
  
  <head>
    <title>Edit item</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootswatch/3.0.0/simplex/bootstrap.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    function setKlasifikasi() 
    {
      var status = document.getElementById("boxStatus").value;
      if(status == "B")
      {
        document.getElementById("boxKlasifikasi").value = "testing";
      }
    }
    </script>
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #eee;
      }
      .form-signin {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
      }
      .form-signin .form-signin-heading, .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin .checkbox {
        font-weight: normal;
      }
      .form-signin .form-control {
        position: relative;
        font-size: 16px;
        height: auto;
        padding: 10px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
      }
      .form-signin .form-control:focus {
        z-index: 2;
      }
      .form-signin input[type="text"] {
        margin-bottom: -1px;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
      }
      .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
    div.hidden 
    {   
      display: none;
    }
  
    .cover {
      left: 0;
      top: 0;
      background-color: rgba(0,0,0,0.8);
      width:100%;
      height:100%;
      position: fixed;
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
            <button type="submit" class="btn btn-danger" onClick="window.location='<?php echo "../../LoginController/logout" ?>'" >Sign Out</button>
          </div>
        </div>
        <!-- /.nav-collapse -->
      </div>
      <!-- /.container -->
    </div>
  <?php
    echo "<div class='container'>
      <!--<div class='form-signin'>-->
    ";
        $con=mysqli_connect("localhost","root","root","telkom_lme");
        if (mysqli_connect_errno())
        {
          echo "Failed to connect : ". mysqli_connect_error();
        }
        //print_r($id);
       $resultDivre = mysqli_query($con,"select distinct DIVRE from tabel_lme_main");  
       $resultWitel = mysqli_query($con,"select distinct WITEL from tabel_lme_main"); 
       $resultKota = mysqli_query($con,"select distinct KOTA from tabel_lme_main");
       $resultLokasi = mysqli_query($con,"select distinct NAMA_LOKASI from tabel_lme_main");
       $resultAlamat = mysqli_query($con,"select distinct ALAMAT from tabel_lme_main");
       $resultTipe = mysqli_query($con,"select distinct TYPE_LME FROM tabel_lme_main");
       $resultOrder = mysqli_query($con,"select distinct ORDERS FROM tabel_lme_main");
       $resultSurat = mysqli_query($con, "select distinct surat_pesanan FROM tabel_order");

       $resultSelected = mysqli_query($con,"select * FROM tabel_lme_main, tabel_order 
                              where id_lme = " . $id . " and tabel_lme_main.ID_ORDER = tabel_order.ID_ORDER");  

      echo form_open('InputController/UpdateValidation/' . $id);
        echo "<h2 class='form-signin-heading'>Edit an item</h2>
        <br>
        <div class='form-group'>
          <label class='control-label'>Divisi Regional :</label>";
          $rows = mysqli_fetch_array($resultSelected);
         echo "<input type='text' class='form-control' name='boxDivre' list='divisi' value='" . $rows['DIVRE'] . "' readonly>
        </div>
        <div class='form-group'>
          <label class='control-label'>Witel :</label>
        <input type='text' list='witel' class='form-control' name='boxWitel' value='" . $rows['WITEL'] . "' readonly>
          </div>
        <div class='form-group'>
          <label class='control-label'>Kota :</label>
          <input type='text' list='kota' class='form-control' name='boxKota' value='" . $rows['KOTA'] . "' readonly>
         </div>
        <div class='form-group'>
          <label class='control-label'>Nama Lokasi :</label>
          <input type='text' list='lokasi' class='form-control' name='boxLokasi' value='" . $rows['NAMA_LOKASI'] . "' readonly>
         </div>
        <div class='form-group'>
          <label class='control-label'>Alamat :</label>
          <input type='text' list='alamat' class='form-control' name='boxAlamat' value='" . $rows['ALAMAT'] . "' readonly>
        </div>
        <div class='form-group'>
          <label class='control-label'>Surat Pesanan :</label>
          <input type='text' list='surat' class='form-control' name='boxSurat' id='boxSurat' value='" . $rows['SURAT_PESANAN'] . "' readonly>
        </div>
        <div class='form-group'>
          <label class='control-label'>Tipe LME :</label>
          <input type='text' list='tipe' class='form-control' name='boxTipe' value='" . $rows['TYPE_LME'] . "' readonly>
         </div>
        <div class='form-group'>
          <label class='control-label'>Order :</label>
          <input type='text' list='orders' class='form-control' name='boxOrder' value='" . $rows['ORDERS'] . "' readonly>";
         $data = array('from' => $rows['KLASIFIKASI_STATUS_SMILE']);
         $this->session->set_userdata($data);
         echo "
        </div>
        <div class='form-group'>
          <label class='control-label'>Klasifikasi Status Smile :</label>
          <input type='text' class='form-control' name='boxKlasifikasi' id='boxKlasifikasi' value='" . $rows['KLASIFIKASI_STATUS_SMILE'] . "' readonly>
        </div>
        <div class='form-group'>
        <label class='form-label'>Status Progress WIFI :</label>
        <input type='text' id='boxStatus' class='form-control' name='boxStatus' onchange='setKlasifikasi()' value='" . $rows['STATUS_PROGRESS_WIFI'] . "'>
        </div>

        <label class='form-label'>Alasan Status Progress :</label>
        <textarea class='form-control' name='boxKeterangan' >".$rows['ALASAN_STATUS_PROGRESS']."</textarea><br>

        <button class='btn btn-lg btn-primary btn-block' id='submit'>Submit</button> 
    </div>";
  //if(isset($_REQUEST['submit']))
  //{
    //form_open('InputController/insert_validation');
  //}
  //?>
  <script type="text/javascript">
    $('#submit').click(function(){
    form_open('InputController/insert_validation');
  });
  </script>
  </body>

</html>