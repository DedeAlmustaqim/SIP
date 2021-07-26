<?php
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->helper('Captcha');
    }

    function index()
    {
        if ($this->session->userdata('akses')== 1 || $this->session->userdata('akses')== 2 ) {
            redirect('admin/dashboard');
        }
        
        if ($this->session->userdata('akses')== 3 ) {
            redirect('dashboard');
        }
        
        $data['judul'] = "Login";
        //$data['captcha'] = $this->recaptcha->getWidget();
        //$data['script_captcha'] = $this->recaptcha->getScriptTag();
        $this->load->view('login', $data);
    }

    private function validasi_login()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('ta', 'ta', 'required');
        return $this->form_validation->run();
    }
    function auth()
    {
        /*
        $captcha = $this->input->post('captcha_kode'); #mengambil value inputan pengguna
		$word = $this->session->userdata('mycaptcha'); #mengambil value captcha
		if (isset($captcha)) { #cek variabel $captcha kosong/tidak
			if (strtoupper($captcha) == strtoupper($word)) { #proses pencocokan captcha
				*/
                if ($this->validasi_login()) {
                    $username = htmlspecialchars($this->input->post('username', true), ENT_QUOTES);
                    $password = htmlspecialchars($this->input->post('password', true), ENT_QUOTES);
                    $ta = htmlspecialchars($this->input->post('ta', true), ENT_QUOTES);

                    $cek_admin = $this->login_model->auth_admin($username, $password);

                    if ($cek_admin->num_rows() > 0) { //jika login sebagai dosen
                        $data = $cek_admin->row_array();
                        $ta = $this->input->post("ta");

                        $this->db->where('id_user', $data['id_user']);
                        $this->db->update('admin', array('last_login' => date('Y-m-d H:i:s')));
                        $this->session->set_userdata('masuk', true);
                        if ($data['id_akses'] == '1') { //Akses admin
                            $this->session->set_userdata('login', true);
                            $this->session->set_userdata('akses', '1');
                            $this->session->set_userdata('hak_akses', 'Super Administrator');
                            $this->session->set_userdata('ses_id', $data['id_user']);
                            $this->session->set_userdata('ses_user', $data['username']);
                            $this->session->set_userdata('ses_nm', $data['nama']);
                            $this->session->set_userdata('ta', $ta);

                            redirect('admin/dashboard');
                        } else if ($data['id_akses'] == '2') { //
                            $this->session->set_userdata('login', true);

                            $this->session->set_userdata('akses', '2');
                            $this->session->set_userdata('hak_akses', 'Viewer');
                            $this->session->set_userdata('ses_id', $data['id_user']);
                            $this->session->set_userdata('ses_user', $data['username']);
                            $this->session->set_userdata('ses_nm', $data['nama']);
                            $this->session->set_userdata('ta', $ta);
                            redirect('admin/dashboard');
                            

                        } 
                    } else {
                        $cek_user = $this->login_model->auth_user($username, $password);
                        if ($cek_user->num_rows() > 0) {
                            $data = $cek_user->row_array();
                            $ta = $this->input->post("ta");
                            $this->db->where('id_user', $data['id_user']);
                            $this->db->update('tbl_user', array('last_login' => date('Y-m-d H:i:s')));
                            $this->session->set_userdata('login', true);

                            $this->session->set_userdata('akses', '3');
                            $this->session->set_userdata('hak_akses', 'Operator Unit');
                            $this->session->set_userdata('ses_id', $data['id_user']);
                            $this->session->set_userdata('ses_id_unit', $data['id_unit']);
                            $this->session->set_userdata('ses_nm_unit', $data['nm_unit']);
                            $this->session->set_userdata('ses_user', $data['username']);
                            $this->session->set_userdata('ses_nm', $data['nama']);
                            $this->session->set_userdata('ta', $ta);
                            echo $this->session->set_flashdata('msg', 'Selamat Datang');
                            redirect('dashboard');
                        } else {
                            $this->session->set_flashdata('no_user', 'Username / Password Salah ');
                            redirect('login');
                        }
                    }  
                } else {
                    redirect('login');
                }

                
			//} else {
				//$this->session->set_flashdata('cap_error', 'Kode Captcha Salah ');
				//redirect('login');
			//}
        
		//}
    }

    function logout()
    {
        $this->session->sess_destroy();
        $url = base_url();
        redirect($url);
    }
}
