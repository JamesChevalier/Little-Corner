<div id="content">
	<div id="blog">
		<h1>Blog</h1>
		<?php
		for($i=0;$i<count($posts);$i++){
			echo "<div id=\"post\"><h2><a href=\"".$posts[$i]['link']."\" target=\"_blank\">".$posts[$i]['title']."</a></h2>\nPosted ".$this->myfunctions->relativeTime(strtotime($posts[$i]['pubDate']))."<br>".utf8_decode($posts[$i]['content'])."</div>";
		}
		?>
		<a href="<?php $this->config->item('my_blog_url'); ?>" target="_blank"><?php echo $this->config->item('my_name'); ?>'s Blog</a> <img src="/resources/images/rss.png">
	</div>
</div>