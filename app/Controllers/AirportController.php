<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Airport;
use App\Models\Countries;

class AirportController extends ResourceController
{
    public function addAirportPage()
    {
        $model = model(Airport::class);
        $countryModel = model(Countries::class);
        $countries = $countryModel->getCountries();
        return view('add_airport', ['countries' => $countries]);
    }

    public function add()
    {
        $model = model(Airport::class);
        
        $iata = $this->request->getVar('iata');
        $name = $this->request->getVar('name');
        $city = $this->request->getVar('city');
        $country = $this->request->getVar('country');

        $result = $model->addAirport($iata, $name, $city, $country);
        
        if ($result) {
            $data = [
                'message' => 'success',
                'airport' => $result
            ];
        } else {
            $data = [
                'message' => 'failed',
                'airport' => []
            ];
        }
        
        return $this->respond($data);
    }
}