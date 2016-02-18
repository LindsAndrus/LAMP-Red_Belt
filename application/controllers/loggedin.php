<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loggedin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('redbelt');
		$this->load->library("form_validation");
	}

	public function friends()
	{
		$user = $this->redbelt->sayhello($this->session->userdata("id"));
		$friendships = $this->redbelt->allfriend($this->session->userdata('id'));
		$notfriends = $this->redbelt->notfriends($this->session->userdata('id'));

		$this->load->view('friends', array("user" => $user, "allfriends" => $friendships, 'notapal' => $notfriends));
	}

	public function profile($friend_id)
	{
		// $user = $this->redbelt->sayhello($this->session->userdata("id"));

		$user = $this->redbelt->allusers($friend_id);

		$this->load->view('user_profile', array("user" => $user));
	}

	public function deletefriend($friend_id)
	{
		$this->redbelt->deletefriend($friend_id);

		redirect('friends');		
	}

	public function add($id)
	{
		$this->redbelt->addfriend($id);

		redirect('friends');
	}
}