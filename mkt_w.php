<?php
require 'config.php';

if(isset($_REQUEST['sn']) && isset($_REQUEST['id'])){
	$con = con2db();
	$query="select m_id from mikrotik where m_nameid='".$_REQUEST['id']."' and m_serialnumber='".$_REQUEST['sn']."'";
	$result = mysqli_query($con,$query);
	$wan=$_REQUEST['wan'];
	$wlist="";
	if(mysqli_num_rows($result)==1){
		$m_ids=mysqli_fetch_assoc($result);
		$m_id = $m_ids['m_id'];
		$query2="";
		for($w=0;$w<$wan;$w++){
			$query2.="insert into wan ";
			$query2.="(m_id,w_link,w_status,w_ip) ";
			if($_REQUEST['wstatus'][$w]=='up'){
				$status = 1;
			}else{ 
				$status = 0;
			}
			$wlist = $wlist.$status.",";
			$query2.="value(".$m_ids['m_id'].",".($w+1).",".$status.",'".$_REQUEST['wip'][$w]."');";
		}
		if(mysqli_multi_query($con,$query2)){
			echo "ok ; ".date("Y-m-d H:i:s");
		}else{
			echo "error";
		}
		//echo $query2;
		
		$con = con2db();	
		
		$query3="update mikrotik set m_wan='".$wlist."' where m_id=".$m_id.";";
		//echo $query3;
		$result3 = mysqli_query($con,$query3);
	}
	mysqli_close($con);
}

?>