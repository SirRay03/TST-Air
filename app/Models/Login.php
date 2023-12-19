<?php
namespace App\Models;
use CodeIgniter\Model;
class Login extends Model{
    public function loginProcess($email, $password)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM employee WHERE email=? AND password=?", [$email, $password]);
        return count($query->getResult());
    }
}