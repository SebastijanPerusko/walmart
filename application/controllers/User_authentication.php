<?php 
class User_authentication extends CI_Controller{

    public function __construct() {
        parent::__construct();

        $this->load->helper('url_helper');

    // Load form helper library
        $this->load->helper('form');

    // Load form validation library
        $this->load->library('form_validation');

    // Load session library
        $this->load->library('session');

    // Load database
        $this->load->model('login_database');

    }

// Show login page
    public function index() {
        $this->load->view('templates/header');
        $this->load->view('user_authentication/login_form');
        $this->load->view('templates/footer');
    }

// Show registration page
    public function show() {
        $this->load->view('templates/header');
        $this->load->view('user_authentication/registration_form');
        $this->load->view('templates/footer');
    }

// Validate and store registration data in database
    public function signup() {

    // Check validation for user input in SignUp form
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('secondname', 'SecondName', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('tel', 'Tel', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');



    /*$this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('email_value', 'Email', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');*/

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('templates/header');
        $this->load->view('user_authentication/registration_form');
        $this->load->view('templates/footer');
    } else {
        $hash = $this->input->post('password');
        $password_hash = password_hash($hash, PASSWORD_DEFAULT);
        $data = array(
            'ime' => $this->input->post('name'),
            'priimek' => $this->input->post('secondname'),
            'email' => $this->input->post('email'),
            'tel' => $this->input->post('tel'),
            'username' => $this->input->post('username'),
            'geslo' => $password_hash
        );
        $result = $this->login_database->registration_insert($data);
        if ($result == TRUE) {
            $data['message_display'] = 'Registration Successfully, now login';
            $this->load->view('templates/header');
            $this->load->view('user_authentication/login_form', $data);
            $this->load->view('templates/footer');
        } else {
            echo "here";
            $data['error_message'] = 'E-mail or username already used';
            $this->load->view('templates/header');
            $this->load->view('user_authentication/registration_form', $data);
            $this->load->view('templates/footer');
        }
    }
}

public function profile(){


    if(!isset($this->session->userdata['logged_in'])){
        $data['message_display'] = 'Signin to view this page!';
        $this->load->view('templates/header');
        $this->load->view('user_authentication/login_form', $data);
        $this->load->view('templates/footer');
        return;
    }

    $data['username'] = $this->session->userdata['logged_in']['username'];
    $data['email'] = $this->session->userdata['logged_in']['email'];
    $data['id_u'] = $this->session->userdata['logged_in']['id_u'];


    /*reservation of the user*/
    $data['user_reservation'] = $this->login_database->get_user_reservation($data['id_u']);
    /*reservation of the other users for the space of this user*/
    $data['other_reservation'] = $this->login_database->get_other_reservation($data['id_u']);
    /*published spaces of the user*/
    $data['user_space'] = $this->login_database->get_user_space($data['id_u']);

    $this->load->view('templates/header');
    $this->load->view('user_authentication/admin_page', $data);
    $this->load->view('templates/footer');






        /*if(isset($this->session->userdata['logged_in'])){
            $data['username'] = $this->session->userdata['logged_in']['username'];
            $data['email'] = $this->session->userdata['logged_in']['email'];

            $this->load->view('templates/header');
            $this->load->view('user_authentication/admin_page', $data);
            $this->load->view('templates/footer');
        }else{
            $data['message_display'] = 'Signin to view admin page!';
            $this->load->view('templates/header');
            $this->load->view('user_authentication/login_form', $data);
            $this->load->view('templates/footer');
        }*/
    }

// Check for user login process
    public function signin() {

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('user_authentication/login_form');
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'geslo' => $this->input->post('password')
            );
            $result = $this->login_database->login($data);
            if ($result == TRUE) {
                $username = $this->input->post('username');
                $result = $this->login_database->read_user_information($username);
                if ($result != false) {
                    $session_data = array(
                        'username' => $result[0]->username,
                        'email' => $result[0]->email,
                        'id_u' => $result[0]->id,
                    );
                $this->session->set_userdata('logged_in', $session_data);
                $data['username'] = $this->session->userdata['logged_in']['username'];
                $data['email'] = $this->session->userdata['logged_in']['email'];
                $data['id_u'] = $this->session->userdata['logged_in']['id_u'];


                /*reservation of the user*/
                $data['user_reservation'] = $this->login_database->get_user_reservation($data['id_u']);
                /*reservation of the other users for the space of this user*/
                $data['other_reservation'] = $this->login_database->get_other_reservation($data['id_u']);
                /*published spaces of the user*/
                $data['user_space'] = $this->login_database->get_user_space($data['id_u']);

                $this->load->view('templates/header');
                $this->load->view('user_authentication/admin_page', $data);
                $this->load->view('templates/footer');
            }
            } else {
                $data = array(
                    'error_message' => 'Invalid Username or Password'
                );
                $this->load->view('templates/header');
                $this->load->view('user_authentication/login_form', $data);
                $this->load->view('templates/footer');
            }
    }
}

