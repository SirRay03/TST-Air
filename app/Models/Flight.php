<?php
namespace App\Models;
use CodeIgniter\Model;

class Flight extends Model{
    public function getFlights($origin, $destination, $date, $capacity)
    {
        $db = \Config\Database::connect();

        $query = $db->query('SELECT * FROM flight WHERE origin_id = ? AND destination_id = ? AND DATE(schedule) = ?', [$origin, $destination, $date]);
        $id = $query->getRow()->id;

        $isEmpty = $db->query('SELECT count(*) as count FROM booking WHERE flight_id = ?', [$id])->getRow()->count;

        if($isEmpty < $capacity){
            return $query->getResult();
        }else{
            return false;
        }
    }

    public function getAllFlights()
    {
        $db = \Config\Database::connect();

        $query = $db->query('SELECT * FROM flight');

        return $query->getResult();
    }

    public function addFlight($flight_id, $origin_id, $destination_id, $schedule, $capacity, $duration, $price)
    {
        $db = \Config\Database::connect();

        $query = $db->query('INSERT INTO flight (flight_id, origin_id, destination_id, schedule, capacity, duration, price) VALUES (?, ?, ?, ?, ?, ?, ?)', [$flight_id, $origin_id, $destination_id, $schedule, $capacity, $duration, $price]);

        return $query;
    }
}
