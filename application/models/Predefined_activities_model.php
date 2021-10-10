<?php

/**
 * Author: Amirul Momenin
 * Desc:Predefined_activities Model
 */
class Predefined_activities_model extends CI_Model
{
	protected $predefined_activities = 'predefined_activities';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get predefined_activities by id
	 *@param $id - primary key to get record
	 *
     */
    function get_predefined_activities($id){
        $result = $this->db->get_where('predefined_activities',array('id'=>$id))->row_array();
		if(!(array)$result){
			$fields = $this->db->list_fields('predefined_activities');
			foreach ($fields as $field)
			{
			   $result[$field] = ''; 	  
			}
		}
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all predefined_activities
	 *
     */
    function get_all_predefined_activities(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('predefined_activities')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit predefined_activities
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_predefined_activities($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('predefined_activities')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count predefined_activities rows
	 *
     */
	function get_count_predefined_activities(){
       $result = $this->db->from("predefined_activities")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	
	 /** Get all users-predefined_activities
	 *
     */
    function get_all_users_predefined_activities(){
        $this->db->order_by('id', 'desc');
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('predefined_activities')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit users-predefined_activities
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_users_predefined_activities($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('predefined_activities')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count users-predefined_activities rows
	 *
     */
	function get_count_users_predefined_activities(){
	   $this->db->where('users_id', $this->session->userdata('id'));
       $result = $this->db->from("predefined_activities")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new predefined_activities
	 *@param $params - data set to add record
	 *
     */
    function add_predefined_activities($params){
        $this->db->insert('predefined_activities',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update predefined_activities
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_predefined_activities($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('predefined_activities',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete predefined_activities
	 *@param $id - primary key to delete record
	 *
     */
    function delete_predefined_activities($id){
        $status = $this->db->delete('predefined_activities',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
