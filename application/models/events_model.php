<?php

class events_model extends CI_Model {
		
	/**
	 * Deze functie voegt een event toe in de tabel events.
	 * 
	 *  -
	 * 
	 * @param array    $eventData  Array met de data van een event.
	 * @return Bool - TRUE or FALSE
	 */
	function voegEventToe($eventData){
		$this->db->insert('events', $eventData);
			if ($this->db->affected_rows() == '1'){
				return TRUE;
			}	
		return FALSE;
	}
	
	/**
	 * Deze functie haalt alle events op uit de tabel events.
	 *
	 *  -
	 *
	 */
	function haalEventsOp(){
		$query = $this->db->get('events');
		 $data = $query->result_array();
		return $data; 
	}
	
	/**
	 * Deze functie haalt 1 specifiek event uit de tabel events.
	 *
	 *  -
	 *
	 * @param int   $id  Het id van het event.
	 */
	function haalEventOp($id){
		$this->db->where('id', $id);
		$query = $this->db->get('events');
		$data = $query->result_array();
		return $data;
	}
	
	/**
	 * Deze functie voegt een waarde toe in die kolom foto 
	 * voor een specifiek event in de tabel events.
	 *
	 *  -
	 *
	 * @param array    	$data  	Array met de data van een foto.
	 * @param String	$naam	De naam van het event waar de foto aan toebehoord.
	 * @return Bool - TRUE or FALSE
	 */
	function UpdateFoto($data, $naam){
		$this->db->where('naam', $naam);
		$this->db->update('events', $data); 
			if ($this->db->affected_rows() == '1'){
			return TRUE;
			}
		return FALSE;
	}	
}

?>