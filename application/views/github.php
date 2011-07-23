<?php
if ($this->config->item('github_enabled') != 1){
	redirect(base_url(),'refresh');
}
?>
		<div id="container">
			<div class="transparency"></div>
			<div class="content">
				<?php
					$ch_repos = curl_init();
					curl_setopt($ch_repos, CURLOPT_URL, $this->config->item('github_repos_url'));
					curl_setopt($ch_repos, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch_repos, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
					$repos = json_decode(curl_exec($ch_repos));
					curl_close($ch_repos);

					$ch_gist = curl_init();
					curl_setopt($ch_gist, CURLOPT_URL, $this->config->item('github_gist_url'));
					curl_setopt($ch_gist, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch_gist, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
					$gists = json_decode(curl_exec($ch_gist));
					curl_close($ch_gist);

					if($repos){
						echo "<h1>Repositories</h1>";
						foreach ($repos as $repository) {
							echo "<div id=\"post\"><h2><a href=\"".$repository->url."\">".$repository->name."</a></h2>Description: ".$repository->description."<br>Watchers: ".$repository->watchers."<br>Forks: ".$repository->forks."<br>";
							if($repository->homepage){
								echo "Homepage: <a href=\"".$repository->homepage."\">".$repository->homepage."</a>";
							}
							echo "</div>";
						}
					}

					if($gists){
						echo "<br>\n<h1>Gists</h1>";
						foreach ($gists as $gist) {
							echo "<div id=\"post\"><h2><a href=\"".$gist->html_url."\">".$gist->id."</a></h2>Description: ".$gist->description."</div>";
						}
					}
				?>
				<p><a href="http://www.github.com/user/<? echo $this->config->item('github_username'); ?>" rel="nofollow" target="_blank"><? echo $this->config->item('my_name'); ?> on GitHub</a></p>
			</div>
		</div>