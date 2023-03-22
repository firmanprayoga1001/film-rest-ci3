<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';


class user extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('rest_film_model');
		// LIMIT FOR API KEY
		// $this->methods['index_get']['limit'] = 100;
	}
	public function index_get()
	{
		$email = $this->get('email');
		$password = $this->get('password');
		if ($email) {
			$cekEmail = $this->rest_film_model->cekEmail($email);
			if ($cekEmail) {
				$auth = $this->rest_film_model->auth($email,$password);
				if ($auth) {
					$this->response([
						'status' => 'true',
						'message' => 'Logged in successfully',
						'result' => $auth
					], REST_Controller::HTTP_OK);
				} else {
					$this->response([
						'status' => 'false',
						'message' => 'Password wrong !'
					], REST_Controller::HTTP_OK);
				}
			} else {
				$this->response([
					'status' => 'false',
					'message' => 'Unregistered email !'
				], REST_Controller::HTTP_OK);
			}
		} 
	}	
}