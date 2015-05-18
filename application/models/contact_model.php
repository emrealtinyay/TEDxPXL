<?php

class Contact_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
    }
   
    /**
	 * Deze functie voegt de waarden toe van het contact formulier in de tabel contact_table.
	 *
	 * @author Glenn Bertjens
	 *
	 * @param array    	$form_data  	Array met de data van het contact formulier
	 * @return Bool - TRUE or FALSE
	 */
	function SaveForm($form_data)
	{
		/*
		$this->db->set('name', $name);
		$this->db->set('email', $email);
		$this->db->set('phone', $phone);
		$this->db->set('comments', $comments);
		$this->db->insert('contact_table');
		*/
		$this->db->insert('contact_table', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	/**
	 * Deze functie haalt alle contact gegevens op voor de admin pagina.
	 *
<<<<<<< HEAD
	 *  -
=======
	 * @author  Glenn Bertjens
>>>>>>> origin/master
	 *
	 */
	function HaalContactGegevensOp(){
		$query = $this->db->get('contact_table');
		$data = $query->result_array();
		return $data;
	}
	
	/**
	 * Deze functie verwijderd 1 rij uit de contact_table tabel.
	 *
<<<<<<< HEAD
	 *  -
=======
	 * @author  Glenn Bertjens
>>>>>>> origin/master
	 *
	 * @param int    $id  dit is het id van een gebruiker.
	 * @return Bool - TRUE or FALSE
	 */
	function DeleteContact($id){
		$this->db->where('id', $id);
		$this->db->delete('contact_table');
		if ($this->db->affected_rows() == '1'){
			return TRUE;
		}	
		return FALSE;
	}
}
?>