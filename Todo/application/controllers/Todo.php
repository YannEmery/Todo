<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TodoController
 *
 * @author adminSio
 */
class Todo extends CI_Controller {
    //put your code here
    public function __construct(){
        parent:: __construct();
        $this->load->model('todoModel');
        $this->load->helper('url','form');
        $this->load->library('form_validation');
    }
    
    public function index(){
        $all_todo = $this->todoModel->get_all();
        $data = array();
        $data['todos'] = $all_todo;
        $data['titre'] = 'Liste de mes travaux';
        $this->load->view('TodoIndex',$data);
    }
    public function indexOrdre(){
        $all_todo = $this->todoModel->get_all();
        $data = array();
        $data['todos'] = $all_todo;
        
        $this->form_validation->set_rules('ordre[]','ordre','required|numeric');
        if ($this->form_validation->run()==TRUE){
            $ordre=$this->input->post('ordre[]');
            $i = 0;
            foreach ($all_todo as $todo):
                $params=array('ordre'=>$ordre[$i]);
                $this->todoModel->update($params);
                $i = $i + 1;
            endforeach;
        
        }
        else{
            $this->load->view('TodoOrdre');
        }
        $this->load->view('TodoOrdre',$data);
    } 
    
    public function indexUpdate(){
        $all_todo = $this->todoModel->get_all();
        $data = array();
        $data['todos'] = $all_todo;
        
        $this->load->view('TodoUpdate',$data);
    }
    
    public function fait($id){
        $params=array('completed'=>1);
        $this->todoModel->update($id,$params);
        redirect(base_url('Todo/index'));
    }
    
    public function afaire($id){
        $params=array('completed'=>0);
        $this->todoModel->update($id,$params);
        redirect(base_url('Todo/index'));
    }
    
    public function add(){
        $this->form_validation->set_rules('ordre','ordre','required|numeric');
        $this->form_validation->set_rules('task','tâche','required|max_length[60]');
        if($this->form_validation->run()==TRUE){
            $task=$this->input->post('task');
            $ordre=$this->input->post('ordre');
            $params=array('task'=>$task,'ordre'=>$ordre,'completed'=>0);
            $this->todoModel->add($params);
            redirect(base_url("Todo/Index"));
        }
        else{
            $this->load->view('TodoAdd');
            
        }
    }
    
    public function modifier($id){
        $this->form_validation->set_rules('ordre','ordre','required|numeric');
        $this->form_validation->set_rules('task','tâche','required|max_length[60]');
        if($this->form_validation->run()==TRUE){
            //$this->db->task = $this->input->post('task');
            $task=$this->input->post('task');
            $ordre=$this->input->post('ordre');
            $params=array('task'=>$task,'ordre'=>$ordre,'completed'=>0);
            $this->todoModel->update($id, $params);
            redirect(base_url("Todo/Index"));
        }
        else{
            
            $i=$this->todoModel->get_by_id($id);
            $ordre=$i['ordre'];
            $task=$i['task'];
            $idTable = array();
            $idTable['id'] = $id;
            $idTable['ordre']=$ordre;
            $idTable['task']=$task;
            $this->load->view('TodoUpdate',$idTable);
        }
    }
    
    public function supprimer($id){
        $this->todoModel->delete($id);
        redirect(base_url("Todo/Index"));
    }
    
    public function ordonner(){
        $this->load->view('TodoOrdre');
    }
}