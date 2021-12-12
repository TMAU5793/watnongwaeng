<?php

namespace App\Controllers\admin;
use CodeIgniter\Controller;
use App\Models\ArticleModel;
use App\Models\ArticleAlbumModel;

class Article extends Controller
{
    protected $uri;
    protected $segment2;
    protected $segment3;
    public function __construct() {
        $this->uri = service('uri');
        $this->segment2 =  $this->uri->getSegment(2);
        $this->segment3 =  $this->uri->getSegment(3);
    }

	public function index()
	{
        if(!session()->get('admindata')){
            return redirect()->to(site_url('admin'));
        }
        
		$model = new ArticleModel();
        $data = [
            'active' => 'news',
            'segment2' =>  $this->segment2,
            'info' => $model->where('type','news')->paginate(25),
            'pager' => $model->pager

        ];
		return view('admin/news',$data);
	}

    public function news()
	{
        if(!session()->get('admindata')){
            return redirect()->to(site_url('admin'));
        }

        $model = new ArticleModel();
        $data = [
            'active' => 'news',
            'segment2' =>  $this->segment2,
            'info' => $model->where('type','news')->paginate(25),
            'pager' => $model->pager

        ];
		return view('admin/news',$data);
	}

    public function activity()
	{
        if(!session()->get('admindata')){
            return redirect()->to(site_url('admin'));
        }

        $model = new ArticleModel();
        $data = [
            'active' => 'activity',
            'segment2' =>  $this->segment2,
            'info' => $model->where('type','activity')->paginate(25),
            'pager' => $model->pager
        ];
		return view('admin/activity',$data);
	}

    public function blog()
	{
        if(!session()->get('admindata')){
            return redirect()->to(site_url('admin'));
        }

        $model = new ArticleModel();
        $data = [
            'active' => 'blog',
            'segment2' =>  $this->segment2,
            'info' => $model->where('type','blog')->paginate(25),
            'pager' => $model->pager
        ];
		return view('admin/blog',$data);
	}

    public function form()
    {
        if(!session()->get('admindata')){
            return redirect()->to(site_url('admin'));
        }

        $request = service('request');
        $u = $request->getGet('u');
        $data = [
            'active' => $u,
            'segment2' =>  $this->segment2
        ];
		return view('admin/article-form',$data);
    }

    public function edit()
    {
        if(!session()->get('admindata')){
            return redirect()->to(site_url('admin'));
        }

        $request = service('request');
        $model = new ArticleModel();
        $album = new ArticleAlbumModel();

        $id = $request->getGet('id');
        $info = $model->where('id',$id)->first();
        $data = [
            'active' => $info['type'],
            'segment2' =>  $this->segment2,
            'info' => $info,
            'album' => $album->where('article_id',$id)->findAll()
        ];
		return view('admin/article-form',$data);
    }

