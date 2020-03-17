<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tataw3_c extends MY_Controller {

	public function __construct()
	{
        parent::__construct();
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
         
        $this->load->model('human_resources_model/tataw3/Tataw3_m');
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
    }
    public function messages($type,$text,$method=false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if($type =='success') {
            return $CI->session->set_flashdata('message','<script> swal({
                    title:"'.$text.'" ,
                    confirmButtonText: "تم"
                })</script>');

        }elseif($type=='warning'){
            return $CI->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> '.$text.'.</div>');
        }

    }

	public function index()
	{
		
    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function checkUnique()
    {
        echo json_encode($this->Tataw3_m->getRecordById(array('id_card'=>$this->input->post('id_card'),'f2a_talab'=>$this->input->post('f2a_talab'))));
    }
    private  function upload_image($file_name){
        $config['upload_path'] = 'uploads/human_resources/tato3/tato3_logo';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size']    = '1024*8';
        $config['encrypt_name']=true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
          return  false;
        }else{
            $datafile = $this->upload->data();
          //  $this->thumb($datafile);
           return  $datafile['file_name'];
        }
    }
    public function read_file()
    {
        $this->load->helper('file');
        $file_name=$this->uri->segment(4);
        $file_path = 'uploads/human_resources/tato3/tato3_logo'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }
    
    public function read_morfq($file_name)
    {
        $this->load->helper('file');
        $file_path ='uploads/human_resources/tato3/morfqat/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);

    }

	public function new_motato3()//human_resources/tataw3/Tataw3_c/new_motato3
    {
      
        if($this->input->post('add')){
            $img ='img';
            $img_file = $this->upload_image($img);
            $this->Tataw3_m->add($img_file);
            messages('success','إضافة  متطوع');
            // if($this->input->post('log_web')){
            // redirect('Web/new_volunteer','refresh');
            // }
            // else
            // {
                redirect('human_resources/tataw3/Tataw3_c/tato3_Confirm','refresh');
           // }
        }
        $data['talb_num']=$this->Tataw3_m->get_last_id();
       $data['fields'] = $this->Tataw3_m->select_settings_tat_mgalat();
       $data['reasons'] = $this->Tataw3_m->select_settings_tat_reason(101);
        $data['title'] = 'إضافة  متطوع/ـه';
        $data['subview'] = 'admin/Human_resources/tataw3_v/motat3en/new_motato3';
        $this->load->view('admin_index', $data);
    }

  
    public function edit_volunteer($id)
    {
        if($this->input->post('add')){
            $img ='img';
            $img_file = $this->upload_image($img);
            $this->Tataw3_m->update($id,$img_file);
            messages('success','تعديل  متطوع');
            redirect('human_resources/tataw3/Tataw3_c/new_motato3','refresh');
        }
        
//         $data['all_city'] = $this->Model_area_sitting->select_type(1);
//   $data["all_district"]= $this->Model_area_sitting->select_type(2);

       // $data['records'] = $this->Tataw3_m->get_all();
     //   $data['gender_data'] =$this->Tataw3_m->select_search_key('employees_settings', 'type', '1');
        $data['fields'] = $this->Tataw3_m->select_settings_tat_mgalat();
        $data['reasons'] = $this->Tataw3_m->select_settings_tat_reason(101);
        $data['volunteer'] = $this->Tataw3_m->getRecordById(array('id'=>$id));
    // $this->test( $data['volunteer']);
       // $this->test($data['volunteer_work_type'] );
        $data['volunteer_detail_reason'] = $this->Tataw3_m->getRecordreasonById(array('tat_id_fk'=>$id));
        $data['volunteer_detail_field'] = $this->Tataw3_m->getRecordfieldById(array('tat_id_fk'=>$id));
        $data['volunteer_work_type'] = $this->Tataw3_m->getRecordreasonById_type(array('tat_id_fk'=>$id));
       // $this->test($data['volunteer_work_type'] );
      
        $data['title'] = 'تعديل  متطوع/ـه';
        $data['subview'] = 'admin/Human_resources/tataw3_v/motat3en/new_motato3';
        $this->load->view('admin_index', $data);
    }

    public function delete($id)
    {
    	$this->Tataw3_m->delete($id);
        messages('success','حذف  متطوع');
        redirect('human_resources/tataw3/Tataw3_c/tato3_Confirm','refresh');
    }

    public function print_volunteer($id)
    {
        // $data['fields'] = $this->Volunteers_model->select_settings(1);
        // $data['reasons'] = $this->Volunteers_model->select_settings(2);
        $data['fields'] = $this->Tataw3_m->select_settings_tat_mgalat();
        $data['reasons'] = $this->Tataw3_m->select_settings_tat_reason(101);
        
        $data['volunteer'] = $this->Volunteers_model->getRecordById(array('id'=>$id));
        $this->load->view('admin/volunteer/volunteers/print_volunteer', $data);
    }
    public function add_confirm()
{
    
        if($this->input->post('esnad_to')==1){
          //  $this->test($_POST);
            $this->Tataw3_m->confirm($this->input->post('id'), 4);
           // messages('success','إعتماد طلب التطوع');
         //   redirect('tataw3/Tataw3_c/tato3_Confirm','refresh');
        }
        if($this->input->post('esnad_to')==2){
            $this->Tataw3_m->confirm($this->input->post('id'), 3);
           // messages('success','إعتماد طلب التطوع');
           // redirect('tataw3/Tataw3_c/tato3_Confirm','refresh');
        }
    
}
    public function tato3_Confirm()
    {    ///human_resources/tataw3/Tataw3_c/tato3_Confirm
       
       
    
        // $data['fields'] = $this->Tataw3_m->select_settings(1);
        // $data['reasons'] = $this->Tataw3_m->select_settings(2);
         $data['allVolunteers'] = $this->Tataw3_m->select_volunteers();
        $data['fields'] = $this->Tataw3_m->select_settings_tat_mgalat();
        $data['reasons'] = $this->Tataw3_m->select_settings_tat_reason(101);
        $data['newVolunteers'] = $this->Tataw3_m->select_volunteers(1);
         $data['acceptedVolunteers'] = $this->Tataw3_m->select_volunteers(4);
        $data['refusedVolunteers'] = $this->Tataw3_m->select_volunteers(3);
        $data['title'] = 'إعتماد المتطوعين';
        $data['subview'] = 'admin/Human_resources/tataw3_v/motat3en/motato3enConfirm';
        $this->load->view('admin_index', $data);
    }
    /////yara_tato3
    public function load_tahwel()
    {
        $type = $this->input->post('type');
        $id=$this->input->post('id');
        
        if ($type == 1) {
            $data['talb_num']=$this->Tataw3_m->get_last_id();
            if(isset($id)&&!empty($id))
        {
            $data['volunteer'] = $this->Tataw3_m->getRecordById(array('id'=>$id));
         
        }
            $this->load->view('admin/Human_resources/tataw3_v/motat3en/load_frd',$data);
        } elseif ($type == 2) {
            $data['talb_num']=$this->Tataw3_m->get_last_id();
            if(isset($id)&&!empty($id))
        {
            $data['volunteer_work_type'] = $this->Tataw3_m->getRecordreasonById_type(array('tat_id_fk'=>$id));
            $data['volunteer'] = $this->Tataw3_m->getRecordById(array('id'=>$id));
        }
        $data['no3_monzma'] = $this->Tataw3_m->get_table('tat_settings',array('from_code'=>701));
        $data['work_type'] = $this->Tataw3_m->get_table('tat_settings',array('from_code'=>601));
            $this->load->view('admin/Human_resources/tataw3_v/motat3en/load_geha',$data);
        } 
    }
    public function load_reason(){

        $data['tat_id'] = $this->input->post('id');
        $type=$this->input->post('type');
        if($type==1)
        {
            $data['reason']=$this->Tataw3_m->select_search_key('tat_settings','from_code',201);
        }
        elseif($type==2)
        {
            $data['reason']=$this->Tataw3_m->select_search_key('tat_settings','from_code',301);
        }
   
      $this->load->view('admin/Human_resources/tataw3_v/motat3en/load_reasons', $data);
}
public function get_details()
{
    $id=$this->input->post('rkm');
    $data['records'] = $this->Tataw3_m->get_all();
   // $data['gender_data'] =$this->Volunteers_model->select_search_key('employees_settings', 'type', '1');
    $data['fields'] = $this->Tataw3_m->select_settings_tat_mgalat();
    $data['reasons'] = $this->Tataw3_m->select_settings_tat_reason(101);
    $data['volunteer'] = $this->Tataw3_m->getRecordById(array('id'=>$id));
    $data['volunteer_detail_reason'] = $this->Tataw3_m->getRecordreasonById(array('tat_id_fk'=>$id));
    $data['volunteer_detail_field'] = $this->Tataw3_m->getRecordfieldById(array('tat_id_fk'=>$id));
    
    $data['volunteer_work_type'] = $this->Tataw3_m->getRecordreasonById_type(array('tat_id_fk'=>$id));
    $this->load->view('admin/Human_resources/tataw3_v/motat3en/detail_page', $data);
  
}
public function add_morfqat($id)
{
    $data['morfqat'] = $this->Tataw3_m->get_table('tat_morfq',array('tat_id_fk'=>$id));
    $data['volunteer'] = $this->Tataw3_m->getRecordById(array('id'=>$id));
   // $data['volunteer_detail_reason'] = $this->Tataw3_m->getRecordreasonById(array('tat_id_fk'=>$id));
  //  $data['volunteer_detail_field'] = $this->Tataw3_m->getRecordfieldById(array('tat_id_fk'=>$id));
    $data['title'] = 'اضافه مرفقات';
    $data['subview'] = 'admin/Human_resources/tataw3_v/motat3en/morfqat_motato3';
    $this->load->view('admin_index', $data);

}
private function upload_muli_file($input_name){
    $filesCount = count($_FILES[$input_name]['name']);

    for($i = 0; $i < $filesCount; $i++){
        $ext = pathinfo($_FILES[$input_name]['name'][$i], PATHINFO_EXTENSION);
        $full_ext = '.'.$ext;
      if ($ext=="jpeg" || $ext=="JPEG"){
          $_FILES[$input_name]['name'][$i] = str_replace($_FILES[$input_name]['name'][$i],$full_ext,'.jpg');

      }
      if ($ext=="PNG"){
        $_FILES[$input_name]['name'][$i] = str_replace($_FILES[$input_name]['name'][$i],$full_ext,'.png');

    }
        $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
        $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
        $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
        $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
        $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
        $all_img[]=$this->upload_all_file("userFile");
    }
 
   return $all_img;

}

