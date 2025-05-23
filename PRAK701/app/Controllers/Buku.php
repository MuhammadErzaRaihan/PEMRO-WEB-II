<?php

namespace App\Controllers;

use App\Models\BukuModel;
use CodeIgniter\Controller;

class Buku extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new BukuModel();
        helper(['form', 'url']);
    }

    public function login()
    {
        return view('vw_login', ['title' => 'Login']);
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('/login'));
        }

        $data = [
            'posts' => $this->model->paginate(10),
            'pager' => $this->model->pager,
            'title' => 'Daftar Buku'
        ];

        return view('vw_buku', $data);
    }

    public function create()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('/login'));
        }

        $data = [
            'title' => 'Tambah Data Buku',
            'validation' => session()->getFlashdata('validation')
        ];

        return view('vw_add', $data);
    }

    public function store()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('/login'));
        }

        $data = $this->request->getPost([
            'judul',
            'penulis',
            'penerbit',
            'tahun_terbit'
        ]);

        if (!$this->model->insert($data)) {
            $validation = $this->model->errors();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        session()->setFlashdata('success', 'Book Added.');
        return redirect()->to(base_url('home'));
    }

    public function edit($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('/login'));
        }

        $post = $this->model->find($id);
        if (!$post) {
            session()->setFlashdata('error', 'Data tidak ditemukan.');
            return redirect()->back();
        }

        $data = [
            'title' => 'Edit Buku',
            'post' => $post,
            'validation' => session()->getFlashdata('validation')
        ];

        return view('vw_edit', $data);
    }

    public function update($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('/login'));
        }

        $existing = $this->model->find($id);
        if (!$existing) {
            session()->setFlashdata('error', 'Data tidak ditemukan.');
            return redirect()->back();
        }

        $data = $this->request->getPost([
            'judul',
            'penulis',
            'penerbit',
            'tahun_terbit'
        ]);

        if ($data['judul'] === $existing['judul']) {
            $this->model->setValidationRules([
                'judul'        => 'required|regex_match[/^[A-Za-z0-9 :.,\'"]+$/]',
                'penulis'      => 'required|regex_match[/^[A-Za-z0-9 :.,\'"]+$/]',
                'penerbit'     => 'required|regex_match[/^[A-Za-z0-9 :.,\'"]+$/]',
                'tahun_terbit' => 'required|integer|greater_than[1901]|less_than[2024]',
            ]);
        }

        if (!$this->model->update($id, $data)) {
            $validation = $this->model->errors();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        session()->setFlashdata('success', 'Data berhasil diperbarui.');
        return redirect()->to(base_url('home'));
    }

    public function delete($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $this->model->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to(base_url('home'));
    }
}
