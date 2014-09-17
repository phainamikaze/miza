<?php
require 'config.php';
$msg='';
if(isset($_REQUEST['sn']) && isset($_REQUEST['id'])){
	$con = con2db();
	$query="select m_name from mikrotik where m_nameid='".$_REQUEST['id']."' and m_serialnumber='".$_REQUEST['sn']."'";
	$result = mysqli_query($con,$query);
	$hostcount=$_REQUEST['hostcount'];
	if(mysqli_num_rows($result)==1){
		$m_name=mysqli_fetch_assoc($result);
		$msg .= $m_name['m_name']."\n";
		for($i=0;$i<sizeof($_REQUEST['link']);$i++){
			$msg .= "\t".'WAN'.$_REQUEST['link'][$i].' '.$_REQUEST['wstatus'][$i]."\n";
		}
		if($msg != '')
		{
			$fb = new Facebook($config);
			$params = array(
			  // this is the main access token (facebook profile)
			  "access_token" => $acctoken,
			  "message" => $msg,
			  "link" => "",
			  "picture" => "",
			  "name" => "",
			  "caption" => "",
			  "description" => ""
			);

			try {
			  $ret = $fb->api('/639780932753993/feed', 'POST', $params);
			  echo 'ok';
			} catch(Exception $e) {
			  echo $e->getMessage();
			}
		}
	}
	mysqli_close($con);
}

?>