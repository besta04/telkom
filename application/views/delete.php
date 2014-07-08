<!doctype html>

<html>
  
  <head>
    <title>Deleting...</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #eee;
      }
      .form-signin {
        max-width: 350px;
        padding: 15px;
        margin: 0 auto;
      }
      .form-signin .form-signin-heading, .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .center {
    margin: auto;
    width: 70%;
}
      .form-signin .checkbox {
        font-weight: normal;
      }
      .form-signin .form-control {
        max-width: 330px;
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
       .form-control {
        max-width: 330px;
        position: relative;
        font-size: 16px;
        height: auto;
        padding: 10px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
      }
      .form-control:focus {
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
      btn btn-lg btn-primary btn-block{
          max-width: 330px;
      }
       
    </style>
  </head>
  
  <body>
    <div class="form-signin">
      
        <h2 class="center"> Are you sure ?</h2>
        <br />
        This will delete item with id <b><?php echo $id ?></b>. Click OK to continue, otherwise back to cancel.
        <!-- /container -->
        <br/>
        <div class="alert alert-dismissable alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <b>Warning!</b> Deleted data will gone permanently, you can't bring it back.
        </div>
        <ul class="pager">
          <li>
            <a href=<?php echo "../../InputController/DeleteValidation/" . $id ?>>OK</a>
          </li>
          <li>
            <a href=<?php echo "../../ReportController/report1" ?>>Back</a>
          </li>
        </ul>
       </div>
    <!-- /container -->
  </body>

</html>