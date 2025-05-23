<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'buku';
    protected $allowedFields = ['judul', 'penulis', 'penerbit', 'tahun_terbit'];

    protected $validationRules = [
        'judul'        => 'required|regex_match[/^[A-Za-z0-9 :.,\'"]+$/]|is_unique[buku.judul]',
        'penulis'      => 'required|regex_match[/^[A-Za-z0-9 :.,\'"]+$/]',
        'penerbit'     => 'required|regex_match[/^[A-Za-z0-9 :.,\'"]+$/]',
        'tahun_terbit' => 'required|integer|greater_than[1901]|less_than[2024]',
    ];

    protected $validationMessages = [
        'judul' => [
            'required'    => 'Judul buku wajib diisi.',
            'regex_match' => 'Judul : Harus diisi dan berupa string',
            'is_unique'  => 'Judul buku sudah terdaftar, gunakan judul lain.',
        ],
        'penulis' => [
            'required'    => 'Nama penulis wajib diisi.',
            'regex_match' => 'Penulis : Harus diisi dan berupa string',
        ],
        'penerbit' => [
            'required'    => 'Nama penerbit wajib diisi.',
            'regex_match' => 'Penerbit : Harus diisi dan berupa string ',
        ],
        'tahun_terbit' => [
            'required'      => 'Tahun terbit wajib diisi.',
            'integer'       => 'Tahun terbit harus berupa angka.',
            'greater_than'  => 'Tahun terbit harus lebih besar dari 1901.',
            'less_than'     => 'Tahun terbit harus lebih kecil dari 2024.',
        ]
    ];

    protected $skipValidation = false;
}
