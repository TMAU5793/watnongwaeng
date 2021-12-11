<?php

namespace App\Controllers;
use App\Models\ArticleModel;
use App\Models\ArticleAlbumModel;
use App\Models\BannerModel;

class Activity extends BaseController
{
	public function index()
	{
        helper('text');
        $model1 = new ArticleModel();
        $model2 = new BannerModel();

        $data = [
            'title' => 'กิจกรรมทั้งหมด',
            'type' => 'activity',
            'info' => $model1->where(['type'=>'activity','status'=>'1'])->paginate(12),
            'pager' => $model1->pager,
            'banner' => $model2->where(['page'=>'activity','status'=>'1'])->first()
        ];

        //print_r($data['info']);
		return view('article',$data);
	}

    public function post()
    {
        $uri = service('uri');
        $model1 = new ArticleModel();
        $model2 = new ArticleAlbumModel();

        $post = urldecode($uri->getSegment(3));
        $info = $model1->where('slug',$post)->first();
        if(!$info){
            $info = $model1->where('id',$post)->first();
        }
        $data = [
            'info' => $info,
            'album' => $model2->where('article_id',$info['id'])->findAll()
        ];
        
        //print_r($info);
        return view('article-single',$data);
    }
}
