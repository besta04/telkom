<!doctype html>

<html>
  
  <head>
    <title>Redirecting...</title>
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
      
        <h2 class="form-signin"> <?php echo $stat ?> Successfull</h2>
        <br />
        If your browser does not redirect you in 5 seconds, or you do
        not wish to wait, <a href="<?php if($stat == 'Insert')
        { 
          echo '../inputItem';
        }
        else
        {
          echo '../report1';
        }  ?>">click here</a>
        <?php if($stat == 'Insert')
        { 
          header('Refresh: 5; URL=../inputItem');
        }
        else
        {
          header('Refresh: 5; URL=../report1');
        } ?>
        
       </div>
    <!-- /container -->
  </body>

</html>