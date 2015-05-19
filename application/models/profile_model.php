<?php

class profile_model extends CI_Model {
	
	/**
	 * Deze functie gaat de persoonlijke gegevens van een user updaten in de userdata tabel.
	 *
	 *  
	 * @author  Glenn Bertjens
	 *
	 * @param array    $data  Array met de data van een user.
	 * @return Bool - TRUE or FALSE
	 */
	function UpdateGegevens($data, $id){
		$this->db->where('username', $id);
		$this->db->update('userdata', $data);
		if ($this->db->affected_rows() == '1'){
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * Deze functie voegt een gebruiker toe aan de userdata tabel wanneer hij zich registreert.
	 *
	 *  -
	 * @author  Glenn Bertjens
	 *
	 * @param array    $data  Array met de username van de gebruiker die zich wil registreren.
	 * @return Bool - TRUE or FALSE
	 */
	function VoegGebruikerToe($data){	
		$this->db->insert('userdata', $data);	
		if ($this->db->affected_rows() == '1'){
			return TRUE;
		}
		return FALSE;
	}
	
	/**
	 * Deze functie haalt alle gegevens op voor een bepaalde id.
	 *
	 *  -
	 * @author  Glenn Bertjens
	 *
	 * @param int    $id  het id van een gebruiker.
	 */
	function haalGegevensOp($id){
		$this->db->where('username', $id);
		$query = $this->db->get('userdata');
		$data = $query->result_array();
		return $data;
	}

	/**
	 * Deze functie verwijderd een gebruiker uit de tabel userdata.
	 *
	 *  -
	 * @author  Glenn Bertjens
	 *
	 * @param int    $id  het id van een gebruiker.
	 */
	function DeleteUser($id){
		$this->db->where('id', $id);
		$this->db->delete('userdata');
	}

	function checkEmail($email) 
	{
		$this->db->select('uacc_id');
		$this->db->where('uacc_email', $email);
		$query = $this->db->get('user_accounts');
		$controle = $query->num_rows();
		
		if($controle == 0) 
		{
			return 0;	
		}
		else
		{
			return $query->row()->uacc_id;
		} 
	}

	function checkUsername($username) 
	{	
		$this->db->select('id');
		$this->db->where('username', $username);
		$query = $this->db->get('userdata');
		$controle = $query->num_rows();
		
		if($controle == 0) 
		{
			return 0;	
		}
		else
		{
			return $query->row()->id;
		}
	}

	function update_changePassword($id, $changeTo)
	{
		if ($id != 0 ) 
		{

			$this->db->select('*');
			$this->db->where('id', $id);
			$query = $this->db->get('userdata');
			$data = $query->row_array();


			$newData = array(
					'username' => $data['username'],
					'voornaam' => $data['voornaam'],
					'naam' => $data['naam'],
					'woonplaats' => $data['woonplaats'],
					'geboortedatum' => $data['geboortedatum'],
					'foto' => $data['foto'],
					'id' => $data['id'],
					'changepassword' => $changeTo
					);
			$this->db->where('id', $id);
			$this->db->update('userdata', $newData);
		}
	}

	function get_changePassword($id) 
	{
		if ($id != 0 ) 
		{
			$this->db->select('changepassword');
			$this->db->where('id', $id);
			$query = $this->db->get('userdata');
			return $query->row()->changepassword;
		}
	}
}

?>