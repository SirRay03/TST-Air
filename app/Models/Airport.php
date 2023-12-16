<?php
namespace App\Models;
use CodeIgniter\Model;

class Airport extends Model{
    public function addAirport($iata, $name, $city, $country)
    {
        $db = \Config\Database::connect();
        $query = $db->query('INSERT INTO airport (iata, name, city, country_id) VALUES (?, ?, ?, ?)', [$iata, $name, $city, $country]);
        return $query;
    }

    public function getAirport()
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM airport');
        return $query->getResult();
    }

    public function editAirport($iata, $name, $city, $country, $id)
    {
        $db = \Config\Database::connect();
        $query = $db->query('UPDATE airport SET iata = ?, name = ?, city = ?, country_id = ? WHERE airport_id = ?', [$iata, $name, $city, $country, $id]);
        return $query;
    }

    public function deleteAirport($id)
    {
        $db = \Config\Database::connect();
        $query = $db->query('DELETE FROM airport WHERE airport_id = ?', [$id]);
        return $query;
    }
}