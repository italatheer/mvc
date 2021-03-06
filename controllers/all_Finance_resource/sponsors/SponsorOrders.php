<?php

class  SponsorOrders extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('Difined_model');
        $this->load->model('Nationality');
        $this->load->model('Department');
        $this->load->model('human_resources_model/Employee_model');
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('familys_models/Model_access_rule');
        $this->load->model('system_management/Groups');

        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        $this->load->model('human_resources_model/employee_setting/Employee_setting');
        $this->load->model('human_resources_model/Finance_employee_model');
        $this->load->model('all_Finance_resource_models/sponsors/Sponsors_model');
        $this->load->model('all_Finance_resource_models/sponsors/Sponsors_orders_model');
        $this->load->model('Difined_model');
        $this->load->model("familys_models/Connection_model");

    }

    private function test($data = array())
    {

        echo "<pre>";

        print_r($data);

        echo "</pre>";

        die;

    }


    private function ara_date()
    {

        $nameday = date("l");

        $day = date("d");

        $namemonth = date("m");


        $year = date("Y");

        switch ($nameday) {

            case "Saturday":

                $nameday = "السبت";

                break;

            case "Sunday":

                $nameday = "الأحد";

                break;

            case "Monday":

                $nameday = "الاثنين";

                break;

            case "Tuesday":

                $nameday = "الثلاثاء";

                break;

            case "Wednesday":

                $nameday = "الأربعاء";

                break;

            case "Thursday":

                $nameday = "الخميس";

                break;

            case "Friday":

                $nameday = "الجمعة";

                break;

        }

        switch ($namemonth) {

            case 1:

                $namemonth = "يناير";

                break;

            case 2:

                $namemonth = "فبراير";

                break;

            case 3:

                $namemonth = "مارس";

                break;

            case 4:

                $namemonth = "إبريل";

                break;

            case 5:

                $namemonth = "مايو";

                break;

            case 6:

                $namemonth = "يونيو";

                break;

            case 7:

                $namemonth = "يوليو";

                break;

            case 8:

                $namemonth = "اغسطس";

                break;

            case 9:

                $namemonth = "سبتمبر";

                break;

            case 10:

                $namemonth = "اكتوبر";

                break;

            case 11:

                $namemonth = "نوفمبر";

                break;

            case 12:

                $namemonth = "ديسمبر";

                break;

        }

        return "$nameday $day $namemonth $year";


    }

    /**
     * @param $type     success
     * @param $type     wiring
     * @param $type     error
     */
    private function message($type, $text)
    {

        if ($type == 'success') {

            return $this->session->set_flashdata('message', '<div class="hidden-print alert alert-success alert-dismissible shadow" data-sr="wait 0s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-check icn-xs"></i> تم بنجاح ...</h4><p>' . $text . '!</p></div>');

        } elseif ($type == 'wiring') {

            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" data-sr="wait 0.6s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> تحذير هام ...</h4><p>' . $text . '</p></div>');

        } elseif ($type == 'error') {

            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" data-sr="wait 0.3s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> خطآ ...</h4><p>' . $text . '</p></div>');

        }

    }

    private function thumb($data)

    {

        $config['image_library'] = 'gd2';

        $config['source_image'] = $data['full_path'];

        $config['new_image'] = 'uploads/thumbs/' . $data['file_name'];

        $config['create_thumb'] = TRUE;

        $config['maintain_ratio'] = TRUE;

        $config['thumb_marker'] = '';

        $config['width'] = 275;

        $config['height'] = 250;

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();

    }

    private function upload_image($file_name)
    {

        $config['upload_path'] = 'uploads/images';

        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';

        $config['max_size'] = '1024*8';

        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($file_name)) {

            return false;

        } else {

            $datafile = $this->upload->data();

            $this->thumb($datafile);

            return $datafile['file_name'];

        }

    }

    //////////////////////////////////
    private function upload_file($file_name)
    {

        $config['upload_path'] = 'uploads/files';

        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';

        $config['max_size'] = '1024*8';
        $config['overwrite'] = true;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($file_name)) {

            return false;

        } else {

            $datafile = $this->upload->data();

            return $datafile['file_name'];

        }

    }

    ////////////////////end of excel library option
    private function url()
    {
        unset($_SESSION['url']);
        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
    private function current_hjri_date()
    {
        $time = mktime(0, 0, 0, Date('m'), Date('j'), Date('Y'));
        $TDays=round($time/(60*60*24));
        $HYear=round($TDays/354.37419);
        $Remain=$TDays-($HYear*354.37419);
        $HMonths=round($Remain/29.531182);
        $HDays=$Remain-($HMonths*29.531182);
        $HYear=$HYear+1389;
        $HMonths=$HMonths+10;$HDays=$HDays+23;
        if ($HDays>29.531188 and round($HDays)!=30){
            $HMonths=$HMonths+1;$HDays=Round($HDays-29.531182);
        }else{
            $HDays=Round($HDays);
        }
        if ($HMonths>12) {
            $HMonths=$HMonths-12;
            $HYear = $HYear+1;
        }
        $NowDay=$HDays;
        $NowMonth=$HMonths;
        $NowYear=$HYear;
        $MDay_Num = date("w");
        if ($MDay_Num=="0"){
            $MDay_Name = "الأحد";
        }elseif ($MDay_Num=="1"){
            $MDay_Name = "الإثنين";
        }elseif ($MDay_Num=="2"){
            $MDay_Name = "الثلاثاء";
        }elseif ($MDay_Num=="3"){
            $MDay_Name = "الأربعاء";
        }elseif ($MDay_Num=="4"){
            $MDay_Name = "الخميس";
        }elseif ($MDay_Num=="5"){
            $MDay_Name = "الجمعة";
        }elseif ($MDay_Num=="6"){
            $MDay_Name = "السبت";
        }
        $NowDayName = $MDay_Name;
        $NowDate = "".$HDays."/".$HMonths."/".$HYear." ";

        return $NowDate;
    }
    private function current_hjri_year()
    {
        $time = mktime(0, 0, 0, Date('m'), Date('j'), Date('Y'));
        $TDays=round($time/(60*60*24));
        $HYear=round($TDays/354.37419);
        $Remain=$TDays-($HYear*354.37419);
        $HMonths=round($Remain/29.531182);
        $HDays=$Remain-($HMonths*29.531182);
        $HYear=$HYear+1389;
        $HMonths=$HMonths+10;$HDays=$HDays+23;
        if ($HDays>29.531188 and round($HDays)!=30){
            $HMonths=$HMonths+1;$HDays=Round($HDays-29.531182);
        }else{
            $HDays=Round($HDays);
        }
        if ($HMonths>12) {
            $HMonths=$HMonths-12;
            $HYear = $HYear+1;
        }
        $NowDay=$HDays;
        $NowMonth=$HMonths;
        $NowYear=$HYear;
        $MDay_Num = date("w");
        if ($MDay_Num=="0"){
            $MDay_Name = "الأحد";
        }elseif ($MDay_Num=="1"){
            $MDay_Name = "الإثنين";
        }elseif ($MDay_Num=="2"){
            $MDay_Name = "الثلاثاء";
        }elseif ($MDay_Num=="3"){
            $MDay_Name = "الأربعاء";
        }elseif ($MDay_Num=="4"){
            $MDay_Name = "الخميس";
        }elseif ($MDay_Num=="5"){
            $MDay_Name = "الجمعة";
        }elseif ($MDay_Num=="6"){
            $MDay_Name = "السبت";
        }
        $NowDayName = $MDay_Name;
        $NowDate = $MDay_Name."، ".$HDays."/".$HMonths."/".$HYear." هـ";
        /*
        $NowDate; لطباعة التاريخ الهجري كامل لهذا اليوم مثلاً (الخميس 1/3/1430 هـ).
        $MDay_Name; طباعة اليوم فقط مثلاً (الخميس).
        $HDays; تاريخ اليوم (1).
        $HMonths; الشهر (3).
        $HYear; السنة الهجرية (1430).
        */
        return $HYear;
    }
    ///////////////////////////////

    




    private function upload_muli_image($input_name,$folder = "images"){
        $filesCount = count($_FILES[$input_name]['name']);
        for($i = 0; $i < $filesCount; $i++){
            $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
            $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
            $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
            $all_img[]=$this->upload_image("userFile",$folder);
        }
        return $all_img;
    }






    public function addSponsor_maindata_orders($id=false)	// all_Finance_resource/sponsors/SponsorOrders/addSponsor_maindata_orders
    {
        $this->load->model("familys_models/Register");
        if($this->input->post('add') ){
            $person_img = 'person_img';
            $file= $this->upload_image($person_img);
           //$this->test($_POST);
            $this->Sponsors_orders_model->insert_maindata_order($id,$file);
            $this->message('success','إضافة  بيانات الكافل');
            redirect('all_Finance_resource/sponsors/SponsorOrders/addSponsor_maindata_orders'  , 'refresh');
        }

        $data["relationships"]=$this->Register->select_relashion(array('type'=>34));
        //add
        $this->load->model('all_Finance_resource_models/settings/Finance_resource_setting');
        //$data['halat_kafel'] = $this->Finance_resource_setting->all_frhk_settings('fr_kafalat_kafel_status',2);
        $data['halat_kafel'] = $this->Difined_model->select_search_key('fr_kafalat_kafel_status','id',9);
        $data['social_status'] = $this->Difined_model->select_search_key('fr_settings','type',11);
        $data['reasons_stop'] = $this->Difined_model->select_search_key('fr_settings','type',12);


        $data['cities']= $this->Employee_setting->select_areas();//Osama
        $data['ahais']= $this->Employee_setting->select_residentials();




      //  $data['last_id'] = $this->Sponsors_orders_model->select_last_id();
       $data['last_id'] = $this->Sponsors_orders_model->select_last_k_num();
       $data['last_rkm_talab'] = $this->Sponsors_orders_model->select_last_rkm_talab();
      
      
        $data['gender_data'] =$this->Sponsors_orders_model->GetFromEmployees_settings(1);
        $data['nationality'] =$this->Sponsors_orders_model->GetFromEmployees_settings(2);
        $data['dest_card'] =$this->Sponsors_orders_model->GetFromFr_settings(4);
        //    $data['cities']= $this->Sponsors_model->GetFromFr_settings(6);
        $data['job_role'] = $this->Sponsors_orders_model->GetFromFr_settings(2);
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
        $data["current_hijry_year"] = $this->current_hjri_year();
        $data['type_card'] =$this->Sponsors_orders_model->GetFromFr_settings(3);
        $data['employer'] = $this->Sponsors_orders_model->GetFromGeneral_assembly_settings(1);
        $data['activity']= $this->Sponsors_orders_model->GetFromFr_settings(5);
        $data['specialize']= $this->Sponsors_orders_model->GetFromFr_settings(7);
        $data['attach_arr']= json_encode($this->Sponsors_orders_model->GetFromFr_settings2(10));
        if (empty($id)) {
        $data['records']= $this->Sponsors_orders_model->select_all_orders();
        

       // $this->test( $data['records']);
        }else{
            $data['records']='';
        }
        $data['kfalat_types'] = $this->Difined_model->select_all('fr_kafalat_types_setting','','',"id","asc");
//        $this->test($data['records']);

        $data['f2a'] = $this->Difined_model->select_search_key('fr_sponser_donors_setting','type',1);
       
        $data['res_fe2a']="";
  
        if(!empty($id)){
            $data['result']= $this->Sponsors_orders_model->getById($id)[0];
             $data['res_fe2a']= $this->Sponsors_model->get_fe2a_by_id($data['result']->fe2a_type);
            $data['k_status_data'] = $this->Difined_model->select_search_key('fr_kafalat_kafel_status','id',$data['result']->halat_kafel_id);

        }
        

        $data['descriptions']=$this->Sponsors_orders_model->GetFromFr_settings(15);


        $data['page_title'] = 'إضافة  طلب لكافل';
        $data['subview'] = 'admin/all_Finance_resource_views/sponsors/sponsors_orders/kafel_data_orders';
        $this->load->view('admin_index', $data);
    }


    public function addSponsorOrdersTransform($id)	// all_Finance_resource/sponsors/SponsorOrders/addSponsorOrdersTransform
    {
            $this->Sponsors_orders_model->insertSponsorOrdersTransform($id);
            $this->message('success','إضافة  بيانات الكافل');
            redirect('all_Finance_resource/sponsors/SponsorOrders/addSponsor_maindata_orders'  , 'refresh');
    }

    public function updateSponsorOrdersDetails($id, $kafelId) // all_Finance_resource/sponsors/SponsorOrders/updateSponsorOrdersDetails
    {
        if($this->input->post('update_detail')){
            $this->Sponsors_orders_model->updateOrderDetails($id);
            $this->message('success',' تم تعديل كافل بنجاح');
            redirect('all_Finance_resource/sponsors/SponsorOrders/addSponsor_maindata_orders/'.$kafelId,'refresh');
        }
    }
    public function delete_sponsor_orders($id) // all_Finance_resource/sponsors/SponsorOrders/delete_sponsor_orders
    {
        $this->Sponsors_orders_model->delete_order($id);
        $this->message('success',' تم حذف  كافل بنجاح');
        redirect('all_Finance_resource/sponsors/SponsorOrders/addSponsor_maindata_orders','refresh');
    }
    public function deleteOrdersDetails($id, $kafelId)  // all_Finance_resource/sponsors/SponsorOrders/deleteOrdersDetails
    {
        $this->Sponsors_orders_model->delete_order_details($id);
        $this->message('success',' تم حذف  كافل بنجاح');
        redirect('all_Finance_resource/sponsors/SponsorOrders/addSponsor_maindata_orders/'.$kafelId,'refresh');
    }



    public function getkafalaRow(){ // all_Finance_resource/sponsors/SponsorOrders/getkafalaRow
        $this->load->model("Difined_model");
        $data['kfalat_types'] = $this->Difined_model->select_all('fr_kafalat_types_setting','','',"id","asc");


        $this->load->view('admin/all_Finance_resource_views/sponsors/sponsors_orders/getKafalat',$data);

    }







}//END CLASS
