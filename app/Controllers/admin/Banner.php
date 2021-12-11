<?php

namespace App\Controllers\admin;
use CodeIgniter\Controller;
use App\Models\BannerModel;

class Banner extends Controller
{
	public function index()
	{
        $model = new BannerModel();
        $data = [
            'info' => $model->paginate(25),
            'pager' => $model->pager
        ];

		return view('admin/banner',$data);
	}

    public function form()
    {
        return view('admin/banner-form');
    }

    public function edit()
    {
        $request = service('request');
        $model = new BannerModel();

        $id = $request->getGet('id');
        $info = $model->where('id',$id)->first();
        $data = [
            'info' => $info,
        ];
		return view('admin/banner-form',$data);
    }

    public function save()
    {
        helper(['form','filesystem','text']);
        $request = service('request');
        $model = new BannerModel();

        $post = $request->getPost();
        $id = $post['hd_id'];
        
        if($post){
            $rules = [
                'ddl_page' => [
                    'rules' => 'required',
                    'errors' =>  [
                        'required' => 'กรุณากรอกข้อมูลหน้าเพจ'
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
                
                $data = [
                    'page' => $post['ddl_page'],
                    'status' => $post['ddl_status']
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

                    $w = 1920;
                    $h = 300;
                    if($post['ddl_page'] == 'home'){
                        $h = 700;
                    }
                    if (!is_dir('uploads/banner')) {
                        mkdir('uploads/banner', 0777, TRUE);
                        $this->thumbnail($id,$thumb,$w,$h,'uploads/banner'); //id,file,width,height,path                        
                    }else{
                        $this->thumbnail($id,$thumb,$w,$h,'uploads/banner'); //id,file,width,height,path                        
                    }                    
                }
                return redirect()->to('admin/banner');
            }else{
                $data = [
                    'validation' => $this->validator
                ];

                echo view('admin/banner-form',$data);
            }
            
        }else{
            return redirect()->to('admin/banner');
        }
    }

    public function thumbnail($id,$file,$w,$h,$path)
    {
        $model = new BannerModel();
        $newName = $id.'-'.$file->getRandomName();

        $image = \Config\Services::image()
        ->withFile($file)
        ->fit($w, $h, 'center')
        ->save($path.'/'.$newName);

        $thumb = [
            'banner' => $path.'/'.$newName
        ];
        $model->update($id, $thumb);
    }
}
