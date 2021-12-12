<?php

namespace App\Controllers\admin;
use CodeIgniter\Controller;
use App\Models\ArticleModel;

class Dashboard extends Controller
{	

	public function index()
	{
		if(!session()->get('admindata')){
            return redirect()->to(site_url('admin'));
        }
		helper('text');
		$model = new ArticleModel();
		$data = [
			'countnews' => count($model->where('type','news')->findAll()),
			'countactivity' => count($model->where('type','activity')->findAll()),
			'countblog' => count($model->where('type','blog')->findAll()),
			'news' => $model->where('type','news')->findAll(3),
		];

		return view('admin/dashboard',$data);
	}
}
