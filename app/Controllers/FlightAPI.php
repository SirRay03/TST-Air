<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Flight;

class FlightAPI extends ResourceController
{
    public function flights()
    {
        $model = model(Flight::class);
        $origin = $this->request->getVar('origin');
        $destination = $this->request->getVar('destination');
        $date = $this->request->getVar('date');
        $capacity = $this->request->getVar('capacity');
        $result = $model->getFlights($origin, $destination, $date, $capacity);
        if ($result) {
            $data = [
                'message' => 'success',
                'flights' => $result
            ];
        } else {
            $data = [
                'message' => 'failed',
                'flights' => []
            ];
        }
        return $this->respond($data);
    }
}