<?php

namespace App\Controllers;

class PagesC extends BaseController
{
    public function showPage($label)
    {
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

    public function updatePage($id){
        $editor = $this->request->getVar('editor');


        $pageModel = model('PagesM');
        $page = $pageModel->where('id', $id)->first();



        $page['contenu'] = $editor;
        $page['updated_at'] = date('Y-m-d H:i:s');

        print_r($page);

        //update the page that has the id = $id
        $builder = $pageModel->builder();
        $builder->where('id', $id);
        $builder->update($page);



       // $pageModel->save($page);
          return redirect()->to(base_url($page['lable']));

       // return redirect()->to(base_url($page['lable']));
    }

}
