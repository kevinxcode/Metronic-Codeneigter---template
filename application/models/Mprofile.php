<?php
class Mprofile extends CI_Model{

	function __construct()
    {
        parent::__construct();
    }

    public function get_working($usr_token)
	{
		$sql = "SELECT * FROM e_work_status where usr_token='$usr_token'";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

    public function get_personal($usr_token)
	{
		$sql = "SELECT * FROM e_personal where usr_token='$usr_token'";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

    public function get_address($usr_token)
	{
		$sql = "SELECT * FROM e_address where usr_token='$usr_token'";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

    public function get_personal_doc($usr_token)
	{
		$sql = "SELECT id_doc,label,dokumen_no,print_dlt FROM e_personal_doc where usr_token='$usr_token' AND type_category='Civil Identity' order by id_doc asc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_personal_doc_public($usr_token)
	{
		$sql = "SELECT id_doc,label,dokumen_no,print_dlt FROM e_personal_doc where usr_token='$usr_token' AND type_category='Civil Identity' AND print_dlt=0 order by id_doc asc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_personal_doc_file($id)
	{
		$sql = "SELECT file_doc FROM e_personal_doc where id_doc='$id' ";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_skill($usr_token)
	{
		$sql = "SELECT * FROM e_skills where usr_token='$usr_token' order by skills_id asc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_skill_public($usr_token)
	{
		$sql = "SELECT * FROM e_skills where usr_token='$usr_token' AND print_dlt=0 order by skills_id asc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_skill_edit($skills_id)
	{
		$sql = "SELECT * FROM e_skills where skills_id='$skills_id' order by skills_id asc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_bahasa($usr_token)
	{
		$sql = "SELECT * FROM e_language where usr_token='$usr_token' order by lang_id asc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_bahasa_public($usr_token)
	{
		$sql = "SELECT * FROM e_language where usr_token='$usr_token' AND print_dlt=0 order by lang_id asc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_bahasa_edit($lang_id)
	{
		$sql = "SELECT * FROM e_language where lang_id='$lang_id' order by lang_id asc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_training($usr_token)
	{
		$sql = "SELECT * FROM e_training where usr_token='$usr_token' order by training_id desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_training_public($usr_token)
	{
		$sql = "SELECT * FROM e_training where usr_token='$usr_token' AND print_dlt=0 order by training_id desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_training_file($token)
	{
		$sql = "SELECT * FROM e_training_file where training_token='$token' order by training_file_id asc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_experience($usr_token)
	{
		$sql = "SELECT * FROM e_experience where usr_token='$usr_token' order by experience_id desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_experience_pub($usr_token)
	{
		$sql = "SELECT * FROM e_experience where usr_token='$usr_token' AND print_dlt=0 order by experience_id desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_experience_file($token)
	{
		$sql = "SELECT * FROM e_experience_file where experience_token='$token' order by experience_file_id asc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_edu($usr_token)
	{
		$sql = "SELECT * FROM e_edu where usr_token='$usr_token'  order by edu_level_id asc, edu_id desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_edu_public($usr_token)
	{
		$sql = "SELECT * FROM e_edu where usr_token='$usr_token' AND print_dlt=0  order by edu_level_id asc, edu_id desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	

	public function get_edu_file($token)
	{
		$sql = "SELECT * FROM e_edu_file where edu_token='$token' order by edu_file_id asc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_edit_personal_doc($id)
	{
		$sql = "SELECT * FROM e_personal_doc where id_doc='$id' order by id_doc desc limit 1";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_edu_edit($edu_token)
	{
		$sql = "SELECT * FROM e_edu where edu_token='$edu_token'  order by edu_level_id asc, edu_id desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_ex_edit($experience_token)
	{
		$sql = "SELECT * FROM e_experience where experience_token='$experience_token' order by experience_id desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_training_edit($training_token)
	{
		$sql = "SELECT * FROM e_training where training_token='$training_token' order by training_id desc limit 1";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function check_forgot($token)
	{
		$sql = "SELECT *, HOUR(TIMEDIFF(NOW(), f_date)) AS f_hour FROM tb_forgot WHERE f_token='$token' order by forgot_id desc limit 1";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_usr_token($email)
	{
		$sql = "SELECT * FROM user_tb where e_email='$email' limit 1";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}


	public function check_pass_user($usr_token)
	{
		$sql = "SELECT * FROM user_tb where usr_token='$usr_token' limit 1";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_share_code($link_code)
	{
		$sql = "SELECT * FROM tb_share where short_link='$link_code' order by shareId desc limit 1";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_public_name($usr_token)
	{
		$sql = "SELECT e_email, e_profile, full_name   FROM user_tb u 
		INNER JOIN e_personal e ON e.usr_token=u.usr_token
		WHERE u.usr_token='$usr_token'";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}
	






}