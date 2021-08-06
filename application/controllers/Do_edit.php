<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Do_edit extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //lấy dl từ csdl
        $this->load->model('slides_model');
        $dl= $this->slides_model->layDuLieuSlide();
        
        
        //biến json thanh mảng
        $dl=json_decode($dl,true);
        $dl = array('mangdl' => $dl );
        // echo "<pre>";
        // var_dump($dl);
        // echo "</pre>";
        //truyền mảng này sang view editSlide_view
        $this->load->view('editSlide_view', $dl, FALSE);
    }

}
