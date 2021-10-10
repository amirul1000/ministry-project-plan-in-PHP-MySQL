<?php

/**
 * Author: Amirul Momenin
 * Desc:Activities Controller
 *
 */
class Activities extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->library('Customlib');
        $this->load->helper(array(
            'cookie',
            'url'
        ));
        $this->load->database();
        $this->load->model('Activities_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of activities table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['activities'] = $this->Activities_model->get_limit_activities($limit, $start);
        // pagination
        $config['base_url'] = site_url('admin/activities/index');
        $config['total_rows'] = $this->Activities_model->get_count_activities();
        $config['per_page'] = 10;
        // Bootstrap 4 Pagination fix
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '<span aria-hidden="true"></span></span></li>';
        $config['next_tag_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';
        $this->pagination->initialize($config);
        $data['link'] = $this->pagination->create_links();

        $data['_view'] = 'admin/activities/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Save activities
     *
     * @param $id -
     *            primary key to update
     *            
     */
    function save($id = - 1)
    {
        $created_at = "";
        $updated_at = "";

        if ($id <= 0) {
            $created_at = date("Y-m-d H:i:s");
        } else if ($id > 0) {
            $updated_at = date("Y-m-d H:i:s");
        }

        $params = array(
            'objectives_id' => html_escape($this->input->post('objectives_id')),
            'activities_name' => html_escape($this->input->post('activities_name')),
            'description' => html_escape($this->input->post('description')),
            'order_no' => html_escape($this->input->post('order_no')),
            'created_at' => $created_at,
            'updated_at' => $updated_at
        );

        if ($id > 0) {
            unset($params['created_at']);
        }
        if ($id <= 0) {
            unset($params['updated_at']);
        }
        $data['id'] = $id;
        // update
        if (isset($id) && $id > 0) {
            $data['activities'] = $this->Activities_model->get_activities($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Activities_model->update_activities($id, $params);
                $this->session->set_flashdata('msg', 'Activities has been updated successfully');
                redirect('admin/activities/index');
            } else {
                $data['_view'] = 'admin/activities/form';
                $this->load->view('layouts/admin/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $activities_id = $this->Activities_model->add_activities($params);
                $this->session->set_flashdata('msg', 'Activities has been saved successfully');
                redirect('admin/activities/index');
            } else {
                $data['activities'] = $this->Activities_model->get_activities(0);
                $data['_view'] = 'admin/activities/form';
                $this->load->view('layouts/admin/body', $data);
            }
        }
    }

    /**
     * Details activities
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['activities'] = $this->Activities_model->get_activities($id);
        $data['id'] = $id;
        $data['_view'] = 'admin/activities/details';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Deleting activities
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $activities = $this->Activities_model->get_activities($id);

        // check if the activities exists before trying to delete it
        if (isset($activities['id'])) {
            $this->Activities_model->delete_activities($id);
            $this->session->set_flashdata('msg', 'Activities has been deleted successfully');
            redirect('admin/activities/index');
        } else
            show_error('The activities you are trying to delete does not exist.');
    }

    /**
     * Search activities
     *
     * @param $start -
     *            Starting of activities table's index to get query
     */
    function search($start = 0)
    {
        if (! empty($this->input->post('key'))) {
            $key = $this->input->post('key');
            $_SESSION['key'] = $key;
        } else {
            $key = $_SESSION['key'];
        }

        $limit = 10;
        $this->db->like('id', $key, 'both');
        $this->db->or_like('objectives_id', $key, 'both');
        $this->db->or_like('activities_name', $key, 'both');
        $this->db->or_like('description', $key, 'both');
        $this->db->or_like('order_no', $key, 'both');
        $this->db->or_like('created_at', $key, 'both');
        $this->db->or_like('updated_at', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['activities'] = $this->db->get('activities')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('admin/activities/search');
        $this->db->reset_query();
        $this->db->like('id', $key, 'both');
        $this->db->or_like('objectives_id', $key, 'both');
        $this->db->or_like('activities_name', $key, 'both');
        $this->db->or_like('description', $key, 'both');
        $this->db->or_like('order_no', $key, 'both');
        $this->db->or_like('created_at', $key, 'both');
        $this->db->or_like('updated_at', $key, 'both');

        $config['total_rows'] = $this->db->from("activities")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        $config['per_page'] = 10;
        // Bootstrap 4 Pagination fix
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '<span aria-hidden="true"></span></span></li>';
        $config['next_tag_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';
        $this->pagination->initialize($config);
        $data['link'] = $this->pagination->create_links();

        $data['key'] = $key;
        $data['_view'] = 'admin/activities/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Export activities
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'activities_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $activitiesData = $this->Activities_model->get_all_activities();
            // file creation
            $file = fopen('php://output', 'w');
            $header = array(
                "Id",
                "Objectives Id",
                "Activities Name",
                "Description",
                "Order No",
                "Created At",
                "Updated At"
            );
            fputcsv($file, $header);
            foreach ($activitiesData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'Pdf') {
            $this->db->order_by('id', 'desc');
            $activities = $this->db->get('activities')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/admin/activities/print_template.php');
            $html = ob_get_clean();
            require_once FCPATH . 'vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        }
    }
}
//End of Activities controller