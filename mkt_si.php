<?php
require 'config.php';

if(isset($_REQUEST['sn']) && isset($_REQUEST['id'])){
	$con = con2db();
	$query="select m_id from mikrotik where m_nameid='".$_REQUEST['id']."' and m_serialnumber='".$_REQUEST['sn']."'";
	$result = mysqli_query($con,$query);

	if(mysqli_num_rows($result)==1){
		$m_ids=mysqli_fetch_assoc($result);
		$query2="insert into system_info ";
		$query2.="(m_id,si_totalmemory,si_totalhddspace,si_cpufrequency,si_version,si_cpu,si_cpucount,si_architecturename,si_boardname,si_platform,si_softwareid) ";
		$query2.="value(".$m_ids['m_id'].",".$_REQUEST['totalmemory'].",".$_REQUEST['totalhddspace'].",".$_REQUEST['cpufrequency'].",'".$_REQUEST['version'];
		$query2.="','".$_REQUEST['cpu']."','".$_REQUEST['cpucount']."','".$_REQUEST['architecturename']."','".$_REQUEST['boardname'];
		$query2.="','".$_REQUEST['platform']."','".$_REQUEST['softwareid']."')";
		if(mysqli_query($con,$query2)){
			echo "ok ; ".date("Y-m-d H:i:s");
		}
	}
	mysqli_close($con);
}

?>