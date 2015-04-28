<?php
class search_model extends CI_Model {
	function __construct()
    {
        parent::__construct();
    }
    
	/**
	 * Deze functie gaat in de tabel user_accounts na waar er velden de String zoekterm bevatten.
     * Er wordt enkel gekeken in de kolommen uacc_username en uacc_email.
	 *
	 * @author Glenn Bertjens
	 *
	 * @param String    	$zoekterm     Het zoekwoord die werd ingegeven bij de input van search
	 *
	 */
	public function select_profiel($zoekterm){
		$this->db->select('uacc_username, uacc_email');
		$this->db->from('user_accounts');
		$this->db->like('uacc_username', $zoekterm);
		$this->db->or_like('uacc_email', $zoekterm); 		
		$query = $this->db->get();
		
		$data = $query->result_array();
		return $data;
	}
	
    /**
	 * Deze functie gaat in de tabel events na waar er velden de String zoekterm bevatten.
     * Er wordt enkel gekeken in de kolommen naam en locatie.
	 *
	 * @author Glenn Bertjens
	 *
	 * @param String    	$zoekterm     Het zoekwoord die werd ingegeven bij de input van search
	 *
	 */
	public function select_events($zoekterm){
		$this->db->select('naam, locatie, adres, tijd');
		$this->db->from('events');
		$this->db->like('naam', $zoekterm);
		$this->db->or_like('locatie', $zoekterm); 		
		$query = $this->db->get();
		
		$data = $query->result_array();
		return $data;
	}
	
    /**
	 * Deze functie gaat in de tabel forum na waar er velden de String zoekterm bevatten.
     * Er wordt enkel gekeken in de kolommen categorie, onderwerp, naam, titel en bericht.
	 *
	 * @author Glenn Bertjens
	 *
	 * @param String    	$zoekterm     Het zoekwoord die werd ingegeven bij de input van search
	 *
	 */
	public function select_forum($zoekterm){
		$this->db->select('categorie, onderwerp, naam, titel, bericht');
		$this->db->from('forum');
		$this->db->like('categorie', $zoekterm);
		$this->db->or_like('onderwerp', $zoekterm);
		$this->db->or_like('naam', $zoekterm); 
		$this->db->or_like('titel', $zoekterm); 
		$this->db->or_like('bericht', $zoekterm); 
		$query = $this->db->get();
		
		$data = $query->result_array();
		return $data;
	}
			
}
?>