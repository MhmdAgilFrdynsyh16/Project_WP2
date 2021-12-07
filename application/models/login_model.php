<?php

class login_model extends CI_Model{

	public function cek_login($username,$password)
	{
		$this->db->where("username", $username);
		$this->db->where("password", $password);
		return $this->db->get('user');
	}

	public function getLoginData($user, $pass)
	{
		$u  =  $user;
		$p  =  MD5($pass);

		$query_ceklogin = $this->db->get_where('user', array('username' => $u, 'password' => $p));

		if (count($query_ceklogin->result()) > 0){
			foreach ($query_ceklogin->result() as $qck){
				foreach ($query_ceklogin->result() as $ck){
					$sess_data ['logged_in'] = TRUE;
					$sess_data ['username'] = $ck->username;
					$sess_data ['password'] = $ck->password;
					$sess_data ['level'] = $ck->level;
					$this->session->set_userdata($sess_data);
				}
				redirect('administrator/dashboard');
			}
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"> Username atau Password Anda Salah! <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hiden="true">&times;</span></button>
						</div>');
			redirect('administrator/auts');
		}
	}
}