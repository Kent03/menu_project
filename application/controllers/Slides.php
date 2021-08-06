<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slides extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('slides_model');
        
        
    }

    public function index()
    {
        $this->load->view('addData_view');     //B1: loadview hiển thị đầu tiên đồng thời tạo addData_view phần view
    }






//B2: LÀM VIỆC VỚI addSlides đã chỉ định action bên view addData_view   + bên model tạo fun lay dl slide và update lại dl
   public function addSlides()
{
    //2.1 lấy dl từ trường tên là slides_topbanner ra
      $dulieu=$this-> slides_model->layDuLieuSlide();
     
    //2.2 giải mã json
    $dulieu=json_decode($dulieu,true);
          if($dulieu == null){    //tránh lỗi du lieu trống thì dùng đoạn if dưới
          echo'trống dữ liệu';
          $dulieu=array();
      }
    


    //================copy upload w3school===========================
    
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["slide_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["slide_image"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["slide_image"]["size"] > 50000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["slide_image"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["slide_image"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
    //================copy upload w3school===========================


//2.3 lấy dl từ view
    $title=$this->input->post('title');
    $description=$this->input->post('description');
    $button_link=$this->input->post('button_link');
    $button_text=$this->input->post('button_text');
    $slide_image=base_url(). 'uploads/'.basename($_FILES["slide_image"]["name"]);
    // echo "<pre>";
    // var_dump($title);
    // var_dump($description);
    // var_dump($button_link);
    // var_dump($button_text);
    // var_dump($slide_image);
    // echo "</pre>";


    //thêm noidung vào json hàm arraypush
     $motslideanh = array(
         'title' => $title,
         'description' => $description,
         'button_link' => $button_link,
         'button_text' => $button_text,
         'slide_image' => $slide_image
         );
     array_push($dulieu, $motslideanh);

    //2.4 mã hóa lại json,
    $dulieu=json_encode($dulieu);
    
    //2.5 đưa dl mới vào, update lại dlieu  + làm việc với update dl bên model slidesmodel
    if( $this->slides_model->updateDuLieu($dulieu)){
      $this->load->view('sucess');    //thành công thì load view thành công(sucess)

    }


}




//B3: LÀM VIỆC VỚI suaSlides đã chỉ định bên view sửa

public function suaSlide()
{
  // lấy về ndung
  $title=$this->input->post('title');
    $description=$this->input->post('description');
    $button_link=$this->input->post('button_link');
    $button_text=$this->input->post('button_text');
    // $slide_image=base_url(). 'uploads/'.basename($_FILES["slide_image"]["name"]);
   
    //==========ĐOẠN ẢNH XỬ LÝ UP MỚI================================
    //lấy về ảnh, rồi upload
    $cacanh=$_FILES["slide_image"]["name"];  //lưu trữ tên file
    $filevatly=$_FILES["slide_image"]["tmp_name"]; //file thật
    $slide_image=array();
    $slide_image_old=$this->input->post('slide_image_old');   //chưa upload hình thì để file cũ

    //duyệt mảng lấy tên từng file

    for ($i=0; $i <count($cacanh) ; $i++) { 
      if(empty($cacanh[$i]))   //nếu trống 
      {
        $slide_image[$i]=$slide_image_old[$i];       //tên file trống lấy file cũ hiện có
      }else{            //ngược lại dùng moveupload biến file tạm thành file thật
        $duongdan='uploads/'.$cacanh[$i];
        move_uploaded_file($filevatly[$i],$duongdan);
        $slide_image[$i]=base_url()."uploads/".$cacanh[$i];
      }
    }
    //  echo "<pre>";
    //  var_dump($slide_image);
    //  echo "</pre>";
         //==========ĐOẠN ẢNH XỬ LÝ UP MỚI================================

  //tạo 1 mảng all slide
  $tatcaslide= array();
  //insert từng phan tử vào mảng allslide
  for ($i=0; $i < count($title); $i++) { 
    $tam['title']=$title[$i];
    $tam['description']=$description[$i];
    $tam['button_link']=$button_link[$i];
    $tam['button_text']=$button_text[$i];
    $tam['slide_image']=$slide_image[$i];
    array_push($tatcaslide,$tam);
  }
  // echo "<pre>";
  // var_dump($tatcaslide);
  // echo "</pre>";

  //đưa thành json
  $tatcaslide=json_encode($tatcaslide);
  //gọi model update dlieu
  $this->load->model('slides_model');
  if($this->slides_model->updateDuLieu($tatcaslide)){
    $this->load->view('sucess');
  }else{
    echo "thất bại rồi";
  }
  
  
  
  
}
}
