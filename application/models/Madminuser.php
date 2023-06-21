<?php
class Madminuser extends CI_Model{

	function __construct()
    {
        parent::__construct();
    }

	function createRandomPassword() { 
        $now = date('ym');
        $chars = "0123456789abcdefghijkmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
        srand((double)microtime()*1000000); 
        $i = 0; 
        $pass = ''; 
        while ($i <= 7) { 
            $num = rand() % 60; 
            $tmp = substr($chars, $num, 1); 
            $pass = $pass . $tmp; 
            $i++; 
        } 
        $hash =  $pass.''.$now; 
        // echo $hash; 
        return $hash; 
    } 

	function qr($token){
        date_default_timezone_set('Asia/Jakarta');
        $tanggal= mktime(0, 0, 0, date("m"), date("d")+90, date("Y"));
        $date_exp = date("Y-m-d", $tanggal);

        $url = $token;
        $file_name='qr_code_generator';

        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/temp-qr/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $image_name=$file_name.'.png'; //buat name dari qr code sesuai dengan nim

        $params['data'] = $url; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

		$path = './assets/temp-qr/'.$image_name;
		$type = pathinfo($path, PATHINFO_EXTENSION);
		$data = file_get_contents($path);
		$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
		
        if(file_exists($path)){
            unlink($path); // remove qr temp file
        }
        return $base64;
		// echo '<img src="'.$base64.'">';
    }

	function generate_token(){
		$hash = "";
		$date = date("ymdhis");
		$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		for($i = 0; $i < 30; $i++){
			$hash .= $chars[mt_rand(0, 105)];
			$tokenid =($hash.''.$date);
		}
		return $tokenid;
	}

	function regions(){
		$data = file_get_contents(prefix_url.'assets/regions.json');
		$obj = json_decode($data, true);
		foreach($obj as $dt){
			 $provinsi[] = $dt['provinsi'];
		}
		return $provinsi;
	}

	function nationality(){
		$data = file_get_contents(prefix_url.'assets/countries.json');
		$obj = json_decode($data, true);
		// $print = $obj['en_short_name'];
		foreach($obj as $dt){
			 $en_short_name[] = $dt['en_short_name'];
		}
		return $en_short_name;
	}

	function regency(){
		$data = file_get_contents(prefix_url.'assets/regencies.json');
		$obj = json_decode($data, true);
		return $obj;
	}

	function textUcword($text){
		$f_text = ucwords(strtolower($text));
		return $f_text;
	}

	public function checkEmail($email){
		$sql = "SELECT * FROM user_tb where e_email='$email'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return 1;
		}else{
			return 2;
		}
	}

	public function get_detail_user($usr_token){
		$sql = "SELECT * FROM e_personal where usr_token='$usr_token' limit 1";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_photo_profile($usr_token){
		$sql = "SELECT e_profile, e_email FROM user_tb where usr_token='$usr_token' limit 1";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}


	function defaultImage(){
		$data = file_get_contents(prefix_url.'assets/default_image.json');
		$obj = json_decode($data, true);
		foreach($obj as $dt){
			$image =  $dt['img'];
		}
		return $image;
	}

	public function get_edu(){
		$sql = "SELECT * FROM edu_level order by level_id asc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_email_user($email){
		$sql = "SELECT e_email FROM user_tb where e_email='$email' limit 1";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	function pagNation($page){
		$page = 1;
		if(!empty($_GET['page'])) {
			$page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
			if(false === $page) {
				$page = 1;
			}
		}
		// set the number of items to display per page
		$items_per_page = 6;

		// build query
		$offset = ($page - 1) * $items_per_page;

		echo $items_per_page;
		echo '<hr>';
		echo $offset;
	}



	
	




	
}