private function upload_all_file($file_name)
{
  
    $config['upload_path'] = 'uploads/human_resources/tato3/morfqat';
    $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
   $config['max_size'] = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';

    $config['encrypt_name'] = true;
    $this->load->library('upload', $config);
    if (!$this->upload->do_upload($file_name)) {
        return false;
    } else {
        $datafile = $this->upload->data();
        //  $this->thumb($datafile);
        return $datafile['file_name'];
    }
}
public function upload_img()
{
    $id = $this->input->post('row');
    
    //    echo "<pre>";
    //    print_r( $id);
    //    return;
    $images = $this->upload_muli_file("files");
  
    //  $this->test($_FILES);
    
    $this->Tataw3_m->insert_attach($id, $images);
}
public function delete_morfq()
{
    $id = $this->input->post('id');
    $wared_id = $this->input->post('row');
    $this->delete_upload($id,$wared_id);
    $this->Tataw3_m->delete_morfq($id,$wared_id);

}
public function delete_upload($id,$wared_id)
{
    $img = $this->Tataw3_m->get_table_by_id('tat_morfq',array('id'=>$id));
    $path='uploads/tato3/morfqat';
    if (file_exists($path . "/" . $img->file)) {
        unlink(FCPATH . "" . $path . "/" . $img->file);
    }
  
}
public function load()
     {
      $id=$this->input->post('id');
    $data['morfqat'] = $this->Tataw3_m->get_table('tat_morfq',array('tat_id_fk'=>$id));
    $data['volunteer'] = $this->Tataw3_m->getRecordById(array('id'=>$id));
         $this->load->view('admin/Human_resources/tataw3_v/motat3en/load', $data);
     }


}

