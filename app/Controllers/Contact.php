<?php

namespace App\Controllers;

class Contact extends BaseController
{
	public function index()
	{
		helper('text');
		$data = [
			'title' => 'ติดตดเรา'
		];

		return view('contact',$data);
	}
}