// Logout from admin page
public function logout() {

    // Removing session data
    $sess_array = array(
        'username' => ''
    );
    $this->session->unset_userdata('logged_in', $sess_array);
    $data['message_display'] = 'Successfully Logout';
    $this->load->view('templates/header');
    $this->load->view('user_authentication/login_form', $data);
    $this->load->view('templates/footer');
}

public function edit_information_r($num = NULL) {

    $data['user_item'] = $this->login_database->get_user_inf($num);
    $this->load->view('templates/header');
    $this->load->view('user_authentication/edit_information', $data);
    $this->load->view('templates/footer');
}

public function edit_inf() {

    $this->form_validation->set_rules('name', 'Name', 'trim|required');
    $this->form_validation->set_rules('secondname', 'SecondName', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required');
    $this->form_validation->set_rules('tel', 'Tel', 'trim|required');
    $this->form_validation->set_rules('username', 'Username', 'trim|required');



    /*$this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('email_value', 'Email', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');*/

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('templates/header');
        $this->load->view('user_authentication/edit_information');
        $this->load->view('templates/footer');
    } else {
        $data = array(
            'ime' => $this->input->post('name'),
            'priimek' => $this->input->post('secondname'),
            'email' => $this->input->post('email'),
            'tel' => $this->input->post('tel'),
            'username' => $this->input->post('username')
        );
        $result = $this->login_database->update_data_info($data);
        if ($result == TRUE) {
            $data['warning'] = "You have successfully updated your profile information.";
        } else {
            $data['user_item'] = $this->login_database->get_user_inf($this->session->userdata['logged_in']['id_u']);
            $data['error_message'] = "Email or username already used, try with other email or username. ";
            $this->load->view('templates/header');
            $this->load->view('user_authentication/edit_information', $data);
            $this->load->view('templates/footer');
        }

        $data['username'] = $this->session->userdata['logged_in']['username'];
        $data['email'] = $this->session->userdata['logged_in']['email'];
        $data['id_u'] = $this->session->userdata['logged_in']['id_u'];


        /*reservation of the user*/
        $data['user_reservation'] = $this->login_database->get_user_reservation($data['id_u']);
        /*reservation of the other users for the space of this user*/
        $data['other_reservation'] = $this->login_database->get_other_reservation($data['id_u']);
        /*published spaces of the user*/
        $data['user_space'] = $this->login_database->get_user_space($data['id_u']);

        $this->load->view('templates/header');
        $this->load->view('user_authentication/admin_page', $data);
        $this->load->view('templates/footer');
    }
}


public function edit_password_u($num = NULL) {

    // Check validation for user input in SignUp form
        $this->form_validation->set_rules('password_old', 'password_old', 'trim|required');
        $this->form_validation->set_rules('password_new1', 'password_new1', 'trim|required');
        $this->form_validation->set_rules('password_new2', 'password_new2', 'trim|required');



    /*$this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('email_value', 'Email', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');*/

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('templates/header');
        $this->load->view('user_authentication/edit_password');
        $this->load->view('templates/footer');
    } else {
        $hash = $this->input->post('password');
        $password_hash = password_hash($hash, PASSWORD_DEFAULT);
        $data = array(
            'username' => $this->session->userdata['logged_in']['username'],
            'geslo' => $this->input->post('password_old')
        );
        $result = $this->login_database->login($data);
        if ($result == TRUE) {
            $hash = $this->input->post('password_new1');
            $password_hash = password_hash($hash, PASSWORD_DEFAULT);
            $data = array(
                'geslo' => $password_hash
            );
            $result = $this->login_database->change_password($data);
            if ($result == TRUE) {
                $data['message_display'] = 'You have changed sucessfuly your password';
                $data['message_color'] = 'text-success';
                $this->load->view('templates/header');
                $this->load->view('user_authentication/edit_password', $data);
                $this->load->view('templates/footer');
            } else {
                $data['message_display'] = 'Problem with updating your password, try again later.';
                $data['message_color'] = 'text-warning';
                $this->load->view('templates/header');
                $this->load->view('user_authentication/edit_password', $data);
                $this->load->view('templates/footer');
            }
       
        } else {
            $data['message_display'] = 'Incorrect old password, try again. ';
            $data['message_color'] = 'text-warning';
            $this->load->view('templates/header');
            $this->load->view('user_authentication/edit_password', $data);
            $this->load->view('templates/footer');
        }
    }
}


}