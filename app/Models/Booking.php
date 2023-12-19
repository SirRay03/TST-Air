<?php
namespace App\Models;
use CodeIgniter\Model;

class Booking extends Model
{
    public function createBooking($flight_id, $pnr)
    {
        $db = \Config\Database::connect();
        $query = $db->query('INSERT INTO booking (flight_id, pnr) VALUES (?, ?)', [$flight_id, $pnr]);
        return $query;
    }

    public function payBooking($pnr)
    {
        $db = \Config\Database::connect();
        $flight_id = $db->query('SELECT flight_id FROM booking WHERE pnr = ?', [$pnr])->getRow()->flight_id;
        $query = $db->query('UPDATE booking SET seat_num = COALESCE((SELECT max(seat_num) FROM booking WHERE flight_id = ?), 0)+1 WHERE pnr = ?', [$flight_id, $pnr]);
        return $query;
    }

    public function getCheckin($pnr){
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM booking WHERE pnr = ?', [$pnr]);
        if ($query->getNumRows() > 0) {
            return $query->getRow();
        } else {
            return null;
        }
    }
    

}