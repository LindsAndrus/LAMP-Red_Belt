<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Redbelts extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('redbelt');
		$this->load->library("form_validation");
	}

	public function index()
	{
		if(!$this->session->userdata("id"))
		{
			$this->load->view('red_belt', array("errors" => $this->session->flashdata("errors")));
		} 
		else
		{
			redirect('loggedin/friends');
		}
	}

	public function login(){
		$this->form_validation->set_rules("member_email","Email", "trim|required");
		$this->form_validation->set_rules("member_password","Password", "trim|required");
		if($this->form_validation->run()===FALSE)
		{
			$this->session->set_flashdata("errors", validation_errors());
			redirect('/');
		} 
		else
		{
			$result = $this->redbelt->verifyuser($this->input->post());
			
			if ($result) 
			{
				$id = $this->redbelt->getid($this->input->post("member_email"));
				
				$this->session->set_userdata("id",$id);
				
				redirect('/');
			}
			else
				{
					$this->session->set_flashdata("errors", "<p>Password does not match. DO OVER!</p>");
					redirect('/');
				}
		}
	}

	public function registration(){
		$this->form_validation->set_rules("first_name","First Name", "trim|required");
		$this->form_validation->set_rules("alias","Alias", "trim|required");
		$this->form_validation->set_rules("email","Email", "trim|required|valid_email");
		$this->form_validation->set_rules("password","Password", "trim|required|min_length[8]");
		$this->form_validation->set_rules("confirm","Confirm Password", "trim|required|matches[password]");
		$this->form_validation->set_rules("dob","Date of Birth", "trim|required");
		
		if($this->form_validation->run()===FALSE)
		{
			$this->session->set_flashdata("errors", validation_errors());

			redirect('/');
		}
		else
		{
			$this->redbelt->adduser($this->input->post());

			$id = $this->redbelt->getid($this->input->post("email"));
			$this->session->set_userdata("id", $id);
			redirect('loggedin/friends');		
		}
	}

	public function destroy(){
		$this->session->sess_destroy();
		redirect('/');
	}
}