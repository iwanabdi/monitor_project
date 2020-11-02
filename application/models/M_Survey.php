<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_survey extends CI_Model {



    public function add_data()
    {
		
    	if ($this->input->post('id') !== null) {
    		$data = [
				"project_id" 		=> $this->input->post('id') ,
	     		"file_survey"     	=> $this->upload->data('raw_name')
    			
    		];
    	}
    	

		$this->db->insert('survey', $data);
	}
	

    

}

/* End of file M_customer.php */
/* Location: ./application/models/M_customer.php */
