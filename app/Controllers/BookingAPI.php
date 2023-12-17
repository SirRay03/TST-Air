<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Booking;

class BookingAPI extends ResourceController
{
    public function create()
    {
        $model = model(Booking::class);
        
        $flight_id = $this->request->getVar('flight_id');
        $pnr = $this->request->getVar('pnr');

        $result = $model->createBooking($flight_id, $pnr);
        
        if ($result) {
            $data = [
                'message' => 'success',
                'booking' => $result
            ];
        } else {
            $data = [
                'message' => 'failed',
                'booking' => []
            ];
        }
        
        return $this->respond($data);
    }


    public function pay($pnr)
    {
        $model = model(Booking::class);
        $result = $model->payBooking($pnr);
        if ($result) {
            $data = [
                'message' => 'success',
                'booking' => $result
            ];
        } else {
            $data = [
                'message' => 'failed',
                'booking' => []
            ];
        }
        return $this->respond($data);
    }

    public function checkinForm()
    {
        return view('navbar').view('checkin_form');
    }

    public function checkinResult()
    {
        $model = model(Booking::class);
        $pnr = $this->request->getVar('pnr');
        $last_name = $this->request->getVar('last_name');
        $result = $model->getCheckin($pnr, $last_name);
        if ($result) {
            return view('checkin_result', ['booking' => $result]);       
        } else {
            echo "No booking information available.";           
        }
    }
}
