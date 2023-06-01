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
        helper('form');
        $nom = $this->request->getVar('nom');
        $prenom = $this->request->getVar('prenom');
        $tel = $this->request->getVar('tel');
        $address = $this->request->getVar('adresse');
        $file = $this->request->getFile('profile-pic');

        $model = model('UserModel');
        $user = $model->where('id', session()->get('current_user')['id'])->first();


        $newName = '';
        if($file->isValid() && !$file->hasMoved()){
            $newName = 'Profile_Pic'. '.' . $file->getExtension();
            echo "file name : <br>";
            print($newName. "<br>");
                //_ Creation du dossier de l'utilisateur
                if (!is_dir('Images/Users/'. session()->get('current_user')['id'])) {
                    mkdir('Images/Users/'. session()->get('current_user')['id'], 0777, true);
                }


                
                if(file_exists('Images/Users/'. session()->get('current_user')['id'] . '/' . $newName)){
                    unlink('Images/Users/'. session()->get('current_user')['id'] . '/' . $newName);
                    echo "old file deleted ". $user['picture'] . " <br>";
                }
                print($newName. "<br>");

    
                $file->move('Images/Users/'. session()->get('current_user')['id'], $newName);
                print($newName. "<br>");

                echo "file moved" . "<br>";
                $newName = base_url() . 'Images/Users/'. session()->get('current_user')['id'] . '/' . $newName;

                print($newName. "<br>");
            
        
                //_
        

        }else{
            if($file->getError() == 4){
                echo "no file";
                $newName = $user['picture'];
            }
            else{
                echo "error";
            }
        }





     
       
     


        $data = [
            'adresse' => $address,
            'last_name' => $nom,
            'first_name' => $prenom,
            'telephone' => $tel,
            'picture' => $newName
        ];

        $builder = $model->builder();
        $builder->set('adresse', $address);
        $builder->set('last_name', $nom);
        $builder->set('first_name', $prenom);

        $builder->set('telephone', $tel);
        $builder->set('picture', $newName);
        $builder->where('id', session()->get('current_user')['id']);
        $builder->update();

        session()->set('current_user', $model->where('id', session()->get('current_user')['id'])->first());


        return redirect()->to('/profile');

       // $model->update(session()->get('current_user')['id'], $data);
        
        


       // session()->set('current_user', $model->where('id', session()->get('current_user')['id'])->first());
        
       /// print_r(session()->get('current_user'));



        //return redirect()->to('/profile');
        //return redirect()->to('/profile');

    }

}
