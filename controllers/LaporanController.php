<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanController extends CI_Controller {
    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->logged_in){
            redirect(site_url("logincontroller/login"));
            exit;
        }else{
            if ($this->session->user->role == "Admin"){
                $this->load->view('templates/header_admin');
            }
            else{
                $this->load->view('templates/header_directur');
            }
        }
    }

    /**
     * Show admin dashboard
     */
	function index()
    {
        $this->load->view('laporan/report');
        $this->load->view('templates/footer'); 
    }

    function get_download()
    {
        $this->load->library('pdf');
        //$data['users'] = $this->UsersModel->getUsers();
        $html = $this->load->view('laporan/generatepdf', [], true);
        
        $this->pdf->createPDF($html, 'laporan akun', false);
    }
}
