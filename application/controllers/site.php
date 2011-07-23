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

	// Bookmarks Page
	function bookmarks()
	{
		$this->load->library('myfunctions');
		$this->load->library('RSSParser', array('url' => $this->config->item('delicious_rss_url'), 'life' => 0));
		$posts = array('posts' => $this->rssparser->getFeed(15));
		$pagename = array('pagename' => 'Bookmarks');
		$this->load->view('header', $pagename);
		$this->load->view('bookmarks', $posts);
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
        $this->load->library('epifoursquare');
        $clientId = $this->config->item('foursquare_client_id');
        $clientSecret = $this->config->item('foursquare_client_secret');
        $accessToken = $this->config->item('foursquare_access_token');

        $fsObj = new Epifoursquare($clientId, $clientSecret, $accessToken);
		$fsObj->setAccessToken($accessToken);
        $res1 = $fsObj->get('/users/self/badges');
        $res2 = $fsObj->get('/users/self/tips');
        $res3 = $fsObj->get('/users/self');
        $badges = $res1->response->badges;
        $tips = $res2->response->tips->items;
        $mayorships = $res3->response->user->mayorships->items;

		$pagename = array('pagename' => 'Foursquare');
		$fsdata = array('badges' => $badges, 'mayorships' => $mayorships, 'tips' => $tips);
		$this->load->view('header', $pagename);
		$this->load->view('foursquare', $fsdata);
		$this->load->view('footer');
	}

/*
// Foursquare Function for Initial Auth
	function foursquare()
	{
        $this->load->library('epifoursquare');
        $clientId = $this->config->item('foursquare_client_id');
        $clientSecret = $this->config->item('foursquare_client_secret');

        $fsObj = new Epifoursquare($clientId, $clientSecret);
        $redirectUrl = $this->config->item('foursquare_redirect_url');
        $url = $fsObj->getAuthorizeUrl($redirectUrl);
        echo "<a href=\"$url\">Click here</a>";
    }
// Foursquare Function for Initial Auth
    function foursquarecallback()
    {
        $this->load->library('epifoursquare');
        $clientId = $this->config->item('foursquare_client_id');
        $clientSecret = $this->config->item('foursquare_client_secret');
        $redirectUrl = $this->config->item('foursquare_redirect_url');

        $fsObj = new Epifoursquare($clientId, $clientSecret);
        // exchange the request token for an access token
        $token = $fsObj->getAccessToken($_GET['code'], $redirectUrl);
        // you can store $token->access_token in your database
        $fsObj->setAccessToken($token->access_token);

        echo "Copy the next line of text into the value for $config['foursquare_access_token'] in the application/config/config.php file:<br>".$token->access_token;
    }
*/

	// GitHub Page
	function github()
	{
		$pagename = array('pagename' => 'GitHub');
		$this->load->view('header', $pagename);
		$this->load->view('github');
		$this->load->view('footer');
	}

	// Instagram Page
	function instagram()
	{
		$this->load->library('instagram_api');
		$this->instagram_api->access_token = $this->config->item('instagram_access_token');
		
		$pagename = array('pagename' => 'Instagram');
		$igdata = $this->instagram_api->getUserRecent("self");
		$igres1 = $igdata->data;
		$igdata2 = $this->instagram_api->getUserLikes("self");
		$igres2 = $igdata2->data;

		$igphotos = array('igphotos' => $igres1, 'iglikes' => $igres2);
		$this->load->view('header', $pagename);
		$this->load->view('instagram', $igphotos);
		$this->load->view('footer');
	}

/*
// Instagram Function for Initial Auth
	function instagram()
	{
		$this->load->library('instagram_api');
		echo "<p>Little Corner uses the Instagram API but is not endorsed or certified by Instagram.</p>";
		echo "<a href=\"".$this->instagram_api->instagramLogin($ig_client_id, $ig_redirect_uri)."">Authorize Instagram</a>";
	}
// Instagram Function for Initial Auth
	function instagramredirect()
	{
		$this->load->library('instagram_api');
		$ig_client_id = $this->config->item('instagram_client_id');
		$ig_client_secret = $this->config->item('instagram_client_secret');
		$ig_redirect_uri = $this->config->item('instagram_redirect_uri');
		
		$igObj = new Instagram_api($ig_client_id, $ig_client_secret);
		$token = $igObj->authorize($ig_client_id, $ig_client_secret, $ig_redirect_uri, $_GET['code']);
		echo "Copy the next line of text into the value for \"instagram_access_token\" in the application/config/config.php file:<br>".$token->access_token;
	}
*/

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
		$this->email->to($this->config->item('site_email'));
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

	// Wikipedia Page
	function wikipedia()
	{
		$this->load->library('myfunctions');
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_USERAGENT, $this->config->item('wikipedia_useragent'));
		curl_setopt($ch, CURLOPT_URL, $this->config->item('wikipedia_api_url'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$allcontribs = curl_exec($ch);
		$allcontribs = json_decode($allcontribs);
		$formattedcontribs = $allcontribs->query->usercontribs;
		$contributions = array('contributions' => $formattedcontribs);
		curl_close($ch);
		$pagename = array('pagename' => 'Wikipedia');
		$this->load->view('header', $pagename);
		$this->load->view('wikipedia', $contributions);
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