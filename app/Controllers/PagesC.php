<?php

namespace App\Controllers;

class PagesC extends BaseController
{
    public function showPage($label)
    {
        echo $label;
        $model = new \App\Models\PagesM();
        $page = $model->where('lable', $label)->first();
        $data = [
            'page' => $page
        ];
        return view('Pages', $data);
    }

    public function consultePage($id){
    
        $model = new \App\Models\PagesM();
        $page = $model->where('lable', $id)->first();
        $data = [
            'page' => $page
        ];
        return view('PagesManager', $data);
    }

    public function uploadImages($id){
       //?command=QuickUpload&type=Files&responseType=json
       $command = $_GET['command'];
        $type = $_GET['type'];
        $responseType = $_GET['responseType'];

        


    }

}
