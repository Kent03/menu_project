<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class slides_model extends CI_Model {

    public $variable;

    public function __construct()
    {
        parent::__construct();
        
    }
    public function layDuLieuSlide()
    {
        $this->db->select('*');   //đầu tiên lấy tất cả bảng
        $this->db->where('tenthuoctinh', 'slides_topbanner');    //lấy ở đâu , lấy cái gì
        $dl=$this->db->get('homePageattr');  //trả về đối tuongj dl lấy từ bảng homepageattr
        $dl=$dl->result_array();		//biến dl thành dạng mảng
        foreach ($dl as $value) {      //dùng vòng lặp in thử noi dung trong cột gia tri thuoc tính ở csdl ra gì
                    $tg=$value['giatrithuoctinh'];
                }
        return $tg;   //xong rồi thì return
        
        
        
        
        
        
        
        
        
    }
    public function updateDuLieu($dulieucanupdate)
    {
        //lay dlieu can update
        $chuanbidulieu= array(
            'tenthuoctinh' => 'slides_topbanner',
            'giatrithuoctinh' => $dulieucanupdate,
     );
        $this->db->where('tenthuoctinh', 'slides_topbanner');
       return $this->db->update('homePageattr',$chuanbidulieu);
       
       
    }

}