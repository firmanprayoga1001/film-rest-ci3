<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';


class data extends REST_Controller
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
		$var = $this->get('var');
		if ($var) {
			$film = $this->rest_film_model->getFilm($var,null);
			if ($film) {
				$this->response([
					'status' => 'true',
					'result' => $film
				], REST_Controller::HTTP_OK);
			} else {
				$this->response([
					'status' => 'false',
					'message' => 'Film not found !'
				], REST_Controller::HTTP_OK);
			}
		} 
		$category = $this->get('cat');
		if ($category) {
			$film = $this->rest_film_model->getFilm(null,$category);
			if ($film) {
				$this->response([
					'status' => 'true',
					'result' => $film
				], REST_Controller::HTTP_OK);
			} else {
				$this->response([
					'status' => 'false',
					'message' => 'Film not found !'
				], REST_Controller::HTTP_OK);
			}
		}
		$id = $this->get('id');
		if ($id) {
			$film = $this->rest_film_model->detailFilm($id);
			$actor = $this->rest_film_model->getActor($id);
			$eps = $this->rest_film_model->getEpisodes($id);
			
			if ($film) {
				$this->response([
					'status' => 'true',
					'result' => $film,
					'actor' => $actor,
					'eps' => $eps
				], REST_Controller::HTTP_OK);
			} else {
				$this->response([
					'status' => 'false',
					'message' => 'Film not found !'
				], REST_Controller::HTTP_OK);
			}
		}
		
		$id_eps = $this->get('eps');
		if ($id_eps) {
			$film = $this->rest_film_model->detailEps($id_eps);
			$id_film = $film->id_video;
			$actor = $this->rest_film_model->getActor($id_film);
			$eps = $this->rest_film_model->getEpisodes($id_film);
			
			if ($film) {
				$this->response([
					'status' => 'true',
					'result' => $film,
					'actor' => $actor,
					'eps' => $eps
				], REST_Controller::HTTP_OK);
			} else {
				$this->response([
					'status' => 'false',
					'message' => 'Film not found !'
				], REST_Controller::HTTP_OK);
			}
		}
		$catlist = $this->get('catlist');
		if ($catlist) {
			$category = $this->rest_film_model->getCategory($catlist);
			
			if ($category) {
				$this->response([
					'status' => 'true',
					'result' => $category
				], REST_Controller::HTTP_OK);
			} else {
				$this->response([
					'status' => 'false',
					'message' => 'File not found !'
				], REST_Controller::HTTP_OK);
			}
		}
	}	
}