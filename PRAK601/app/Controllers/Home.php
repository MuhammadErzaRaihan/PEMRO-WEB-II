<?php
namespace App\Controllers;

use App\Models\PraktikanModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new PraktikanModel();
        $profil = $model->getProfil();

        $data = [
            'title' => 'Beranda',
            'nama_lengkap' => $profil['nama_lengkap'],
            'nim' => $profil['nim']
        ];

        return view('beranda', $data);
    }
}
