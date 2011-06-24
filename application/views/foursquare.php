<?php
if ($this->config->item('foursquare_enabled') != 1){
	redirect(base_url(),'refresh');
}
?>
		<div id="container">
			<div class="transparency"></div>
			<div class="content">
			<h1>Badges</h1>
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
		
			for($i=0;$i<count($fstatus->user->badges);$i++){
				echo "<a href=\"http://www.4squarebadges.com/foursquare-badge-list/".str_replace(" ", "-", $fstatus->user->badges[$i]->name)."-badge/\" rel=\"nofollow\" target=\"_blank\"><img title=\"".$fstatus->user->badges[$i]->name." | ".$fstatus->user->badges[$i]->description."\" src=".$fstatus->user->badges[$i]->icon."></a> \n";
				if(($i==3) || ($i==7) || ($i==11) || ($i==15) || ($i==19) || ($i==23)){
					echo "<br>\n";
				}
			}
		?>
		
		<br>
		<h2>Mayorships</h2>
		
		<?php
			for($i=0;$i<$fstatus->user->mayorcount;$i++){
				if(array_key_exists('primarycategory', $fstatus->user->mayor[$i])){
					echo "<a href=\"http://foursquare.com/venue/".$fstatus->user->mayor[$i]->id."\" rel=\"nofollow\" target=\"_blank\"><img title=\"".$fstatus->user->mayor[$i]->name."\" src=".$fstatus->user->mayor[$i]->primarycategory->iconurl."></a> \n";
					if(($i==5) || ($i==9) || ($i==13) || ($i==17) || ($i==21) || ($i==25)){
						echo "<br>\n";
					}
				}
			}
		?>
			</div>
		</div>