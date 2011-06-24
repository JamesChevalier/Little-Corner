		<div id="container">
			<div class="transparency"></div>
			<div class="content">
				<h1>Twitter</h1>
				<?php
					for($i=0;$i<count($timeline);$i++){
						if($timeline[$i]->in_reply_to_status_id){
							echo "<div id=\"tweet\">".preg_replace($this->config->item('patterns'),$this->config->item('replacements'),$timeline[$i]->text)."<br>Posted <a href=\"http://twitter.com/".$this->config->item('my_twitter_username')."/status/".$timeline[$i]->id."\" rel=\"nofollow\" target=\"_blank\">".$this->myfunctions->relativeTime(strtotime($timeline[$i]->created_at))."</a> in reply to <a href=\"http://twitter.com/".$timeline[$i]->in_reply_to_screen_name."/status/".$timeline[$i]->in_reply_to_status_id."\" target=\"_blank\">".$timeline[$i]->in_reply_to_screen_name."</a></div>\n";
						}else{
							echo "<div id=\"tweet\">".preg_replace($this->config->item('patterns'),$this->config->item('replacements'),$timeline[$i]->text)."<br>Posted <a href=\"http://twitter.com/".$this->config->item('my_twitter_username')."/status/".$timeline[$i]->id."\" rel=\"nofollow\" target=\"_blank\">".$this->myfunctions->relativeTime(strtotime($timeline[$i]->created_at))."</a></div>\n";
						}
					}
				?>
				<p><a href="http://twitter.com/<?php echo $this->config->item('my_twitter_username'); ?>"><?php echo $this->config->item('my_name'); ?> on Twitter</a></p>
			</div>
		</div>