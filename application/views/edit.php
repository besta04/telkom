<!doctype html>

<html>
  
  <head>
    <title>Edit item</title>
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
       $resultDivisi = mysqli_query($con,"select distinct divisi from tabel_lme_main");
       $resultRegion = mysqli_query($con,"select distinct region from tabel_lme_main"); 
       $resultProject = mysqli_query($con,"select distinct nama_project from tabel_lme_main"); 
       $resultSp = mysqli_query($con,"select distinct project_sp from tabel_lme_main");
       $resultSurat = mysqli_query($con,"select distinct surat_pesanan FROM tabel_order, tabel_lme_main WHERE tabel_lme_main.ID_ORDER = tabel_order.ID_ORDER");
       $resultOrder = mysqli_query($con,"select distinct orders from tabel_lme_main");		 
       $resultWitel = mysqli_query($con,"select distinct witel from tabel_lme_main");
       $resultSite = mysqli_query($con, "select distinct NAMA_LOKASI, ALAMAT FROM tabel_site, tabel_lme_main WHERE tabel_lme_main.ID_SITE = tabel_site.ID_SITE");

       $resultSelected = mysqli_query($con,"select * FROM tabel_lme_main, tabel_order 
                              where id_lme = " . $id . " and tabel_lme_main.ID_ORDER = tabel_order.ID_ORDER");  

      echo form_open('InputController/UpdateValidation/' . $id);
        echo "<h2 class='form-signin-heading'>Edit an item</h2>
        <br>
        <div class='form-group'>
          <label class='control-label'>Divisi :</label>";
          $rows = mysqli_fetch_array($resultSelected);
         echo "<input type='text' class='form-control' name='boxDivisi' list='divisi' value='" . $rows['DIVISI'] . "'>
         <datalist id='divisi'>";
         while ($row = mysqli_fetch_array($resultDivisi)){
         echo "<option>".$row['divisi']."</option>";
         }
         echo "</datalist>";
         
       echo "</select>
        </div>
        
        <div class='form-group'>
          <label class='control-label'>Regional : </label>
          <input type='text' class='form-control' name='boxRegional' list='regional' value='" . $rows['REGION'] . "'>
          <datalist id='regional'>";
          while ($row = mysqli_fetch_array($resultRegion)){
         echo "<option>".$row['region']."</option>";
         }
         echo "</datalist>";
         echo "</select>
        </div>
        <div class='form-group'>
          <label class='control-label'>Nama Project :</label>
          <input type='text' list='project' class='form-control' name='boxProject' value='" . $rows['NAMA_PROJECT'] . "'>
          <datalist id='project'>";
        while ($row = mysqli_fetch_array($resultProject)){
         echo "<option>".$row['nama_project']."</option>";
         }
         echo "</datalist>";
         echo "</select>
        </div>
        <div class='form-group'>
          <label class='control-label'>Project/SP :</label>
        <input type='text' list='SP' class='form-control' name='boxProject/SP' value='" . $rows['PROJECT_SP'] . "'>
        <datalist id='SP'>";
            while ($row = mysqli_fetch_array($resultSp)){
         echo "<option>".$row['project_sp']."</option>";
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
          <label class='control-label'>Order :</label>
          <input type='text' list='orders' class='form-control' name='boxOrder' value='" . $rows['ORDERS'] . "'>
          <datalist id='orders'>";
            while ($row = mysqli_fetch_array($resultOrder)){
         echo "<option>".$row['orders']."</option>";
         }
         echo "</datalist>";
         echo "</select>
        </div>
        <div class='form-group'>
          <label class='control-label'>Witel :</label>
          <input type='text' list='witel' class='form-control' name='boxWitel' value='" . $rows['WITEL'] . "'>
          <datalist id='witel'>";
            while ($row = mysqli_fetch_array($resultWitel)){
         echo "<option>".$row['witel']."</option>";
         }
         echo "</datalist>";
         echo "</select>
        </div>
        <div class='form-group'>
          <label class='control-label'>Lokasi :</label>
          <input type='text' list='lokasi' class='form-control' name='boxLokasi' value='" . $rows['NAMA_LOKASI'] . "'>
          <datalist id='lokasi'>";
         echo "<option>".$row['NAMA_LOKASI']."</option>";
            while ($row = mysqli_fetch_array($resultSite)){
         }
         echo "</datalist>";
         $data = array('from' => $rows['KLAS_STAT_PROGRESS']);
         $this->session->set_userdata($data);
         echo "</select>
        </div>
        <div class='form-group'>
          <label class='control-label'>Klasifikasi Status Progress :</label>
          <input type='text' list='status' class='form-control' name='boxKlasifikasi' value='" . $rows['KLAS_STAT_PROGRESS'] . "'>
            <datalist id='status'>;
            <option>A. Non Progress</option>
            <option>B. Survey</option>
            <option>C. On Progress</option>
            <option>D. Selesai Instalasi</option>
            <option>E. Proses Rekon</option>
            <option>F. Kendala Sitac</option>
            <option>G. Kendala Non-Sitac</option>
            <option>H. Batal</option>
            </datalist>
          </select>
        </div>
        <label class='form-label'>Status Progress :</label>
        <textarea class='form-control' name='boxStatus' value='" . $rows['STAT_PROGRESS'] . "'></textarea><br>
        <label class='form-label'>Keterangan :</label>
        <textarea class='form-control' name='boxKeterangan' value='" . $rows['KETERANGAN'] . "'></textarea><br>
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