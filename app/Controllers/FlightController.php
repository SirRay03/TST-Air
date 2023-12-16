<?php
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Flight;
use App\Models\Airport;

class FlightController extends ResourceController
{
    public function addFlightPage()
    {
        $model = model(Flight::class);
        $airportModel = model(Airport::class);
        $airports = $airportModel->getAirport();
        return view('add_flight', ['airports' => $airports]);
    }

    public function viewFlightPage()
    {
        $model = model(Flight::class);
        $airports = $airport->getAirport();
        return view('view_flight', ['airports' => $airports]);
    }
}