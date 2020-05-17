<?php  

    class multi extends CI_Controller {

function __construct(){
		parent::__construct();	
		if(!$this->session->userdata('nama'))
		{
			redirect(base_url());
		}
		$this->load->model('package_model'); //untuk menjalankan perintah yang ada pada mdata
		
		$this->load->helper('url'); //untuk mengambil data yang disimpan sementara melalui url

    }
    
    public function index()
    {
        $data['kodeunik'] = $this->model_hewan->buat_kode(); // variable $kodeunik merujuk ke file model_user.php pada function buat_kode. paham kan ya? harus paham dong
    $data['mitra'] = $this->model_hewan->tmpmitra()->result();   
    $this->load->view('template_admin/header');
    $this->load->view('template_admin/sidebar');
    $this->load->view('admin/data_mitra', $data);
    $this->load->view('template_admin/footer');
    }
    
    function create(){
        $package = $this->input->post('package',TRUE);
        $product = $this->input->post('product',TRUE);
        $this->package_model->create_package($package,$product);
        redirect('package');
    }
 
    // GET DATA PRODUCT BERDASARKAN PACKAGE ID
    function get_product_by_package(){
        $package_id=$this->input->post('package_id');
        $data=$this->package_model->get_product_by_package($package_id)->result();
        foreach ($data as $result) {
            $value[] = (float) $result->product_id;
        }
        echo json_encode($value);
    }
 
    //UPDATE
    function update(){
        $id = $this->input->post('edit_id',TRUE);
        $package = $this->input->post('package_edit',TRUE);
        $product = $this->input->post('product_edit',TRUE);
        $this->package_model->update_package($id,$package,$product);
        redirect('package');
    }
 
    // DELETE
    function delete(){
        $id = $this->input->post('delete_id',TRUE);
        $this->package_model->delete_package($id);
        redirect('package');
    }
    
}