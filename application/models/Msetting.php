<?php
class Msetting extends CI_Model{

	function __construct()
    {
        parent::__construct();
    }


    public function get_company(){
		$sql = "SELECT * FROM company_setting order by created_at desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_company_type($type){
		$sql = "SELECT * FROM company_setting where type='$type' order by created_at desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_company_type_filter($type,$usr_token){
		$sql = "with
		t1 AS (SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(sub_acc, ',', n), ',', -1) AS value
		FROM user_access
		INNER JOIN (
		  SELECT 1 AS n UNION ALL SELECT 2 UNION ALL SELECT 3 
		) numbers
		ON CHAR_LENGTH(sub_acc) - CHAR_LENGTH(REPLACE(sub_acc, ',', '')) >= n - 1
		WHERE usr_token='$usr_token' AND dlt=1)
		SELECT * FROM company_setting WHERE type='$type' AND company_token IN(SELECT * FROM t1)";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_company_edit($company_token){
		$sql = "SELECT * FROM company_setting where company_token='$company_token' order by created_at desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_role(){
		$sql = "SELECT * FROM role_setting order by date_updt desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_role_edit($role_id){
		$sql = "SELECT * FROM role_setting where role_id='$role_id' limit 1";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_user_list(){
		$sql = "SELECT u.usr_token, e_email, full_name, phone_number, gender, u.updt_date  FROM user_tb u
		INNER JOIN e_personal p ON p.usr_token=u.usr_token
		ORDER BY u.updt_date desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_group(){
		$sql = "SELECT * FROM role_group ORDER BY groupid desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_role_access(){
		$sql = "SELECT * FROM role_setting order by role_name asc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	function get_priviledge($usr_token,$role_id){
		$check = $this->check_role($usr_token);
		if($check==1){
			$sql = "WITH 
			t1 AS (SELECT * FROM user_access WHERE usr_token='$usr_token' AND dlt=1),
			t2 AS (SELECT * FROM  role_access s
			WHERE group_token IN (SELECT group_token FROM t1)),
			t3 AS (SELECT * FROM t2 WHERE acc_id IN (SELECT MAX(acc_id) FROM t2 GROUP BY role_id) ),
			t4 AS (SELECT role_id,read_level,create_level,write_level from t3 WHERE role_id = '$role_id' )
			SELECT * FROM t4 where read_level=1 OR create_level=1 OR write_level=1";
		}else{
			$sql = "WITH 
			t1 AS (SELECT * FROM user_access WHERE usr_token='$usr_token' AND dlt=1),
			t2 AS (SELECT * FROM  role_access s
			WHERE group_token IN ('m47ycxwA2305')),
			t3 AS (SELECT * FROM t2 WHERE acc_id IN (SELECT MAX(acc_id) FROM t2 GROUP BY role_id) ),
			t4 AS (SELECT role_id,read_level,create_level,write_level from t3 WHERE role_id = '$role_id' )
			SELECT * FROM t4 where read_level=1 OR create_level=1 OR write_level=1";
		}
		
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	function check_role($usr_token){
		$sql = "SELECT * FROM user_access WHERE usr_token='$usr_token' AND dlt=1";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return 1;
		}else{
			return 2;
		}
	}

	function get_priviledge_acc($usr_token,$role_id,$cat){
		$filter = "";
		if($cat==1){
			$filter = "where read_level=1";
		}elseif($cat==2){
			$filter = "where create_level=1";
		}elseif($cat==3){
			$filter = "where write_level=1";
		}
		$sql = "WITH 
		t1 AS (SELECT * FROM user_access WHERE usr_token='$usr_token' AND dlt=1),
		t2 AS (SELECT * FROM  role_access s
		WHERE group_token IN (SELECT group_token FROM t1)),
		t3 AS (SELECT * FROM t2 WHERE acc_id IN (SELECT MAX(acc_id) FROM t2 GROUP BY role_id) ),
		t4 AS (SELECT role_id,read_level,create_level,write_level from t3 WHERE role_id = '$role_id' )
		 SELECT * FROM t4 $filter";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_role_access_set($group_token){
		$sql = "WITH 
		t1 AS (SELECT * FROM role_setting),
		t2 AS (SELECT * FROM role_access WHERE group_token='$group_token')
		SELECT t1.*, acc_id, group_token,  read_level, create_level,write_level FROM t1
		LEFT JOIN t2 ON t2.role_id=t1.role_id
		order by role_name asc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	function check_role_access($group_token,$role_id){
		$sql = "SELECT * FROM role_access where group_token='$group_token' AND role_id='$role_id' order by acc_id desc";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return 1;
		}else{
			return 2;
		}
	}

	public function get_access_user($usr_token){
		$sql = "WITH 
		t1 AS (SELECT *, dlt AS access_level  FROM user_access WHERE usr_token='$usr_token' and dlt=1)
		SELECT r.*, t1.access_level  FROM role_group r
		LEFT JOIN t1 ON t1.group_token=r.group_token
		ORDER BY groupid desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	function check_user_access($usr_token,$group_token){
		$sql = "SELECT * FROM user_access where usr_token='$usr_token' AND group_token='$group_token' order by user_acc_id desc";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return 1;
		}else{
			return 2;
		}
	}
	









}