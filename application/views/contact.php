<?php
if ($this->config->item('contactpage_enabled') != 1){
	redirect(base_url(),'refresh');
}
?>
		<div id="container">
			<div class="transparency"></div>
			<div class="content">
				<h1>Contact</h1>
				<?php echo $this->config->item('google_voice_code'); ?>
				<p>
				<?php
					if(!$didcontact){
						echo form_open('/site/message');
						echo "<p class=\"name\">\n";
						$ndata = array('name' => 'name', 'id' => 'id', 'size' => '25');
						echo form_input($ndata);
						echo form_label('Name ','name')."\n</p>";
						
						echo "<p class=\"email\">\n";
						$edata = array('name' => 'email', 'id' => 'email', 'size' => '25');
						echo form_input($edata);
						echo form_label('Email ','email')."\n</p>";
						
						echo "<p class=\"message\">\n";
						echo form_label('','message');
						$cdata = array('name' => 'message', 'id' => 'notes', 'cols' => '60', 'rows' => '20');
						echo form_textarea($cdata)."\n</p>";
						
						echo "<p class=\"submit\">\n";
						echo form_submit('submit','Send Message');
						echo "\n</p>";
						echo form_close();
					}
					else{
						echo "<br>".$didcontact;
					}
				?>
				</p>
			</div>
		</div>
