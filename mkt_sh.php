<?php
require 'config.php';

if(isset($_REQUEST['sn']) && isset($_REQUEST['id'])){
	$con = con2db();
	$query="select m_id from mikrotik where m_nameid='".$_REQUEST['id']."' and m_serialnumber='".$_REQUEST['sn']."'";
	$result = mysqli_query($con,$query);

	if(mysqli_num_rows($result)==1){
		$m_ids=mysqli_fetch_assoc($result);
		$m_id = $m_ids['m_id'];
		$query2="insert into system_h ";
		$query2.="(m_id,sh_mkttime,sh_uptime,sh_freememory,sh_freehddspace,sh_cpuload,sh_badblocks,sh_voltage,sh_temperature) ";
		$query2.="value(".$m_ids['m_id'].",STR_TO_DATE('".$_REQUEST['date']." ".$_REQUEST['time']."','%M/ %d/%Y %H:%i:%s'),'".$_REQUEST['uptime']."',".$_REQUEST['freememory'].",".$_REQUEST['freehddspace'];
		$query2.=",".$_REQUEST['cpuload'].",".$_REQUEST['badblocks'].",".$_REQUEST['voltage'].",".$_REQUEST['temperature'].")";
		if(mysqli_query($con,$query2)){
			echo "ok ; ".date("Y-m-d H:i:s");
		}
		//echo $query2;
		
		$con = con2db();
		$query3="update mikrotik set m_datetime=STR_TO_DATE('".$_REQUEST['date']." ".$_REQUEST['time']."','%M/ %d/%Y %H:%i:%s') where m_id=".$m_id.";";
		//echo $query3;
		$result3 = mysqli_query($con,$query3);
	}
	mysqli_close($con);
}

?>