	<?php
	class Walmart extends CI_Controller {


	        public function __construct()
	        {
	                parent::__construct();
	                $this->load->helper(array('form', 'url'));
	                $this->load->model('news_model');
	                $this->load->helper('url_helper');
	                $this->load->helper('form');
                	$this->load->library('session');
                	$this->load->helper('url');
                	

	        }

	        public function index($num_page = NULL)
	        {
	                 $this->load->helper('form');
			    	$this->load->library('form_validation');
			    	
			    	# $this->form_validation->set_rules('type_storage', 'type_storage', 'required');
			    	# $this->form_validation->set_rules('size_storage', 'size_storage', 'required');
			    	$this->form_validation->set_rules('order_by', 'order_by', 'required');

	                if ($this->form_validation->run() === FALSE)
				    {
				    	if($num_page == NULL){
				    		$data['space'] = $this->news_model->find_group_news(1);
				    	} else {
				    		$data['space'] = $this->news_model->find_group_news($num_page);
				    	}
				    	if($num_page != NULL){ 
				        	$data['current_page'] = $num_page; 	
				        } else {
				        	$data['current_page'] = 1; 
				        }
				        $data['num_space'] = $this->news_model->get_num_space_form();

		                /*$data["title"] = "News";*/
		                $this->load->view('templates/header', $data);
		                /*var_dump($data["news"]);*/
		                $this->load->view('products/index', $data);
		                $this->load->view('templates/footer');

				    }
				    else
				    {
				    	$data['city_post'] = $this->input->post('city_name');
				        $_SESSION['city_post'] = $this->input->post('city_name');


				        $data['search'] = $this->input->post('search');
				        $_SESSION['search'] = $this->input->post('search');


				        $data['price_from'] = $this->input->post('start_price');
				        $_SESSION['price_from'] = $this->input->post('start_price');
				        $data['price_end'] = $this->input->post('end_price');
				        $_SESSION['price_end'] = $this->input->post('end_price');
				        $_SESSION['order_ad'] = $this->input->post('order_by');
				        $_SESSION['rating_ad'] = $this->input->post('rating_order');



				        if(isset($_POST['climate_controlled_button'])){
				        	$_SESSION['climate_controlled'] = "1";
				        } else {
				        	$_SESSION['climate_controlled'] = "0";
				        }

				        if(isset($_POST['smoke_free_button'])){
				        	$_SESSION['smoke_free'] = "1";
				        } else {
				        	$_SESSION['smoke_free'] = "0";
				        }

				        if(isset($_POST['smoke_detectors_button'])){
				        	$_SESSION['smoke_detectors'] = "1";
				        } else {
				        	$_SESSION['smoke_detectors'] = "0";
				        }

				        if(isset($_POST['private_entrance_button'])){
				        	$_SESSION['private_entrance'] = "1";
				        } else {
				        	$_SESSION['private_entrance'] = "0";
				        }

				        if(isset($_POST['private_space_button'])){
				        	$_SESSION['private_space'] = "1";
				        } else {
				        	$_SESSION['private_space'] = "0";
				        }

				        if(isset($_POST['locked_area_button'])){
				        	$_SESSION['locked_area'] = "1";
				        } else {
				        	$_SESSION['locked_area'] = "0";
				        }

				        if(isset($_POST['pet_free_button'])){
				        	$_SESSION['pet_free'] = "1";
				        } else {
				        	$_SESSION['pet_free'] = "0";
				        }

				        if(isset($_POST['security_camera_button'])){
				        	$_SESSION['security_camera'] = "1";
				        } else {
				        	$_SESSION['security_camera'] = "0";
				        }

				        if(isset($_POST['no_strairs_button'])){
				        	$_SESSION['no_strairs'] = "1";
				        } else {
				        	$_SESSION['no_strairs'] = "0";
				        }




				        $data['num_space'] = $this->news_model->get_num_space_form();
				        if($num_page != NULL){
				        	$data['current_page'] = $num_page; 
				        } else {
				        	$data['current_page'] = 1; 
				        }
				        $_SESSION['num_space'] = $this->news_model->get_num_space_form();
				    	if($num_page == NULL){
				    		$data['space'] = $this->news_model->find_group_news(1);
				    	} else {
				    		$data['space'] = $this->news_model->find_group_news($num_page);
				    	}
				        /*$data['space'] = $this->news_model->find_group_news();*/
				        

		                /*var_dump($data["news_item"]);*/
		                $this->load->view('templates/header', $data);
		                /*var_dump($data["news"]);*/
		                $this->load->view('products/index', $data);
		                $this->load->view('templates/footer');
				    }

	                
	        }

	        public function reserve($num = NULL)
	        {
	        		$data["num_r"] = $num;	
	                $this->load->view('templates/header', $data);
	                /*var_dump($data["news"]);*/
	                $this->load->view('space/reserve_space', $data);
	                $this->load->view('templates/footer');

	                
	        }

	        public function view_reserve($num = NULL)
	        {

	                $data["opis"] = "News";
	                /*var_dump($data["news_item"]);*/
	                $this->load->view('templates/header', $data);
	                /*var_dump($data["news"]);*/
	                $this->load->view('products/view', $data);
	                $this->load->view('templates/footer');
	        }

	        public function comment(){
	        	if(!isset($this->session->userdata['logged_in'])){
					$data['message_display'] = 'Signin to view this page!';
				    $this->load->view('templates/header');
				    $this->load->view('user_authentication/login_form', $data);
				    $this->load->view('templates/footer');
				    return;
				}

				$this->load->helper('form');
			    $this->load->library('form_validation');


			    $this->form_validation->set_rules('comment', 'Comment', 'required');


			    if ($this->form_validation->run() === FALSE)
			    {
			        $this->load->view('templates/header', $data);
			        $this->load->view('products/view');
			        $this->load->view('templates/footer');

			    }
			    else
			    {
			        $lastAdded = $this->news_model->set_comment();
			        $data['space_item'] = $this->news_model->get_news($this->input->post('id_space'), NULL);
	                $data['comment'] = $this->news_model->get_comment($this->input->post('id_space'), NULL);
	                $data['vote_ad'] = $this->news_model->get_vote($this->input->post('id_space'), NULL);
	                $data['vote_ad_avg'] = $this->news_model->get_avg_vote($this->input->post('id_space'), NULL);
	                $data["opis"] = "News";
	                /*var_dump($data["news_item"]);*/
	                $this->load->view('templates/header', $data);
	                /*var_dump($data["news"]);*/
	                $this->load->view('products/view', $data);
	                $this->load->view('templates/footer');
			    }


	        }

	        public function vote(){

	        	$data["title"] = "News";
	        	if(!isset($this->session->userdata['logged_in'])){
					$data['message_display'] = 'Signin to view this page!';
				    $this->load->view('templates/header');
				    $this->load->view('user_authentication/login_form', $data);
				    $this->load->view('templates/footer');
				    return;
				}

				$this->load->helper('form');
			    $this->load->library('form_validation');


			    $this->form_validation->set_rules('vote', 'Vote', 'required');


			    if ($this->form_validation->run() === TRUE)
			    {
			        $this->load->view('templates/header', $data);
			        $this->load->view('products/view');
			        $this->load->view('templates/footer');

			    }
			    else
			    {
			        $lastAdded = $this->news_model->set_vote();

			        $data['space_item'] = $this->news_model->get_news($lastAdded, NULL);
	                $data['comment'] = $this->news_model->get_comment($lastAdded, NULL);
	                $data['vote_ad'] = $this->news_model->get_vote($lastAdded, NULL);
	                $data['vote_ad_avg'] = $this->news_model->get_avg_vote($lastAdded, NULL);

	                $data["opis"] = "News";
	                /*var_dump($data["news_item"]);*/
	                $this->load->view('templates/header', $data);
	                /*var_dump($data["news"]);*/
	                $this->load->view('products/view', $data);
	                $this->load->view('templates/footer');
			    }


	        }

	        public function view($num = NULL, $warning = NULL)
	        {
	                $data['space_item'] = $this->news_model->get_news($num, NULL);
	                $data['comment'] = $this->news_model->get_comment($num, NULL);
	                $data['vote_ad'] = $this->news_model->get_vote($num, NULL);
	                $data['vote_ad_avg'] = $this->news_model->get_avg_vote($num, NULL);
	                $data['warning'] = $warning;

	                if (!isset($_SESSION['productsCart'])) {
	                	$_SESSION['productsCart'] = array();
	                }

	                /*var_dump($data["news_item"]);*/
	                $this->load->view('templates/header', $data);
	                /*var_dump($data["news"]);*/
	                $this->load->view('products/view', $data);
	                $this->load->view('templates/footer');
	        }


	        public function addToCart($num = NULL, $warning = NULL) {

				$this->load->helper('form');
			    $this->load->library('form_validation');


			    $this->form_validation->set_rules('cart', 'cart', 'required');


			    if ($this->form_validation->run() === FALSE)
			    {
			        $this->load->view('templates/header', $data);
			        $this->load->view('products/view');
			        $this->load->view('templates/footer');

			    }
			    else
			    {
			        # $lastAdded = $this->news_model->set_comment();
			        $data['space_item'] = $this->news_model->get_news($this->input->post('id_space'), NULL);
	                $data['comment'] = $this->news_model->get_comment($this->input->post('id_space'), NULL);
	                $data['vote_ad'] = $this->news_model->get_vote($this->input->post('id_space'), NULL);
	                $data['vote_ad_avg'] = $this->news_model->get_avg_vote($this->input->post('id_space'), NULL);
	                $data["opis"] = "News";
	                /*var_dump($data["news_item"]);*/
	                $this->load->view('templates/header', $data);
	                /*var_dump($data["news"]);*/
	                $this->load->view('products/view', $data);
	                $this->load->view('templates/footer');
			    }


	        	array_push($_SESSION['productsCart'],$this->input->post('id_space'));
	        	# foreach($_SESSION['productsCart'] as $col){
	        	# 	print($col);
	        	# }
	        	# print("uasodn");
	        }



	        public function removeFromCart($num = NULL, $warning = NULL) {

				$this->load->helper('form');
			    $this->load->library('form_validation');


			    $this->form_validation->set_rules('cartRemove', 'cartRemove', 'required');


			    if ($this->form_validation->run() === FALSE)
			    {
			        $this->load->view('templates/header', $data);
			        $this->load->view('products/view');
			        $this->load->view('templates/footer');

			    }
			    else
			    {
			        # $lastAdded = $this->news_model->set_comment();
			        $data['space_item'] = $this->news_model->get_news($this->input->post('id_space'), NULL);
	                $data['comment'] = $this->news_model->get_comment($this->input->post('id_space'), NULL);
	                $data['vote_ad'] = $this->news_model->get_vote($this->input->post('id_space'), NULL);
	                $data['vote_ad_avg'] = $this->news_model->get_avg_vote($this->input->post('id_space'), NULL);
	                $data["opis"] = "News";
	                /*var_dump($data["news_item"]);*/
	                $this->load->view('templates/header', $data);
	                /*var_dump($data["news"]);*/
	                $this->load->view('products/view', $data);
	                $this->load->view('templates/footer');
			    }

			    unset($_SESSION['productsCart'][$this->input->post('id_space')]);


			    $emptyArray = [];
			    foreach($_SESSION['productsCart'] as $col){
			    	if($col != $this->input->post('id_space')){
			    		array_push($emptyArray,$col);
			    	}
	        	}
	        	$_SESSION['productsCart'] = [];
	        	$_SESSION['productsCart'] = $emptyArray;

	        }


	        public function cart()
	        {
	                 $this->load->helper('form');
			    	$this->load->library('form_validation');
			    	
			    	# $this->form_validation->set_rules('type_storage', 'type_storage', 'required');
			    	# $this->form_validation->set_rules('size_storage', 'size_storage', 'required');
			    	$this->form_validation->set_rules('order', 'order', 'required');


	                if ($this->form_validation->run() === FALSE)
				    {


				    	$data['space'] = $this->news_model->find_cart_news($_SESSION['productsCart']);


		                /*$data["title"] = "News";*/
		                $this->load->view('templates/header', $data);
		                /*var_dump($data["news"]);*/
		                $this->load->view('products/cart', $data);
		                $this->load->view('templates/footer');

				    }
				    else
				    {
				       	$data['space'] = $this->news_model->find_cart_news($_SESSION['productsCart']);


		                /*var_dump($data["news_item"]);*/
		                $this->load->view('templates/header', $data);
		                /*var_dump($data["news"]);*/
		                $this->load->view('products/cartOrder', $data);
		                $this->load->view('templates/footer');
				    }

	                
	        }




	        public function removeCart()
	        {
	                 $this->load->helper('form');
			    	$this->load->library('form_validation');
			    	
			    	# $this->form_validation->set_rules('type_storage', 'type_storage', 'required');
			    	# $this->form_validation->set_rules('size_storage', 'size_storage', 'required');
			    	$this->form_validation->set_rules('order', 'order', 'required');


	                if ($this->form_validation->run() === FALSE)
				    {


				    	$data['space'] = $this->news_model->find_cart_news($_SESSION['productsCart']);


		                /*$data["title"] = "News";*/
		                $this->load->view('templates/header', $data);
		                /*var_dump($data["news"]);*/
		                $this->load->view('products/cart', $data);
		                $this->load->view('templates/footer');

				    }
				    else
				    {
				       	$data['space'] = $this->news_model->find_cart_news($_SESSION['productsCart']);


		                /*var_dump($data["news_item"]);*/
		                $this->load->view('templates/header', $data);
		                /*var_dump($data["news"]);*/
		                $this->load->view('products/cartOrder', $data);
		                $this->load->view('templates/footer');
				    }

	                
	        }

	        public function cartOrder(){
	        	if(!isset($this->session->userdata['logged_in'])){
					$data['message_display'] = 'Signin to view this page!';
				    $this->load->view('templates/header');
				    $this->load->view('user_authentication/login_form', $data);
				    $this->load->view('templates/footer');
				    return;
				}

				$this->load->helper('form');
			    $this->load->library('form_validation');


			    $this->form_validation->set_rules('order', 'order', 'required');


			    if ($this->form_validation->run() === FALSE)
			    {
			        $this->load->view('templates/header', $data);
			        $this->load->view('products/cart');
			        $this->load->view('templates/footer');

			    }
			    else
			    {
			        $lastAdded = $this->news_model->set_order($_SESSION['productsCart']);
			        $data['warning'] = "Naročilo je bilo uspešno naročeno.";
			        $_SESSION['productsCart'] = [];
			        $data['space'] = $this->news_model->find_cart_news($_SESSION['productsCart']);




			        /*$data['space_item'] = $this->news_model->get_news($this->input->post('id_space'), NULL);
	                $data['comment'] = $this->news_model->get_comment($this->input->post('id_space'), NULL);
	                $data['vote_ad'] = $this->news_model->get_vote($this->input->post('id_space'), NULL);
	                $data['vote_ad_avg'] = $this->news_model->get_avg_vote($this->input->post('id_space'), NULL);
	                $data["opis"] = "News";*/
	                /*var_dump($data["news_item"]);*/
	                $this->load->view('templates/header', $data);
	                /*var_dump($data["news"]);*/
	                $this->load->view('products/cart', $data);
	                $this->load->view('templates/footer');
			    }


	        }










	        public function create()
			{
				if(!isset($this->session->userdata['logged_in'])){
					$data['message_display'] = 'Signin to view this page!';
				    $this->load->view('templates/header');
				    $this->load->view('user_authentication/login_form', $data);
				    $this->load->view('templates/footer');
				    return;
				}

			    $this->load->helper('form');
			    $this->load->library('form_validation');


			    /*$this->form_validation->set_rules('title', 'Title', 'required');
			    $this->form_validation->set_rules('text', 'Text', 'required');*/

			    $this->form_validation->set_rules('text', 'Text', 'required');
			    $this->form_validation->set_rules('price', 'Price', 'required');
			    $this->form_validation->set_rules('country', 'Country', 'required');
			    $this->form_validation->set_rules('city', 'City', 'required');
			    $this->form_validation->set_rules('paddress', 'Paddress', 'required');
			    $this->form_validation->set_rules('address', 'Address', 'required');


			    if ($this->form_validation->run() === FALSE)
			    {
			        $this->load->view('templates/header');
			        $this->load->view('products/create');
			        $this->load->view('templates/footer');

			    }
			    else
			    {
				    $config['upload_path']          = './uploads/';
	                $config['allowed_types']        = 'gif|jpg|png';
	                $config['max_size']             = 10000;
	                $config['max_width']            = 4096;
	                $config['max_height']           = 4096;

	                $this->load->library('upload', $config);

	                $path_img = '';
	                if ( ! $this->upload->do_upload('userfile'))
	                {
	                        $error = array('error' => $this->upload->display_errors());

	                        $data['space'] = $this->news_model->get_news($this->input->post('id_space'));
		                    $data['error_message'] = $error['error'];

		                    if(empty($this->input->post('userfile'))){
		                    	$path_img = '';
	                        	$lastAdded = $this->news_model->set_news($path_img);

						        $find = 'space/create/'.strval($lastAdded);
						        $data['space_item'] = $this->news_model->get_news($lastAdded, NULL);
				                $data['comment'] = $this->news_model->get_comment($lastAdded, NULL);
				                $data['vote_ad'] = $this->news_model->get_vote($lastAdded, NULL);
				                $data['vote_ad_avg'] = $this->news_model->get_avg_vote($lastAdded, NULL);
				                $data['warning'] = "Your ad is now public, if you want to change the information presented or delete this ad you can do it via the profile page.";

				                /*var_dump($data["news_item"]);*/
				                $this->load->view('templates/header', $data);
				                /*var_dump($data["news"]);*/
				                $this->load->view('products/view', $data);
				                $this->load->view('templates/footer');
		                    } else {
		                    	$this->load->view('templates/header');
						        $this->load->view('products/create', $data);
						        $this->load->view('templates/footer');
		                    }

					        

	                }
	                else
	                {
	                        $data = array('upload_data' => $this->upload->data());

                        	/*$this->load->view('upload_success', $data);*/
                        	$path_img = $data['upload_data']['full_path'];
                        	$path_img = substr($path_img, 50);
                        	$lastAdded = $this->news_model->set_news($path_img);

					        $find = 'space/create/'.strval($lastAdded);
					        $data['space_item'] = $this->news_model->get_news($lastAdded, NULL);
			                $data['comment'] = $this->news_model->get_comment($lastAdded, NULL);
			                $data['vote_ad'] = $this->news_model->get_vote($lastAdded, NULL);
			                $data['vote_ad_avg'] = $this->news_model->get_avg_vote($lastAdded, NULL);
			                $data['warning'] = "Your ad is now public, if you want to change the information presented or delete this ad you can do it via the profile page.";

			                /*var_dump($data["news_item"]);*/
			                $this->load->view('templates/header', $data);
			                /*var_dump($data["news"]);*/
			                $this->load->view('space/view', $data);
			                $this->load->view('templates/footer');
	                }



			        
			    }
			}

			/*public function set_reservation($num){
	                $data['comment'] = $this->news_model->get_reservation($num);

	                $data["opis"] = "News";
	                $this->load->view('templates/header', $data);
	                $this->load->view('space/reserve_space_modify', $data);
	                $this->load->view('templates/footer');
			}*/


			public function create_reservation()
			{
				if(!isset($this->session->userdata['logged_in'])){
					$data['message_display'] = 'Signin to view this page!';
				    $this->load->view('templates/header');
				    $this->load->view('user_authentication/login_form', $data);
				    $this->load->view('templates/footer');
				    return;
				}

			    $this->load->helper('form');
			    $this->load->library('form_validation');

			    $data['title'] = 'Create a news item';

			    /*$this->form_validation->set_rules('title', 'Title', 'required');
			    $this->form_validation->set_rules('text', 'Text', 'required');*/

			    $this->form_validation->set_rules('reserve_date', 'reserve_date', 'required');
			    $this->form_validation->set_rules('how_long', 'how_long', 'required');
			    $this->form_validation->set_rules('description_reservation', 'description_reservation', 'required');
			    $this->form_validation->set_rules('description_need', 'description_need', 'required');


			    if ($this->form_validation->run() === FALSE)
			    {
			        $this->load->view('templates/header', $data);
			        $this->load->view('space/reserve_space');
			        $this->load->view('templates/footer');

			    }
			    else
			    {
			        $lastAdded = $this->news_model->set_reservation();
			        $data['username'] = $this->session->userdata['logged_in']['username'];
			        $data['email'] = $this->session->userdata['logged_in']['email'];
			        $data['id_u'] = $this->session->userdata['logged_in']['id_u'];
			        $data['warning'] = "You have successfully created a reservation. ";


			        /*reservation of the user*/
			        $data['user_reservation'] = $this->news_model->get_user_reservation($data['id_u']);
			        /*reservation of the other users for the space of this user*/
			        $data['other_reservation'] = $this->news_model->get_other_reservation($data['id_u']);
			        /*published spaces of the user*/
			        $data['user_space'] = $this->news_model->get_user_space($data['id_u']);

			        $this->load->view('templates/header');
			        $this->load->view('user_authentication/admin_page', $data);
			        $this->load->view('templates/footer');
			    }
			}

			public function home(){
				$this->load->view('templates/header');
			    $this->load->view('pages/home');
			    $this->load->view('templates/footer');
			}

			public function delete($slug = NULL)
	        {
		        	if(!isset($this->session->userdata['logged_in'])){
						$data['message_display'] = 'Signin to view this page!';
					    $this->load->view('templates/header');
					    $this->load->view('user_authentication/login_form', $data);
					    $this->load->view('templates/footer');
						return;
					}

	                $this->news_model->delete_news($slug);
	                /*var_dump($data["news_item"]);*/
	               	$data['username'] = $this->session->userdata['logged_in']['username'];
			        $data['email'] = $this->session->userdata['logged_in']['email'];
			        $data['id_u'] = $this->session->userdata['logged_in']['id_u'];
			        $data['warning'] = "Your ad is now deleted.";


			        /*reservation of the user*/
			        $data['user_reservation'] = $this->news_model->get_user_reservation($data['id_u']);
			        /*reservation of the other users for the space of this user*/
			        $data['other_reservation'] = $this->news_model->get_other_reservation($data['id_u']);
			        /*published spaces of the user*/
			        $data['user_space'] = $this->news_model->get_user_space($data['id_u']);

			        $this->load->view('templates/header');
			        $this->load->view('user_authentication/admin_page', $data);
			        $this->load->view('templates/footer');
	        }


	        public function delete_reservation($slug = NULL)
	        {
		        	if(!isset($this->session->userdata['logged_in'])){
						$data['message_display'] = 'Signin to view this page!';
					    $this->load->view('templates/header');
					    $this->load->view('user_authentication/login_form', $data);
					    $this->load->view('templates/footer');
						return;
					}

	                $data["title"] = "News";
	                $this->news_model->delete_reservation($slug);



	                $data['username'] = $this->session->userdata['logged_in']['username'];
			        $data['email'] = $this->session->userdata['logged_in']['email'];
			        $data['id_u'] = $this->session->userdata['logged_in']['id_u'];
			        $data['warning'] = "You have deleted the reservation.";


			        /*reservation of the user*/
			        $data['user_reservation'] = $this->news_model->get_user_reservation($data['id_u']);
			        /*reservation of the other users for the space of this user*/
			        $data['other_reservation'] = $this->news_model->get_other_reservation($data['id_u']);
			        /*published spaces of the user*/
			        $data['user_space'] = $this->news_model->get_user_space($data['id_u']);

			        $this->load->view('templates/header');
			        $this->load->view('user_authentication/admin_page', $data);
			        $this->load->view('templates/footer');
	        }

	        public function delete_comment($slug = NULL)
	        {
		        	if(!isset($this->session->userdata['logged_in'])){
						$data['message_display'] = 'Signin to view this page!';
					    $this->load->view('templates/header');
					    $this->load->view('user_authentication/login_form', $data);
					    $this->load->view('templates/footer');
						return;
					}

					$num_comment = $this->news_model->delete_comment_num($slug);
	                $this->news_model->delete_comment($slug);
	                /*var_dump($data["news_item"]);*/
	                $data['space_item'] = $this->news_model->get_news($num_comment['id_o'], NULL);
	                $data['comment'] = $this->news_model->get_comment($num_comment['id_o'], NULL);
	                $data['vote_ad'] = $this->news_model->get_vote($num_comment['id_o'], NULL);
	                $data['vote_ad_avg'] = $this->news_model->get_avg_vote($num_comment['id_o'], NULL);
	                $data['warning'] = "Vaše mnenje je bilo uspešno posodobljeno.";

	                $data["opis"] = "News";
	                /*var_dump($data["news_item"]);*/
	                $this->load->view('templates/header', $data);
	                /*var_dump($data["news"]);*/
	                $this->load->view('products/view', $data);
	                $this->load->view('templates/footer');
	        }


	        public function delete_vote($slug = NULL)
	        {
		        	if(!isset($this->session->userdata['logged_in'])){
						$data['message_display'] = 'Signin to view this page!';
					    $this->load->view('templates/header');
					    $this->load->view('user_authentication/login_form', $data);
					    $this->load->view('templates/footer');
						return;
					}

					$num_comment = $this->news_model->delete_vote_num($slug);
	                $this->news_model->delete_vote($slug);
	                /*var_dump($data["news_item"]);*/
	                $warning = "Vaša ocena je bila izbrisana.";

	                $this->view($num_comment['id_o'], $warning);



	                /*$data["opis"] = "News";
	                $this->load->view('templates/header', $data);
	                $this->load->view('space/view', $data);
	                $this->load->view('templates/footer');*/
	        }

	        public function edit($opis = NULL)
			{

				if(!isset($this->session->userdata['logged_in'])){
					$data['message_display'] = 'Signin to view this page!';
				    $this->load->view('templates/header');
				    $this->load->view('user_authentication/login_form', $data);
				    $this->load->view('templates/footer');
				    return;
				}

			    $this->load->helper('form');
			    $this->load->library('form_validation');

			    $data['news_item'] = $this->news_model->get_news($opis);

			    $data['opis'] = 'Update a news item';

			    $this->form_validation->set_rules('title', 'Title', 'required');
			    $this->form_validation->set_rules('text', 'Text', 'required');

			    if ($this->form_validation->run() === FALSE)
			    {
			        $this->load->view('templates/header', $data);
			        $this->load->view('space/edit', $data);
			        $this->load->view('templates/footer');

			    }
			    else
			    {
				    //var_dump($GLOBALS);
				    $d["tip"] = $this->input->post('tip');
				    $d["opis"] = $this->input->post('opis');
			        $this->news_model->update_news($d, $opis);
			        $this->load->view('space/success');
			    }
			}


			public function edit_reservation($num = NULL)
			{

				if(!isset($this->session->userdata['logged_in'])){
					$data['message_display'] = 'Signin to view this page!';
				    $this->load->view('templates/header');
				    $this->load->view('user_authentication/login_form', $data);
				    $this->load->view('templates/footer');
				    return;
				}

				$this->load->helper('form');
			    $this->load->library('form_validation');

				if($num == NULL && ($this->form_validation->run() == FALSE)){
					$this->form_validation->set_rules('reserve_date', 'reserve_date', 'required');
				    $this->form_validation->set_rules('how_long', 'how_long', 'required');
				    $this->form_validation->set_rules('description_reservation', 'description_reservation', 'required');
				    $this->form_validation->set_rules('description_need', 'description_need', 'required');
					$this->news_model->update_reservation();

			        $data['username'] = $this->session->userdata['logged_in']['username'];
			        $data['email'] = $this->session->userdata['logged_in']['email'];
			        $data['id_u'] = $this->session->userdata['logged_in']['id_u'];
			        $data['warning'] = "You have edited the reservation.";


			        /*reservation of the user*/
			        $data['user_reservation'] = $this->news_model->get_user_reservation($data['id_u']);
			        /*reservation of the other users for the space of this user*/
			        $data['other_reservation'] = $this->news_model->get_other_reservation($data['id_u']);
			        /*published spaces of the user*/
			        $data['user_space'] = $this->news_model->get_user_space($data['id_u']);

			        $this->load->view('templates/header');
			        $this->load->view('user_authentication/admin_page', $data);
			        $this->load->view('templates/footer');

				} else if($num == NULL){
					echo $this->form_validation->run() == TRUE;
					echo "ushaud";
					$this->load->view('space/success');
				} else {
					$data['comment'] = $this->news_model->get_reservation($num);

	                $data["opis"] = "News";
	                /*var_dump($data["news_item"]);*/
	                $this->load->view('templates/header', $data);
	                /*var_dump($data["news"]);*/
	                $this->load->view('space/reserve_space_modify', $data);
	                $this->load->view('templates/footer');
				}

			}



			public function accept_reservation($num = NULL)
			{

				if(!isset($this->session->userdata['logged_in'])){
					$data['message_display'] = 'Signin to view this page!';
				    $this->load->view('templates/header');
				    $this->load->view('user_authentication/login_form', $data);
				    $this->load->view('templates/footer');
				    return;
				}

				$this->load->helper('form');
			    $this->load->library('form_validation');

			    $this->news_model->accept_reservation_model($num);

			    	$data['username'] = $this->session->userdata['logged_in']['username'];
			        $data['email'] = $this->session->userdata['logged_in']['email'];
			        $data['id_u'] = $this->session->userdata['logged_in']['id_u'];
			        $data['warning'] = "You have accepted the reservation.";


			        /*reservation of the user*/
			        $data['user_reservation'] = $this->news_model->get_user_reservation($data['id_u']);
			        /*reservation of the other users for the space of this user*/
			        $data['other_reservation'] = $this->news_model->get_other_reservation($data['id_u']);
			        /*published spaces of the user*/
			        $data['user_space'] = $this->news_model->get_user_space($data['id_u']);

			        $this->load->view('templates/header');
			        $this->load->view('user_authentication/admin_page', $data);
			        $this->load->view('templates/footer');

			}

			public function decline_reservation($num = NULL)
			{

				if(!isset($this->session->userdata['logged_in'])){
					$data['message_display'] = 'Signin to view this page!';
				    $this->load->view('templates/header');
				    $this->load->view('user_authentication/login_form', $data);
				    $this->load->view('templates/footer');
				    return;
				}

				$this->load->helper('form');
			    $this->load->library('form_validation');

			    $this->news_model->decline_reservation_model($num);

			    $data['username'] = $this->session->userdata['logged_in']['username'];
			        $data['email'] = $this->session->userdata['logged_in']['email'];
			        $data['id_u'] = $this->session->userdata['logged_in']['id_u'];
			        $data['warning'] = "You have declined the reservation.";


			        /*reservation of the user*/
			        $data['user_reservation'] = $this->news_model->get_user_reservation($data['id_u']);
			        /*reservation of the other users for the space of this user*/
			        $data['other_reservation'] = $this->news_model->get_other_reservation($data['id_u']);
			        /*published spaces of the user*/
			        $data['user_space'] = $this->news_model->get_user_space($data['id_u']);

			        $this->load->view('templates/header');
			        $this->load->view('user_authentication/admin_page', $data);
			        $this->load->view('templates/footer');

			}



			public function edit_space($num = NULL)
			{

				if(!isset($this->session->userdata['logged_in'])){
					$data['message_display'] = 'Signin to view this page!';
				    $this->load->view('templates/header');
				    $this->load->view('user_authentication/login_form', $data);
				    $this->load->view('templates/footer');
				    return;
				}

				$this->load->helper('form');
			    $this->load->library('form_validation');

				if($num == NULL && ($this->form_validation->run() == FALSE)){
					$this->form_validation->set_rules('text', 'Text', 'required');
				    $this->form_validation->set_rules('price', 'Price', 'required');
				    $this->form_validation->set_rules('country', 'Country', 'required');
				    $this->form_validation->set_rules('city', 'City', 'required');
				    $this->form_validation->set_rules('paddress', 'Paddress', 'required');
				    $this->form_validation->set_rules('address', 'Address', 'required');


				    $path_img = '';
				    if(isset($_FILES['userfile'])){
				    	$config['upload_path']          = './uploads/';
		                $config['allowed_types']        = 'gif|jpg|png';
		                $config['max_size']             = 10000;
		                $config['max_width']            = 4096;
		                $config['max_height']           = 4096;

		                $this->load->library('upload', $config);

		                if ( ! $this->upload->do_upload('userfile'))
		                {
		                        $error = array('error' => $this->upload->display_errors());

		                        $data['space'] = $this->news_model->get_news($this->input->post('id_space'));
		                        $data['error_message'] = $error['error'];


		                        if(empty($this->input->post('userfile'))){
		                        	$path_img = '';
		                        	$lastAdded = $this->news_model->update_news($path_img);

							        $find = 'space/create/'.strval($lastAdded);

							        $data['space_item'] = $this->news_model->get_news($this->input->post('id_space'), NULL);
					                $data['comment'] = $this->news_model->get_comment($this->input->post('id_space'), NULL);
					                $data['vote_ad'] = $this->news_model->get_vote($this->input->post('id_space'), NULL);
					                $data['vote_ad_avg'] = $this->news_model->get_avg_vote($this->input->post('id_space'), NULL);
					                $data['warning'] = "Your ad has been successfully edited. ";

					                /*var_dump($data["news_item"]);*/
					                $this->load->view('templates/header', $data);
					                /*var_dump($data["news"]);*/
					                $this->load->view('space/view', $data);
					                $this->load->view('templates/footer');
		                        } else {
		                        	$this->load->view('templates/header', $data);
						            $this->load->view('space/modify_space', $data);
						            $this->load->view('templates/footer');
		                        }
					            
		                }
		                else
		                {
		                        $data = array('upload_data' => $this->upload->data());

	                        	/*$this->load->view('upload_success', $data);*/
	                        	$path_img = $data['upload_data']['full_path'];
	                        	$path_img = substr($path_img, 50);
	                        	$lastAdded = $this->news_model->update_news($path_img);

						        $find = 'space/create/'.strval($lastAdded);

						        $data['space_item'] = $this->news_model->get_news($this->input->post('id_space'), NULL);
				                $data['comment'] = $this->news_model->get_comment($this->input->post('id_space'), NULL);
				                $data['vote_ad'] = $this->news_model->get_vote($this->input->post('id_space'), NULL);
				                $data['vote_ad_avg'] = $this->news_model->get_avg_vote($this->input->post('id_space'), NULL);
				                $data['warning'] = "Your ad has been successfully edited. ";

				                /*var_dump($data["news_item"]);*/
				                $this->load->view('templates/header', $data);
				                /*var_dump($data["news"]);*/
				                $this->load->view('space/view', $data);
				                $this->load->view('templates/footer');
		                }
				    }

				    
				} else if($num == NULL){
					echo $this->form_validation->run() == TRUE;
					$this->load->view('space/success');
				} else {
					$data['space'] = $this->news_model->get_news($num);

		            $this->load->view('templates/header', $data);
		            $this->load->view('space/modify_space', $data);
		            $this->load->view('templates/footer');
				}

			}



			public function edit_comment($num = NULL)
			{

				if(!isset($this->session->userdata['logged_in'])){
					$data['message_display'] = 'Signin to view this page!';
				    $this->load->view('templates/header');
				    $this->load->view('user_authentication/login_form', $data);
				    $this->load->view('templates/footer');
				    return;
				}

			    $this->load->helper('form');
			    $this->load->library('form_validation');


				$this->form_validation->set_rules('id_comment', 'id_comment', 'required');
			    $this->form_validation->set_rules('comment', 'comment', 'required');

			    if ($this->form_validation->run() === FALSE)
			    {
			        $this->load->view('templates/header', $data);
			        $this->load->view('space/edit', $data);
			        $this->load->view('templates/footer');

			    }
			    else
			    {
			        $this->news_model->update_comment();

			        $data['space_item'] = $this->news_model->get_news($this->input->post('id_ad_c'), NULL);
	                $data['comment'] = $this->news_model->get_comment($this->input->post('id_ad_c'), NULL);
	                $data['vote_ad'] = $this->news_model->get_vote($this->input->post('id_ad_c'), NULL);
	                $data['vote_ad_avg'] = $this->news_model->get_avg_vote($num, NULL);
	                $data['warning'] = "Vaše mnenje je bilo uspešno posodobljeno.";

	                $data["opis"] = "News";
	                /*var_dump($data["news_item"]);*/
	                $this->load->view('templates/header', $data);
	                /*var_dump($data["news"]);*/
	                $this->load->view('products/view', $data);
	                $this->load->view('templates/footer');
			    }
			}

	}

	/*https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/space/create*/

	/*https://www.studenti.famnit.upr.si/~klen/CodeIgniter/index.php/space/delete/news-title-1*/


	/*https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/space/index/*/

	/*https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/space/view/news_title_1/*/

	/*https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/view/space/news_title_1*/

