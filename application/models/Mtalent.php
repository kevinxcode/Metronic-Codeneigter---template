<?php
class Mtalent extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }

    public function get_talent(){
		$sql = "SELECT * FROM  e_personal p
        left JOIN e_work_status w ON w.usr_token=p.usr_token";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

    public function get_talent_filter($code){
		$sql = "WITH 
        t1 AS (SELECT usr_token FROM e_work_status WHERE institution_token='$code'),
        t2 AS (select usr_token FROM e_edu WHERE institution_token='$code'),
        t3 AS (SELECT * FROM t1 UNION SELECT * FROM t2)
        
        SELECT * FROM  e_personal p
        left JOIN e_work_status w ON w.usr_token=p.usr_token
        WHERE p.usr_token IN (SELECT * FROM t3)";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

    public function get_talent_company($usr_token,$type){
		$sql = "WITH 
        t0_a as (SELECT * FROM company_setting where type='$type'),
        t0 AS (SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(sub_acc, ',', n), ',', -1) AS value
FROM user_access
INNER JOIN (
  SELECT 1 AS n UNION ALL SELECT 2 UNION ALL SELECT 3 
) numbers
ON CHAR_LENGTH(sub_acc) - CHAR_LENGTH(REPLACE(sub_acc, ',', '')) >= n - 1
WHERE usr_token='$usr_token' AND dlt='1'),
t0_b as (select * from t0 WHERE VALUE IN(select company_token from t0_a)),

        t1 AS (SELECT usr_token FROM e_work_status WHERE institution_token in(SELECT * FROM t0_b)),
        t2 AS (select usr_token FROM e_edu WHERE institution_token in(SELECT * FROM t0_b)),
        t3 AS (SELECT * FROM t1 UNION SELECT * FROM t2)
        
        SELECT * FROM  e_personal p
        left JOIN e_work_status w ON w.usr_token=p.usr_token
        WHERE p.usr_token IN (SELECT * FROM t3)";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}
}