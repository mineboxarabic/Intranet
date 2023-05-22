<?php

namespace App\Controllers;
use App\Models\userAbsenceM;
use App\Models\UserModel;

class AbsenceC extends BaseController
{
    public function index()
    {

        $userAbsence = model('App\Models\Absence\userAbsenceM');
        $user = new UserModel();
        $entitle = model('App\Models\Absence\EntitleDDaysM');
        $leaves = model('App\Models\Absence\LeavesM');
        $user = $user->where('id', session()->get('current_user')['id'])->first();
        $user = $userAbsence->getUserByEmail($user['email']);
        $user = $user[0];

        

        $userId = $user['id'];
        $contrat = $user['contract'];


        $CA = 0;
        $CA1 = 0;

        $CET = 0;
        $CET1 = 0;

        $Recuperation = 0;
        $Recuperation1 = 0;


        //_CA
            $entitleCA = $entitle->getByContract($contrat)[0];
            $CA = $entitleCA['days'];

            $leavesCA = $leaves->getLeavesByUserAndType($userId, 13);

            foreach ($leavesCA as $key => $value) {
                $CA1 += $value['duration'];
            }

            $CA1 = $CA - $CA1;
        //_


        //_Recuperation
            $RecuperationOfUser = $entitle->getByUser($user['id']);
            foreach ($RecuperationOfUser as $key => $value) {
                if($value['type'] == 1)
                    $Recuperation += $value['days'];
            }

            $leavesRecuperation = $leaves->getLeavesByUserAndType($userId, 1);

            foreach ($leavesRecuperation as $key => $value) {

                if($value['status'] == 3){
                    $Recuperation1 += $value['duration'];
                }
            }

            $Recuperation1 = $Recuperation - $Recuperation1;
        //_


        $CETOfUser = $entitle->getByUser($user['id']);

        foreach ($CETOfUser as $key => $value) {
            if($value['type'] == 15)
                $CET += $value['days'];
        }

        $leavesCET = $leaves->getLeavesByUserAndType($userId, 15);

        foreach ($leavesCET as $key => $value) {
            $CET1 += $value['duration'];
        }

        $CET1 = $CET - $CET1;




        $data = [
            'Recuperation' => $Recuperation1 .'/'.$Recuperation,
            'Conge_annuls' => $CA1 .'/'.$CA,
            'Compte_epargne_temps' => $CET1 .'/'. $CET,
        ];

        return view('Absence', $data);
    }

    public function sendAbsence(){
        $userAbsence = model('App\Models\Absence\userAbsenceM');
        $user = new UserModel();
        
        $user = $user->where('id', session()->get('current_user')['id'])->first();
        $user = $userAbsence->getUserByEmail($user['email']);
        $user = $user[0];

        $userId = $user['id'];

        $emailManager = $user['manager'];
        $manager = $userAbsence->db->table('users')->where('id', $emailManager)->get()->getResultArray()[0];

        //send email to manager
        echo $manager['email'];
        $emailConfig = array(
            'protocol' => 'smtp',
            'SMTPHost' => 'smtp.gmail.com',

            'SMTPCrypto' => 'ssl',
            'SMTPPort' => 465,
            'SMTPUser' => 'robert.morel@ensp-arles.fr',
            'SMTPPass' => '9crh25x3',
            'mailType' => 'html',
            'charset' => 'iso-8859-1',
            'newline' => "\r\n",

        );
       

        $email = \Config\Services::email();
        $email->initialize($emailConfig);

        $email->setFrom('robert.morel@ensp-arles.fr', 'Robert Morels');
        $email->setTo($manager['email']);

        $email->setSubject('EmailXXXXXXX Test');
        $email->setMessage('Testing the email class.');

        if($email->send()){
            echo 'Email successfully sent';
        }else{
            echo $email->printDebugger(['headers']);
        }


        

        





    }

}
