<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Login</title>

    <!--Core CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-reset.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style-responsive.css" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">

    <div class="container">

      <form id="loginForm" class="cmxform form-signin" action="<?php echo Yii::app()->baseUrl; ?>/user/login" method="post" accept-charser="UTF-8">
        <h2 class="form-signin-heading">Miza Project</h2>
        <div class="login-wrap">
          <input type="hidden" name="run" value="login">
            <div class="user-login-info">
                <div class="form-group ">
                  <input type="text" class=" form-control" placeholder="User Name"  name="username" <?php if(!empty($username)) echo 'value="'.$username.'"'; else echo 'autofocus'; ?>>
                </div>
                <div class="form-group ">
                  <input type="password" class=" form-control" placeholder="Password" name="password" <?php if(!empty($username)) echo 'autofocus'; ?>>
                </div>
                <?php if($msgError!=="none") { ?>
                  <br/>
                  <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                      <i class="fa fa-times"></i>
                    </button>
                    <strong><?php echo $msgError.'!'; ?></strong>    Change a few things up and try login again.
                  </div>
                <?php } ?>
            </div>
            <label class="checkbox">
                <input type="checkbox" value="ture" name="rememberme" > Remember me
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>

                </span>
            </label>

            <button class="btn btn-lg btn-login btn-block" type="submit">Login</button>

            <div class="registration">
                Don't have an account yet?
                <a class="" href="<?php echo Yii::app()->baseUrl; ?>/user/signup">
                    Create an account
                </a>
            </div>

        </div>

          <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Forgot Password ?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Enter your e-mail address below to reset your password.</p>
                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-success" type="button">Submit</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->

      </form>

    </div>



    <!-- Placed js at the end of the document so the pages load faster -->

       <!--Core js-->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/bs3/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.nicescroll.js"></script>

    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.validate.min.js"></script>
    
    <!--common script init for all pages-->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/scripts.js"></script>
    <!--this page script-->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js_view/user.js"></script>


  </body>
</html>
