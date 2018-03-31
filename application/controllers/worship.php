<?php

/**
  * A controller for the Sunday worship videos.
  * CHINESE ONLY
  */
class Worship extends CI_Controller
{
	function __construct()
	{
		// Call the Controller constructor
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('video_model', 'video');
		$this->load->library("pagination");
		$this->load->library("bible");
	}

	public function index($lang = 'ch')
	{
	  $this->page();
	}

	public function page($page = 0, $lang = 'ch')
	{
	  if ( ! file_exists('application/views/'.$lang.'/worship/worship.php'))
	  {
	    show_404();
	  }

	  // could only see paster Hou's message after logging in
	  $includePasterHou = Access::isLoggedIn();

	  // pagination
	  $config = array();
	  $config["base_url"] = site_url()."/worship/page";
	  $config["total_rows"] = $this->video->get_video_count(true, $includePasterHou);
	  $config["per_page"] = 50;

	  $this->pagination->initialize($config);

	  $data['videos'] = $this->video->get_sunday_videos($config["per_page"], $page, $includePasterHou);
	  $data["links"] = $this->pagination->create_links(); // TODO, make it looks better

	  $this->load->view('templates/header_'.$lang);
	  $this->load->view($lang.'/worship/worship', $data);
	  $this->load->view('templates/footer');
	}

	public function video($id = NULL)
	{
	  if ( ! file_exists('application/views/ch/worship/video.php'))
	  {
	    // Whoops, we don't have a page for that!
	    show_404();
	  }

	  $data['video'] = $this->video->get_video($id);
	  $data['video_url'] = "";
	  if ($this->config->item('prod')) {
	  	$data['video_url'] = "videos/".$data['video']['file_name'];
	  } else {
	  	$data['video_url'] = "videos_dev/".$data['video']['file_name'];
	  }

	  // check privilege to see Paster Hou's message
	  if ($data['video']['speaker'] == '侯君麗牧師' && !Access::isLoggedIn())
	  {
	    show_404();
	  }

	  $ranges = $data['video']['scripture'];

	  $data['verses'] = $this->generate_verses($ranges);

	  $this->load->library('javascript_plugins');
	  $plugins = $this->javascript_plugins;
	  $footer_data['js_plugins'] = $plugins->generate(array($plugins::FlowPlayer));

	  $this->load->view('templates/header_ch');
	  $this->load->view('ch/worship/video', $data);
	  $this->load->view('templates/footer', $footer_data);
	}

	private function generate_verses($ranges)
	{
		$xml = "";
	  try {
      // $xml = Bible::getVerses($ranges);
	  } catch(Exception $e) {
	  	log_message('error', "error getting verse: ".$e);
	  	$xml = "";
	  }
	  $quoted_verses = "";
	  if ($xml === "") return $quoted_verses;

	  foreach ($xml->range as $range)
	  {
	    // get range title
	    $title = $range->result;
	    $title = Bible::convertEngRangesToCh($title);

	    $quoted_verses .= " <br><b>".$title."</b><br><br>";

	    // get verses in this range
	    foreach($range->item as $item)
	    {
	      $verses = " <b>".$item->verse."</b> ".$item->text;
	      $quoted_verses .= " <p>".$verses."</p> ";
	    }
	  }

	  return $quoted_verses;
	}

	public function audio($id = NULL)
	{
	  if ( ! file_exists('application/views/ch/worship/audio.php'))
	  {
	    // Whoops, we don't have a page for that!
	    show_404();
	  }

	  $data['video'] = $this->video->get_video($id);

	  // check privilege to see Paster Hou's message
	  if ($data['video']['speaker'] == '侯君麗牧師' && !Access::isLoggedIn())
	  {
	    show_404();
	  }

	  $this->load->library('javascript_plugins');
	  $plugins = $this->javascript_plugins;
	  $footer_data['js_plugins'] = $plugins->generate(array($plugins::FlowPlayer));

	  $this->load->view('templates/header_ch');
	  $this->load->view('ch/worship/audio', $data);
	  $this->load->view('templates/footer', $footer_data);
	}

