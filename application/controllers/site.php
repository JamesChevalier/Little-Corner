<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	// Main Page
	public function index()
	{
		$pagename = array('pagename' => 'Home');
		$this->load->view('header', $pagename);
		$this->load->view('footer');
	}

	// Blog Page
	function blog()
	{
		$this->load->library('myfunctions');
		$this->load->library('RSSParser', array('url' => $this->config->item('blog_rss_url'), 'life' => 0));
		$posts = array('posts' => $this->rssparser->getFeed(10));
		$pagename = array('pagename' => 'Blog');
		$this->load->view('header', $pagename);
		$this->load->view('blog', $posts);
		$this->load->view('footer');
	}

	// Contact Page
	function contact()
	{
		$this->load->helper('form');
		$pagename = array('pagename' => 'Contact', 'didcontact' => '');
		$this->load->view('header', $pagename);
		$this->load->view('contact');
		$this->load->view('footer');
	}

	// Foursquare Page
	function foursquare()
	{
		$pagename = array('pagename' => 'Foursquare');
		$this->load->view('header', $pagename);
		$this->load->view('foursquare');
		$this->load->view('footer');
	}

	// Last.FM Page
	function lastfm()
	{
		$pagename = array('pagename' => 'Weekly Top Artists');
		$this->load->view('header', $pagename);
		$this->load->view('lastfm');
		$this->load->view('footer');
	}

	// Function to Send Email
	function message()
	{
		$this->load->library('email', $this->config->item('email_settings'));
		$data = array( 
			'name' => $this->security->xss_clean($this->input->post('name')),
			'email' => $this->security->xss_clean($this->input->post('email')),
			'message' => $this->security->xss_clean($this->input->post('message')),
		);
		$this->email->from($data['email'], $data['name']);
		$this->email->to($this->config->item('email_address'));
		$this->email->subject($this->config->item('email_subject'));
		$this->email->message($data['message']);
		$this->email->send();
		redirect('/site/thanks','refresh');
	}

	// Projects Page
	function projects()
	{
		$pagename = array('pagename' => 'Projects');
		$this->load->view('header', $pagename);
		$this->load->view('projects');
		$this->load->view('footer');
	}

	// Post-Contact Page
	function thanks()
	{
		$this->load->helper('form');
		$pagename = array(
			'pagename' => 'Thanks',
			'didcontact' => 'Thanks!'
		);
		$this->load->view('header', $pagename);
		$this->load->view('contact');
		$this->load->view('footer');
	}

	// Twitter Page
	function twitter()
	{
		$this->load->library('myfunctions');
		$this->load->library('twitter');
		$auth = $this->twitter->oauth($this->config->item('twitter_consumer_key'), $this->config->item('twitter_consumer_key_secret'), $this->config->item('twitter_access_token'), $this->config->item('twitter_access_token_secret'));
		$pagename = array('pagename' => 'Twitter');
		$publictimeline = $this->twitter->call('statuses/user_timeline');
		$timeline = array('timeline' => $publictimeline);
		$this->load->view('header', $pagename);
		$this->load->view('twitter', $timeline);
		$this->load->view('footer');
	}

	// Twitter Favorites Page
	function favorites()
	{
		$this->load->library('myfunctions');
		$this->load->library('twitter');
		$auth = $this->twitter->oauth($this->config->item('twitter_consumer_key'), $this->config->item('twitter_consumer_key_secret'), $this->config->item('twitter_access_token'), $this->config->item('twitter_access_token_secret'));
		$pagename = array('pagename' => 'Twitter Favorites');
		$publictimeline = $this->twitter->call('favorites');
		$timeline = array('timeline' => $publictimeline);
		$this->load->view('header', $pagename);
		$this->load->view('favorites', $timeline);
		$this->load->view('footer');
	}
	
	// Placeholder Twilio Integration
	function sms()
	{
		$this->load->view('sms');
	}
	
	function called()
	{
		$this->load->view('called');
	}

}

/* End of file site.php */
/* Location: ./application/controllers/site.php */