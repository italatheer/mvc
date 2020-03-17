<?php
class Custody_devices_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }


    public function select_all()
    {
        $this->db->select('*');
        $this->db->from('custody_devices');
        $this->db->where('from_id',0);
        $query = $this->db->get();
        $i=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->sub_devices = $this->get_sub_devices(array('from_id'=>$row->id));
                 $data[$i]->count =count($this->get_sub_devices(array('from_id'=>$row->id)));

                $i++;}
            return $data;
        }else{
            return 0;
        }

    }


    public function select_all_with_from()
    {
        $this->db->select('*');
        $this->db->from('custody_devices');
        $this->db->where('from_id !=',0);
        $query = $this->db->get();
        $i=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->wasf = $this->find_by_id(array('id'=>$row->from_id));
                $data[$i]->count =count($this->get_sub_devices(array('from_id'=>$row->id)));
                $i++;}
            return $data;
        }else{
            return 0;
        }

    }
    
        public function find_by_id($arr){
        $this->db->select('*');
        $this->db->from('custody_devices');
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $h = $query->row();
            return $h->title;
        }else{
            return false;
        }

    }
  /*  public function get_sub_devices($arr){
        $this->db->select('*');
        $this->db->from('custody_devices');
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
               }
            return $data;
        }else{
            return 0;
        }

    }*/



    public function insert_main_device(){

        $data['title'] = $this->input->post('title');
        $data['level'] = $this->input->post('level');
        $data['from_id'] =0;
        $this->db->insert('custody_devices',$data);
    }



    public function insert_sub_device(){

        $data['from_id'] = $this->input->post('from_id');
        $data['level'] = $this->input->post('level');
        $data['title'] = $this->input->post('title');
        $this->db->insert('custody_devices',$data);
    }



    public function update_main_device($id){

        $data['title'] = $this->input->post('title');
        $this->db->update('custody_devices',$data,array('id' => $id));
    }
    public function update_sub_device($id){
        $data['from_id'] = $this->input->post('from_id');
        $data['title'] = $this->input->post('title');
        $this->db->update('custody_devices',$data,array('id' => $id));
    }

    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete("custody_devices");
    }



    public function select_all_(){
        $this->db->select("*");
        $this->db->from('custody_devices');
        $this->db->where('from_id',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
                $query2 = $this->db->query("SELECT * FROM `custody_devices` WHERE `from_id`=".$row->id);
                if ($query->num_rows() > 0) {
                    foreach ($query2->result() as $row2) {
                        $data[$row2->id] = $row2;
                        $query3 = $this->db->query("SELECT * FROM `custody_devices` WHERE `from_id`=".$row2->id);
                        if ($query3->num_rows() > 0) {

                            foreach ($query3->result() as $row3) {
                                $data[$row3->id] = $row3;
                                $query4 = $this->db->query("SELECT * FROM `custody_devices` WHERE `from_id`=".$row3->id);
                                if ($query4->num_rows() > 0) {
                                    foreach ($query4->result() as $row4) {
                                        $data[$row4->id] = $row4;
                                        $query5 = $this->db->query("SELECT * FROM `custody_devices` WHERE `from_id`=".$row4->id);
                                        if ($query5->num_rows() > 0) {
                                            foreach ($query5->result() as $row5) {

                                                $data[$row5->id] = $row5;
                                            }}


                                    }}

                            }
                        }

                    }

                }

            }
            return $data;
        }

    }



    public function select_disabled(){
        $this->db->select("*");
        $this->db->from('custody_devices');
        $this->db->where('from_id',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
                $query2 = $this->db->query("SELECT * FROM `custody_devices` WHERE `from_id`=".$row->id);
                if ($query->num_rows() > 0) {
                    $var['dis'.$row->id] = 'disabled';
                    foreach ($query2->result() as $row2) {
                        $data[$row2->id] = $row2;
                        $query3 = $this->db->query("SELECT * FROM `custody_devices` WHERE `from_id`=".$row2->id);
                        if ($query3->num_rows() > 0) {
                            $var['dis'.$row2->id] = 'disabled';
                            foreach ($query3->result() as $row3) {
                                $data[$row3->id] = $row3;
                                $query4 = $this->db->query("SELECT * FROM `custody_devices` WHERE `from_id`=".$row3->id);
                                if ($query4->num_rows() > 0) {
                                    $var['dis'.$row3->id] = 'disabled';
                                    foreach ($query4->result() as $row4) {
                                        $data[$row4->id] = $row4;
                                        $query5 = $this->db->query("SELECT * FROM `custody_devices` WHERE `from_id`=".$row4->id);
                                        if ($query5->num_rows() > 0) {
                                            foreach ($query5->result() as $row5) {
                                                $data[$row5->id] = $row5;
                                            }}


                                    }}

                            }
                        }

                    }

                }

            }

            return $var;
        }

    }



    
    public function select_By_from_id($id)
    {
        $this->db->select('*');
        $this->db->from('custody_devices');
        $this->db->where('from_id',$id);
        $query = $this->db->get();
        $i=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$i] = $row;
               // $data[$i]->sub_devices = $this->get_sub_devices(array('from_id'=>$row->id));
                $i++;}
            return $data;
        }else{
            return 0;
        }

    }


    public function select_Max_value()
    {
        $this->db->select('*');
        $this->db->from('custody_devices');
        $this->db->order_by('level','desc');
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result()[0]->level;
        }else{
            return 0;
        }

    }



    public function select_Name()
    {
        $this->db->select('*');
        $this->db->from('custody_devices');
        $query = $this->db->get();
        $i=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row->title;
                // $data[$i]->sub_devices = $this->get_sub_devices(array('from_id'=>$row->id));
                $i++;}
            return $data;
        }else{
            return 0;
        }

    }
        public function get_sub_devices($arr){
        $this->db->select('*');
        $this->db->from('custody_devices');
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
               }
            return $data;
        }else{
            return array();
        }

    }


}// END CLASS