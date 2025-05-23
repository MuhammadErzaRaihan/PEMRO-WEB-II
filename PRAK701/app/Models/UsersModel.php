<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = "users";
    protected $returnType = "object";
    protected $allowedFields = ['username', 'password', 'email'];
}
