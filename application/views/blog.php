<?php
if ($this->config->item('blog_enabled') != 1){
	redirect(base_url(),'refresh');
}
?>
		<div id="container">
			<div class="transparency"></div>
			<div class="content">
				<h1>Blog</h1>
				<?php
				for($i=0;$i<count($posts);$i++){
					echo "<div id=\"post\"><h2><a href=\"".$posts[$i]['link']."\" target=\"_blank\">".$posts[$i]['title']."</a></h2>\nPosted ".$this->myfunctions->relativeTime(strtotime($posts[$i]['pubDate']))."<br>".utf8_decode($posts[$i]['content'])."</div>";
				}
				?>
				<a href="<?php echo $this->config->item('my_blog_url'); ?>" target="_blank"><?php echo $this->config->item('my_name'); ?>'s Blog</a> <a href="<?php echo $this->config->item('blog_rss_url'); ?>" target="_blank"><img src="/resources/images/rss.png" alt="RSS" border="0" /></a>
			</div>
		</div>