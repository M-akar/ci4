<?php namespace App\Controllers\Panel;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Users extends BaseController
{
	public function index()
	{
		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {

			$rules = [
				'email'	   => 'required|min_length[6]|valid_email',
				'password' => 'required|min_length[4]|max_length[255]|validateUser[email, password]'
			];

			$errors = [
				'password'  => [
					'validateUser'	=> 'Email or Password don\'t match'
				]
			];

			if ( !$this->validate($rules, $errors) ){

				$data['validation']  = $this->validator;
			} else {
				$model = new UserModel();

				$user = $model->where('email', $this->request->getVar('email'))
							  ->first();
				
				$this->setUserMethod($user);

				return redirect()->to('panel/dashboard');
			}
		}

		echo view('panel/login/layouts/header', $data);
		echo view('panel/login/login');
		echo view('panel/login/layouts/footer');
	}
	
	private function setUserMethod($user)
	{
		$data = [
			'id'	=> $user['id'],
			'firstname'	=> $user['firstname'],
			'lastname'	=> $user['lastname'],
			'email'	=> $user['email'],
			'isLoggedIn'	=>true
		];

		session()->set($data);
		return true;
    }
    
	public function create()
	{
				
		helper(['form']);
		$model = new UserModel();		
		$data['users'] = $model->findAll();
		$data['uri'] = service('uri');

		if ($this->request->getMethod() === 'post') {

			$rules = [
				'firstname'	 => 'required|min_length[3]|max_length[50]',
				'lastname'   => 'required|min_length[3]|max_length[50]',
				'email'		 => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
				'password'	 => 'required|min_length[5]|max_length[255]',
				'confirm_password'	 => 'matches[password]',
			];

			if (! $this->validate($rules)) {		
				$session = session();
				$session->setFlashdata('error', 'Registration failed! Please fill the form completely.');	

				$data['validation']	 = $this->validator;
			} else {

				$newData = [
					'firstname'	 => $this->request->getVar('firstname'),
					'lastname'	 => $this->request->getVar('lastname'),
					'email'	     => $this->request->getVar('email'),
					'password'	 => $this->request->getVar('password'),
					'is_active'	 => 1
				];

				$model->save($newData);

				$session = session();
				$session->setFlashdata('success', 'Successful Registration');
				return redirect()->to('/panel/users');

			}

		}
		return view('panel/users', $data);
	
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to('/panel');
	}


}

