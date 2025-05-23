<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Register extends BaseController
{
    public function index()
    {
        return view('vw_register');
    }

    public function process()
    {
        if (!$this->validate([
            'username' => 'required|max_length[20]|is_unique[users.username]',
            'password' => 'required|max_length[50]',
            'password_conf' => 'matches[password]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email'
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $users = new UsersModel();
        $users->insert([
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'email' => $this->request->getVar('email')
        ]);

        return redirect()->to('/login');
    }
}
