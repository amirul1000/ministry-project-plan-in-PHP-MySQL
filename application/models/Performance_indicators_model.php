<?php

/**
 * Author: Amirul Momenin
 * Desc:Performance_indicators Model
 */
class Performance_indicators_model extends CI_Model
{

    protected $performance_indicators = 'performance_indicators';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get performance_indicators by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_performance_indicators($id)
    {
        $result = $this->db->get_where('performance_indicators', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('performance_indicators');
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
     * Get all performance_indicators
     */
    function get_all_performance_indicators()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('performance_indicators')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit performance_indicators
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_performance_indicators($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('performance_indicators')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count performance_indicators rows
     */
    function get_count_performance_indicators()
    {
        $result = $this->db->from("performance_indicators")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-performance_indicators
     */
    function get_all_users_performance_indicators()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('performance_indicators')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-performance_indicators
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_performance_indicators($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('performance_indicators')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-performance_indicators rows
     */
    function get_count_users_performance_indicators()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("performance_indicators")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new performance_indicators
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_performance_indicators($params)
    {
        $this->db->insert('performance_indicators', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update performance_indicators
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_performance_indicators($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('performance_indicators', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete performance_indicators
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_performance_indicators($id)
    {
        $status = $this->db->delete('performance_indicators', array(
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
