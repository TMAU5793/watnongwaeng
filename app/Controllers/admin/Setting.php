<?php

namespace App\Controllers\admin;
use CodeIgniter\Controller;
use App\Models\SettingModel;

class Setting extends Controller
{
	public function index()
	{
        if(!session()->get('admindata')){
            return redirect()->to(site_url('admin'));
        }

        $model = new SettingModel();
        $data = [
            'info' => $model->first()
        ];
		return view('admin/setting',$data);
	}

    public function save()
    {
        if(!session()->get('admindata')){
            return redirect()->to(site_url('admin'));
        }
        
        $model = new SettingModel();
        $request = service('request');

        $post = $request->getPost();
        if($post){
            $id = $post['hd_id'];
            $data = [
                'smtp_host' => $post['smtp_host'],
                'smtp_user' => $post['smtp_user'],
                'smtp_password' => $post['smtp_password'],
                'smtp_port' => $post['smtp_port'],
                'smtp_security' => $post['smtp_security'],
                'receive_mail' => $post['receive_mail']
            ];

            if($id==""){
                $model->save($data);
            }else{
                $model->update($id,$data);
            }
        }

        return redirect()->to('admin/setting');
    }
}
