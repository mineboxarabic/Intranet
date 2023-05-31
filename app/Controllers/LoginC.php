<?php 

namespace App\Controllers;
use App\Models\UserModel;
use Google_Service;
use Google_Service_Oauth2;

class LoginC extends BaseController{

    private $googleClient = null;
    function __construct(){
        $this->googleClient = new \Google_Client();
        $this->googleClient->setClientId('572485203888-9igd5548c27cklvf4333r44afe03guha.apps.googleusercontent.com');
        $this->googleClient->setClientSecret('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');
        $this->googleClient->setRedirectUri('http://localhost:8080/login_redir');
        $this->googleClient->addScope('email');
        $this->googleClient->addScope('profile');
        
        //Add google drive scope
        $this->googleClient->addScope('https://www.googleapis.com/auth/drive');
        $this->googleClient->addScope('https://www.googleapis.com/auth/drive.file');
        $this->googleClient->addScope('https://www.googleapis.com/auth/drive.readonly');
        $this->googleClient->addScope('https://www.googleapis.com/auth/drive.metadata.readonly');
        $this->googleClient->addScope('https://www.googleapis.com/auth/drive.appdata');
        $this->googleClient->addScope('https://www.googleapis.com/auth/drive.metadata');
        $this->googleClient->addScope('https://www.googleapis.com/auth/drive.photos.readonly');
        $this->googleClient->addScope('https://www.googleapis.com/auth/drive.scripts');
        $this->googleClient->addScope('https://www.googleapis.com/auth/drive.activity');



    }

    public function loginPage(){
        $googleButton = '<a href="'.$this->googleClient->createAuthUrl().'"><img src="'.base_url().'/imgs/google_Connect.png" alt="google login" /></a>';
        return view('LoginV', ['googleButton' => $googleButton]);
    }

    private function getUserType($userEmail){
        // personnel email name@ensp-arles.fr
        // student email name@etu-arles.fr
        $userType = substr($userEmail, -12, 3);
        if($userType == 'etu'){
            return 'student';
        }else{
            return 'personnel';
        }
    }
    public function login(){
        $token = $this->googleClient->fetchAccessTokenWithAuthCode($this->request->getVar('code'));

        if(!isset($token['error'])){
         $this->googleClient->setAccessToken($token['access_token']);
        session()->set('Access_token', $token['access_token']);


         $drive = new \Google_Service_Drive($this->googleClient);
            $files = $drive->files->listFiles(array())->getFiles();

            





            session()->set('files', $files);
         

         
         
           session()->set('Access_token', $token['access_token']);
            $googleService = new \Google_Service_Oauth2($this->googleClient);
            $data = $googleService->userinfo->get();



            $userFirstName = $data['givenName'];
            $userLastName = $data['familyName'];
            $userEmail = $data['email'];
            $userPicture = $data['picture'];
            $userGoogleId = $data['id'];
            $userHD = $data['hd'];



            $User_google_data = array(
                'userFirstName' => $userFirstName,
                'userLastName' => $userLastName,
                'userEmail' => $userEmail,
                'userPicture' => $userPicture,
                'userGoogleId' => $userGoogleId,
                'userHD' => $userHD
            );

            session()->set('User_google_data', $User_google_data);


     
            
            $userModel = new UserModel();
            $user = $userModel->where('email', $userEmail)->first();
            session()->set('current_user', $user);
            echo 'test';
            $_SESSION['current_user'] = $user;

            if($user){

                $userType = $user['rang'] == 0 ? "student" : "personnel";
                session()->set('userType', $userType);
                session()->set('loggedUser', $user);
                print_r($drive);
                //session()->set('drive', $drive);
                return redirect()->to(base_url() . 'dashboard');
            }
            else{
                echo "user doesn't exist ";
            }
        }
        else{
            session()->setFlashdata('error', $token['error']);
            echo $token['error'];
           // return redirect()->to('/login');
        }
        //TODO: add a login error page


    }

    public function getGoogleDrive(){
        $drive = session()->get('files');
        return $drive;
    }

    public function logout(){
        session()->destroy();
        return redirect()->to(base_url() . 'login');
    }

}