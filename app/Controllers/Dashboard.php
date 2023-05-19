<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PinModel; 

class Dashboard extends Controller
{
	 public function __construct() {
        $this->pinModel = new PinModel();
    }

	public function index()
	{
		$pins = $this->pinModel->findAll();

        $payload = [
            "pins" => $pins
        ];

		echo view('dashboard', $payload);
	}
}