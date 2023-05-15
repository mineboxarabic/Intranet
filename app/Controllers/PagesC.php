<?php

namespace App\Controllers;

class PagesC extends BaseController
{
    public function showPage($id)
    {
        $model = new \App\Models\PagesM();
        $page = $model->where('id', $id)->first();
        $data = [
            'page' => $page
        ];
        return view('Pages', $data);
    }

    public function consultePage($id){
    
        $model = new \App\Models\PagesM();
        $page = $model->where('id', $id)->first();
        $data = [
            'page' => $page
        ];
        return view('PagesManager', $data);
    }

}
