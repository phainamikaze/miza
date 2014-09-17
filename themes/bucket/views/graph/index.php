<?php

$this->pageTitle=Yii::app()->name . ' - Graph';
$this->breadcrumbs=array(
	'Graph',
);
$this->actionscript  = '<script src="'.Yii::app()->theme->baseUrl.'/js/chart-js/Chart.js"></script>';
//$this->actionscript .= '<script src="'.Yii::app()->theme->baseUrl.'/js/chartjs.init.js"></script>';
$this->actionscript .='<script>
var barChartData = {
            labels : ["Januarrrrry","February","March","April","May","June","July"],
            datasets : [
                {
                    fillColor : "#E67A77",
                    strokeColor : "#E67A77",
                    data : [65,59,90,81,56,55,40]
                },
                {
                    fillColor : "#79D1CF",
                    strokeColor : "#79D1CF",
                    data : [28,48,40,19,96,27,100]
                }
            ]

        }

        var myLine = new Chart(document.getElementById("bar-chart-js").getContext("2d")).Bar(barChartData);
</script>';
?>


<div class="row">
    <div class="col-sm-12">
        <section class="panel">

                    <header class="panel-heading">
                        Bar Chart
                    </header>
                    <div class="panel-body">
                        <div class="chartJS">
                            <canvas id="bar-chart-js" height="250" width="800" ></canvas>
                        </div>
                    </div>

         </section>
    </div>
</div>

