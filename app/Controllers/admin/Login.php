<?php

namespace App\Controllers\admin;
use CodeIgniter\Controller;
use App\Models\AdminModel;
use Aws\Api\Service;

class Login extends Controller
{
	public function index()
	{
        if(session()->get('admindata')){
            return redirect()->to(site_url('admin/dashboard'));
        }
		return view('admin/login');
	}

    public function auth()
    {
        helper('form');
        $request = service('request');
        $model = new AdminModel();
        
        $post = $request->getPost();
        if($post){
            $rules = [
                'txt_account' => [
                    'rules' => 'required|checkedEmail[txt_account]|checkedStatus[txt_account]',
                    'errors' =>  [
                        'required' => 'กรุณากรอกชื่อบัญชี',
                        'checkedEmail' => 'ไม่พบบัญชีผู้ใช้นี้',
                        'checkedStatus' => 'บัญชีผู้ใช้ถูกปิดใช้งาน'
                    ]
                ],
                'txt_password' => [
                    'rules' => 'required|min_length[6]|max_length[200]|checkedPassword[txt_account,txt_password]',
                    'errors' =>  [
                        'required' => 'กรุณากรอกรหัสผ่าน',
                        'min_length' => 'รหัสผ่านอย่างน้อย 6 ตัวอักษร',
                        'checkedPassword' => 'รหัสผ่านไม่ถูกต้อง'
                    ]
                ]
            ];
            
            if($this->validate($rules)){
                $admin = $model->where('account', $post['txt_account'])->first();
                $sess = [
                    'id' => $admin['id'],
                    'name' => $admin['name'],
                    'profile' => $admin['profile'],
                    'logged_admin' => TRUE
                ];

                session()->set('admindata',$sess);
                return redirect()->to(site_url('admin/dashboard'));
            }else{
                $data['validation'] = $this->validator;
                echo view('admin/login',$data);
            }
        }else{
            return redirect()->to(site_url('admin'));
        }
    }

    public function logout()
    {
        session()->remove('admindata');
		return redirect()->to('admin');
    }
}
