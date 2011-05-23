<?php
	$username = $this->config->item('foursquare_username');
	$password = $this->config->item('foursquare_password');
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $this->config->item('foursquare_url'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	$output = curl_exec($ch);
	curl_close($ch);
	$fstatus = json_decode($output);

	echo "<div id=\"content\"><div id=\"badges\">\n<h1>Badges</h1>\n";

	for($i=0;$i<count($fstatus->user->badges);$i++){
		echo "<a href=\"http://www.4squarebadges.com/foursquare-badge-list/".str_replace(" ", "-", $fstatus->user->badges[$i]->name)."-badge/\" rel=\"nofollow\" target=\"_blank\"><img title=\"".$fstatus->user->badges[$i]->name." | ".$fstatus->user->badges[$i]->description."\" src=".$fstatus->user->badges[$i]->icon."></a> \n";
		if(($i==3) || ($i==7) || ($i==11) || ($i==15) || ($i==19)){
			echo "<br>\n";
		}
	}
	
	echo "<br>\n<h2>Mayorships</h2>\n";

	for($i=0;$i<$fstatus->user->mayorcount;$i++){
		if(array_key_exists('primarycategory', $fstatus->user->mayor[$i])){
			echo "<a href=\"http://foursquare.com/venue/".$fstatus->user->mayor[$i]->id."\" rel=\"nofollow\" target=\"_blank\"><img title=\"".$fstatus->user->mayor[$i]->name."\" src=".$fstatus->user->mayor[$i]->primarycategory->iconurl."></a> \n";
			if(($i==3) || ($i==7) || ($i==11) || ($i==15) || ($i==19)){
				echo "<br>\n";
			}
		}
	}
	
	echo "</div>\n</div>";
?>