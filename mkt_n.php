<?php
require 'config.php';

if(isset($_REQUEST['sn']) && isset($_REQUEST['id'])){
	$con = con2db();
	$query="select m_id from mikrotik where m_nameid='".$_REQUEST['id']."' and m_serialnumber='".$_REQUEST['sn']."'";
	$result = mysqli_query($con,$query);
	$hostcount=$_REQUEST['hostcount'];
	$downlist="";
	if(mysqli_num_rows($result)==1){
		$m_ids=mysqli_fetch_assoc($result);
		$m_id = $m_ids['m_id'];
		$query2="";
		for($n=0;$n<$hostcount;$n++){
			$query2.="insert into netwatch ";
			$query2.="(m_id,n_host,n_status,n_comment) ";
			if($_REQUEST['status'][$n]=='up'){
				$status = 1;
			}else{ 
				$status = 0;
				$downlist = $downlist.$_REQUEST['host'][$n].",";
			}
			$query2.="value(".$m_ids['m_id'].",'".$_REQUEST['host'][$n]."',".$status.",'".$_REQUEST['comment'][$n]."');";
		}
		if(mysqli_multi_query($con,$query2)){
			echo "ok ; ".date("Y-m-d H:i:s");
		}else{
			echo "error";
		}
		$con = con2db();	
		//echo $query2;
		if($downlist==""){
			$query3="update mikrotik set m_ap='ok' where m_id=".$m_id.";";
		}else{
			$query3="update mikrotik set m_ap='".$downlist."' where m_id=".$m_id.";";
		}
		//echo $query3;
		$result3 = mysqli_query($con,$query3);
		
	}
	mysqli_close($con);
}

?>