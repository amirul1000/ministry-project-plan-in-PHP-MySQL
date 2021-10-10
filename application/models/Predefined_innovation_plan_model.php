<?php

/**
 * Author: Amirul Momenin
 * Desc:Predefined_innovation_plan Model
 */
class Predefined_innovation_plan_model extends CI_Model
{

    protected $predefined_innovation_plan = 'predefined_innovation_plan';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get predefined_innovation_plan by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_predefined_innovation_plan($id)
    {
        $result = $this->db->get_where('predefined_innovation_plan', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('predefined_innovation_plan');
            foreach ($fields as $field) {
                $result[$field] = '';
            }
        }
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all predefined_innovation_plan
     */
    function get_all_predefined_innovation_plan()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('predefined_innovation_plan')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit predefined_innovation_plan
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_predefined_innovation_plan($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('predefined_innovation_plan')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count predefined_innovation_plan rows
     */
    function get_count_predefined_innovation_plan()
    {
        $result = $this->db->from("predefined_innovation_plan")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-predefined_innovation_plan
     */
    function get_all_users_predefined_innovation_plan()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('predefined_innovation_plan')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-predefined_innovation_plan
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_predefined_innovation_plan($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('predefined_innovation_plan')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-predefined_innovation_plan rows
     */
    function get_count_users_predefined_innovation_plan()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("predefined_innovation_plan")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new predefined_innovation_plan
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_predefined_innovation_plan($params)
    {
        $this->db->insert('predefined_innovation_plan', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update predefined_innovation_plan
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_predefined_innovation_plan($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('predefined_innovation_plan', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete predefined_innovation_plan
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_predefined_innovation_plan($id)
    {
        $status = $this->db->delete('predefined_innovation_plan', array(
            'id' => $id
        ));
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }
}
