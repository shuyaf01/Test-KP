<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemasukanController extends CI_Controller {
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
      
        $this->load->model("PemasukanModel","",TRUE);
    }

    /**
     * Show 
     */
	function index()
    {
        $data['dataPM'] = $this->PemasukanModel->getPemasukan();
        $this->load->view("pemasukan/list", $data);
        $this->load->view('templates/footer');
    }

    function list()
    {
            $data['dataPM'] = $this->PemasukanModel->getPemasukan();
            $this->load->view("pemasukan/list", $data);
            $this->load->view('templates/footer');       
    }

    /**
	 * Set common validation rules for products form.
	 */
	protected function setValidationRules()
	{
		$this->form_validation->set_rules('id_pemasukan', 'ID Pemasukan', 'trim|required|max_length[128]');
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required');
		$this->form_validation->set_rules('tujuan', 'Tujuan', 'trim|required');
		$this->form_validation->set_rules('berat_barang_pm', 'Berat Barang', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('nominal_pemasukan', 'Nominal', 'trim|required|max_length[20]');

        $this->form_validation->set_message('required','Kosong. Inputkan %s!');
        $this->form_validation->set_message('max_length','Nilai %s melebihi batas.');
	}

    function formcreate()
    {
        $data['new_id'] = $this->get_idpemasukan();
        $this->load->view('pemasukan/create',$data);
        $this->load->view('templates/footer'); 
    }
	/**
	 * Create new resource.
	 */
	public function create()
	{
		$dataPM = array(
            "id_pemasukan" => $this->input->post("id_pemasukan"),
            "nama_barang" => $this->input->post("nama_barang"),
            "tujuan" => $this->input->post("tujuan"),
            "berat_barang_pm" => $this->input->post("berat_barang_pm"),
            "nominal_pemasukan" => $this->input->post("nominal_pemasukan")
        );
	
		$this->setValidationRules();	
		if ($this->form_validation->run()) {
			//Form validation success. Insert Record into database
			$data['created_at'] = date('Y-m-d H:i:s');
                
            if($this->PemasukanModel->insertPemasukan($dataPM)){  
                $this->session->set_flashdata('success', 'Data Pemasukan berhasil ditambahkan');
                redirect(site_url("PemasukanController"));
            }else{
                redirect(site_url("PemasukanController/formcreate"));
            }
		}else{
            $data['new_id'] = $this->get_idpemasukan();
            $this->load->view('pemasukan/create',$data);
            $this->load->view('templates/footer'); 
        }
    }

    function get_download()
    {
        $this->load->library('pdf');
        $data['dataPM'] = $this->PemasukanModel->getPemasukan();
        $html = $this->load->view('pemasukan/generatepdf', $data, true);
        $this->pdf->createPDF($html, 'Laporan Pemasukan', false);
    }

    function get_download_byid($id)
    {
        $record = $this->PemasukanModel->getPemasukanById($id)->row();
		$data['record'] = $record;
        

        $this->load->library('pdf');
        
        $html = $this->load->view('pemasukan/generatepdf_byid', $data, true);
        $this->pdf->createPDF($html, 'Bukti Pembayaran', false);
    }

    public function formupdate($id){
        $record = $this->PemasukanModel->getPemasukanById($id)->row();
		$data['record'] = $record;
        $this->load->view('pemasukan/update',$data);
        $this->load->view('templates/footer'); 
    }

    public function update($id)
	{
		$dataPM = array(
            "id_pemasukan" => $this->input->post("id_pemasukan"),
            "nama_barang" => $this->input->post("nama_barang"),
            "tujuan" => $this->input->post("tujuan"),
            "berat_barang_pm" => $this->input->post("berat_barang_pm"),
            "nominal_pemasukan" => $this->input->post("nominal_pemasukan")
        );
	
		$this->setValidationRules();	
		if ($this->form_validation->run()) {
			//Form validation success. Insert Record into database
			$dataPM['updated_at'] = date('Y-m-d H:i:s');
                
            if($this->PemasukanModel->updatePemasukan($id, $dataPM))
            {  
                $this->session->set_flashdata('info', 'Data Pemasukan berhasil diedit');
                redirect(site_url("PemasukanController"));
            }else{
                redirect(site_url("PemasukanController/formupdate"));
            }
		}else{
            $record= $this->PemasukanModel->getPemasukanById($id)->row();
            $data['record'] = $record;
            $data['new_id'] = $this->get_idpemasukan();
            $this->load->view('pemasukan/create',$data);
            $this->load->view('templates/footer');  
        }
    }

    public function readbyid($id){
        $record = $this->PemasukanModel->getPemasukanById($id)->row();
		$data['record'] = $record;
        $this->load->view('pemasukan/read',$data);
        $this->load->view('templates/footer'); 
    }

    public function get_idpemasukan(){
        
        $new_id = $this->PemasukanModel->get_idmax()->result();
        if($new_id > 0) {
            foreach ($new_id as $key) {
                $auto_id = $key->id_pemasukan;
            }
            return $id_pemasukan = $this->PemasukanModel->get_newid($auto_id,'PM-');
        } 
    }

    public function delete($id){
        $this->PemasukanModel->get_delete($id);
        $this->session->set_flashdata("info", "Data Pemasukan Berhasil Dihapus!");
        redirect(site_url("PemasukanController"));
    }
}
