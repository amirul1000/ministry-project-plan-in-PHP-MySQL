<?php

/**
 * Author: Amirul Momenin
 * Desc:Innovation_plan Controller
 *
 */
class Innovation_plan extends CI_Controller
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
        $this->load->model('Innovation_plan_model');
        if (! $this->session->userdata('validated')) {
            redirect('member/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of innovation_plan table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['innovation_plan'] = $this->Innovation_plan_model->get_limit_innovation_plan($limit, $start);
        // pagination
        $config['base_url'] = site_url('member/innovation_plan/index');
        $config['total_rows'] = $this->Innovation_plan_model->get_count_innovation_plan();
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

        $data['_view'] = 'member/innovation_plan/index';
        $this->load->view('layouts/member/body', $data);
    }

    /**
     * Save innovation_plan
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
            'users_id' => html_escape($this->input->post('users_id')),
            'objectives_id' => html_escape($this->input->post('objectives_id')),
            'weight_of_objectives' => html_escape($this->input->post('weight_of_objectives')),
            'activities_id' => html_escape($this->input->post('activities_id')),
            'performance_indicators_id' => html_escape($this->input->post('performance_indicators_id')),
            'unit' => html_escape($this->input->post('unit')),
            'wop_indicators' => html_escape($this->input->post('wop_indicators')),
            '1st' => html_escape($this->input->post('1st')),
            '2nd' => html_escape($this->input->post('2nd')),
            '3rd' => html_escape($this->input->post('3rd')),
            '4th' => html_escape($this->input->post('4th')),
            '5th' => html_escape($this->input->post('5th')),
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
            $data['innovation_plan'] = $this->Innovation_plan_model->get_innovation_plan($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Innovation_plan_model->update_innovation_plan($id, $params);
                $this->session->set_flashdata('msg', 'Innovation_plan has been updated successfully');
                redirect('member/innovation_plan/index');
            } else {
                $data['_view'] = 'member/innovation_plan/form';
                $this->load->view('layouts/member/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $innovation_plan_id = $this->Innovation_plan_model->add_innovation_plan($params);
                $this->session->set_flashdata('msg', 'Innovation_plan has been saved successfully');
                redirect('member/innovation_plan/index');
            } else {
                $data['innovation_plan'] = $this->Innovation_plan_model->get_innovation_plan(0);
                $data['_view'] = 'member/innovation_plan/form';
                $this->load->view('layouts/member/body', $data);
            }
        }
    }

    /**
     * Details innovation_plan
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['innovation_plan'] = $this->Innovation_plan_model->get_innovation_plan($id);
        $data['id'] = $id;
        $data['_view'] = 'member/innovation_plan/details';
        $this->load->view('layouts/member/body', $data);
    }

    /**
     * Deleting innovation_plan
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $innovation_plan = $this->Innovation_plan_model->get_innovation_plan($id);

        // check if the innovation_plan exists before trying to delete it
        if (isset($innovation_plan['id'])) {
            $this->Innovation_plan_model->delete_innovation_plan($id);
            $this->session->set_flashdata('msg', 'Innovation_plan has been deleted successfully');
            redirect('member/innovation_plan/index');
        } else
            show_error('The innovation_plan you are trying to delete does not exist.');
    }

    /**
     * Search innovation_plan
     *
     * @param $start -
     *            Starting of innovation_plan table's index to get query
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
        $this->db->or_like('users_id', $key, 'both');
        $this->db->or_like('objectives_id', $key, 'both');
        $this->db->or_like('weight_of_objectives', $key, 'both');
        $this->db->or_like('activities_id', $key, 'both');
        $this->db->or_like('performance_indicators_id', $key, 'both');
        $this->db->or_like('unit', $key, 'both');
        $this->db->or_like('wop_indicators', $key, 'both');
        $this->db->or_like('1st', $key, 'both');
        $this->db->or_like('2nd', $key, 'both');
        $this->db->or_like('3rd', $key, 'both');
        $this->db->or_like('4th', $key, 'both');
        $this->db->or_like('5th', $key, 'both');
        $this->db->or_like('created_at', $key, 'both');
        $this->db->or_like('updated_at', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['innovation_plan'] = $this->db->get('innovation_plan')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('member/innovation_plan/search');
        $this->db->reset_query();
        $this->db->like('id', $key, 'both');
        $this->db->or_like('users_id', $key, 'both');
        $this->db->or_like('objectives_id', $key, 'both');
        $this->db->or_like('weight_of_objectives', $key, 'both');
        $this->db->or_like('activities_id', $key, 'both');
        $this->db->or_like('performance_indicators_id', $key, 'both');
        $this->db->or_like('unit', $key, 'both');
        $this->db->or_like('wop_indicators', $key, 'both');
        $this->db->or_like('1st', $key, 'both');
        $this->db->or_like('2nd', $key, 'both');
        $this->db->or_like('3rd', $key, 'both');
        $this->db->or_like('4th', $key, 'both');
        $this->db->or_like('5th', $key, 'both');
        $this->db->or_like('created_at', $key, 'both');
        $this->db->or_like('updated_at', $key, 'both');

        $config['total_rows'] = $this->db->from("innovation_plan")->count_all_results();
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
        $data['_view'] = 'member/innovation_plan/index';
        $this->load->view('layouts/member/body', $data);
    }

    /**
     * Export innovation_plan
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'innovation_plan_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $innovation_planData = $this->Innovation_plan_model->get_all_innovation_plan();
            // file creation
            $file = fopen('php://output', 'w');
            $header = array(
                "Id",
                "Users Id",
                "Objectives Id",
                "Weight Of Objectives",
                "Activities Id",
                "Performance Indicators Id",
                "Unit",
                "Wop Indicators",
                "1st",
                "2nd",
                "3rd",
                "4th",
                "5th",
                "Created At",
                "Updated At"
            );
            fputcsv($file, $header);
            foreach ($innovation_planData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'Pdf') {
            $this->db->order_by('id', 'desc');
            $innovation_plan = $this->db->get('innovation_plan')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/member/innovation_plan/print_template.php');
            $html = ob_get_clean();
            require_once FCPATH . 'vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        }
    }
}
//End of Innovation_plan controller