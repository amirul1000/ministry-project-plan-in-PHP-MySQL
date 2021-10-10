<?php

/**
 * Author: Amirul Momenin
 * Desc:Performance_indicators Controller
 *
 */
class Performance_indicators extends CI_Controller
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
        $this->load->model('Performance_indicators_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of performance_indicators table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['performance_indicators'] = $this->Performance_indicators_model->get_limit_performance_indicators($limit, $start);
        // pagination
        $config['base_url'] = site_url('admin/performance_indicators/index');
        $config['total_rows'] = $this->Performance_indicators_model->get_count_performance_indicators();
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

        $data['_view'] = 'admin/performance_indicators/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Save performance_indicators
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
            'activities_id' => html_escape($this->input->post('activities_id')),
            'unit' => html_escape($this->input->post('unit')),
            'wop_indicators' => html_escape($this->input->post('wop_indicators')),
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
            $data['performance_indicators'] = $this->Performance_indicators_model->get_performance_indicators($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Performance_indicators_model->update_performance_indicators($id, $params);
                $this->session->set_flashdata('msg', 'Performance_indicators has been updated successfully');
                redirect('admin/performance_indicators/index');
            } else {
                $data['_view'] = 'admin/performance_indicators/form';
                $this->load->view('layouts/admin/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $performance_indicators_id = $this->Performance_indicators_model->add_performance_indicators($params);
                $this->session->set_flashdata('msg', 'Performance_indicators has been saved successfully');
                redirect('admin/performance_indicators/index');
            } else {
                $data['performance_indicators'] = $this->Performance_indicators_model->get_performance_indicators(0);
                $data['_view'] = 'admin/performance_indicators/form';
                $this->load->view('layouts/admin/body', $data);
            }
        }
    }

    /**
     * Details performance_indicators
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['performance_indicators'] = $this->Performance_indicators_model->get_performance_indicators($id);
        $data['id'] = $id;
        $data['_view'] = 'admin/performance_indicators/details';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Deleting performance_indicators
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $performance_indicators = $this->Performance_indicators_model->get_performance_indicators($id);

        // check if the performance_indicators exists before trying to delete it
        if (isset($performance_indicators['id'])) {
            $this->Performance_indicators_model->delete_performance_indicators($id);
            $this->session->set_flashdata('msg', 'Performance_indicators has been deleted successfully');
            redirect('admin/performance_indicators/index');
        } else
            show_error('The performance_indicators you are trying to delete does not exist.');
    }

    /**
     * Search performance_indicators
     *
     * @param $start -
     *            Starting of performance_indicators table's index to get query
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
        $this->db->or_like('activities_id', $key, 'both');
        $this->db->or_like('unit', $key, 'both');
        $this->db->or_like('wop_indicators', $key, 'both');
        $this->db->or_like('order_no', $key, 'both');
        $this->db->or_like('created_at', $key, 'both');
        $this->db->or_like('updated_at', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['performance_indicators'] = $this->db->get('performance_indicators')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('admin/performance_indicators/search');
        $this->db->reset_query();
        $this->db->like('id', $key, 'both');
        $this->db->or_like('activities_id', $key, 'both');
        $this->db->or_like('unit', $key, 'both');
        $this->db->or_like('wop_indicators', $key, 'both');
        $this->db->or_like('order_no', $key, 'both');
        $this->db->or_like('created_at', $key, 'both');
        $this->db->or_like('updated_at', $key, 'both');

        $config['total_rows'] = $this->db->from("performance_indicators")->count_all_results();
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
        $data['_view'] = 'admin/performance_indicators/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Export performance_indicators
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'performance_indicators_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $performance_indicatorsData = $this->Performance_indicators_model->get_all_performance_indicators();
            // file creation
            $file = fopen('php://output', 'w');
            $header = array(
                "Id",
                "Activities Id",
                "Unit",
                "Wop Indicators",
                "Order No",
                "Created At",
                "Updated At"
            );
            fputcsv($file, $header);
            foreach ($performance_indicatorsData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'Pdf') {
            $this->db->order_by('id', 'desc');
            $performance_indicators = $this->db->get('performance_indicators')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/admin/performance_indicators/print_template.php');
            $html = ob_get_clean();
            require_once FCPATH . 'vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        }
    }
}
//End of Performance_indicators controller