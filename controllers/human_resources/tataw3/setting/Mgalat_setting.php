<?php
/**
 * Created by PhpStorm.
 * User: alatheer
 * Date: 3/9/2020
 * Time: 10:30 AM
 */

class Mgalat_setting extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }

        $this->load->model('human_resources_model/tataw3/setting/Mgalat_setting_m');
//        /**********************************************************/
//        $this->load->model('familys_models/for_dash/Counting');
//        $this->count_basic_in  = $this->Counting->get_basic_in_num();
//        $this->files_basic_in  = $this->Counting->get_files_basic_in();
//        /*************************************************************/
    }

    public function index()//human_resources/tataw3/setting/Mgalat_setting
    {
        if ($this->input->post('form_save')) {
        if ($this->input->post('id') ==0) {
            $this->Mgalat_setting_m->insert_form();
        }else{
            $this->Mgalat_setting_m->update_form();

        }
        } else {
            $data['mgalat'] = $this->Mgalat_setting_m->get_by('tat_mgalat', array('from_code' => 0, 'has_active' => 1));
            $data['title'] = 'اعدادات المجالات والنشطة';
            $data['subview'] = 'admin/Human_resources/tataw3_v/setting/Mgalat_setting_view';
            $this->load->view('admin_index', $data);
        }
    }

    function get_select_data()
    {
        $data['mgalat'] = $this->Mgalat_setting_m->get_by('tat_mgalat', array('from_code' => 0, 'has_active' => 1));
        echo json_encode($data);
    }

    function get_data_table($type)
    {
        if ($type == 1) {
            $where_arr = array('from_code' => 0);

        } else {
            $where_arr = array('from_code !=' => 0);
        }
        $data['type'] = $type;
        $data['data_table'] = $this->Mgalat_setting_m->get_table_data('tat_mgalat', $where_arr);

        $this->load->view('admin/Human_resources/tataw3_v/setting/Mgalat_setting_table_view', $data);
    }

    function delete_data($id)
    {
        $this->Mgalat_setting_m->delete_data($id);
    }

    function set_data_form($id)
    {
        $data['data'] = $this->Mgalat_setting_m->get_by('tat_mgalat', array('id' => $id),1);
        echo json_encode($data);

    }
}