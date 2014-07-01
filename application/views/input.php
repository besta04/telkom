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
		#overlay {
     visibility: hidden;
     position: absolute;
     left: 0px;
     top: 0px;
     width:100%;
     height:100%;
     text-align:center;
     z-index: 1000;
     background-color: rgba(1,1,1,0.8)
      }
      #overlay div {
           width:300px;
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
  <?php
    echo "<div class='container'>
      <!--<div class='form-signin'>-->
		";
        $con=mysqli_connect("localhost","root","root","telkom_lme");
        if (mysqli_connect_errno())
        {
          echo "Failed to connect : ". mysqli_connect_error();
        }
       $resultDivisi = mysqli_query($con,"select distinct divisi from tabel_lme_main");  
       $resultRegion = mysqli_query($con,"select distinct region from tabel_lme_main"); 
       $resultProject = mysqli_query($con,"select distinct nama_project from tabel_lme_main"); 
       $resultSp = mysqli_query($con,"select distinct project_sp from tabel_lme_main");
       $resultSurat = mysqli_query($con,"select distinct surat_pesanan FROM tabel_order, tabel_lme_main WHERE tabel_lme_main.ID_ORDER = tabel_order.ID_ORDER");
		 $resultOrder = mysqli_query($con,"select distinct orders from tabel_lme_main");		 
       $resultWitel = mysqli_query($con,"select distinct witel from tabel_lme_main");
       $resultSite = mysqli_query($con, "select distinct NAMA_LOKASI, ALAMAT FROM tabel_site, tabel_lme_main WHERE tabel_lme_main.ID_SITE = tabel_site.ID_SITE");
		  echo form_open('InputController/insert_validation');
        echo "<h2 class='form-signin-heading'>Input new item</h2>
        <br>
        <div class='form-group'>
          <label class='control-label'>Divisi :</label>";
         echo "<select class='form-control' name='boxDivisi'>";
         while ($row = mysqli_fetch_array($resultDivisi)){
         echo "<option>".$row['divisi']."</option>";
         }
         
         echo "<div id='overlay'>
           <div>
           		
               Click here to [<a href='#' onclick='overlay()'>close</a>]
           </div>
          </div>";
         
       echo "</select>
        </div>
        
        <div class='form-group'>
          <label class='control-label'>Regional : (dinamis berdasarkan divisi)</label>
          <select class='form-control' name='boxRegional'>";
          while ($row = mysqli_fetch_array($resultRegion)){
         echo "<option>".$row['region']."</option>";
         }

         echo "</select>
        </div>
        <div class='form-group'>
          <label class='control-label'>Nama Project :</label>
          <select class='form-control' name='boxProject'>";
        while ($row = mysqli_fetch_array($resultProject)){
         echo "<option>".$row['nama_project']."</option>";
         }
         echo "</select>
        </div>
        <div class='form-group'>
          <label class='control-label'>Project/SP :</label>
          <select class='form-control' name='boxProject/SP'>";
            while ($row = mysqli_fetch_array($resultSp)){
         echo "<option>".$row['project_sp']."</option>";
         }
          echo "</select>
        </div>
        <div class='form-group'>
          <label class='control-label'>Surat Pesanan :</label>
          <select class='form-control' name='boxSurat' id='boxSurat'>";
            while ($row = mysqli_fetch_array($resultSurat)){
         echo "<option>".$row['surat_pesanan']."</option>";
         }
         echo "</select>
        </div>
        <div class='form-group'>
          <label class='control-label'>Order :</label>
          <select class='form-control' name='boxOrder'>";
            while ($row = mysqli_fetch_array($resultOrder)){
         echo "<option>".$row['orders']."</option>";
         }
         echo "</select>
        </div>
        <div class='form-group'>
          <label class='control-label'>Witel :</label>
          <select class='form-control' name='boxWitel'>";
            while ($row = mysqli_fetch_array($resultWitel)){
         echo "<option>".$row['witel']."</option>";
         }
         echo "</select>
        </div>
        <div class='form-group'>
          <label class='control-label' href='#' onclick='overlay()'>Lokasi : (dinamis berdasarkan proyek)</label>
          <select class='form-control' name='boxLokasi'>";
            while ($row = mysqli_fetch_array($resultSite)){
         echo "<option>".$row['NAMA_LOKASI']."</option>";
         }
         echo "</select>
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
          </select>
        </div>
        <label class='form-label'>Status Progress :</label>
        <textarea class='form-control' name='boxStatus'></textarea><br>
        <label class='form-label'>Keterangan :</label>
        <textarea class='form-control' name='boxKeterangan'></textarea><br>
        <button class='btn btn-lg btn-primary btn-block' value='submit' action='index.php/InputController/insert_validation'>Submit</button> 
    </div>";
	//if(isset($_REQUEST['submit']))
	//{
    //form_open('InputController/insert_validation');
	//}
  //?>
  </body>

</html>