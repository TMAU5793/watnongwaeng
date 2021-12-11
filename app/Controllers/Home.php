<?php

namespace App\Controllers;
use App\Models\ArticleModel;

class Home extends BaseController
{
	public function index()
	{
		helper('text');
		$model1 = new ArticleModel();
		$data = [
			'blogs' => $model1->where(['type'=>'blog','status'=>'1'])->findAll(7),
			'news' => $model1->where(['type'=>'news','status'=>'1'])->findAll(2),
		];

		return view('home',$data);
	}
}
