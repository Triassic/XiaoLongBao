<?php

/**
  * A controller for the public accessible pages.
  */
class Pages extends CI_Controller {

	public function loadHeader($lang)
	{
		$this->load->view('templates/header_'.$lang);
	}

	function __construct()
	{
		// Call the Controller constructor
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form', 'url', 'file'));
	}

	/**
	  * Loads default home page.
	  */
	public function index($lang = 'ch')
	{
		if ( ! file_exists('application/views/'.$lang.'/index.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->loadHeader($lang);
		$this->load->view($lang.'/index');
		$this->load->view('templates/footer');
	}

	/**
	  * Loads pages in church general information menu.
	  */
	public function church($page = 'introduction', $lang = 'ch')
	{
		if ( ! file_exists('application/views/'.$lang.'/churchInfo/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->loadHeader($lang);
		$this->load->view($lang.'/churchInfo/'.$page);
		$this->load->view('templates/footer');
	}

	/**
	  * Loads pastor page.
	  */
	public function pastors($lang = 'ch')
	{
		if ( ! file_exists('application/views/'.$lang.'/churchInfo/pastors.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		$this->load->model('pastor_model', 'pastor');

		$data['pastors'] = $this->pastor->get_current_pastors($lang);

		$this->loadHeader($lang);
		$this->load->view($lang.'/churchInfo/pastors', $data);
		$this->load->view('templates/footer');
	}

	/**
	 * Loads contact page.
	 */
	public function contact($lang = 'ch')
	{
		if ( ! file_exists('application/views/'.$lang.'/churchInfo/contact.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->loadHeader($lang);
		$this->load->view($lang.'/churchInfo/contact');
		$this->load->view('templates/footer');
	}
			
	/**
	 * Loads pages in church worship menu.
	 */
	public function worship($lang = 'ch')
	{
		if ( ! file_exists('application/views/'.$lang.'/worship/worship.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		$this->load->model('message_model', 'message');

		$data['messages'] = $this->message->get_messages();

		$this->loadHeader($lang);
		$this->load->view($lang.'/worship/worship', $data);
		$this->load->view('templates/footer');
	}

	/**
	  * Loads page for adding Sunday message.
	  */
	public function add_sunday_message($lang = 'ch')
	{
		$logged_in = $this->session->userdata('logged_in');
		if (!isset($logged_in) || $logged_in === FALSE)
		{
			// TODO: show authentication error.
			show_404();
		}

		if ( ! file_exists('application/views/'.$lang.'/worship/addSundayMessage.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->load->library('javascript_plugins');
		$plugins = $this->javascript_plugins;
		$footer_data['js_plugins'] = $plugins->generate(array($plugins::FuelUx));
		$this->loadHeader($lang);
		$this->load->view($lang.'/worship/addSundayMessage');
		$this->load->view('templates/footer', $footer_data);
	}

	/**
	  * Loads fellowships page.
	  */
	public function fellowships($lang = 'ch')
	{
		if ( ! file_exists('application/views/'.$lang.'/activities/fellowships.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		$this->load->model('fellowship_model', 'fellowship');

		$data['fellowships'] = $this->fellowship->get_fellowships($lang);

		$this->loadHeader($lang);
		$this->load->view($lang.'/activities/fellowships', $data);
		$this->load->view('templates/footer');
	}

	/**
	  * Loads fellowship pages.
	  */
	public function fellowship($fellowshipKey = '0', $lang = 'ch')
	{
		if ( ! file_exists('application/views/'.$lang.'/activities/fellowship.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->load->model('fellowship_model', 'fellowship');
		$data['fellowship'] = $this->fellowship->get_fellowship($fellowshipKey, $lang);

		if($data['fellowship'] == False)
		{
			// mw: Couldn't find the fellowship.
			show_404();
		}

		$this->load->library('javascript_plugins');
		$plugins = $this->javascript_plugins;
		$footer_data['js_plugins'] = $plugins->generate(array($plugins::Holder));

		$this->loadHeader($lang);
		$this->load->view($lang.'/activities/fellowship', $data);
		$this->load->view('templates/footer', $footer_data);
	}

	/**
	  * Loads pages in church activities menu.
	  */
	public function activities($page = 'sundaySchoolAdults', $lang = 'ch')
	{
		if ( ! file_exists('application/views/'.$lang.'/activities/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->loadHeader($lang);
		$this->load->view($lang.'/activities/'.$page);
		$this->load->view('templates/footer');
	}

	/**
	  * Loads mission pages
	  */
	public function missions($lang = 'ch')
	{
		if ( ! file_exists('application/views/'.$lang.'/missions.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->load->model('missionary_model','missionary');
		$data['missionaries'] = $this->missionary->get_missionaries($lang);

		$this->loadHeader($lang);
		$this->load->view($lang.'/missions', $data);
		$this->load->view('templates/footer');
	}

	/**
	  * Loads resources pages
	  */
	public function resources($page='links', $lang = 'ch')
	{
		if ( ! file_exists('application/views/'.$lang.'/resources/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->loadHeader($lang);
		$this->load->view($lang.'/resources/'.$page);
		$this->load->view('templates/footer');
	}

	/**
	  * Loads awana pages
	  */
	public function awana($page='introduction', $lang = 'ch')
	{
		if ( ! file_exists('application/views/awana/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->load->library('javascript_plugins');
		$plugins = $this->javascript_plugins;
		$footer_data['js_plugins'] = $plugins->generate(array($plugins::FancyBox, $plugins::Masonry));

		$data['lang'] = $lang;
		$this->loadHeader($lang);
		$this->load->view('/awana/'.$page, $data);
		$this->load->view('templates/footer', $footer_data);
	}
}
?>