	public function direct_download($file)
	{
	  $file_path = 'audios/'.$file;

	  if ( ! file_exists($file_path))
	  {
	    show_404();
	  }
	  
	  $file_size = filesize($file_path);
	  
	  header ("Content-type: octet/stream");
	  header ("Content-disposition: attachment; filename=".$file.";");
	  header ("Content-Length: ".$file_size);
	  
	  readfile($file_path);
	  exit;
	}

	/**
	 * Create a new Sunday message.
	 */
	public function addSundayMessage($lang = 'ch')
	{
	  if (!Access::hasPrivilege(Access::PRI_UPDATE_WORSHIP))
	  {
	    // TODO: show authentication error.
	    show_404();
	  }

	  if ( ! file_exists('application/views/'.$lang.'/worship/addSundayMessage.php'))
	  {
	    // Whoops, we don't have a page for that!
	    show_404();
	  }

		$this->load->library('form_validation');
	  $this->load->library('validation_rules');
	  $rules = $this->validation_rules;
	  $this->form_validation->set_rules($rules::$worshipRules);
	  if ($this->form_validation->run() == FALSE)
	  {
	    $this->load->library('javascript_plugins');
	    $plugins = $this->javascript_plugins;
	    $footer_data['js_plugins'] = $plugins->generate(array($plugins::FuelUx, $plugins::DatePicker));
	    $this->load->view('templates/header_'.$lang);
	    $this->load->view($lang.'/worship/addSundayMessage');
	    $this->load->view('templates/footer', $footer_data);
	  }
	  else
	  {
	    $data = array(
	        'title' => $this->input->post('title'),
	        'speaker' => $this->input->post('speaker'),
	        'file_name' => $this->input->post('video'),
	        'audio_name' => $this->input->post('audio'),
	        'scripture' => $this->input->post('scripture'),
	        'date' => $this->input->post('date')
	    );
	    $this->video->add_video($data);
	    redirect('/worship/index');
	    die();
	  }
	}

	/**
	 * Update a Sunday message.
	 */
	public function updateSundayMessage($id, $lang = 'ch')
	{
	  if (!Access::hasPrivilege(Access::PRI_UPDATE_WORSHIP))
	  {
	    // TODO: show authentication error.
	    show_404();
	  }

	  if ( ! file_exists('application/views/'.$lang.'/worship/updateSundayMessage.php'))
	  {
	    // Whoops, we don't have a page for that!
	    show_404();
	  }

	  $this->load->library('form_validation');
	  $this->load->library('validation_rules');
	  $rules = $this->validation_rules;
	  $this->form_validation->set_rules($rules::$worshipRules);
	  if ($this->form_validation->run() == FALSE)
	  {
	    $data['video'] = $this->video->get_video($id);

	    $this->load->library('javascript_plugins');
	    $plugins = $this->javascript_plugins;
	    $footer_data['js_plugins'] = $plugins->generate(array($plugins::FuelUx, $plugins::DatePicker));

	    $this->load->view('templates/header_'.$lang);
	    $this->load->view($lang.'/worship/updateSundayMessage', $data);
	    $this->load->view('templates/footer', $footer_data);
	  }
	  else
	  {
	    $data = array(
	        'title' => $this->input->post('title'),
	        'speaker' => $this->input->post('speaker'),
	        'file_name' => $this->input->post('video'),
	        'audio_name' => $this->input->post('audio'),
	        'scripture' => $this->input->post('scripture'),
	        'date' => $this->input->post('date')
	    );
	    $this->video->update_video($id, $data);
	    redirect('/worship/index');
	    die();
	  }
	}

	/**
	 * Delete a Sunday message
	 */
	public function deleteSundayMessage($id, $lang = 'ch')
	{
	  if (!Access::hasPrivilege(Access::PRI_UPDATE_WORSHIP))
	  {
	    // TODO: show authentication error.
	    show_404();
	  }

	  $this->video->delete_video($id);
	  redirect('/worship/index');
	  die();
	}

}
?>
