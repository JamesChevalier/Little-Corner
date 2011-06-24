		<div id="container">
			<div class="transparency"></div>
			<div class="content">
			<h1>Weekly Top Artists</h1>
		<?php
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $this->config->item('lastfm_url'));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			$xml = simplexml_load_string(curl_exec($ch));
			curl_close($ch);
			for($i=0;$i<count($xml->topartists->artist);$i++){
				if($xml->topartists->artist[$i]->image[4] == ''){
				} else{
					echo "<a href=\"".$xml->topartists->artist[$i]->url."\" rel=\"nofollow\" target=\"_blank\"><img title=\"".$xml->topartists->artist[$i]->name."\" src='".$xml->topartists->artist[$i]->image[4]."'></a>\n<br>\n";
				}
			}
		?>
			<p><a href="http://www.last.fm/user/<? echo $this->config->item('lastfm_username'); ?>" rel="nofollow" target="_blank"><? echo $this->config->item('my_name'); ?> on Last.FM</a></p>
			</div>
		</div>