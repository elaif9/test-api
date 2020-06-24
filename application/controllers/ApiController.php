<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiController extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('model_api');
        
    }

    public function response($data)
    {
       $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        
        exit();
    }

    public function push_absensi()
    {
        return $this->response($this
                                    ->model_api->with_post($this->input->post('id'),
                                                             $this->input->post('data_string')
                                ));
    }

    public function push_get_absensi()
    {        
        $id = $this->input->get('id');
        $data_string = $this->input->get('data_string');

        return $this->response($this
                                    ->model_api->insert_with_get($id, $data_string
                                ));
    }
}
