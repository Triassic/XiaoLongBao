<?php
class Prayer_model extends CI_Model {

    var $dateTimeFormat = "m-d-Y";
    var $prayerTable  = 'prayer';
    var $sectionTable  = 'prayer_sections';
    var $itemTable  = 'prayer_items';
    var $scriptureTable = 'prayer_scriptures';
    var $colName    = 'date';
    // $mysqldate = date( 'Y-m-d H:i:s', $phpdate );
    // $phpdate = strtotime( $mysqldate );

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    /**
     * get_prayerItems
     *
     * Get the prayer items for given date.
     *
     * @param   string
     */
    function get_prayerItems($date)
    {
        $this->db->select($this->prayerTable.'.*', FALSE);
        $this->db->select('prayer_sections.id AS section_id', FALSE);
        $this->db->select('prayer_sections.name AS section_name', FALSE);
        $this->db->select('prayer_items.description AS item_name', FALSE);
        $this->db->where('date', $date);
        $this->db->from($this->prayerTable);
        $this->db->join($this->itemTable, 'item_id = prayer_items.id');
        $this->db->join($this->sectionTable, 'prayer_items.section_id = prayer_sections.id');
        $this->db->order_by('section_id asc, ordinal asc');
        $query = $this->db->get();
        $results = $query->result_array();
        return $results;
    }

    /**
     * get_latestPrayerItems
     *
     * Return the latest prayer items in database if any.
     *
     */
    function get_latestPrayerItems()
    {
        $this->db->select_max('date');
        $maxDateQuery = $this->db->get($this->prayerTable);
        if ($maxDateQuery->num_rows() > 0)
        {
            $maxDateResult = $maxDateQuery->result_array();
            $maxDate = $maxDateResult[0]['date'];
            return $this->get_prayerItems($maxDate);
        }
        return null;
    }

    /**
     * get_latestScripture
     *
     * Return the latest scripture in database if any.
     *
     */
    function get_latestScripture()
    {
    	$this->db->from($this->scriptureTable);
    	$this->db->order_by('date', 'desc');
    	$this->db->limit(1);
    	$query = $this->db->get();
    	return $query->row_array();
    }

    /**
     * get_scripture
     *
     * Return the scripture in database on this date.
     *
     */
    function get_scripture($date)
    {
      $scripture = $this->db->get_where($this->scriptureTable, array('date' => $date));
    	return $scripture->row_array();
    }

    function is_scripture_existed($date) {
      $scripture = $this->db->get_where($this->scriptureTable, array('date' => $date));
      return $scripture->num_rows() > 0;
    }

    function is_prayer_table_existed($date) {
      $prayer = $this->db->get_where($this->prayerTable, array('date' => $date));
      return $prayer->num_rows() > 0;
    }

    /**
     * get_prayerItem
     *
     * Check if the given description already exists as a prayer item, if it does return the row,
     * otherwise return null.
     *
     */
    function get_prayerItem($description)
    {
    	$itemQuery = $this->db->get_where($this->itemTable, array('description' => $description));
    	if ($itemQuery->num_rows() > 0)
    	{
    		return $itemQuery->row_array();
    	}
    	else
    	{
    		return null;
    	}
    }

    /**
     * add_prayerItem
     *
     * Insert a new prayer item into db with the description and the section it belongs to
     * and return its id.
     */
    function add_prayerItem($description, $sectionId)
    {
    	$itemEntry = array(
    			'description' => $description,
    			'section_id' => $sectionId
    			);
    	$this->db->insert($this->itemTable, $itemEntry);
    	return $this->db->insert_id();
    }

    /**
     * add_prayer
     *
     * Persist a list of items and the sections it belongs to submitted from the form in db
     * for the given date.
     *
     */
    function add_prayer($data)
    {
    	$date = $data['date'];
    	$items = $data['items'];
    	$itemSections = $data['itemSections'];
    	$scriptEntry = array(
  			'date' => $date,
  			'text' => $data['scripture']
			);
      if ($this->is_scripture_existed($date)) {
        $this->db->where('date', $date);
        $this->db->update($this->scriptureTable, $scriptEntry);
      } else {
      	$this->db->insert($this->scriptureTable, $scriptEntry);
      }

      if ($this->is_prayer_table_existed($date)) {
        $this->db->delete(
          $this->prayerTable,
          array(
            'date' => $date
          )
        );
      }

    	for($i = 0; $i < count($items); ++$i) {
  			$itemId = $this->add_prayerItem($items[$i], $itemSections[$i]);
    		$prayEntry = array(
    				'date' => $date,
    				'ordinal' => $i + 1,
    				'item_id' => $itemId
    		);
    		$this->db->insert($this->prayerTable, $prayEntry);
    	}

    }
}
?>
