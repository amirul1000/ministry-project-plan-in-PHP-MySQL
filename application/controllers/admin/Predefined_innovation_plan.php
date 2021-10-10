<?php

/**
 * Author: Amirul Momenin
 * Desc:Predefined_innovation_plan Controller
 *
 */
class Predefined_innovation_plan extends CI_Controller
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
        $this->load->model('Predefined_innovation_plan_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of predefined_innovation_plan table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['predefined_innovation_plan'] = $this->Predefined_innovation_plan_model->get_limit_predefined_innovation_plan($limit, $start);
        // pagination
        $config['base_url'] = site_url('admin/predefined_innovation_plan/index');
        $config['total_rows'] = $this->Predefined_innovation_plan_model->get_count_predefined_innovation_plan();
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

        $data['_view'] = 'admin/predefined_innovation_plan/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Save predefined_innovation_plan
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
            'weight_of_objectives' => html_escape($this->input->post('weight_of_objectives')),
            'activities_id' => html_escape($this->input->post('activities_id')),
            'performance_indicators_id' => html_escape($this->input->post('performance_indicators_id')),
            'unit' => html_escape($this->input->post('unit')),
            'wop_indicators' => html_escape($this->input->post('wop_indicators')),
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
            $data['predefined_innovation_plan'] = $this->Predefined_innovation_plan_model->get_predefined_innovation_plan($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Predefined_innovation_plan_model->update_predefined_innovation_plan($id, $params);
                $this->session->set_flashdata('msg', 'Predefined_innovation_plan has been updated successfully');
                redirect('admin/predefined_innovation_plan/index');
            } else {
                $data['_view'] = 'admin/predefined_innovation_plan/form';
                $this->load->view('layouts/admin/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $predefined_innovation_plan_id = $this->Predefined_innovation_plan_model->add_predefined_innovation_plan($params);
                $this->session->set_flashdata('msg', 'Predefined_innovation_plan has been saved successfully');
                redirect('admin/predefined_innovation_plan/index');
            } else {
                $data['predefined_innovation_plan'] = $this->Predefined_innovation_plan_model->get_predefined_innovation_plan(0);
                $data['_view'] = 'admin/predefined_innovation_plan/form';
                $this->load->view('layouts/admin/body', $data);
            }
        }
    }

    /**
     * Details predefined_innovation_plan
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['predefined_innovation_plan'] = $this->Predefined_innovation_plan_model->get_predefined_innovation_plan($id);
        $data['id'] = $id;
        $data['_view'] = 'admin/predefined_innovation_plan/details';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Deleting predefined_innovation_plan
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $predefined_innovation_plan = $this->Predefined_innovation_plan_model->get_predefined_innovation_plan($id);

        // check if the predefined_innovation_plan exists before trying to delete it
        if (isset($predefined_innovation_plan['id'])) {
            $this->Predefined_innovation_plan_model->delete_predefined_innovation_plan($id);
            $this->session->set_flashdata('msg', 'Predefined_innovation_plan has been deleted successfully');
            redirect('admin/predefined_innovation_plan/index');
        } else
            show_error('The predefined_innovation_plan you are trying to delete does not exist.');
    }

    /**
     * Search predefined_innovation_plan
     *
     * @param $start -
     *            Starting of predefined_innovation_plan table's index to get query
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
        $this->db->or_like('weight_of_objectives', $key, 'both');
        $this->db->or_like('activities_id', $key, 'both');
        $this->db->or_like('performance_indicators_id', $key, 'both');
        $this->db->or_like('unit', $key, 'both');
        $this->db->or_like('wop_indicators', $key, 'both');
        $this->db->or_like('created_at', $key, 'both');
        $this->db->or_like('updated_at', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['predefined_innovation_plan'] = $this->db->get('predefined_innovation_plan')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('admin/predefined_innovation_plan/search');
        $this->db->reset_query();
        $this->db->like('id', $key, 'both');
        $this->db->or_like('objectives_id', $key, 'both');
        $this->db->or_like('weight_of_objectives', $key, 'both');
        $this->db->or_like('activities_id', $key, 'both');
        $this->db->or_like('performance_indicators_id', $key, 'both');
        $this->db->or_like('unit', $key, 'both');
        $this->db->or_like('wop_indicators', $key, 'both');
        $this->db->or_like('created_at', $key, 'both');
        $this->db->or_like('updated_at', $key, 'both');

        $config['total_rows'] = $this->db->from("predefined_innovation_plan")->count_all_results();
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
        $data['_view'] = 'admin/predefined_innovation_plan/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Export predefined_innovation_plan
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'predefined_innovation_plan_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $predefined_innovation_planData = $this->Predefined_innovation_plan_model->get_all_predefined_innovation_plan();
            // file creation
            $file = fopen('php://output', 'w');
            $header = array(
                "Id",
                "Objectives Id",
                "Weight Of Objectives",
                "Activities Id",
                "Performance Indicators Id",
                "Unit",
                "Wop Indicators",
                "Created At",
                "Updated At"
            );
            fputcsv($file, $header);
            foreach ($predefined_innovation_planData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'Pdf') {
            $this->db->order_by('id', 'desc');
            $predefined_innovation_plan = $this->db->get('predefined_innovation_plan')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/admin/predefined_innovation_plan/print_template.php');
            $html = ob_get_clean();
            require_once FCPATH . 'vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        }
    }
}
//End of Predefined_innovation_plan controller