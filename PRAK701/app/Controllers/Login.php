<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Login extends BaseController
{
    public function index()
    {
        return view('vw_login');
    }

    public function process()
    {
        $users = new UsersModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $users->where('username', $username)->first();

        if ($dataUser && password_verify($password, $dataUser->password)) {
            session()->set([
                'user_id' => $dataUser->id,
                'username' => $dataUser->username,
                'logged_in' => true
            ]);
            return redirect()->to(base_url('home'));
        } else {
            session()->setFlashdata('error', 'Username atau password salah.');
            return redirect()->back();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
