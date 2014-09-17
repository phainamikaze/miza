<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Registration</title>

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

      <form name="signupForm" class="cmxform form-signin" id="signupForm" action="<?php echo Yii::app()->baseUrl; ?>/user/signup" method="post">
        <h2 class="form-signin-heading">Registered</h2>
        <div class="login-wrap">
            <div class="alert alert-success alert-block fade in">
                <h4>
                <i class="icon-ok-sign"></i>
                Success!
                </h4>
                <p>Already Registered.</p>
            </div>

            <button class="btn btn-lg btn-login btn-block" type="button" onclick="location.href='<?php echo Yii::app()->baseUrl; ?>/user/login'" >Go Login   <i class="fa fa-arrow-circle-o-right"></i></button>

        </div>

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
    <!--common script init for all pages-->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/scripts.js"></script>
  </body>
</html>