<!doctype html>

<html>
  
  <head>
    <title>Input item</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootswatch/3.0.0/simplex/bootstrap.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
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
            <button type="submit" class="btn btn-danger" onClick="window.location='<?php echo "../LoginController/logout" ?>'" >Sign Out</button>
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
<<<<<<< HEAD
       $resultDivre = mysqli_query($con,"select distinct divre from tabel_lme_main");  
       $resultWitel = mysqli_query($con,"select distinct WITEL from tabel_lme_main"); 
       $resultKota = mysqli_query($con,"select distinct KOTA from tabel_lme_main");
       $resultLokasi = mysqli_query($con,"select distinct NAMA_LOKASI from tabel_lme_main");
       $resultAlamat = mysqli_query($con,"select distinct ALAMAT from tabel_lme_main");
       $resultTipe = mysqli_query($con,"select distinct TYPE_LME FROM tabel_lme_main");
       $resultOrder = mysqli_query($con,"select distinct ORDERS FROM tabel_lme_main");
       $resultSurat = mysqli_query($con, "select distinct surat_pesanan FROM tabel_order");
       echo form_open('InputController/insert_validation');
        echo "<h2 class='form-signin-heading'>Entry Data Baru</h2>
=======
       $resultDivisi = mysqli_query($con,"select distinct divisi from tabel_lme_main");  
       $resultRegion = mysqli_query($con,"select distinct region from tabel_lme_main"); 
       $resultProject = mysqli_query($con,"select distinct nama_project from tabel_lme_main"); 
       $resultSp = mysqli_query($con,"select distinct project_sp from tabel_lme_main");
       $resultSp2 = mysqli_query($con,"select distinct sp from tabel_lme_main");
       $resultIdSite = mysqli_query($con,"select distinct id_site from tabel_lme_main");
       $resultSurat = mysqli_query($con,"select distinct surat_pesanan FROM tabel_order");
       $resultLokasi = mysqli_query($con,"select distinct nama_lokasi FROM tabel_lme_main");
       $resultAlamat = mysqli_query($con,"select distinct alamat FROM tabel_lme_main");
       $resultOrder = mysqli_query($con,"select distinct orders from tabel_lme_main");		 
       $resultWitel = mysqli_query($con,"select distinct witel from tabel_lme_main");
       $resultSite = mysqli_query($con, "select nama_lokasi FROM tabel_site");
		  echo form_open('InputController/insert_validation');
        echo "<h2 class='form-signin-heading'>Input new item</h2>
>>>>>>> origin/master
        <br>
        <div class='form-group'>
          <label class='control-label'>Divisi Regional:</label>";
         echo "<input type='text' class='form-control' name='boxDivre' list='divre'>
         <datalist id='divre'>";
         while ($row = mysqli_fetch_array($resultDivre)){
         echo "<option>".$row['divre']."</option>";
         }
         echo "</datalist>";
         echo "</select>
        </div>
        <div class='form-group'>
          <label class='control-label'>Witel :</label>
          <input type='text' list='witel' class='form-control' name='boxWitel'>
          <datalist id='witel'>";
        while ($row = mysqli_fetch_array($resultWitel)){
         echo "<option>".$row['WITEL']."</option>";
         }
         echo "</datalist>";
         echo "</select>
        </div>
        <div class='form-group'>
          <label class='control-label'>Kota :</label>
        <input type='text' list='kota' class='form-control' name='boxKota'>
        <datalist id='kota'>";
            while ($row = mysqli_fetch_array($resultKota)){
         echo "<option>".$row['KOTA']."</option>";
         }
         echo "</datalist>";
         echo "</select>
        </div>
        <div class='form-group'>
          <label class='control-label'>Nama Lokasi :</label>
        <input type='text' list='lokasi' class='form-control' name='boxLokasi'>
        <datalist id='lokasi'>";
            while ($row = mysqli_fetch_array($resultLokasi)){
         echo "<option>".$row['NAMA_LOKASI']."</option>";
         }
         echo "</datalist>";
          echo "</select>
        </div>
        <div class='form-group'>
        <label class='control-label'>Alamat :</label>
        <input list='alamat' class='form-control' name='boxAlamat'>
        <datalist id='alamat'>";
            while ($row = mysqli_fetch_array($resultAlamat)){
         echo "<option>".$row['ALAMAT']."</option>";
         }
         echo "</datalist>";
         echo "</select>
        </div>
        <div class='form-group'>
          <label class='control-label'>Surat Pesanan :</label>
          <select list='surat' class='form-control' name='boxSurat'>
          <datalist id='surat'>";
            while ($row = mysqli_fetch_array($resultSurat)){
         echo "<option>".$row['surat_pesanan']."</option>";
         }
         echo "</datalist>";
         echo "</select>
        </div>
        <div class='form-group'>
          <label class='control-label'>Tipe LME :</label>
          <input type='text' list='tipe' class='form-control' name='boxTipe'>
          <datalist id='tipe'>";
            while ($row = mysqli_fetch_array($resultTipe)){
         echo "<option>".$row['TYPE_LME']."</option>";
         }
         echo "</datalist>";
         echo "</select>
        </div>
        <div class='form-group'>
          <label class='control-label'>Order :</label>
          <input type='text' list='order' class='form-control' name='boxOrder'>
          <datalist id='order'>";
            while ($row = mysqli_fetch_array($resultOrder)){
         echo "<option>".$row['ORDERS']."</option>";
         }
         echo "</datalist>";
         echo "</select>
         </div>
         <div class='form-group'>
          <label class='control-label'>Klasifikasi Status Smile :</label>
          <input type='text' class='form-control' name='boxKlasifikasi'>";
         echo "</select>
         </div>
         <div class='form-group'>
          <label class='control-label'>Status Progress Wifi :</label>
          <input type='text' class='form-control' name='boxStatus'>";
         echo "</select>
         </div>
         <div class='form-group'>
          <label class='control-label'>Keterangan Status :</label>
          <input type='text' class='form-control' name='boxKeterangan'>";
         /*echo "</select>
          </div>
          <div class='form-group'>
          <label class='control-label'>Klasifikasi Status Progress :</label>
          <select class='form-control' name='boxKlasifikasi'>
            <option>A. Non Progress</option>
            <option>B. Survey</option>
            <option>C. On Progress</option>
            <option>D. Selesai Instalasi</option>
            <option>E. Proses Rekon</option>
            <option>F. Kendala Sitac</option>
            <option>G. Kendala Non-Sitac</option>
            <option>H. Batal</option>
          </select>*/
        echo "  
        </div>
        <button class='btn btn-lg btn-primary btn-block' id='submit'>Submit</button> 
    </div>";
    ?>
  </body>

</html>