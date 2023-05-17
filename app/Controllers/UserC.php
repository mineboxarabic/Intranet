<?php

namespace App\Controllers;
use Functions;

class UserC extends BaseController
{
    public function profile()
    {
        helper('form');
        return view('User/Profile');
    }
    public function updateProfile(){
        $nom = $this->request->getVar('nom');
        $prenom = $this->request->getVar('prenom');
        $tel = $this->request->getVar('tel');
        $address = $this->request->getVar('adresse');



        $validationRule = [
            'profile-pic' => [
                'rules' => 'uploaded[profile-pic]|max_size[profile-pic,1024]|is_image[profile-pic]|mime_in[profile-pic,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Image size is too big.',
                    'is_image' => 'File is not an image.',
                    'mime_in' => 'File is not an image.',
                ],
            ],
        ];

        if (!$this->validate($validationRule) ) {

            $data['validation'] = $this->validator;
            return view('profile', $data);
        }

        $file = $this->request->getFile('profile-pic');
        $newName = 'Profile_Pic'. '.' . $file->getExtension();


        //_ Creation du dossier de l'utilisateur
            if (!is_dir('Images/Users/'. session()->get('current_user')['id'])) {
                mkdir('Images/Users/'. session()->get('current_user')['id'], 0777, true);
            }

            $file->move('Images/Users/'. session()->get('current_user')['id'], $newName);


        

        //_

     
       
        $model = new \App\Models\UserModel();
        
        
        $user = $model->where('id', session()->get('id'))->first();
        
        

        $data = [
            'adresse' => $address,
            'last_name' => $nom,
            'first_name' => $prenom,
            'telephone' => $tel,
            'picture' => base_url() . 'Images/Users/'. session()->get('current_user')['id'] . '/' . $newName,

        ];


        $model->update(session()->get('current_user')['id'], $data);
        
     

        session()->set('current_user', $model->where('id', session()->get('current_user')['id'])->first());
        
        print_r(session()->get('current_user'));
        //return redirect()->to('/profile');
        //return redirect()->to('/profile');

    }

}
