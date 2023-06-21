<?php
class Mdata extends CI_Model{

	function __construct()
    {
        parent::__construct();
    }

    public function get_news_admin(){
		$sql = "SELECT news_id, title_news FROM tb_news order by news_id desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

    public function get_news_admin_edit($news_id){
		$sql = "SELECT * FROM tb_news where news_id='$news_id' order by news_id desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function newsHome($limit,$offset){
		$sql = "SELECT * FROM tb_news order by news_id desc LIMIT $limit OFFSET $offset";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function read_news($link){
		$sql = "SELECT * FROM tb_news where link_news='$link' limit 1";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_generate_link($token){
		$sql = "SELECT * FROM tb_share where usr_ref='$token' order by shareId desc limit 1";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}






}