<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/admin
	 *	- or -
	 * 		http://example.com/index.php/admin/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/admin/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('sidebar');
		$this->load->view('admin/index');
		$this->load->view('templates/footer');
	}
	
	public function clear()
	{
		$data['status'] = false; // flags that something's not right.
		$data['message'] = "Unable to process your request.";

		// remove all .rec files from system/cache
		$folder = 'system/cache/';
		$files = glob($folder . '*.rec');
		$deleted = 0;

		if (count($files) > 0)
		{
			foreach ($files as $file)
			{
				if (is_file($file))
				{
					unlink($file);
					$deleted++;
				}
	
				if (count($files) == $deleted)
				{
					$data['status'] = true;
					$data['message'] = "Cache has been cleared.";
				}
				else
					$data['message'] = "An error occurred while deleting cache files on the system.";
			}
		}
		else
			$data['message'] = "There's nothing to delete; the cache is clear.";
		

		$this->load->view('templates/header');
		$this->load->view('sidebar');
		$this->load->view('admin/clear', $data);
		$this->load->view('templates/footer');
	}

	public function logout()
	{
		$this->load->view('templates/header');
		$this->load->view('admin/logout');
		$this->load->view('templates/footer');
	}
}