<?php
require 'config.php';

if(isset($_REQUEST['sn']) && isset($_REQUEST['id'])){
	$con = con2db();
	$query="select m_id from mikrotik where m_nameid='".$_REQUEST['id']."' and m_serialnumber='".$_REQUEST['sn']."'";
	$result = mysqli_query($con,$query);
	$online=$_REQUEST['online'];
	if(mysqli_num_rows($result)==1){
		$m_ids=mysqli_fetch_assoc($result);
		$m_id = $m_ids['m_id'];
		$query2="";
		for($au=0;$au<$online;$au++){
			$query2.="insert into active_user ";
			$query2.="(m_id,au_name,au_bytesin,au_bytesout) ";
			$query2.="value(".$m_ids['m_id'].",'".$_REQUEST['name'][$au]."',".$_REQUEST['bytesin'][$au].",".$_REQUEST['bytesout'][$au].");";
		}
		if(mysqli_multi_query($con,$query2)){
			echo "ok ; ".date("Y-m-d H:i:s");
		}else{
			echo "error";
		}
		//echo $query2;
		$con = con2db();
		$query3="update mikrotik set m_online=".$online." where m_id=".$m_id.";";
		echo $query3;
		$result3 = mysqli_query($con,$query3);
	}
	mysqli_close($con);
}

?>