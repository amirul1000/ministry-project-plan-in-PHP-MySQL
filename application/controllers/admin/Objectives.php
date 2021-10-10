<?php

/**
 * Author: Amirul Momenin
 * Desc:Objectives Controller
 *
 */
class Objectives extends CI_Controller
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
        $this->load->model('Objectives_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of objectives table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['objectives'] = $this->Objectives_model->get_limit_objectives($limit, $start);
        // pagination
        $config['base_url'] = site_url('admin/objectives/index');
        $config['total_rows'] = $this->Objectives_model->get_count_objectives();
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

        $data['_view'] = 'admin/objectives/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Save objectives
     *
     * @param $id -
     *            primary key to update
     *            
     */
    function save($id = - 1)
    {
        $params = array(
            'department_id' => html_escape($this->input->post('department_id')),
            'financial_year' => html_escape($this->input->post('financial_year')),
            'sl_no' => $this->get_sl_no(),
            'objectives_name' => html_escape($this->input->post('objectives_name')),
            'weight_of_objectives' => html_escape($this->input->post('weight_of_objectives'))
        );

        if (isset($id) && $id > 0) {
            unset($params['sl_no']);
        }
        $data['id'] = $id;
        // update
        if (isset($id) && $id > 0) {
            $data['objectives'] = $this->Objectives_model->get_objectives($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Objectives_model->update_objectives($id, $params);
                $this->session->set_flashdata('msg', 'Objectives has been updated successfully');
                redirect('admin/objectives/index');
            } else {
                $data['_view'] = 'admin/objectives/form';
                $this->load->view('layouts/admin/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $objectives_id = $this->Objectives_model->add_objectives($params);
                $this->session->set_flashdata('msg', 'Objectives has been saved successfully');
                redirect('admin/objectives/index');
            } else {
                $data['objectives'] = $this->Objectives_model->get_objectives(0);
                $data['_view'] = 'admin/objectives/form';
                $this->load->view('layouts/admin/body', $data);
            }
        }
    }

    function get_sl_no()
    {
        $conut_objectives = $this->db->from("objectives")->count_all_results();
        if ($conut_objectives > 0) {
            return $conut_objectives + 1;
        } else {
            return 1;
        }
    }

    /**
     * Details objectives
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['objectives'] = $this->Objectives_model->get_objectives($id);
        $data['id'] = $id;
        $data['_view'] = 'admin/objectives/details';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Deleting objectives
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $objectives = $this->Objectives_model->get_objectives($id);

        // check if the objectives exists before trying to delete it
        if (isset($objectives['id'])) {
            $this->Objectives_model->delete_objectives($id);
            $this->session->set_flashdata('msg', 'Objectives has been deleted successfully');
            redirect('admin/objectives/index');
        } else
            show_error('The objectives you are trying to delete does not exist.');
    }

    /**
     * Search objectives
     *
     * @param $start -
     *            Starting of objectives table's index to get query
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
        $this->db->or_like('department_id', $key, 'both');
        $this->db->or_like('financial_year', $key, 'both');
        $this->db->or_like('sl_no', $key, 'both');
        $this->db->or_like('objectives_name', $key, 'both');
        $this->db->or_like('weight_of_objectives', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['objectives'] = $this->db->get('objectives')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('admin/objectives/search');
        $this->db->reset_query();
        $this->db->like('id', $key, 'both');
        $this->db->or_like('department_id', $key, 'both');
        $this->db->or_like('financial_year', $key, 'both');
        $this->db->or_like('sl_no', $key, 'both');
        $this->db->or_like('objectives_name', $key, 'both');
        $this->db->or_like('weight_of_objectives', $key, 'both');

        $config['total_rows'] = $this->db->from("objectives")->count_all_results();
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
        $data['_view'] = 'admin/objectives/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Export objectives
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'objectives_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $objectivesData = $this->Objectives_model->get_all_objectives();
            // file creation
            $file = fopen('php://output', 'w');
            $header = array(
                "Id",
                "Department Id",
                "Financial Year",
                "Sl No",
                "Objectives Name",
                "Weight Of Objectives"
            );
            fputcsv($file, $header);
            foreach ($objectivesData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'Pdf') {
            $this->db->order_by('id', 'desc');
            $objectives = $this->db->get('objectives')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/admin/objectives/print_template.php');
            $html = ob_get_clean();
            require_once FCPATH . 'vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        }
    }
}
//End of Objectives controller