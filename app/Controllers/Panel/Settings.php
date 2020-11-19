<?php namespace App\Controllers\Panel;

use App\Controllers\BaseController;
use App\Models\SettingModel;
use CodeIgniter\HTTP\Files\UploadedFile;

class Settings extends BaseController
{
	public function index()
	{
       
        helper(['form']);
        $data = [];        
		$model = new SettingModel();		
        $data['settings'] = $model->first();
        $data['uri'] = service('uri');

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'company_name' => 'required|min_length[4]',
                'phone'        => 'required',
                'logo'         => 'uploaded[logo]|max_size[logo, 2048]|is_image[logo]' 
            ];

            if( !$this->validate($rules) ){

                $session = session();
				$session->setFlashdata('error', 'Registration failed! Please fill the form completely.');	

				$data['validation']	 = $this->validator;
            }else {
                
                $file = $this->request->getFile('logo');
                
                if( $file->isValid() )
                    $file->move('./uploads'); 
                
                    $newData = [
                       'company_name' => $this->request->getVar('company_name'),
                        'phone'       => $this->request->getVar('phone'),
                        'fax'         => $this->request->getVar('fax'),
                        'address'     => $this->request->getVar('address'),
                        'about_us'    => $this->request->getVar('about_us'),
                        'mission'     => $this->request->getVar('mission'),
                        'vision'      => $this->request->getVar('vision'),
                        'motto'       => $this->request->getVar('famottox'),
                        'email'       => $this->request->getVar('email'),
                        'facebook'    => $this->request->getVar('facebook'),
                        'twitter'     => $this->request->getVar('twitter'),
                        'instagram'   => $this->request->getVar('instagram'),
                        'linkedin'    => $this->request->getVar('linkedin'),
                        'logo'        => $file->getName()                   
    
                    ];
    
                    $model->save($newData);
    
                    $session = session();
                    $session->setFlashdata('success', 'Successful saved');
                    return redirect()->to('/panel/settings');            
            }
        }
		return view("panel/settings", $data);
	}

	//--------------------------------------------------------------------

}
