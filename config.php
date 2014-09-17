<?php
require('src/facebook.php');
//require('acctoken.php');

$filexml = 'http://remotepayapnet2.dyndns.org:86/netwatch_alarm/mikrotik.xml'; 
//$acctoken = 'CAAC1PnNZBrqwBAF8wuxvrGsQ2m2ZC8ZBA4WmyDvYcU9PJb0ZBtMXfRekKeWT2WWsy4HDVlBhwpel0tEeAU9b18QQhG0QIt4OukeT6tOJcO2mmOC0ZASAVYFhzV3rbdo3ua7XcPRP5AtwC6ANvSQB4CxAUOwRvSOkvTTOORKYWsf36PRg3Rog3';
$acctoken = 'CAAC1PnNZBrqwBALAfgmTvZBzQG1Q8s9OWOzJZBUCY1Bees0j2Wd4x4CPEriKjuwE4oltwrnzXV2CduzkAvC58zxBBnveq3vOZC1Xw8EhgExzImlixJBvw40QQYbPzZCZAOg8qRWak4XfJKL22fWZA2KgnQlvKPo5qCOGUaMgpGTutFCsnGktj9GhlONG8o2nPZB8kIfKBPu2IDx3l24Img3l';
$config = array(
		'appId' => '199279830281900',
		'secret' => 'f2bd6a5bd1bd4272c331b795e5b42923',
		'fileUpload' => false,
);

/*-------------- db config ----------------*/

$dbhost='localhost';
$dbuser='root';
$dbpass='1234';
$dbname='mkt';

/*-------------- db config ----------------*/

function con2db()
{
	global $dbcon, $dbhost, $dbuser, $dbpass, $dbname;
	
	$con = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}
	else{
		mysqli_query($con,"SET NAMES 'utf8'; ");
		mysqli_query($con,"SET character_set_results='utf8'; ");
		return $con;
	}


}



function wfile($str_param){
	$objFopen = fopen('acctoken.php', 'w');
	fwrite($objFopen, '<?php');
	fwrite($objFopen, '$acctoken='.$str_param.';');
	fwrite($objFopen, '?>');
	fclose($objFopen);
}
function rfile(){
	$objFopen = fopen("acctoken", 'r');
	$param = fgets($objFopen, 4096);
	fclose($objFopen);
	return $param;
}
?>