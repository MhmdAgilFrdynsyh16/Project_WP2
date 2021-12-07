<?php
class User_model extends CI_model{
	public function ambil_data($id)
	{
		$this->db->where('username', $id);
		return $this->db->get('user')->row();
	}

}