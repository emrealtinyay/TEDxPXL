<?php

class news_model extends CI_Model {
    
    /**
	 * Deze functie haald de gegevens op van de 3 recenste geregistreerde leden.
	 *
	 * @author Glenn Bertjens
	 * 
	 */
	function nieuwLeden(){        
        $this->db->select('uacc_username, uacc_email, uacc_date_added');
		$this->db->from('user_accounts');
		$this->db->order_by("uacc_id","desc");
        $this->db->limit(3);
        $query = $this->db->get();
		$leden = $query->result_array();
		return $leden;
	}
	
}

?>