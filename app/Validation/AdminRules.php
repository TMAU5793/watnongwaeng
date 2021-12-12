<?php

namespace App\Validation;
use App\Models\AdminModel;

class AdminRules
{
	// public function custom_rule(): bool
	// {
	// 	return true;
	// }

	public function checkedPassword(string $str, string $fields, array $data){
		$model = new AdminModel();
		$password = $model->where('account', $data['txt_account'])->first();
	
		if(!$password){
		  	return false;
		}else{
			return password_verify($data['txt_password'], $password['password']);
		}
	}

	public function checkedEmail(string $str, string $fields, array $data){
		$model = new AdminModel();
		$email = $model->where('account', $data['txt_account'])->first();
	
		if(!$email){
		  	return false;
		}else{
			return true;
		}		
	}

	public function checkedStatus(string $str, string $fields, array $data){
		$model = new AdminModel();
		$status = $model->where(['account'=>$data['txt_account'],'status'=>'1'])->first();
	
		if(!$status){
		  	return false;
		}else{
			return true;
		}		
	}
}
