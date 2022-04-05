<?php
class News_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }


        public function set_comment($slug = FALSE)
		{
			$this->load->helper('url');
			$my_date_time = date('Y-m-d H:i:s');
			$arr = $_SESSION['logged_in'];
			$data = array(
		    	'vsebina' => $this->input->post('comment'),
		    	'datumura' => $my_date_time,
		        'id_u' => $arr['id_u'],
		        'id_o' => $this->input->post('id_space')
		    );

		    $this->db->insert('komentar', $data);
        }

        public function set_vote($slug = FALSE)
		{
			$this->load->helper('url');
			$my_date_time = date('Y-m-d H:i:s');
			$arr = $_SESSION['logged_in'];
			$data = array(
		    	'vrednost' => intval($this->input->post('vote_space')),
		    	'datumura' => $my_date_time,
		        'id_u' => $arr['id_u'],
		        'id_o' => $this->input->post('id_space')
		    );

		    $query2 = $this->db->select('*')
	        				->from('ocena')
	        				->where('ocena.id_u', $arr['id_u'])
	        				->where('ocena.id_o', $this->input->post('id_space'))
	        				->get();
	        $num_rows_vote = $query2->num_rows();

	        if($num_rows_vote > 0){
	        	$id_vote = $query2->row()->id;
	        	$data = array(
			    	'vrednost' => intval($this->input->post('vote_space'))
		    	);
	        	$this->db->set($data);
				$this->db->where('id', $id_vote);
				$this->db->update("ocena");
		    } else {
	        	$this->db->insert('ocena', $data);
	        }

	        return $this->input->post('id_space');



		    
        }

        public function control_comment(){

        }

        public function control_user($user, $space){

        }

        public function get_num_space(){
        	$query = $this->db->select('*')
	        				->from('oglas')
	        				->get();
	        return $query->num_rows();
        }

        public function get_num_space_form(){

        	$this->db->select('ocena.id_o, AVG(ocena.vrednost) AS "avg_oglas"')
        			->from('ocena')
        			->group_by('ocena.id_o');

        	$subquery = $this->db->get_compiled_select();


			$query = $this->db->select('*')
	        				->from('oglas')
	        				->join('lastnost', 'oglas.id = lastnost.id_o')
	        				->join("($subquery) O", "O.id_o = oglas.id", 'left');

	        if(isset($_SESSION['point_value']) && $_SESSION['point_value'] == 'veichle'){
	        	$where_q = "oglas.lokacija = 'cover' OR oglas.lokacija = 'uncover'";
	        	$query = $this->db->where($where_q);
	        } else if(isset($_SESSION['point_value']) && $_SESSION['point_value'] == 'object'){
	        	$where_q_2 = "oglas.lokacija = 'indoor' OR oglas.lokacija = 'none'";
	        	$query = $this->db->where($where_q_2);
	        }
	        

	        if(isset($_SESSION['point_value_size']) && $_SESSION['point_value_size'] == 'extra_small'){
	        	$query_text = "oglas.dolzina <= 5 AND oglas.sirina <= 5";
				$query = $this->db->where($query_text);
	        } else if(isset($_SESSION['point_value_size']) && $_SESSION['point_value_size'] == 'small'){
	        	$query_text = "oglas.dolzina >= 5 AND oglas.sirina >= 5 AND oglas.dolzina <= 10 AND oglas.sirina <= 10";
				$query = $this->db->where($query_text);
	        } else if(isset($_SESSION['point_value_size']) && $_SESSION['point_value_size'] == 'medium'){
	        	$query_text = "oglas.dolzina >= 10 AND oglas.sirina >= 10 AND oglas.dolzina <= 15 AND oglas.sirina <= 15";
				$query = $this->db->where($query_text);
	        } else if(isset($_SESSION['point_value_size']) && $_SESSION['point_value_size'] == 'large'){
	        	$query_text = "oglas.dolzina >= 15 AND oglas.sirina >= 15";
				$query = $this->db->where($query_text);
	        }



			if(isset($_SESSION['city_post']) && $_SESSION['city_post'] != ''){
				$query = $this->db->where('UPPER(oglas.mesto)', strtoupper($_SESSION['city_post']));
			}
			if(isset($_SESSION['price_from']) && !empty($_SESSION['price_from'])){
				$query = $this->db->where('oglas.cena >=', intval($_SESSION['price_from']));
			}
			if(isset($_SESSION['price_end']) && !empty($_SESSION['price_end'])){
				$query = $this->db->where('oglas.cena <=', intval($_SESSION['price_end']));
			}


			if(isset($_SESSION['climate_controlled']) && $_SESSION['climate_controlled'] == '1'){
				$query = $this->db->where('lastnost.climate_controlled', 1);
			}
			if(isset($_SESSION['smoke_free']) && $_SESSION['smoke_free'] == '1'){
				$query = $this->db->where('lastnost.smoke_free', 1);
			}
			if(isset($_SESSION['smoke_detectors']) && $_SESSION['smoke_detectors'] == '1'){
				$query = $this->db->where('lastnost.smoke_detectors', 1);
			}
			if(isset($_SESSION['private_entrance']) && $_SESSION['private_entrance'] == '1'){
				$query = $this->db->where('lastnost.private_entrance', 1);
			}
			if(isset($_SESSION['private_space']) && $_SESSION['private_space'] == '1'){
				$query = $this->db->where('lastnost.private_space', 1);
			}
			if(isset($_SESSION['locked_area']) && $_SESSION['locked_area'] == '1'){
				$query = $this->db->where('lastnost.locked_area', 1);
			}
			if(isset($_SESSION['pet_free']) && $_SESSION['pet_free'] == '1'){
				$query = $this->db->where('lastnost.pet_free', 1);
			}
			if(isset($_SESSION['security_camera']) && $_SESSION['security_camera'] == '1'){
				$query = $this->db->where('lastnost.security_camera', 1);
			}
			if(isset($_SESSION['no_strairs']) && $_SESSION['no_strairs'] == '1'){
				$query = $this->db->where('lastnost.no_stairs', 1);
			}



			if(isset($_SESSION['order_ad']) && $_SESSION['order_ad'] == 'oldest'){
				$query = $this->db->order_by("datumura", "asc");
			} else if(isset($_SESSION['order_ad']) && $_SESSION['order_ad'] == 'newest'){
				$query = $this->db->order_by("datumura", "desc");
			} else if(isset($_SESSION['order_ad']) && $_SESSION['order_ad'] == 'low_to_high'){
				$query = $this->db->order_by("cena", "asc");
			} else if(isset($_SESSION['order_ad']) && $_SESSION['order_ad'] == 'high_to_low'){
				$query = $this->db->order_by("cena", "desc");
			} else if(isset($_SESSION['order_ad']) && $_SESSION['order_ad'] == 'low_to_high_r'){
				$query = $this->db->order_by("avg_oglas", "asc");
			} else if(isset($_SESSION['order_ad']) && $_SESSION['order_ad'] == 'high_to_low_r'){
				$query = $this->db->order_by("avg_oglas", "desc");
			}

			if(isset($_SESSION['rating_ad']) && $_SESSION['rating_ad'] == '1_greater'){
				$query = $this->db->where("avg_oglas >=", 1.0);
			} else if(isset($_SESSION['rating_ad']) && $_SESSION['rating_ad'] == '2_greater'){
				$query = $this->db->where("avg_oglas >=", 2.0);
			} else if(isset($_SESSION['rating_ad']) && $_SESSION['rating_ad'] == '3_greater'){
				$query = $this->db->where("avg_oglas >=", 3.0);
			} else if(isset($_SESSION['rating_ad']) && $_SESSION['rating_ad'] == '4_greater'){
				echo "uhausdj";
				$query = $this->db->where("avg_oglas >=", 4.0);
			} else if(isset($_SESSION['rating_ad']) && $_SESSION['rating_ad'] == '5_greater'){
				$query = $this->db->where("avg_oglas >=", 5.0);
			}

	        $query = $this->db->get();

	        return $query->num_rows();
        }

        public function get_news($slug = FALSE, $num = NULL)
		{
	        if ($slug === FALSE)
	        {
	        	if($num == NULL){
	                $query = $this->db->select('*')
	        				->from('oglas')
	        				->join('lastnost', 'oglas.id = lastnost.id_o')
	        				->get();
	                return $query->result_array();
	            } else {
	            	$query = $this->db->select('*')
	        				->from('oglas')
	        				->join('lastnost', 'oglas.id = lastnost.id_o');

	        		$query = $this->db->limit(12*($num),12*($num-1));
	        		$query = $this->db->get();
	        		$que = $this->db->last_query();
	                return $query->result_array();
	            }
	        }

	        /*$query = $this->db->get_where('oglas', array('id' => $slug));*/
	        $query = $this->db->select('*')
	        				->select('oglas.id AS "id_space"')
	        				->select('lastnost.id AS "id_pro"')
	        				->from('oglas')
	        				->join('lastnost', 'oglas.id = lastnost.id_o')
	        				->where('oglas.id', $slug)
	        				->get();
	        return $query->row_array();
        }

        


        public function get_comment($num)
		{
			$query = $this->db->select('*')
							->select('komentar.id AS "id_ads"')
	        				->from('komentar')
	        				->join('uporabnik', 'komentar.id_u = uporabnik.id')
	        				->where('komentar.id_o', $num)
	        				->get();
	        /*$query = $this->db->get('komentar');*/
	        return $query->result_array();
        }

        public function get_vote($num)
		{
			if(isset($_SESSION['logged_in'])){
				$arr = $_SESSION['logged_in'];
			
			

				$query = $this->db->select('*')
		        				->from('ocena')
		        				->where('ocena.id_u', $arr['id_u'])
		        				->where('ocena.id_o', $num)
		        				->get();
		        /*$query = $this->db->get('komentar');*/
		        return $query->row_array();
	    	} else {
	    		return;
	    	}
        }


        public function get_avg_vote($num)
		{
			$query = $this->db->select('AVG(ocena.vrednost) AS "vote_avg"')
		        				->from('ocena')
		        				->where('ocena.id_o', $num)
		        				->get();
		    return $query->row_array();
        }


        public function find_group_news($num = NULL)
		{

			$this->db->select('ocena.id_o, AVG(ocena.vrednost) AS "avg_oglas"')
        			->from('ocena')
        			->group_by('ocena.id_o');

        	$subquery = $this->db->get_compiled_select();


			$query = $this->db->select('*')
							->select('oglas.id AS "id_ad_space"')
	        				->from('oglas')
	        				->join('lastnost', 'oglas.id = lastnost.id_o')
	        				->join("($subquery) O", "O.id_o = oglas.id", 'left');

	        if(isset($_SESSION['point_value']) && $_SESSION['point_value'] == 'veichle'){
	        	$where_q = "oglas.lokacija = 'cover' OR oglas.lokacija = 'uncover'";
	        	$query = $this->db->where($where_q);
	        } else if(isset($_SESSION['point_value']) && $_SESSION['point_value'] == 'object'){
	        	$where_q_2 = "oglas.lokacija = 'indoor' OR oglas.lokacija = 'none'";
	        	$query = $this->db->where($where_q_2);
	        }
	        

	        if(isset($_SESSION['point_value_size']) && $_SESSION['point_value_size'] == 'extra_small'){
	        	$query_text = "oglas.dolzina <= 5 AND oglas.sirina <= 5";
				$query = $this->db->where($query_text);
	        } else if(isset($_SESSION['point_value_size']) && $_SESSION['point_value_size'] == 'small'){
	        	$query_text = "oglas.dolzina >= 5 AND oglas.sirina >= 5 AND oglas.dolzina <= 10 AND oglas.sirina <= 10";
				$query = $this->db->where($query_text);
	        } else if(isset($_SESSION['point_value_size']) && $_SESSION['point_value_size'] == 'medium'){
	        	$query_text = "oglas.dolzina >= 10 AND oglas.sirina >= 10 AND oglas.dolzina <= 15 AND oglas.sirina <= 15";
				$query = $this->db->where($query_text);
	        } else if(isset($_SESSION['point_value_size']) && $_SESSION['point_value_size'] == 'large'){
	        	$query_text = "oglas.dolzina >= 15 AND oglas.sirina >= 15";
				$query = $this->db->where($query_text);
	        }



			if(isset($_SESSION['city_post']) && $_SESSION['city_post'] != ''){
				$query = $this->db->where('UPPER(oglas.mesto)', strtoupper($_SESSION['city_post']));
			}
			if(isset($_SESSION['price_from']) && !empty($_SESSION['price_from'])){
				$query = $this->db->where('oglas.cena >=', intval($_SESSION['price_from']));
			}
			if(isset($_SESSION['price_end']) && !empty($_SESSION['price_end'])){
				$query = $this->db->where('oglas.cena <=', intval($_SESSION['price_end']));
			}


			if(isset($_SESSION['climate_controlled']) && $_SESSION['climate_controlled'] == '1'){
				$query = $this->db->where('lastnost.climate_controlled', 1);
			}
			if(isset($_SESSION['smoke_free']) && $_SESSION['smoke_free'] == '1'){
				$query = $this->db->where('lastnost.smoke_free', 1);
			}
			if(isset($_SESSION['smoke_detectors']) && $_SESSION['smoke_detectors'] == '1'){
				$query = $this->db->where('lastnost.smoke_detectors', 1);
			}
			if(isset($_SESSION['private_entrance']) && $_SESSION['private_entrance'] == '1'){
				$query = $this->db->where('lastnost.private_entrance', 1);
			}
			if(isset($_SESSION['private_space']) && $_SESSION['private_space'] == '1'){
				$query = $this->db->where('lastnost.private_space', 1);
			}
			if(isset($_SESSION['locked_area']) && $_SESSION['locked_area'] == '1'){
				$query = $this->db->where('lastnost.locked_area', 1);
			}
			if(isset($_SESSION['pet_free']) && $_SESSION['pet_free'] == '1'){
				$query = $this->db->where('lastnost.pet_free', 1);
			}
			if(isset($_SESSION['security_camera']) && $_SESSION['security_camera'] == '1'){
				$query = $this->db->where('lastnost.security_camera', 1);
			}
			if(isset($_SESSION['no_strairs']) && $_SESSION['no_strairs'] == '1'){
				$query = $this->db->where('lastnost.no_stairs', 1);
			}



			if(isset($_SESSION['order_ad']) && $_SESSION['order_ad'] == 'oldest'){
				$query = $this->db->order_by("datumura", "asc");
			} else if(isset($_SESSION['order_ad']) && $_SESSION['order_ad'] == 'newest'){
				$query = $this->db->order_by("datumura", "desc");
			} else if(isset($_SESSION['order_ad']) && $_SESSION['order_ad'] == 'low_to_high'){
				$query = $this->db->order_by("cena", "asc");
			} else if(isset($_SESSION['order_ad']) && $_SESSION['order_ad'] == 'high_to_low'){
				$query = $this->db->order_by("cena", "desc");
			} else if(isset($_SESSION['order_ad']) && $_SESSION['order_ad'] == 'low_to_high_r'){
				$query = $this->db->order_by("avg_oglas", "asc");
			} else if(isset($_SESSION['order_ad']) && $_SESSION['order_ad'] == 'high_to_low_r'){
				$query = $this->db->order_by("avg_oglas", "desc");
			}

			if(isset($_SESSION['rating_ad']) && $_SESSION['rating_ad'] == '1_greater'){
				$query = $this->db->where("avg_oglas >=", 1.0);
			} else if(isset($_SESSION['rating_ad']) && $_SESSION['rating_ad'] == '2_greater'){
				$query = $this->db->where("avg_oglas >=", 2.0);
			} else if(isset($_SESSION['rating_ad']) && $_SESSION['rating_ad'] == '3_greater'){
				$query = $this->db->where("avg_oglas >=", 3.0);
			} else if(isset($_SESSION['rating_ad']) && $_SESSION['rating_ad'] == '4_greater'){
				$query = $this->db->where("avg_oglas >=", 4.0);
			} else if(isset($_SESSION['rating_ad']) && $_SESSION['rating_ad'] == '5_greater'){
				$query = $this->db->where("avg_oglas >=", 5.0);
			}

			$query = $this->db->limit(12,12*($num-1));

	        $query = $this->db->get();

	        return $query->result_array();
        }


        public function set_news($path_img)
		{
		    $this->load->helper('url');

		    $slug = url_title($this->input->post('title'), 'dash', TRUE);
		    $arr = $_SESSION['logged_in'];
		    $my_date_time = date('Y-m-d H:i:s');
		    $location;
		    $description_s;
		    $owner_need_v;
		    $c_c;
		    $s_f;
		    $s_d;
		    $p_e;
		    $p_s;
		    $l_a;
		    $p_f;
		    $s_c;
		    $n_s;




		    if(isset($_POST['type_select_radio']) && $_POST['type_select_radio'] == 'yes') {
		    	if(isset($_POST['type_select_yes'])) {
		    		$location = $_POST['type_select_yes'];
		    	}
		    	if(isset($_POST['indoor_select'])) {
		    		$description_s = $_POST['indoor_select'];
		    	}
		    	if(isset($_POST['cover_select'])) {
		    		$description_s = $_POST['cover_select'];
		    	}
		    	if(isset($_POST['uncover_select'])) {
		    		$description_s = $_POST['uncover_select'];
		    	}
			} else {
				$location = "none";
				if(isset($_POST['type_select_no'])) {
		    		$description_s = $_POST['type_select_no'];
		    	}
			}


			if(isset($_POST['need_owner']) && 
   				$_POST['need_owner'] == 'yes') 
			{
				$owner_need_v = "yes";
			} else {
				$owner_need_v = "no";
			}



			//$_POST["title"] = $this->input->post('title')
			if($path_img == ''){
				$data = array(
		    	'vozilo' => $this->input->post('type_select_radio'),
		    	'lokacija' => $location,
		    	'opis_k' => $description_s,
		    	'opis' => $this->input->post('text'),
		        'cena' => $this->input->post('price'),
		        'drzava' => $this->input->post('country'),
		        'mesto' => $this->input->post('city'),
		        'p_stevilka' => $this->input->post('paddress'),
		        'naslov' => $this->input->post('address'),
		        'dolzina' => $this->input->post('length'),
		        'sirina' => $this->input->post('width'),
		        'visina' => $this->input->post('height'),
		        'lastnik_ogled' => $owner_need_v,
		        'gostota' => $this->input->post('often_visit'),
		        'cas' => $this->input->post('day_visit'),
		        'pot_slika' => '/uploads/no_img.png',
		        'datumura' => $my_date_time,
		        'id_u' => $arr['id_u']
		    );
			} else {
				$data = array(
		    	'vozilo' => $this->input->post('type_select_radio'),
		    	'lokacija' => $location,
		    	'opis_k' => $description_s,
		    	'opis' => $this->input->post('text'),
		        'cena' => $this->input->post('price'),
		        'drzava' => $this->input->post('country'),
		        'mesto' => $this->input->post('city'),
		        'p_stevilka' => $this->input->post('paddress'),
		        'naslov' => $this->input->post('address'),
		        'dolzina' => $this->input->post('length'),
		        'sirina' => $this->input->post('width'),
		        'visina' => $this->input->post('height'),
		        'lastnik_ogled' => $owner_need_v,
		        'gostota' => $this->input->post('often_visit'),
		        'cas' => $this->input->post('day_visit'),
		        'pot_slika' => $path_img,
		        'datumura' => $my_date_time,
		        'id_u' => $arr['id_u']
		    );
			}
		    



		    $this->db->insert('oglas', $data);

		    $this->db->insert_id();
		    $last_id = $this->db->insert_id();

		    if(isset($_POST['climate_controlled']) && 
   				$_POST['climate_controlled'] == 'yes') 
			{
				$c_c = 1;
			} else {
				$c_c = 0;
			}

			if(isset($_POST['private_space']) && 
   				$_POST['private_space'] == 'yes') 
			{
				$s_f = 1;
			} else {
				$s_f = 0;
			}

			if(isset($_POST['smoke_free']) && 
   				$_POST['smoke_free'] == 'yes') 
			{
				$s_d = 1;
			} else {
				$s_d = 0;
			}

			if(isset($_POST['smoke_detectors']) && 
   				$_POST['smoke_detectors'] == 'yes') 
			{
				$p_e = 1;
			} else {
				$p_e = 0;
			}

			if(isset($_POST['private_entrance']) && 
   				$_POST['private_entrance'] == 'yes') 
			{
				$p_s = 1;
			} else {
				$p_s = 0;
			}

			if(isset($_POST['locked_area']) && 
   				$_POST['locked_area'] == 'yes') 
			{
				$l_a = 1;
			} else {
				$l_a = 0;
			}

			if(isset($_POST['pet_free']) && 
   				$_POST['pet_free'] == 'yes') 
			{
				$p_f = 1;
			} else {
				$p_f = 0;
			}

			if(isset($_POST['security_camera']) && 
   				$_POST['security_camera'] == 'yes') 
			{
				$s_c = 1;
			} else {
				$s_c = 0;
			}

			if(isset($_POST['no_stairs']) && 
   				$_POST['no_stairs'] == 'yes') 
			{
				$n_s = 1;
			} else {
				$n_s = 0;
			}

			$data2 = array(
		    	'climate_controlled' => $c_c,
		    	'smoke_free' => $s_f,
		    	'smoke_detectors' => $s_d,
		    	'private_entrance' => $p_e,
		        'private_space' => $p_s,
		        'locked_area' => $l_a,
		        'pet_free' => $p_f,
		        'security_camera' => $s_c,
		        'no_stairs' => $n_s,
		        'id_o' => $last_id
		    );

		    $this->db->insert('lastnost', $data2);


		    return $last_id;

		}

		public function delete_news($slug){
			$this->db->where("id", $slug);
			$this->db->delete("oglas");
		}

		public function update_news($path_img){


			$this->load->helper('url');

		    $slug = url_title($this->input->post('title'), 'dash', TRUE);
		    $arr = $_SESSION['logged_in'];
		    $location;
		    $description_s;
		    $owner_need_v;
		    $c_c;
		    $s_f;
		    $s_d;
		    $p_e;
		    $p_s;
		    $l_a;
		    $p_f;
		    $s_c;
		    $n_s;




		    if(isset($_POST['type_select_radio']) && $_POST['type_select_radio'] == 'yes') {
		    	if(isset($_POST['type_select_yes'])) {
		    		$location = $_POST['type_select_yes'];
		    	}
		    	if(isset($_POST['indoor_select'])) {
		    		$description_s = $_POST['indoor_select'];
		    	}
		    	if(isset($_POST['cover_select'])) {
		    		$description_s = $_POST['cover_select'];
		    	}
		    	if(isset($_POST['uncover_select'])) {
		    		$description_s = $_POST['uncover_select'];
		    	}
			} else {
				$location = "none";
				if(isset($_POST['type_select_no'])) {
		    		$description_s = $_POST['type_select_no'];
		    	}
			}


			if(isset($_POST['need_owner']) && 
   				$_POST['need_owner'] == 'yes') 
			{
				$owner_need_v = "yes";
			} else {
				$owner_need_v = "no";
			}



			//$_POST["title"] = $this->input->post('title')

			if($path_img == ''){
				$data = array(
		    	'vozilo' => $this->input->post('type_select_radio'),
		    	'lokacija' => $location,
		    	'opis_k' => $description_s,
		    	'opis' => $this->input->post('text'),
		        'cena' => $this->input->post('price'),
		        'drzava' => $this->input->post('country'),
		        'mesto' => $this->input->post('city'),
		        'p_stevilka' => $this->input->post('paddress'),
		        'naslov' => $this->input->post('address'),
		        'dolzina' => $this->input->post('length'),
		        'sirina' => $this->input->post('width'),
		        'visina' => $this->input->post('height'),
		        'lastnik_ogled' => $owner_need_v,
		        'gostota' => $this->input->post('often_visit'),
		        'cas' => $this->input->post('day_visit'),
		        'id_u' => $arr['id_u']
		    );
			} else {
				$data = array(
		    	'vozilo' => $this->input->post('type_select_radio'),
		    	'lokacija' => $location,
		    	'opis_k' => $description_s,
		    	'opis' => $this->input->post('text'),
		        'cena' => $this->input->post('price'),
		        'drzava' => $this->input->post('country'),
		        'mesto' => $this->input->post('city'),
		        'p_stevilka' => $this->input->post('paddress'),
		        'naslov' => $this->input->post('address'),
		        'dolzina' => $this->input->post('length'),
		        'sirina' => $this->input->post('width'),
		        'visina' => $this->input->post('height'),
		        'lastnik_ogled' => $owner_need_v,
		        'gostota' => $this->input->post('often_visit'),
		        'cas' => $this->input->post('day_visit'),
		        'pot_slika' => $path_img,
		        'id_u' => $arr['id_u']
		        );
			}
		    



		    $this->db->set($data);
			$this->db->where('id', $this->input->post('id_space'));
			$this->db->update("oglas");


		    $last_id = $this->input->post('id_space');

		    if(isset($_POST['climate_controlled']) && 
   				$_POST['climate_controlled'] == 'yes') 
			{
				$c_c = 1;
			} else {
				$c_c = 0;
			}

			if(isset($_POST['private_space']) && 
   				$_POST['private_space'] == 'yes') 
			{
				$s_f = 1;
			} else {
				$s_f = 0;
			}

			if(isset($_POST['smoke_free']) && 
   				$_POST['smoke_free'] == 'yes') 
			{
				$s_d = 1;
			} else {
				$s_d = 0;
			}

			if(isset($_POST['smoke_detectors']) && 
   				$_POST['smoke_detectors'] == 'yes') 
			{
				$p_e = 1;
			} else {
				$p_e = 0;
			}

			if(isset($_POST['private_entrance']) && 
   				$_POST['private_entrance'] == 'yes') 
			{
				$p_s = 1;
			} else {
				$p_s = 0;
			}

			if(isset($_POST['locked_area']) && 
   				$_POST['locked_area'] == 'yes') 
			{
				$l_a = 1;
			} else {
				$l_a = 0;
			}

			if(isset($_POST['pet_free']) && 
   				$_POST['pet_free'] == 'yes') 
			{
				$p_f = 1;
			} else {
				$p_f = 0;
			}

			if(isset($_POST['security_camera']) && 
   				$_POST['security_camera'] == 'yes') 
			{
				$s_c = 1;
			} else {
				$s_c = 0;
			}

			if(isset($_POST['no_stairs']) && 
   				$_POST['no_stairs'] == 'yes') 
			{
				$n_s = 1;
			} else {
				$n_s = 0;
			}

			$data2 = array(
		    	'climate_controlled' => $c_c,
		    	'smoke_free' => $s_f,
		    	'smoke_detectors' => $s_d,
		    	'private_entrance' => $p_e,
		        'private_space' => $p_s,
		        'locked_area' => $l_a,
		        'pet_free' => $p_f,
		        'security_camera' => $s_c,
		        'no_stairs' => $n_s,
		        'id_o' => $last_id
		    );

		    $this->db->set($data2);
			$this->db->where('id', $this->input->post('id_pro'));
			$this->db->update("lastnost");




		}

		public function get_reservation($num)
		{
			$query = $this->db->select('*')
	        				->from('rezervacija')
	        				->where('rezervacija.id', $num)
	        				->get();
	        /*$query = $this->db->get('komentar');*/
	        return $query->row_array();
		}

		public function update_reservation()
		{
			$data = array(
		    	'datum_od' => $this->input->post('reserve_date'),
		    	'cas_rezervacije' => $this->input->post('how_long'),
		    	'stvari' => $this->input->post('description_reservation'),
		    	'opis' => $this->input->post('description_need'),
		    );
		    $this->db->set($data);
			$this->db->where('id', $this->input->post('id_space'));
			$this->db->update("rezervacija");
	        /*$query = $this->db->get('komentar');*/
		}

		public function delete_reservation($slug)
		{
			$this->db->where("id", $slug);
			$this->db->delete("rezervacija");
		}


		public function set_reservation()
		{
		    $this->load->helper('url');

		    $arr = $_SESSION['logged_in'];



			//$_POST["title"] = $this->input->post('title')
		    $data = array(
		    	'datum_od' => $this->input->post('reserve_date'),
		    	'cas_rezervacije' => $this->input->post('how_long'),
		    	'stvari' => $this->input->post('description_reservation'),
		    	'opis' => $this->input->post('description_need'),
		        'status' => "pending",
		        'id_u' => $arr['id_u'],
		        'id_o' => $this->input->post('id_space')
		    );



		    $this->db->insert('rezervacija', $data);

		}


		public function accept_reservation_model($num)
		{
		    $this->load->helper('url');

		    $arr = $_SESSION['logged_in'];



			//$_POST["title"] = $this->input->post('title')
		    $data = array(
		    	'status' => "accepted"
		    );



		   	$this->db->set($data);
			$this->db->where('id', $num);
			$this->db->update("rezervacija");

		}

		public function decline_reservation_model($num)
		{
		    $this->load->helper('url');

		    $arr = $_SESSION['logged_in'];



			//$_POST["title"] = $this->input->post('title')
		    $data = array(
		    	'status' => "rejected"
		    );



		   	$this->db->set($data);
			$this->db->where('id', $num);
			$this->db->update("rezervacija");

		}

		public function update_comment()
		{
			$data = array(
		    	'vsebina' => $this->input->post('comment')
		    );
		    $this->db->set($data);
			$this->db->where('id', $this->input->post('id_comment'));
			$this->db->update("komentar");
	        /*$query = $this->db->get('komentar');*/
		}


		public function delete_comment($slug){
			$this->db->where("id", $slug);
			$this->db->delete("komentar");
		}

		public function delete_vote($slug){
			$this->db->where("id", $slug);
			$this->db->delete("ocena");
		}

		public function delete_comment_num($slug){
			$query = $this->db->select('id_o')
	        				->from('komentar')
	        				->where('komentar.id', $slug)
	        				->get();
	        return $query->row_array();
		}

		public function delete_vote_num($slug){
			$query = $this->db->select('*')
	        				->from('ocena')
	        				->where('ocena.id', $slug)
	        				->get();
	        return $query->row_array();
		}


		public function get_user_reservation($num)
		{

	        $query = $this->db->select('*')
	        				->select('rezervacija.id AS "id_res"')
	        				->from('rezervacija')
	        				->join('oglas', 'oglas.id = rezervacija.id_o')
	        				->join('uporabnik', 'uporabnik.id = oglas.id_u')
	        				->where('rezervacija.id_u', $num)
	        				->get();
	        return $query->result_array();
        }

        public function get_other_reservation($num)
		{

	        /*$query = $this->db->get_where('oglas', array('id' => $slug));*/
	        $query = $this->db->select('*')
	        				->select('rezervacija.id AS "id_res"')
	        				->from('oglas')
	        				->join('rezervacija', 'oglas.id = rezervacija.id_o')
	        				->join('uporabnik', 'uporabnik.id = rezervacija.id_u')
	        				->where('oglas.id_u', $num)
	        				->get();
	        return $query->result_array();
        }

        public function get_user_space($num)
		{

	        /*$query = $this->db->get_where('oglas', array('id' => $slug));*/
	        $query = $this->db->select('*')
	        				->from('oglas')
	        				->where('oglas.id_u', $num)
	        				->get();
	        return $query->result_array();
        }






}