<?php

/**
 * Author: Amirul Momenin
 * Desc:Documents Model
 */
class Documents_model extends CI_Model
{

    protected $documents = 'documents';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get documents by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_documents($id)
    {
        $result = $this->db->get_where('documents', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('documents');
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
     * Get all documents
     */
    function get_all_documents()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('documents')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit documents
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_documents($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('documents')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count documents rows
     */
    function get_count_documents()
    {
        $result = $this->db->from("documents")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-documents
     */
    function get_all_users_documents()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('documents')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-documents
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_documents($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('documents')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-documents rows
     */
    function get_count_users_documents()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("documents")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new documents
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_documents($params)
    {
        $this->db->insert('documents', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update documents
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_documents($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('documents', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete documents
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_documents($id)
    {
        $status = $this->db->delete('documents', array(
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
