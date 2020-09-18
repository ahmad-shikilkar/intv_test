<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

    public function index(){
        $this->load->view('header');
        $this->load->view('employee/add_employee');
        $this->load->view('footer');
    }
    
    public function addEmp_old() {
        if(!$_POST){
            //redirect('/');
        }
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('emp_name', 'emp_name', 'required');
        
        if($this->form_validation->run()==FALSE){
            //redirect('/');   
        }else{
            $this->load->model('Employee_model');
        
            //$this->Employee_model->addEmp($_POST);
            //redirect('/employee/listEmp');
        }
    }
    
    public function addEmp() {
        if(!$_POST){
            redirect('/');
        }
        $data = array(				
            'emp_name'  =>  $_POST['emp_name'], 
            'address'   =>  $_POST['emp_address'],
            'emp_mail'  =>  $_POST['emp_email'],
            'phone'     =>  $_POST['emp_phone'], 
            'dob'       =>  $_POST['emp_dob'] 
        );
        
        $config['upload_path'] = IMAGE_UPLOAD_PATH;
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('emp_image')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata("error",$this->upload->display_errors());
            redirect('/');
        } else {
            $img_data = array('image_metadata' => $this->upload->data());
            $data['emp_image'] = $img_data['image_metadata']['file_name'];
        }
        
        $this->load->model('Employee_model');
        
        if($this->Employee_model->addEmp($data)){
            $this->session->set_flashdata("success","Record added successfuly!");
            redirect('/employee/listEmp');
        }else{
            $this->session->set_flashdata("error","Email already exist!");
            redirect('/');
        }
        
    }
    
    public function listEmp(){
        
        $this->load->model('Employee_model');
        
        $data['emp_list'] = $this->Employee_model->getAllEmp();
        
        $this->load->view('header');
        $this->load->view('employee/list_employee',$data);
        $this->load->view('footer');
    }
    
    public function edit($emp_id=0) {
        if($emp_id==0 || $emp_id==""){
            redirect('/');
        }
        $this->load->model('Employee_model');
        
        $data['emp_data'] = $this->Employee_model->getEmp($emp_id);
        if($data['emp_data']){
            $this->load->view('header');
            $this->load->view('employee/edit_employee',$data);
            $this->load->view('footer');
        }else{
            redirect('/employee/listEmp');
        }
    }
    
    public function updateEmp() {
        if(!$_POST){
            redirect('/');
        }
        
        $data = array(				
            'emp_id'  =>  $_POST['emp_id'], 
            'emp_name'  =>  $_POST['emp_name'], 
            'address'   =>  $_POST['emp_address'],
            'emp_mail'  =>  $_POST['emp_email'],
            'phone'     =>  $_POST['emp_phone'], 
            'dob'       =>  $_POST['emp_dob'] 
        );
        
        $config['upload_path'] = IMAGE_UPLOAD_PATH;
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('emp_image')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata("error",$this->upload->display_errors());
            redirect('/employee/listEmp');
        } else {
            $img_data = array('image_metadata' => $this->upload->data());
            $data['emp_image'] = $img_data['image_metadata']['file_name'];
        }
        
        $this->load->model('Employee_model');
        
        if($this->Employee_model->updateEmp($data)){
            $this->session->set_flashdata("success","Record updated successfuly!");
        }else{
            $this->session->set_flashdata("error","Someting went wrong!");
        }
        redirect('/employee/listEmp');
    }
    
    public function delete($emp_id=0) {
        if($emp_id==0 || $emp_id==""){
            redirect('/');
        }
        $this->load->model('Employee_model');
        if($this->Employee_model->deleteEmp($emp_id)){
            $this->session->set_flashdata("success","Record deleted successfuly!");
        }else{
            $this->session->set_flashdata("error","Someting went wrong!");
        }
        
        redirect('/employee/listEmp');
    }
}
