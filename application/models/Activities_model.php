<?php

/**
 * Author: Amirul Momenin
 * Desc:Activities Model
 */
class Activities_model extends CI_Model
{

    protected $activities = 'activities';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get activities by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_activities($id)
    {
        $result = $this->db->get_where('activities', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('activities');
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
     * Get all activities
     */
    function get_all_activities()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('activities')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit activities
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_activities($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('activities')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count activities rows
     */
    function get_count_activities()
    {
        $result = $this->db->from("activities")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-activities
     */
    function get_all_users_activities()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('activities')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-activities
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_activities($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('activities')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-activities rows
     */
    function get_count_users_activities()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("activities")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new activities
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_activities($params)
    {
        $this->db->insert('activities', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update activities
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_activities($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('activities', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete activities
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_activities($id)
    {
        $status = $this->db->delete('activities', array(
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
