<?php
include APPPATH.'controllers/pages.php';

/*
 * A controller for events and calendar.
 */
class Prayer extends Pages {

    function __construct()
    {
        // Call the Controller constructor
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('prayer_model', 'prayerData');
        $this->load->library("pagination");
    }

    /**
      * Loads prayer page.
      */
    public function prayerList($date = '', $lang = 'ch')
    {
        // TODO: make a helper function for login check
        if (!Access::hasPrivilege(Access::PRI_READ_PRAYER))
        {
            // TODO: show authentication error.
            show_404();
        }
        if ( ! file_exists('application/views/'.$lang.'/request/prayerlist.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        if ($date === '') {
          $data['scripture'] = $this->prayerData->get_latestScripture();
          $data['items'] = $this->prayerData->get_latestPrayerItems();
        } else {
          $data['scripture'] = $this->prayerData->get_scripture($date);
          $data['items'] = $this->prayerData->get_prayerItems($date);
        }
        $this->loadHeader($lang);
        $this->load->view($lang.'/request/prayerlist', $data);
        $this->load->view('templates/footer');
    }

    /**
     * Loads prayer page.
     */
    public function addprayer($lang = 'ch')
    {
        if (!Access::hasPrivilege(Access::PRI_UPDATE_PRAYER))
        {
            // TODO: show authentication error.
            show_404();
        }

        $this->load->library('form_validation');
        $data['lang'] = $lang;
       	$data['items'] = $this->prayerData->get_latestPrayerItems();
        $this->form_validation->set_rules('prayItems[]', 'prayItemsArray', 'trim|required');
        $this->form_validation->set_rules('scripture', 'scripture', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
            // Loads addPrayer page.
            if ( ! file_exists('application/views/'.$lang.'/request/addprayer.php'))
        	{
            	// Whoops, we don't have a page for that!
            	show_404();
        	}
        	$this->loadHeader($lang);
        	$this->load->view($lang.'/request/addprayer', $data);
        	$this->load->view('templates/footer');
        }
        else
        {
            // Create prayer for this week
            $data = array();
            $data['date'] = date('Y-m-d', strtotime('next wednesday'));
            $data['scripture'] = $this->input->post('scripture');
            $data['lang'] = $lang;
            $data['items'] = $this->input->post('prayItems');
            $data['itemSections'] = $this->input->post('prayItemSections');
            $this->prayerData->add_prayer($data);

            // Redirect to event page.
            $url = site_url()."/prayer/prayerList";
            redirect($url, 'location', 302);
        }
    }

    /**
      * Loads prayer history page.
      */
    public function prayerhistory($lang = 'ch')
    {
        if (!Access::hasPrivilege(Access::PRI_READ_PRAYER))
        {
            // TODO: show authentication error.
            show_404();
        }
        if ( ! file_exists('application/views/'.$lang.'/request/requesthistory.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $this->load->model('request_model', 'request');
        $data['requests'] = $this->request->get_requests($lang);

        $this->loadHeader($lang);
        $this->load->view($lang.'/request/requesthistory', $data);
        $this->load->view('templates/footer');
    }
}
?>
