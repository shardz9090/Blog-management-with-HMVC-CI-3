<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * CodeIgniter-HMVC
 *
 * @package    CodeIgniter-HMVC
 * @author     N3Cr0N (N3Cr0N@list.ru)
 * @copyright  2019 N3Cr0N
 * @license    https://opensource.org/licenses/MIT  MIT License
 * @link       <URI> (description)
 * @version    GIT: $Id$
 * @since      Version 0.0.1
 * @filesource
 *
 */

class Dbwork extends MY_Controller
{
    //
    public $CI;

    /**
     * An array of variables to be passed through to the
     * view, layout,....
     */
    protected $data = array();

    /**
     * [__construct description]
     *
     * @method __construct
     */
    public function __construct()
    {
        // To inherit directly the attributes of the parent class.
        parent::__construct();
    }

    /**
     * [index description]
     *
     * @method index
     *
     * @return [type] [description]
     */
    public function register()
    {
        $data['main'] = "reg_view";
        $this->load->view('home/layouts/main_view', $data);
    }
    public function login()
    {
        $data['main'] = "login_view";
        $this->load->view('home/layouts/main_view', $data);
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
    public function reg_form()
    {
        $this->form_validation->set_rules('fname', 'Full Name', 'required');
        $this->form_validation->set_rules('uname', 'Username', 'required|min_length[5]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('conpassword', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() === FALSE) {
            $response['success'] = false;
            // $response['message'] = 'Empty Credentials.';
            $response['message'] = validation_errors();
        } else {
            $fname = $this->input->post('fname');
            $uname = $this->input->post('uname');
            $password = $this->input->post('password');
            $status = $this->input->post('status');

            $data = array(
                'fname' => $fname,
                'uname' => $uname,
                'password' => $password,
                'status' => $status,
            );
            $this->db->insert('user', $data);
            $response['success'] = true;
            $response['message'] = 'Logged in successfully.';
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function login_form()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $uname = $this->input->post('uname');
            $password = $this->input->post('password');
            $this->db->where('uname', $uname);
            $this->db->where('password', $password);
            $query = $this->db->get('user');
            $find_user = $query->num_rows();
            if ($find_user > 0) {
                $this->session->set_userdata('uname', $query->row()->uname);
                $this->session->set_userdata('fname', $query->row()->fname);
                $this->session->set_userdata('status', $query->row()->status);
                $this->session->set_userdata('log', 'logged');
                $response['success'] = true;
                $response['message'] = 'Logged in successfully.';
            } else {
                $response['success'] = false;
                $response['message'] = 'Login failed. Invalid credentials.';
            }
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
}
