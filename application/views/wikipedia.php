<?php
if ($this->config->item('wikipedia_enabled') != 1){
	redirect(base_url(),'refresh');
}
?>
		<div id="container">
			<div class="transparency"></div>
			<div class="content">
				<h1>Wikipedia Contributions</h1>
				<?php
				$total = count($contributions);
				for($i=0;$i<$total;$i++){
					echo "<div id=\"post\"><h2><a href=\"http://en.wikipedia.org/wiki/".str_replace( " ", "_", $contributions[$i]->title)."\" target=\"_blank\">".$contributions[$i]->title."</a></h2>\n".$this->myfunctions->relativeTime(strtotime($contributions[$i]->timestamp))."<br>Revised Page: <a href=\"http://en.wikipedia.org/w/index.php?title=".str_replace( " ", "_", $contributions[$i]->title)."&oldid=".$contributions[$i]->revid."\" target=\"_blank\">".$contributions[$i]->title."</a><br>Comment: ".$contributions[$i]->comment."</div>";
				}
				?>
				<p><a href="<?php echo $this->config->item('wikipedia_url'); ?>" target="_blank"><?php echo $this->config->item('my_name'); ?>'s Wikipedia Page</a></p>
				</div>
		</div>