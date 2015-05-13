<?php

class Upload extends CI_Controller {

	/**
	 * Deze functie laad alle hulp klassen en models.
	 *
	 * @author  Glenn Bertjens, Ali Eren, Emre Altinyay
	 *
	 */
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library('flexi_auth');
		$this->load->library('session');
		$this->load->model('profile_model');
		$this->load->model('events_model');
		$this->load->helper(array('form', 'url'));	
	}
	
	/**
	 * Deze functie upload een foto van een user.
	 * Deze functie is van het internet gehaald source: http://ellislab.com/codeigniter%20/user-guide/libraries/file_uploading.html
	 *
	 * @author  Glenn Bertjens, Ali Eren, Emre Altinyay
	 *
	 */
	function upload_user()
	{
		$config['upload_path'] = './uploads/UserPics';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '500';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			redirect('profile');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$user = array( 'userinfo' => $this->flexi_auth->get_user_by_id_row());
			
			$data1 = array ('foto' => $data['upload_data']['file_name']);
			$id = $user['userinfo']->uacc_username;
			$this->profile_model->UpdateGegevens($data1, $id);
			redirect('profile');
		}
	}
	
	/**
	 * Deze functie upload een foto van een event.
	 * Deze functie is van het internet source : http://ellislab.com/codeigniter%20/user-guide/libraries/file_uploading.html
	 *
	 * @author  Glenn Bertjens, Ali Eren, Emre Altinyay
	 *
	 */
	function upload_event(){
		$config['upload_path'] = './uploads/Events';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';	
		$this->load->library('upload', $config);		
		if ( ! $this->upload->do_upload()){
			redirect('admin');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$filename = array( 'foto' => $data['upload_data']['file_name']);
			$event = $data['upload_data']['raw_name'];
			$this->events_model->UpdateFoto($filename, $event);
			redirect('admin');
		}
	}
}
?>