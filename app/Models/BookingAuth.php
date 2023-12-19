<?php
namespace App\Models;
use CodeIgniter\Model;
class BookingAuth extends Model{
    function getDataAuthentication($id, $password){
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM employee WHERE id = ? AND password = ?', [$id, $password]);
        return count($query->getRow());
    }
}