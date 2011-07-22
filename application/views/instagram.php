<?php
if ($this->config->item('instagram_enabled') != 1){
	redirect(base_url(),'refresh');
}
?>
		<div id="container">
			<div class="transparency"></div>
			<div class="content">
				<h1>Recent Photos</h1>
				<?php
					foreach ($igphotos as $photo) {
						if($like->caption){
							echo "<a href=\"".$photo->images->standard_resolution->url."\" rel=\"lightbox[ig]\" title=\"".htmlentities($photo->caption->text)."\"><img src=\"".$photo->images->thumbnail->url."\" title=\"".$photo->caption->text."\" border=0 /></a>";
						}
						else{
							echo "<a href=\"".$photo->images->standard_resolution->url."\" rel=\"lightbox[ig]\"><img src=\"".$photo->images->thumbnail->url."\" border=0 /></a>";
						}
					}
				?>

				<br />
				<h1>Recent Likes</h1>
				<?php
					foreach ($iglikes as $like) {
						if($like->caption){
							echo "<a href=\"".$like->images->standard_resolution->url."\" rel=\"lightbox[ig]\" title=\"".htmlentities($like->caption->text)."\"><img src=\"".$like->images->thumbnail->url."\" title=\"".$like->caption->text."\" border=0 /></a>";
						}
						else{
							echo "<a href=\"".$like->images->standard_resolution->url."\" rel=\"lightbox[ig]\"><img src=\"".$like->images->thumbnail->url."\" border=0 /></a>";
						}
					}
				?>
			</div>
		</div>