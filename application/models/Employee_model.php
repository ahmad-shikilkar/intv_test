<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {
    
    public function __construct() {
        
    }

    public function getAllEmp() {
        $this->db->select('*');
        $q = $this->db->get('employee');
        $res = $q->result_array();
        return $res;
    }
    
    public function getEmp($emp_id) {
        $sql = "SELECT * FROM employee WHERE emp_id = $emp_id";
        $q = $this->db->query($sql);
        $res = $q->result_array();
        return $res;
    }
    
    public function getEmpByMail($email_id) {
        $sql = "SELECT * FROM employee WHERE emp_mail = '$email_id'";
        $q = $this->db->query($sql);
        $res = $q->result_array();
        return $res;
    }
    
    public function addEmp($param) {
        
        if(!$this->getEmpByMail($param['emp_mail'])){
            $data = array(				
                'emp_name'  =>  $param['emp_name'], 
                'address'   =>  $param['address'],
                'emp_mail'  =>  $param['emp_mail'],
                'phone'     =>  $param['phone'], 
                'dob'       =>  $param['dob'], 
                'emp_image' =>  $param['emp_image'], 
            );
            
            $result = $this->db->insert('employee',$data);
            return $result;
        }else{
            return false;
        }
        
    }
    
    public function updateEmp($param) {
        $emp_id         =   $param['emp_id'];
        $emp_name       =   $param['emp_name'];
        $emp_address    =   $param['address'];
        $emp_email      =   $param['emp_mail'];
        $emp_phone      =   $param['phone'];
        $emp_dob        =   $param['dob'];
        $emp_image      =   $param['emp_image'];
        
        
        $this->db->set('emp_name', $emp_name);
        $this->db->set('address', $emp_address);
        $this->db->set('emp_mail', $emp_email);
        $this->db->set('phone', $emp_phone);
        $this->db->set('dob', $emp_dob);
        $this->db->set('emp_image', $emp_image);
        
        $this->db->where('emp_id', $emp_id);
        $result =   $this->db->update('employee');
        if($result){
            return $result;
        }else{
            return false;
        }
    }
    
    public function deleteEmp($emp_id) {
        $this->db->where('emp_id', $emp_id);
        $result =   $this->db->delete('employee');
        if($result){
            return $result;
        }else{
            return false;
        }
    }
}
