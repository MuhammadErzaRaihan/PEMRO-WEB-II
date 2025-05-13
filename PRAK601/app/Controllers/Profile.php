<?php
namespace App\Controllers;
use App\Models\PraktikanModel;

class Profile extends BaseController 
{
    public function index() 
    {
        $model = new PraktikanModel();
        
        $data = [
            'title' => 'Profil Saya',
            'profil' => $model->getProfil()
        ];
        
        return view('profil', $data);
    }
}