    public function save()
    {
        if(!session()->get('admindata')){
            return redirect()->to(site_url('admin'));
        }

        helper(['form','filesystem','text']);
        $request = service('request');
        $model = new ArticleModel();

        $post = $request->getPost();
        $id = $post['hd_id'];
        
        if($post){
            $rules = [
                'txt_title' => [
                    'rules' => 'required',
                    'errors' =>  [
                        'required' => 'กรุณากรอกข้อมูลหัวข้อ'
                    ]
                ],
                'txt_desc' => [
                    'rules' => 'required',
                    'errors' =>  [
                        'required' => 'กรุณากรอกรข้อมูลรายละเอียด'
                    ]
                ],
                'hd_thumb' => [
                    'rules' => 'required',
                    'errors' =>  [
                        'required' => 'กรุณาใส่รูปภาพ Thumbnail'
                    ]
                ]
            ];
            if($this->validate($rules)){
                $thumb = $request->getFile('txt_thumbnail'); //เก็บไฟล์รูปอัพโหลด
                $allowed = ['png','jpg','jpeg']; //ไฟล์รูปที่อนุญาติให้อัพโหลด
                $ext = $thumb->getExtension();

                $slug = url_title(strtolower($post['seo_slug']));
                if($post['seo_slug']==""){
                    $slug = url_title(strtolower($post['txt_title']));
                }

                $cslug = $model->where('slug',$slug)->first();
                if($cslug){
                    $rand = random_string('alnum', 5);
                    $slug = url_title(strtolower($post['txt_title'].'-'.$rand));
                }
                $data = [
                    'type' => $post['hd_type'],
                    'title' => $post['txt_title'],
                    'desc' => $post['txt_desc'],
                    'status' => $post['dll_status'],
                    'slug' => $slug,
                    'seo_title' => $post['seo_title'],
                    'seo_desc' => $post['seo_desc'],
                ];
                $id = $post['hd_id'];
                if($id == ""){
                    $model->save($data);
                    $id = $model->getInsertID();
                }else{
                    $model->update($id,$data);
                }

                if ($thumb->isValid() && !$thumb->hasMoved() && in_array($ext, $allowed)){
                    $hd_tuumb = $post['hd_thumb'];
                    $file_del = $post['hd_thumb_del']; //เก็บค่าใว้เช็คถ้ามีรูปอยู่ ให้ลบรูป
                    if(is_file($file_del) && $hd_tuumb!=$file_del){
                        unlink($file_del); //ลบรูปเก่าออก
                    }

                    if (!is_dir('uploads/articles/'.$post['hd_type'])) {
                        mkdir('uploads/articles/'.$post['hd_type'], 0777, TRUE);
                        $this->thumbnail($id,$thumb,600,400,'uploads/articles/'.$post['hd_type']); //id,file,width,height,path                        
                    }else{
                        $this->thumbnail($id,$thumb,600,400,'uploads/articles/'.$post['hd_type']); //id,file,width,height,path                        
                    }                    
                }

                if ($request->getFileMultiple('file_album')) {
                    foreach($request->getFileMultiple('file_album') as $file) {
                        $this->uploadAlbum($id,$file,'uploads/articles/'.$post['hd_type']);
                    }
                }
                
                return redirect()->to('admin/article/'.$post['hd_type']);
            }else{
                $data = [
                    'active' => $post['hd_type'],
                    'segment2' =>  $this->segment2,
                    'validation' => $this->validator
                ];

                echo view('admin/article-form',$data);
            }
            
        }else{
            return redirect()->to('admin/article/news');
        }
    }

    public function thumbnail($id,$file,$w,$h,$path)
    {
        $model = new ArticleModel();
        $newName = $id.'-'.$file->getRandomName();

        $image = \Config\Services::image()
        ->withFile($file)
        ->fit($w, $h, 'center')
        ->save($path.'/'.$newName);

        $thumb = [
            'thumbnail' => $path.'/'.$newName
        ];
        $model->update($id, $thumb);
    }

    public function uploadAlbum($id,$file,$path)
	{
		helper(['form','fileystem']);
        $image = \Config\Services::image();
		$model = new ArticleAlbumModel();
		
		$allowed = ['png','jpg','jpeg']; //ไฟล์รูปที่อนุญาติให้อัพโหลด
		$ext = $file->getExtension();

		if ($file->isValid() && !$file->hasMoved() && in_array($ext, $allowed)){
			$newName = 'album-'.$id.'-'.$file->getRandomName();
            $image->withFile($file)->save($path.'/'.$newName);
            if (!is_dir($path.'/thumbnail')) {
                mkdir($path.'/thumbnail', 0777, TRUE);
                $image->withFile($file)->fit(450,300,'center')->save($path.'/thumbnail/'.$newName);
            }else{
                $image->withFile($file)->fit(450,300,'center')->save($path.'/thumbnail/'.$newName);
            }
			$thumb = [
                'article_id' => $id,
				'thumbnail' => $path.'/thumbnail/'.$newName,
                'image' => $path.'/'.$newName
			];
            
            $model->save($thumb);
		}
	}

    public function deleteAlbum()
    {
        if(!session()->get('admindata')){
            return redirect()->to(site_url('admin'));
        }
        
        $request = service('request');
        $model = new ArticleAlbumModel();
        $id = $request->getPost('id');
        if($id){
            $path = $model->where('id',$id)->first();
            $deleted = $model->where('id', $id)->delete($id);
            if($deleted && is_file($path['image'])){
                unlink($path['image']);
                unlink($path['thumbnail']);
            }
            echo true;
        }else{
            return redirect()->to('admin/article/news');
        }
    }

    public function rand()
    {
        helper('text');
        $rand = random_string('alnum', 5);
        $slug = url_title(strtolower('text'.'-'.$rand));
        echo $slug;
    }
}
