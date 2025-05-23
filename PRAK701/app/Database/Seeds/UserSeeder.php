<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'Raudatul',
            'email'    => 'rdtlsh27@gmail.com',
            'password' => password_hash('atul123', PASSWORD_DEFAULT),
        ];

        $this->db->table('users')->insert($data);
    }
}
