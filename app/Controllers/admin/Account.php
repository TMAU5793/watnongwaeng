<?php

namespace App\Controllers\admin;
use CodeIgniter\Controller;
use App\Models\AdminModel;

class Account extends Controller
{
	public function index()
	{
        if(!session()->get('admindata')){
            return redirect()->to(site_url('admin'));
        }

        $model = new AdminModel();
        $data = [
            'info' => $model->findAll()
        ];
		return view('admin/account',$data);
	}

    public function form()
    {
        if(!session()->get('admindata')){
            return redirect()->to(site_url('admin'));
        }

        helper('form');
        return view('admin/account-form');
    }

    public function edit()
    {
        if(!session()->get('admindata')){
            return redirect()->to(site_url('admin'));
        }

        helper('form');
        $request = service('request');
        $model = new AdminModel();

        $id = $request->getGet('id');
        $info = $model->where('id',$id)->first();
        $data = [
            'info' => $info,
        ];
		return view('admin/account-form',$data);
    }

    public function save()
    {
        if(!session()->get('admindata')){
            return redirect()->to(site_url('admin'));
        }
        
        helper('form');
        $model = new AdminModel();
        $request = service('request');

        $post = $request->getPost();
        if($post){
            $id = $post['hd_id'];
            if($id==""){
                $rules = [
                    'txt_account' => [
                        'rules' => 'required|is_unique[tbl_admin.account]',
                        'errors' =>  [
                            'required' => 'กรุณากรอกข้อมูลชื่อบัญชี',
                            'is_unique' => 'บัญชีนี้ถูกใช้งานแล้ว'
                        ]
                    ],
                    'txt_password'       => [
                        'rules' =>  'required|min_length[6]|max_length[200]',
                        'errors'    =>  [
                            'required'  =>  'กรุณากรอกรหัสผ่าน',
                            'min_length'   =>  'รหัสผ่านอย่างน้อย 6 ตัวอักษร'
                        ]
                    ],
                    'txt_confirm_password'    => [
                        'rules' =>  'matches[txt_password]',
                        'errors'    =>  [
                            'matches'  =>  'รหัสผ่านไม่ตรงกัน'
                        ]
                    ],
                ];
            }else{
                if($post['txt_password']!=''){
                    $rules = [
                        'txt_password'       => [
                            'rules' =>  'required|min_length[6]|max_length[200]',
                            'errors'    =>  [
                                'required'  =>  'กรุณากรอกรหัสผ่าน',
                                'min_length'   =>  'รหัสผ่านอย่างน้อย 6 ตัวอักษร'
                            ]
                        ],
                        'txt_confirm_password'    => [
                            'rules' =>  'matches[txt_password]',
                            'errors'    =>  [
                                'matches'  =>  'รหัสผ่านไม่ตรงกัน'
                            ]
                        ],
                    ];
                }else{
                    $rules = [
                        'hd_password' => [
                            'rules' => 'required'
                        ]
                    ];
                }
            }
            if($this->validate($rules)){
                if($id == ""){
                    $data = [
                        'account'    => $post['txt_account'],
                        'password' => password_hash($post['txt_password'], PASSWORD_DEFAULT),
                        'name'    => $post['txt_name'],
                        'email'    => $post['txt_email'],
                        'status'    => $post['ddl_status']
                    ];
                    $model->save($data);
                    $id = $model->getInsertID();
                }else{
                    if($post['txt_password']!=''){
                        $data = [
                            'password' => password_hash($post['txt_password'], PASSWORD_DEFAULT),
                            'name'    => $post['txt_name'],
                            'email'    => $post['txt_email'],
                            'status'    => $post['ddl_status']
                        ];
                    }else{
                        $data = [
                            'name'    => $post['txt_name'],
                            'email'    => $post['txt_email'],
                            'status'    => $post['ddl_status']
                        ];
                    }
                    $model->update($id,$data);
                }

                $thumb = $request->getFile('txt_thumbnail'); //เก็บไฟล์รูปอัพโหลด
                $allowed = ['png','jpg','jpeg']; //ไฟล์รูปที่อนุญาติให้อัพโหลด
                $ext = $thumb->getExtension();

                if ($thumb->isValid() && !$thumb->hasMoved() && in_array($ext, $allowed)){
                    $hd_tuumb = $post['hd_thumb'];
                    $file_del = $post['hd_thumb_del']; //เก็บค่าใว้เช็คถ้ามีรูปอยู่ ให้ลบรูป
                    if(is_file($file_del) && $hd_tuumb!=$file_del){
                        unlink($file_del); //ลบรูปเก่าออก
                    }

                    $w = 150;
                    $h = 150;
                    if (!is_dir('uploads/admin')) {
                        mkdir('uploads/admin', 0777, TRUE);
                        $this->thumbnail($id,$thumb,$w,$h,'uploads/admin'); //id,file,width,height,path
                    }else{
                        $this->thumbnail($id,$thumb,$w,$h,'uploads/admin'); //id,file,width,height,path
                    }                    
                }

                return redirect()->to('admin/account');
            }else{
                $data = [
                    'validation' => $this->validator,
                    'info' => $model->where('id',$post['hd_id'])->first()
                ];

                echo view('admin/account-form',$data);
            }
        }
        
    }

    public function thumbnail($id,$file,$w,$h,$path)
    {
        $model = new AdminModel();
        $newName = $id.'-'.$file->getRandomName();

        $image = \Config\Services::image();
        $image->withFile($file)->fit($w, $h, 'center')->save($path.'/'.$newName);
        $thumb = [
            'profile' => $path.'/'.$newName,
        ];
        $model->update($id, $thumb);
    }
}
