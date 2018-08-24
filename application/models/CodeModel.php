<?php
class CodeModel extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function all(){
		return $this->db->get('pbnclp2018_voucher')->result();
	}

	public function getWhere($where){
		$this->db->where($where);

	}

	public function insert_code($table, $data){
		// melakukan insert ke tabel code
		$this->db->insert($table, $data);
	}
	public function update($data,$where){
		//melakukan update ke tabel code
		$this->db->where($where);
		return $this->db->update('pbnclp2018_voucher',$data);
	}
	public function deletecode($id){
		//menghapus data pada tabel code sesuai kriteria
		//return $this->db->delete('pbnclp2018_voucher',$where);
		$sql = $this->db->query("delete from pbnclp2018_voucher where id =  ". $id);
	}

	public function validasilogin($user, $pass)
	{
		$query = "select * from pbnclp2018_admin where username = '".$user."' AND password = '".$pass."' ";
		$login = $this->db->query($query);
		// print_r($login->num_rows());
		// die();
		if($login->num_rows() >= 1 )
		{
			return true;
		}
		else{
			return false;
		}
	}
}