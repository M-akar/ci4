<?php namespace App\Controllers\Panel;

use App\Controllers\BaseController;
use App\Models\BlogModel;
use CodeIgniter\HTTP\Files\UploadedFile;

class Blogs extends BaseController
{
	public function index()
	{       
		helper(['form']);
		$model = new BlogModel();		
        $data['blogs'] = $model->findAll();
        $data['uri'] = service('uri');
        
        if ($this->request->getMethod() === 'post') {

            $rules = [
                'title'   => 'required|min_length[4]',
                'content' => 'required',
                'img_url' => 'uploaded[img_url]|max_size[img_url, 2048]|is_image[img_url]' 
            ];

            if( !$this->validate($rules) ){

                $session = session();
				$session->setFlashdata('error', 'Registration failed! Please fill the form completely.');	

				$data['validation']	 = $this->validator;
            }else {
                
                $file = $this->request->getFile('img_url');
                
                if( $file->isValid() )
                    $file->move('./uploads/blog');              
                
                
                $newData = [
                    'title'     => $this->request->getVar('title'),
                    'content'   => $this->request->getVar('content'),
                    'slug'      => url_title($this->request->getVar('title'), '-', true),
                    'img_url'   => $file->getName(),
                    'is_active' => 1

                ];

				$model->save($newData);

				$session = session();
				$session->setFlashdata('success', 'Successful saved');
				return redirect()->to('/panel/blogs');                
            }
        }
		return view('panel/blogs', $data);
	}

	//--------------------------------------------------------------------

}
