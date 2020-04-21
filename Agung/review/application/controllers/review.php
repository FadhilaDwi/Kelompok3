<?php
class Review extends CI_Controller {

    public function index() {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('lihat_review');
        $this->load->view('template/footer');
    }
    public function lihat()
  {
    $data['review'] = $this->laring_model->get_data('review')->result();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('lihat_review', $data);
    $this->load->view('template/footer');
  }
  public function detail($id)
  {
    $data['review'] = $this->laring_model->getDataById($id);
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('view_isi', $data);
    $this->load->view('template/footer');
  }
    public function kirimReview() {
        $nama = $this->input->post('nama');
        $review = $this->input->post('review');
        
        $this->db->query("INSERT INTO review VALUES('','$nama','$review','0')");
        
    } 
}