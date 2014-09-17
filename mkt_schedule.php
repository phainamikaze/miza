<?php
$check = array(1,2,3);
require('config.php');
$msg = "";

	foreach ($check as $s)
	{
		$con = con2db();
		$query = "SELECT m_name,m_wan,m_ap,m_online,m_datetime FROM mikrotik WHERE m_id =".$s.";";
		$result = mysqli_query($con,$query);
		while($rs = mysqli_fetch_assoc($result)){
			$msg.="\n".$rs['m_datetime']." ".$rs['m_name']." Online:".$rs['m_online'];
			$wan_status = explode(",",$rs['m_wan']);
			$wancount =  count($wan_status)-2;
			foreach ($wan_status as $w => $value){
			
				if($value==0){
					$msg.="\n WAN".($w+1)." down";
				}/*else{
					$msg.="\n WAN".($w+1)." up";
				}*/
				if($w==$wancount)
				{
					break;
				}
			}
			
			if($rs['m_ap']!="ok"){
				$ap_status = explode(",",$rs['m_ap']);
				$apcount = count($ap_status)-2;
				foreach ($ap_status as $a => $value){
				
					$msg.="\n AP".$value." down";
					if($a==$apcount)
					{
						break;
					}
				}
			}
			$msg.="\n";
		}
		
		
		$msg.="\n";
	}
	echo $msg;
	if($msg!='')
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

?>
