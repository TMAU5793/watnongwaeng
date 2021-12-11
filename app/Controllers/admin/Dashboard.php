<?php

namespace App\Controllers\admin;
use CodeIgniter\Controller;

class Dashboard extends Controller
{
	public function index()
	{
		return view('admin/dashboard');
	}
}
