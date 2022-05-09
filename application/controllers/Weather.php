<?php
class Weather extends CI_Controller {
	function index(){
		error_reporting(0);
		$this->load->library("NuSoap_lib");

		$weather = new NuSoap_lib();
		$weather->getWeather();
	}

}

//https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/Weather/index
