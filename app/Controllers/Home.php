<?php

namespace App\Controllers;
use App\Models\ArticleModel;
use App\Models\BannerModel;

class Home extends BaseController
{
	public function index()
	{
		helper('text');
		$model1 = new ArticleModel();
		$model2 = new BannerModel();
		$data = [
			'blogs' => $model1->where(['type'=>'blog','status'=>'1'])->findAll(7),
			'news' => $model1->where(['type'=>'news','status'=>'1'])->findAll(2),
			'banner' => $model2->where(['page'=>'home','status'=>'1'])->first()
		];

		return view('home',$data);
	}
}
