<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.png">

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <!--Core CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-reset.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style-responsive.css" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="full-width">

<section id="container" >
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">

    <a href="#" class="logo">
        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo.png" alt="">
    </a>
</div>
<!--logo end-->

<div class="nav notify-row" id="top_menu">

</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/avatar1_small.jpg">
                <span class="username"><?php echo Yii::app()->user->fullname; ?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="<?php echo Yii::app()->baseUrl.'/profile'; ?>"><i class=" fa fa-suitcase"></i><?php echo Yii::t('main','tmenu_profile'); ?></a></li>
                <li><a href="#"><i class="fa fa-cog"></i><?php echo Yii::t('main','tmenu_setting'); ?></a></li>
                <li><a href="<?php echo Yii::app()->baseUrl.'/user/logout'; ?>"><i class="fa fa-power-off"></i><?php echo Yii::t('main','tmenu_logout'); ?></a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                
            </div>
            <div class="col-sm-12">
                <section class="panel">
                    <section class="panel">
                    <header class="panel-heading">
                        <center><h4>My Infrastructure Lists</h4></center>
                    </header>
                </section>
                
                    <div class="panel-body">
                        <section id="unseen">
                            <?php if($msgInfo!="none"){?>
                            <div class="alert alert-success fade in">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="fa fa-times"></i>
                                </button>
                                <strong>Success!</strong> <?php echo $msgInfo;?>
                            </div>
                            <?php } ?>
                            <?php if($msgError!="none"){?>
                            <div class="alert alert-block alert-danger fade in">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="fa fa-times"></i>
                                </button>
                                <strong>Error!</strong> <?php echo $msgError;?>
                            </div>
                            <?php } ?>
                            <table class="table table-bordered table-striped table-condensed">
                                <thead>
                                <tr>
                                    <th width="80%">Infrastructure Name</th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                	<?php 
                                    if(count($infralist->infrastructures)==0){ ?>
                                    <tr>
                                        <td>N/A</td>
                                        <td align="center"><a class="btn btn-success" href="#">N/A</a></td>
                                    </tr>
                                    <?
                                    }
                                    foreach ($infralist->infrastructures as $infrastructure){
                                    ?>
                                    <tr>
                                        <td><?php echo "@".$infrastructure->Name; ?></td>
                                        <td align="center">
                                            <form method="post" action="<?php echo Yii::app()->baseUrl; ?>/Infrastructure/Launcher">
                                                <input type="hidden" name="action" value="launcherinfra">
                                                <input type="hidden" name="infrastructureid" value="<?php echo $infrastructure->Id; ?>">
                                                <input type="hidden" name="infrastructurename" value="<?php echo $infrastructure->Name; ?>">
                                                <button class="btn btn-success" type="submit">Launcher</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            <div>
                            <a align="center" class="btn btn-success" data-toggle="modal" href="#CreateNewInfra">
                                Create New Infrastructure 
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="CreateNewInfra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Create New Infrastructure </h4>
                                        </div>
                                        <form  id="formCreateNew" class="cmxform " method="post">
                                            <input type="hidden" name="action" value="create">
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="infraname">Infrastructure Name</label>
                                                        <div class="input-group m-bot15">
                                                            <span class="input-group-addon">@</span>
                                                            <input type="text" class="form-control" id="infraname" name="infraname" placeholder="Enter Your Infrastructure Name" autofocus>
                                                        </div>
                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                                <button class="btn btn-success" type="submit">Create</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.validate.min.js"></script>
                                <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js_view/infrastructure.js"></script>
                            </div>
                            <!-- modal -->
                        </section>
                    </div>
                </section>
            </div>

        </div>
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->

</section>

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
<!--this page script-->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.validate.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js_view/infrastructure.js"></script>


</body>
</html>
