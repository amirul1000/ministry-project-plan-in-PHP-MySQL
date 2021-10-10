<?php

/**
 * Author: Amirul Momenin
 * Desc:Objectives Model
 */
class Objectives_model extends CI_Model
{

    protected $objectives = 'objectives';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get objectives by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_objectives($id)
    {
        $result = $this->db->get_where('objectives', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('objectives');
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
     * Get all objectives
     */
    function get_all_objectives()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('objectives')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit objectives
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_objectives($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('objectives')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count objectives rows
     */
    function get_count_objectives()
    {
        $result = $this->db->from("objectives")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-objectives
     */
    function get_all_users_objectives()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('objectives')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-objectives
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_objectives($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('objectives')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-objectives rows
     */
    function get_count_users_objectives()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("objectives")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new objectives
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_objectives($params)
    {
        $this->db->insert('objectives', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update objectives
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_objectives($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('objectives', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete objectives
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_objectives($id)
    {
        $status = $this->db->delete('objectives', array(
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
