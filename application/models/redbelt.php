<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Redbelt extends CI_Model {

	public function adduser($thedata)
	{
		$query = "INSERT INTO users (name, alias, email, password, dob, added_on, updated_on) VALUES (?, ?, ?, ?, ?, Now(), Now())";

		return $this->db->query($query, array($thedata['first_name'],$thedata['alias'],$thedata['email'],$thedata['password'], $thedata['dob']));
	}

	public function verifyuser($post)
	{
		$query = "SELECT password FROM users WHERE email = ?";
		
		$infoverify = array($post['member_email']);

		$confirm = $this->db->query($query, $infoverify)->row_array();

		if($confirm['password'] == $post['member_password']){
			return true;
		} 
		else
		{
			return false;
		}
	}

	public function getid($email)
	{
		$query = "SELECT id FROM users WHERE email = ?";

		$idvalues = array($email);

		return $this->db->query($query, $idvalues)->row_array();
	}


	public function sayhello($id)
	{
		$query = "SELECT name, alias, email FROM users WHERE id = ?";

		$sayinghi = array($id);

		return $this->db->query($query, $sayinghi)->row_array();
	}



	// END OF LOGIN REG PORTION ////////////////////


	public function allusers($id)
	{
		$query = "SELECT id, name, alias, email FROM users WHERE id = ?";

		return $this->db->query($query, $id)->result_array();
	}

	public function allfriend($id)
	{
		$idnum = $id['id'];

		$query = "SELECT friends.friend_id, friends.user_id, friends.user_name, friends.friend_name FROM friends JOIN users WHERE friends.user_id = $idnum OR friends.friend_id = $idnum GROUP BY friends.id";

		return $this->db->query($query,$idnum)->result_array();
	}

	public function notfriends($id)
	{
		$idnum = $id['id'];

		$query = "SELECT friends.user_name, friends.friend_name, friends.user_id, friends.friend_id FROM friends WHERE friends.user_id != $idnum AND friends.friend_id != $idnum";

		return $this->db->query($query,$idnum)->result_array();
	}

	public function addfriend($id)
	{
		$query1 = "SELECT id, alias FROM users where id = '{$id}' OR id = '{$id}'";

		$results = $this->db->query($query1, $id)->result_array();

		foreach ($results as $result) {
		$friend_id = $result['id'];
		$friend_name = $result['alias'];
		}
		
		$user_id = $this->session->userdata('id');

		$query = "INSERT INTO friends (user_id, friend_id, friend_name) VALUES (?, ?, ?)";

		return $this->db->query($query,array($user_id, $friend_id, $friend_name));
	}

	public function deletefriend($friend_id)
	{
		$query = "DELETE FROM friends WHERE friend_id = '{$friend_id}'";

		return $this->db->query($query);
	}
}