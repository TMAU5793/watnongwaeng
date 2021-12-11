<?php

namespace App\Controllers\admin;
use CodeIgniter\Controller;
use App\Models\AdminModel;

class Account extends Controller
{
	public function index()
	{
        $model = new AdminModel();
        $data = [
            'info' => $model->findAll()
        ];
		return view('admin/account',$data);
	}

    public function form()
    {
        return view('admin/account-form');
    }

    public function save()
    {
        $model = new AdminModel();
        $request = service('request');

        $post = $request->getPost();
        if($post){
            $rules = [
                'txt_account' => [
                    'rules' => 'required',
                    'errors' =>  [
                        'required' => 'กรุณากรอกข้อมูลชื่อบัญชี'
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
            if($this->validate($rules)){
                print_r($post);
                
                //return redirect()->to('admin/account');
            }else{
                $data = [
                    'validation' => $this->validator
                ];

                echo view('admin/account-form',$data);
            }
        }
        
    }
}
