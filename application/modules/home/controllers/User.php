<?php defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{


    /**
     * [__construct description]
     *
     * @method __construct
     */
    public function __construct()
    {
        // Load the constructer from MY_Controller
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
        // $data['main'] = "reg_view";
        $this->load->view('layouts/header');
        $this->load->view('reg_view');
    }
}
