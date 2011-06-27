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
					foreach ($badges as $badge) {
						if( $badge->unlocks){
							echo "<a href=\"http://www.4squarebadges.com/foursquare-badge-list/".str_replace( " ", "-", $badge->name)."-badge\" rel=\"nofollow\" target=\"_blank\"><img src=\"".$badge->image->prefix.$badge->image->sizes[0].$badge->image->name."\" title=\"".$badge->name." | ".$badge->description."\" /></a>";
						}
					}
				?>
			
				<br>
				<h1>Mayorships</h1>
				<?php
					foreach ($mayorships as $mayor) {
							echo "<img src=\"".$mayor->categories[0]->icon."\" title=\"".$mayor->name." | ".$mayor->categories[0]->name."\" /></a>";
					}
				?>
		
				<br>
				<h1>Tips</h1>
				<?php
					foreach ($tips as $tip) {
						echo "<div id=\"fstip\"><h2>".$tip->venue->name."</h2><img src=\"".$tip->venue->categories[0]->icon."\"> ".$tip->text."</div>";
					}
				?>
			</div>
		</div>