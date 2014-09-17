<?php
	if($_GET['access_token']){
		echo "ee";
		print_r($_GET);
	}
	else if($_GET['code']){
		$acctkurl="https://graph.facebook.com/oauth/access_token";
		$acctkurl.="?client_id=199279830281900";
		$acctkurl.="&redirect_uri=http://mikrotik.chiangmaiwifi.com/mkt_fb.php";
		$acctkurl.="&client_secret=f2bd6a5bd1bd4272c331b795e5b42923";
		$acctkurl.="&code=".$_GET['code'];
		echo "<a href=".$acctkurl.">get new access token step 2</a>"; 
	}
	else{
		$oauthurl = "https://www.facebook.com/dialog/oauth";
		$oauthurl.= "?client_id=199279830281900";
		$oauthurl.= "&redirect_uri=http://mikrotik.chiangmaiwifi.com/mkt_fb.php";
		$oauthurl.= "&scope=publish_actions,publish_stream";
		
		echo "<a href=".$oauthurl.">get new access token(oauth) step 1</a>";


		print_r($_GET);
	}
	
?>
