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

class Blogops extends MY_Controller
{
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
    public function blog_input()
    {
        $data['main'] = "blog";
        $this->load->view('home/layouts/main_view', $data);
    }
    public function blog()
    {
        $this->form_validation->set_rules('b_title', 'Blog Title', 'required');
        $this->form_validation->set_rules('b_description', 'Blog Description', 'required|min_length[50]');
        $this->form_validation->set_rules('visibility', 'Visibility', 'required');
        // $this->form_validation->set_rules('b_image', 'Blog Image', 'required');
        if ($this->form_validation->run() === FALSE) {
            $response['success'] = false;
            $response['message'] = 'Please enter all the details carefully.';
        } else {
            $config['upload_path'] = './assets/blogimg/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2048;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('b_image')) {
                $response['success'] = false;
                $response['message'] = 'Image is necessary.';
            } else {
                $uname = $this->session->userdata('uname');
                $b_title = $this->input->post('b_title');
                $b_description = $this->input->post('editor');
                $visibility = $this->input->post('visibility');

                $file_data = $this->upload->data();
                // var_dump($file_data);
                // die();
                $file_name = $file_data['file_name'];

                $blog_data = array(
                    'uname' => $uname,
                    'b_title' => $b_title,
                    'b_description' => $b_description,
                    'b_image' => $file_name,
                    'visibility' => $visibility,
                );
                $this->db->insert('blogs', $blog_data);
                $response['success'] = true;
                $response['message'] = 'Blog posted successfully.';
            }
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function delete()
    {
        $data['main'] = 'delete';
        $data['blogs'] = $this->blog_model->viewblogs();
        $this->load->view('home/layouts/main_view', $data);
    }
    public function edit_blog($blog_id)
    {
        $data['main'] = 'edit';
        $data['blog'] = $this->blog_model->view_blog_by_id($blog_id);
        $this->load->view('home/layouts/main_view', $data);
    }
    public function own_blog($uname)
    {
        $data['blogs'] = $this->blog_model->view_blog_by_uname($uname);
        $data['main'] = 'userblog';
        $this->load->view('home/layouts/main_view', $data);
    }
    public function view()
    {
        $data['blogs'] = $this->blog_model->viewblogs();
        $data['main'] = 'home/index_view';
        $this->load->view('home/layouts/main_view', $data);
    }
    public function readblog($blog_id)
    {
        $data['blog'] = $this->blog_model->view_blog_by_id($blog_id);
        $data['main'] = 'detail';
        $this->load->view('home/layouts/main_view', $data);
    }

    public function delete_blog($blog_id)
    {
        $this->blog_model->delete_blog($blog_id);
        $this->delete();
    }

    public function update()
    {
        $b_title = $this->input->post('b_title');
        $b_description = $this->input->post('b_description');
        $bid = $this->input->post('bid');
        $status = $this->input->post('visibility');
        $bdata = array(
            'b_title' => $b_title,
            'b_description' => $b_description,
            'visibility' => $status,
        );
        $this->blog_model->edit_blog($bid, $bdata);
        redirect('delete');
    }
}
