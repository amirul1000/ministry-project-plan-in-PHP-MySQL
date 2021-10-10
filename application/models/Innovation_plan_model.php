<?php

/**
 * Author: Amirul Momenin
 * Desc:Innovation_plan Model
 */
class Innovation_plan_model extends CI_Model
{

    protected $innovation_plan = 'innovation_plan';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get innovation_plan by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_innovation_plan($id)
    {
        $result = $this->db->get_where('innovation_plan', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('innovation_plan');
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
     * Get all innovation_plan
     */
    function get_all_innovation_plan()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('innovation_plan')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit innovation_plan
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_innovation_plan($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('innovation_plan')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count innovation_plan rows
     */
    function get_count_innovation_plan()
    {
        $result = $this->db->from("innovation_plan")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-innovation_plan
     */
    function get_all_users_innovation_plan()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('innovation_plan')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-innovation_plan
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_innovation_plan($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('innovation_plan')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-innovation_plan rows
     */
    function get_count_users_innovation_plan()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("innovation_plan")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new innovation_plan
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_innovation_plan($params)
    {
        $this->db->insert('innovation_plan', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update innovation_plan
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_innovation_plan($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('innovation_plan', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete innovation_plan
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_innovation_plan($id)
    {
        $status = $this->db->delete('innovation_plan', array(
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
