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
    </style>
  </head>
  
  <body>
    <div class="container">
      <div class="form-signin">
        <?php echo form_open('InputController/insert_validation'); ?>
        <h2 class="form-signin-heading">Input new item</h2>
        <br>
        <div class="form-group">
          <label class="control-label">Divisi :</label>
          <select class="form-control" name="boxDivisi">
            <option>Divisi Telkom Barat</option>
            <option>Divisi Telkom Timur</option>
          </select>
        </div>
        <div class="form-group">
          <label class="control-label">Regional : (dinamis berdasarkan divisi)</label>
          <select class="form-control" name="boxRegional">
            <option>Regional 1</option>
            <option>Regional 2</option>
            <option>Regional 3</option>
            <option>Regional 4</option>
            <option>Regional 5</option>
            <option>Regional 6</option>
				<option>Regional 7</option>
				<option>Regional 8</option>
				<option>Regional 9</option>
				<option>Regional 10</option>

          </select>
        </div>
        <div class="form-group">
          <label class="control-label">Project :</label>
          <select class="form-control" name="boxProject">
            <option>Tahap12014(4715)</option>
            <option>Tier-1</option>
          </select>
        </div>
        <div class="form-group">
          <label class="control-label">Project/SP :</label>
          <select class="form-control" name="boxProject/SP">
            <option>SP 004</option>
            <option>SP #7</option>
          </select>
        </div>
        <div class="form-group">
          <label class="control-label">Surat Pesanan :</label>
          <select class="form-control" name="boxSurat" id="boxSurat">
            <option>TEL.649/HK.810/DBB-A1000000/2014</option>
            <option>A.K.TEL.004/HK.810/SUC-A1020000/2014</option>
          </select>
        </div>
        <div class="form-group">
          <label class="control-label">Order :</label>
          <select class="form-control" name="boxOrder">
            <option>DNB</option>
            <option>DBB</option>
          </select>
        </div>
        <div class="form-group">
          <label class="control-label">Witel :</label>
          <select class="form-control" name="boxWitel">
            <option>TELKOM BANTEN TIMUR (TANGERANG)</option>
            <option>TELKOM JATIM BARAT (MADIUN)</option>
          </select>
        </div>
        <div class="form-group">
          <label class="control-label">Lokasi : (dinamis berdasarkan proyek)</label>
          <select class="form-control" name="boxLokasi">
            <option>HOTEL IBIS SLIPI</option>
            <option>SMA 2</option>
          </select>
        </div>
        <div class="form-group">
          <label class="control-label">Klasifikasi Status Progress :</label>
          <select class="form-control" name="boxKlasifikasi">
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
        <label class="form-label">Status Progress :</label>
        <textarea class="form-control" name="boxStatus"></textarea><br>
        <label class="form-label">Keterangan :</label>
        <textarea class="form-control" name="boxKeterangan"></textarea><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
        
      <!--</form>-->

      </div>
    </div>
    <!-- /container -->
  </body>

</html>