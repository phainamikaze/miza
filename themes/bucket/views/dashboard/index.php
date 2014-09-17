<?php

$this->pageTitle=Yii::app()->name . ' - Dashboard';
$this->breadcrumbs=array(
	'Dashboard',
);
?>
   
		<div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Heading goes here..
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <?php echo Yii::t('main','profile'); ?>
                    </div>
                </section>
            </div>
        </div>
