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
      if(status == "Belum Proses" || status == "Belum Order Mitra")
      {
        document.getElementById("boxKlasifikasi").value = "A. NON PROGRESS";
      }
      else if(status == "Sedang Proses Survey" || status == "Pelaksanaan DRM (Aproval Design)")
      {
        document.getElementById("boxKlasifikasi").value = "B. SURVEY";
      }
      else if(status == "Penarikan Optic" || status == "Menunggu Material" || status == "Order ke Mitra / Subcont")
      {
        document.getElementById("boxKlasifikasi").value = "C. ON PROGRESS";
      }
      else if(status == "L1" || status == "L2" || status == "L3" || status == "Selesai Instalasi" || status == "On Air")
      {
        document.getElementById("boxKlasifikasi").value = "D. SELESAI INSTALASI";
      }
      else if(status == "Sedang Proses Rekonsiliasi")
      {
        document.getElementById("boxKlasifikasi").value = "E. REKON";
      }
      else if(status == "Belum Ada Izin Lokasi" || status == "Tidak Di Izinkan Pemilik Lokasi" || status == "Menunggu SITAC dari Wibro")
      {
        document.getElementById("boxKlasifikasi").value = "F. KENDALA SITAC";
      }
      else if(status == "Menunggu Aproval Design Center TA" || status == "Menunggu Aproval Witel" || status == "Alamat tidak di temukan" || status == "Menunggu DRM" || status == "Menunggu Feeder/Tidak ada Feeder" || status == "Other")
      {
        document.getElementById("boxKlasifikasi").value = "G. KENDALA NON SITAC";
      }
      else if(status == "Duplikasi" || status == "On Air Existing" || status == "SITAC" || status == "Batal" || status == "Dismantle" || status == "Dibatalkan Oleh Wibro")
      {
        document.getElementById("boxKlasifikasi").value = "H. BATAL";
      }
      else if(status == "Pelaksanaan UT" || status == "Penerbitan BAST")
      {
        document.getElementById("boxKlasifikasi").value = "I. BAST";
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
            <li >
              <a href='<?php echo site_url('HomeController/main') ?>'>Home</a>
            </li>
            <li >
              <a href='<?php echo site_url('ReportController/report1') ?>'>Laporan</a>
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
       $resultSurat = mysqli_query($con, "select distinct surat_pesanan FROM tabel_order WHERE ID_ORDER != 10");
       $resultSelected = mysqli_query($con,"select * FROM tabel_lme_main, tabel_order 
                              where id_lme = " . $id . " and tabel_lme_main.ID_ORDER = tabel_order.ID_ORDER");  

      echo form_open('InputController/UpdateValidation/' . $id);
        echo "<h2 class='form-signin-heading'>Edit an item</h2>
        <br>
        <div class='form-group'>
          <label class='control-label'>Divisi Regional :</label>";
          $rows = mysqli_fetch_array($resultSelected);
         echo "<input type='text' class='form-control' name='boxDivre' list='divisi' value='" . $rows['DIVRE'] . "'>
         <datalist id='divisi'>";
         while ($row = mysqli_fetch_array($resultDivre)){
         echo "<option>".$row['DIVRE']."</option>";
         }
         echo "</datalist>";
         echo "</select>
        </div>
        <div class='form-group'>
          <label class='control-label'>Witel :</label>
        <input type='text' list='witel' class='form-control' name='boxWitel' value='" . $rows['WITEL'] . "'>
        <datalist id='witel'>";
            while ($row = mysqli_fetch_array($resultWitel)){
         echo "<option>".$row['WITEL']."</option>";
         }
         echo "</datalist>";
        echo "</select>
          </div>
        <div class='form-group'>
          <label class='control-label'>Kota :</label>
          <input type='text' list='kota' class='form-control' name='boxKota' value='" . $rows['KOTA'] . "'>
          <datalist id='kota'>";
            while ($row = mysqli_fetch_array($resultKota)){
         echo "<option>".$row['KOTA']."</option>";
         }
         echo "</datalist>";
         echo "</select>
         </div>
        <div class='form-group'>
          <label class='control-label'>Nama Lokasi :</label>
          <input type='text' list='lokasi' class='form-control' name='boxLokasi' value='" . $rows['NAMA_LOKASI'] . "'>
          <datalist id='lokasi'>";
            while ($row = mysqli_fetch_array($resultLokasi)){
         echo "<option>".$row['NAMA_LOKASI']."</option>";
         }
         echo "</datalist>";
         echo "</select>
         </div>
        <div class='form-group'>
          <label class='control-label'>Alamat :</label>
          <input type='text' list='alamat' class='form-control' name='boxAlamat' value='" . $rows['ALAMAT'] . "'>
          <datalist id='alamat'>";
            while ($row = mysqli_fetch_array($resultAlamat)){
         echo "<option>".$row['ALAMAT']."</option>";
         }
         echo "</datalist>";
         echo "</select>
        </div>
        <div class='form-group'>
          <label class='control-label'>Surat Pesanan :</label>
          <input type='text' list='surat' class='form-control' name='boxSurat' id='boxSurat' value='" . $rows['SURAT_PESANAN'] . "'>
          <datalist id='surat'>";
            while ($row = mysqli_fetch_array($resultSurat)){
         echo "<option>".$row['surat_pesanan']."</option>";
         }
         echo "</datalist>";
         echo "</select>
        </div>
        <div class='form-group'>
          <label class='control-label'>Tipe LME :</label>
          <input type='text' list='tipe' class='form-control' name='boxTipe' value='" . $rows['TYPE_LME'] . "'>
          <datalist id='tipe'>";
            while ($row = mysqli_fetch_array($resultTipe)){
         echo "<option>".$row['TYPE_LME']."</option>";
         }
         echo "</datalist>";
         echo "</select>
         </div>
        <div class='form-group'>
          <label class='control-label'>Order :</label>
          <input type='text' list='orders' class='form-control' name='boxOrder' value='" . $rows['ORDERS'] . "'>
          <datalist id='orders'>";
            while ($row = mysqli_fetch_array($resultOrder)){
         echo "<option>".$row['orders']."</option>";
         }
         echo "</datalist>";
         echo "</select>";
         $data = array('from' => $rows['KLASIFIKASI_STATUS_SMILE']);
         $this->session->set_userdata($data);
         echo "</select>
        </div>
        <div class='form-group'>
          <label class='control-label'>Klasifikasi Status Smile :</label>
          <input type='text' class='form-control' id='boxKlasifikasi' name='boxKlasifikasi' value='" . $rows['KLASIFIKASI_STATUS_SMILE'] . "'>
        </div>
        <div class='form-group'>
        <label class='form-label'>Status Progress WIFI :</label>
        <select type='text' id='boxStatus' class='form-control' name='boxStatus' onchange='setKlasifikasi()' value='" . $rows['STATUS_PROGRESS_WIFI'] . "'>
          <option>Alamat tidak di temukan</option>
          <option>Batal</option>
          <option>Belum Ada Izin Lokasi</option>
          <option>Belum Order Mitra</option>
          <option>Belum Proses</option>
          <option>Dibatalkan oleh Wibro</option>
          <option>Dismantle</option>
          <option>Duplikasi</option>
          <option>L1</option>
          <option>L2</option>
          <option>L3</option>
          <option>Menunggu Aproval Design Center TA</option>
          <option>Menunggu Aproval Witel</option>
          <option>Menunggu DRM</option>
          <option>Menunggu Feeder/Tidak ada Feeder</option>
          <option>Menunggu Material</option>
          <option>Menunggu SITAC dari Wibro</option>
          <option>On Air</option>
          <option>On Air Existing</option>
          <option>On Air Tembaga</option>
          <option>Order ke Mitra / Subcont</option>
          <option>Other</option>
          <option>Pelaksanaan DRM (Aproval Design)</option>
          <option>Pelaksanaan UT</option>
          <option>Penarikan Optic</option>
          <option>Penerbitan BAST</option>
          <option>Sedang Proses Rekonsiliasi</option>
          <option>Sedang Proses Survey</option>
          <option>Selesai Instalasi</option>
          <option>SITAC</option>
          <option>Tidak diizinkan Pemilik Lokasi</option>
        </select>
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