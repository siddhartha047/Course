<?php class Student_model extends CI_Model{
    function  __construct() {
        parent::__construct();
    }

    function is_student_Exists($S_Id=NULL){
        $this->db->where('S_Id',$S_Id);
        $query=$this->db->get('student');
        if($query->num_rows==1){
            return TRUE;
        }
        return FALSE;
    }

    function get_student_by_like_id($id=NULL) {
        $this->db->like('S_Id',$id,'after');
        $result=$this->db->get('student');
        if($result->num_rows>0){
            return $result;
        }
        return FALSE;
    }

    function get_student_by_like_name($name=NULL){
        $this->db->like('Name',$name);
        $result=$this->db->get('student');

        if($result->num_rows>0){
            return $result;
        }
        return FALSE;
    }

    function get_student_by_name($name=NULL)
    {
        $this->db->where('Name',$name);
        $result=$this->db->get('student');

        if($result->num_rows>0){
            return $result;
        }
        return FALSE;
    }

    function get_search_result($data=NULL,$S_Id=NULL,$Name=NULL){
        if($S_Id){
            $this->db->like('S_Id',$S_Id,'after');
        }
        if($Name){
            $this->db->like('Name',$Name);
        }
        $this->db->where($data);
        $result=$this->db->get('student');

        if($result->num_rows>0){
            return $result;
        }
        return FALSE;
    }

     function update_info($config,$id){
        $this->db->where('S_Id',$id);
        $update=$this->db->update('student',$config);
        return $update;
    }

    function delete_info($id=NULL){
        $this->db->where('S_Id',$id);
        $delete=$this->db->delete('student');
        return $delete;
    }

    function create_student($config=NULL){
        $insert=$this->db->insert('student',$config);
        if($insert){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
}