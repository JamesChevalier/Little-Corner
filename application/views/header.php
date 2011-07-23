<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $this->config->item('site_title'); ?> | <?php echo $pagename;?></title>
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>resources/style.css">
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Cardo">
		<meta name="keywords" content="<?php echo $this->config->item('site_keywords'); ?>"/>
		<meta name="description" content="<?php echo $this->config->item('site_description'); ?>"/>
		<?php
			if($this->config->item('googleanalytics_enabled') == 1){
				echo "<script type=\"text/javascript\">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', '<?php echo $this->config->item('site_google_alytics_code'); ?>']);
			_gaq.push(['_trackPageview']);
			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>";
			}
			if($pagename == "Instagram"){
				echo "<script type=\"text/javascript\" src=\"".base_url()."resources/js/prototype.js\"></script>
		<script type=\"text/javascript\" src=\"".base_url()."resources/js/scriptaculous.js?load=effects,builder\"></script>
		<script type=\"text/javascript\" src=\"".base_url()."resources/js/lightbox.js\"></script>
		<link rel=\"stylesheet\" href=\"".base_url()."resources/lightbox.css\" type=\"text/css\" media=\"screen\" />";
			}
		?>
	</head>
	<body>
		<div id="navcontainer">
			<div class="navtransparency"></div>
				<div class="navcontent">
					<img src="<?php echo $this->config->item('site_avatar'); ?>">
					<p><?php echo $this->config->item('short_description'); ?></p>
					<ul id="navlist">
						<li><a href="/">Home</a></li>
						<?php
						if ($this->config->item('contactpage_enabled')==1){
							echo "<li><a href=\"/contact\">Contact</a></li>";
						}
						if ($this->config->item('projects_enabled')==1){
							echo "<li><a href=\"/projects\">Projects</a></li>";
						}
						if ($this->config->item('blog_enabled')==1){
							echo "<li><a href=\"/blog\">Blog</a></li>";
						}
						if ($this->config->item('delicious_enabled')==1){
							echo "<li><a href=\"/bookmarks\">Bookmarks</a></li>";
						}
						if ($this->config->item('instagram_enabled')==1){
							echo "<li><a href=\"/instagram\">Instagram</a></li>";
						}
						if ($this->config->item('twitter_enabled')==1){
							echo "<li><a href=\"/twitter\">Twitter</a> (<a href=\"/favorites\">Favorites</a>)</li>";
						}
						if ($this->config->item('foursquare_enabled')==1){
							echo "<li><a href=\"/foursquare\">Foursquare</a></li>";
						}
						if ($this->config->item('lastfm_enabled')==1){
							echo "<li><a href=\"/lastfm\">Last.FM</a></li>";
						}
						if ($this->config->item('github_enabled')==1){
							echo "<li><a href=\"/github\">GitHub</a></li>";
						}
						if ($this->config->item('wikipedia_enabled')==1){
							echo "<li><a href=\"/wikipedia\">Wikipedia</a></li>";
						}
						?>
					</ul>			
				</div>
		</div>