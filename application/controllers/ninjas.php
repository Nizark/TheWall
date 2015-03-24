<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ninjas extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index()
	{
		//checks to see if total exists
		if ($this->session->userdata('total'))
		{
		
		}
		else
		{
			//creates total and sets it equal to 0,
			$this->session->set_userdata('total', 0);
			$this->session->set_userdata('log', array());
		}
		$this->load->view('index',
			array(
				"gold" => $this->session->userdata('gold'),
				"building"=> $this->session->userdata('building'),
				"log"=> $this->session->userdata('log'),
				"total"=> $this->session->userdata('total')));
	}
	public function restart()
	{
		// sets counter to zero and redirects back to localhost;
		$this->session->set_userdata('total', 0);
		redirect('ninjas');
	}
	public function process_money()
	{
		$building = $this->input->post('building');

		if ($building =='farm') 
		{
			$gold = rand(10,20);
			$this->session->set_userdata('gold', $gold);
			$this->session->set_userdata('total', $this->session->userdata('total') + $gold);
			$data = $this->session->userdata('log');
			array_unshift($data, "<div class='green'>Ninja went to a farm and earned ". $gold .'</div><br>');
			$this->session->set_userdata('log', $data);
			redirect('/');
		}
		if ($building =='cave') 
		{
			$gold = rand(5 ,10);
			$this->session->set_userdata('gold', $gold);
			$this->session->set_userdata('total', $this->session->userdata('total') + $gold);
			$data = $this->session->userdata('log');
			array_unshift($data, "<div class='green'>Ninja went to a cave and earned ". $gold .'</div><br>');
			$this->session->set_userdata('log', $data);
			redirect('/');
		}
		if ($building =='house') 
		{
			$gold = rand(2 ,5);
			$this->session->set_userdata('gold', $gold);
			$this->session->set_userdata('total', $this->session->userdata('total') + $gold);
			$data = $this->session->userdata('log');
			array_unshift($data, "<div class='green'>Ninja went to a house and earned ". $gold .'</div><br>');
			$this->session->set_userdata('log', $data);
			redirect('/');
		}
		if ($building =='casino') 
		{
			$gold = rand(-50 ,50);
			$this->session->set_userdata('total', $this->session->userdata('total') + $gold);
			if ($gold < 0) 
			{
				$data = $this->session->userdata('log');
				array_unshift($data, "<div class='red'>Ninja went to a casino and lost ". -$gold .'</div><br>');
				$this->session->set_userdata('log', $log);
			}
			else
			{
				$data = $this->session->userdata('log');
				array_unshift($data, "<div class='green'>Ninja went to a casino and earned ". $gold .'</div><br>');
				$this->session->set_userdata('log', $log);
			}	
			$this->session->set_userdata('gold', $gold);
			$this->session->set_userdata('log', $data);
			redirect('/');
		}

		// $this->load->view('index',array("$building"=>building, "$gold"=> gold));
	}
}

//end of main controller