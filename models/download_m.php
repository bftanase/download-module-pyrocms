<?php


/**
 * Description of download_m
 *
 * @author b.tanase
 */
class Download_m extends MY_Model{
  public function __construct() {
    parent::__construct();
    
    $this->_table = 'download_stats';
  }
  
  public function add($download_stat){
    $to_insert = array(
			'download_ip' => $this->input->ip_address(),
			'download_os' => $download_stat['os'],
      'download_version' => $download_stat['version']
      );
	

		return $this->db->insert('download_stats', $to_insert);
  }
}

?>
